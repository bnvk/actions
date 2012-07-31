<?php
class Cron extends MX_Controller
{

    function __construct()
    {
        // Database
        $this->load->database();

        // Load Libraries
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->library('social_auth');
        $this->load->library('social_igniter');
        $this->load->library('social_tools');    
    
		foreach ($this->social_igniter->get_settings() as $setting)
		{			
            $this->config->set_item($setting->module.'_'.$setting->setting, $setting->value);
		}    
 
    }	


    public function job()
    {
		// Load Libraries for compatible Apps (foursquare, geoloqi, messages)		
		$this->load->model('actions_model');

		// Query Actions Table for "actions"
		$actions = $this->actions_model->get_actions_view();

		$this->load->library('places/places_igniter');


		// Loop through "actions"
		foreach($actions as $action)
		{
			// Is Not Complete (weekly, daily, hourly)
			if ($action->status == 'sent')
			{
				// Weekly
				if ($action->action_life == 'weekly')
				{
					$this_week = date('W');

					if ($this_week != date('W', mysql_to_unix($action->completed_at)))
					{
						$this->process_action($action);
					}
				}
				// Daily
				elseif ($action->action_life == 'daily')
				{
					$today = date('d');

					if ($today != date('d', mysql_to_unix($action->completed_at)))
					{
						$this->process_action($action);
					}
				}
				// Hourly
				elseif ($action->action_life == 'hourly')
				{
					$today = date('H');

					if ($today != date('H', mysql_to_unix($action->completed_at)))
					{
						$this->process_action($action);
					}
				}
			}
			elseif ($action->status == 'waiting')
			{
				$this->process_action($action);
			}
			else
			{
				echo 'Action Status: '.$action->status;
			}
		}
    }


    function process_action($action)
    {
		// Get User Connection (if needed)
		$connection  = $this->social_auth->check_connection_user($action->user_id, 'foursquare', 'primary');
		
		// Process "trigger" Foursquare
		$this->load->library('foursquare/foursquare_library', $connection->auth_one);

		$checkins 		= $this->foursquare_library->recent_checkins();
		$most_recent 	= $checkins->response->checkins->items[0];
		$lat 			= $most_recent->venue->location->lat;
		$lon 			= $most_recent->venue->location->lng;
		$venue_name 	= $most_recent->venue->name;
		
		// Process "trigger_type" 
		if ($action->trigger_type == 'checkin_at')
		{
			// Process "trigger_detail" (location)
			$distance_target	= explode(",", $action->trigger_value);
			$distance			= $this->places_igniter->distance($lon, $lat, $distance_target[1], $distance_target[0]);
			
			// If Distance Is Closer Than Trigger
			if ($distance <= $action->trigger_param)
			{
				// Process "action" Twilio 
				$this->load->library('twilio/twilio');

				$from 		= config_item('twilio_phone_number');
				$to 		= $action->action_target;
				$message 	= $action->action_data." I'm currently at ".$venue_name; //". Weather should be ".$prediction[0];

				$send_sms = $this->twilio->sms($from, $to, $message);
					
				// Update Action Status
				$this->process_status($action);
			}		    	
		}
    }
 
 	// Updates Action
 	// Sez when it is ok to send or process actions
    function process_status($action)
    {	    
		if ($action->action_life == 'once')
		{
			$status = 'complete';
		}
		elseif ($action->action_life == 'daily')
		{
			$status = 'sent';
		}
		elseif ($action->action_life == 'hourly')
		{
			$status = 'sent';
		}
		elseif ($action->action_life == 'constant')
		{
			$status = 'waiting';
		}
		else
		{
			$status = 'complete';							
		}
		
		$update_action = $this->actions_model->update_action($action->action_id, array('status' => $status, 'completed_at' => unix_to_mysql(now())));
    }

    function get_nearby_weather($lat, $lon)
    {

		$weather_url		= 'http://i.wxbug.net/REST/Direct/GetForecast.ashx?la='.$lat.'&lo='.$lon.'&nf=1&c=US&l=en&api_key=f9pgpdb5d4rv5ssvmz9enjyt';
		$weather			= json_decode(file_get_contents($weather_url))->forecastList[0];
		$prediction			= explode(".",$weather->nightPred);

    }

    function date_test()
    {
	    echo 'Week: '.current_week().'<br>';
	    echo 'Day: '.date('d', mysql_to_unix('2012-07-22 11:15:03'));
	    echo '<br>';
	    
	    echo date('d');
    }

    
}