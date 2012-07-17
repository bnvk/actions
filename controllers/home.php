<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Actions : Home Controller
* Author: 		Brennan Novak
* 		  		hi@brennannovak.com
* 
* Project:		http://social-igniter.com
* 
* Description: This file is for the Actions Home Controller class
*/
class Home extends Dashboard_Controller
{
    function __construct()
    {
        parent::__construct();

		$this->load->config('actions');

		$this->data['page_title'] = 'Actions';
	}
	
	function me()
	{
	
		$this->data['places']		= $this->social_igniter->get_content_view('module', 'places', 'all', 100);
		$this->data['users']		= $this->social_auth->get_users('active', 1, TRUE);
		$this->data['sub_title'] 	= 'My Actions';
	
		$this->render('dashboard_wide');
	}
}