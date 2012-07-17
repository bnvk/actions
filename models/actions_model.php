<?php

class Data_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function get_action($action_id)
    {
 		$this->db->select('*');
 		$this->db->from('actions');    
 		$this->db->where('action_id', $action_id);
 		$this->db->order_by('created_at', 'desc'); 
		$this->db->limit(1);    
 		$result = $this->db->get()->row();	
 		return $result;	      
    }

    function get_actions_view()
    {
 		$this->db->select('*');
 		$this->db->from('actions');    
 		$this->db->order_by('created_at', 'desc'); 
 		$result = $this->db->get();	
 		return $result->result();	      
    }
    
    function add_action($action_data)
    {
 		$action_data['created_at'] = unix_to_mysql(now());
		$action_data['updated_at'] = unix_to_mysql(now());

		$insert 	= $this->db->insert('actions', $action_data);
		$data_id 	= $this->db->insert_id();
		return $this->db->get_where('actions', array('action_id' => $action__id))->row();
    }

    function udpate_action($data_id, $action_data)
    {
		$data['updated_at'] = unix_to_mysql(now());
		$this->db->where('action_id', $action_id);
		$this->db->update('actions', $data);
		return $this->db->get_where('actions', array('action_id' => $action_id))->row();	
    }

    function delete_action($action_id)
    {
    	$this->db->where('action_id', $action_id);
    	$this->db->delete('actions');
		return TRUE;
    }

}