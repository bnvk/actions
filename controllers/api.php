<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Actions : API Controller
* Author: 		Brennan Novak
* 		  		hi@brennannovak.com
* 
* Project:		http://social-igniter.com
* 
* Description: This file is for the Actions API Controller class
*/
class Api extends Oauth_Controller
{
    function __construct()
    {
        parent::__construct();
        

	}

    /* Install App */
	function install_authd_get()
	{
		// Load
		$this->load->library('installer');
		$this->load->config('install');
		$this->load->dbforge();

		// Create Data Table
		$this->dbforge->add_key('action_id', TRUE);
		$this->dbforge->add_field(config_item('database_actions_actions_table'));
		$this->dbforge->create_table('actions');

		// Settings & Create Folders
		$settings = $this->installer->install_settings('actions', config_item('actions_settings'));
	
		if ($settings == TRUE)
		{
            $message = array('status' => 'success', 'message' => 'Yay, the Actions App was installed');
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Dang Actions App could not be installed');
        }		
		
		$this->response($message, 200);
	} 
	
	function view_get()
    {
    	$this->load->model('data_model');

		$data	= $this->data_model->get_data($this->get('id'));    
   		 	
        if($data)
        {
            $message = array('status' => 'success', 'message' => 'Activity has been found', 'data' => $data);
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Could not find any Data');
        }

        $this->response($message, 200);
    }

    function create_authd_post()
    {    
    	$this->load->model('actions_model');

		$action_data = array(
			'user_id'			=> $this->oauth_user_id,
			'user_state'		=> $this->input->post('user_state'),
			'trigger'			=> $this->input->post('trigger'),
			'trigger_type'		=> $this->input->post('trigger_type'),
			'trigger_param'		=> $this->input->post('trigger_param'),
			'trigger_value'		=> $this->input->post('trigger_value'),
			'action'			=> $this->input->post('action'),
			'action_target'		=> $this->input->post('action_target'),
			'action_data'		=> $this->input->post('action_data')
		);

		// Add Data
		if ($add_action = $this->actions_model->add_action($action_data))
		{
        	$message = array('status' => 'success', 'message' => 'Action added successfully created', 'action' => $add_action);
        }
        else
        {
	        $message = array('status' => 'error', 'message' => 'Oops unable to add Action');
        }
	
        $this->response($message, 200);
    }
    
    function update_authd_get()
    {
    	$this->load->model('data_model');
    
    	$udpate_data = array(
    		'text'	=> $this->input->post('text')
    	);
    
		$update = $this->social_tools->update_data($this->get('id'), $update_data);			
    	
        if($update)
        {
            $message = array('status' => 'success', 'message' => 'Data was update');
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Could not update data');
        } 

        $this->response($message, 200);           
    }  

    function destroy_authd_get()
    { 
       	$this->load->model('data_model'); 
         
    	if ($this->data_model->delete_data($this->get('id')))
    	{   	
    		$message = array('status' => 'success', 'message' => 'Data was deleted');
    	}
    	else
    	{
    		$message = array('status' => 'error', 'message' => 'Oops Data was not deleted');        	
    	}
        
        $this->response($message, 200);
    }

    function cron_job_get()
    {
    	// Load Libraries for compatible Apps (foursquare, geoloqi, messages)

    	$this->load->library('places/places_igniter');
    	$this->load->model('actions/actions_model');
    	$this->load->library('twilio/twilio');
      
 
	    // Query Actions Table for "actions"
    	$actions = $this->actions_model->get_actions_view();
    	
    	
    	//print_r($actions);
	    
	    // Loop through "actions"
	    foreach($actions as $action){
	      $connection  = $this->social_auth->check_connection_user($action->user_id, 'foursquare', 'primary');
	      
	      error_log("Connection: ".json_encode($connection));
		$this->load->library('foursquare/foursquare_library', $connection->auth_one);
        $checkins = $this->foursquare_library->recent_checkins();
        //error_log("Checkins: ".json_encode($checkins));
        $most_recent = $checkins->response->checkins->items[0];
        //error_log("Most recent: ".json_encode($most_recent));
        $lat = $most_recent->venue->location->lat;
        $lon = $most_recent->venue->location->lng;
        $venue_name = $most_recent->venue->name;
        
        error_log("Most recent: ".json_encode($most_recent));

	    	// Check "trigger_type" 
		    if ($action->trigger_type == 'checkin_at')
		    {
		      //error_log('type matches');
		    	// Process "trigger_detail"
		    	$distance_target = explode(",", $action->trigger_value);
		    	$weather_url = "http://i.wxbug.net/REST/Direct/GetForecast.ashx?la=$lat&lo=$lon&nf=1&c=US&l=en&api_key=f9pgpdb5d4rv5ssvmz9enjyt";
		    	$weather = json_decode(file_get_contents($weather_url))->forecastList[0];
		    	$prediction = explode(".",$weather->nightPred);
		    	$distance = $this->places_igniter->distance($lon, $lat, $distance_target[1], $distance_target[0]);
		    	
		    	//error_log("Distance: $distance miles away");
		    	//echo("Distance: $distance miles away");
		    	//TODO get phone from database
		    	$from 		= config_item('twilio_phone_number');
		    	$to 		= $action->action_target;
		    	$message 	= $action->action_data." I'm currently at ".$venue_name.". Weather should be ".$prediction[0];
		    	
		    	// If Distance Is Closer Than Trigger
		    	if($distance <= $action->trigger_param)
		    	{
					$send_sms = $this->twilio->sms($from, $to, $message);
					//error_log("SMS msg is: ".json_encode($send_sms));
					echo "SENT: ".$message;
		    	}
		    	else 
		    	{
		    		echo "unset";
		    	}		    	
		    }
		  }
	    
    }
    
}