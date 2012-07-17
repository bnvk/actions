<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Actions Library
*
* @package		Social Igniter
* @subpackage	Actions Library
* @author		Brennan Novak
*
* Contains methods for Actions App
*/

class Actions_library
{
	function __construct()
	{
		// Global CodeIgniter instance
		$this->ci =& get_instance();

	}
	
	/* Interact with Data_Model */
	function my_custom_method($data_id)
	{
		return $this->ci->actions_model->get_data($data_id);
	}

}