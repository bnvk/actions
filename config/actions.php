<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Actions : Config
* Author: 		Brennan Novak
* 		  		hi@brennannovak.com
* 
* Project:		http://social-igniter.com
* 
* Description: this file Actions
*/

$config['actions_path']					= 'actions/';
$config['actions_triggers_location_apps']	= array(
	'none'			=> '---select---',
	'foursquare'	=> 'Foursquare',
	'geoloqi'		=> 'GeoLoqi'
);

/* Location Trigger Details */
$config['actions_triggers_location']	= array(
	'none'		=> '---select---',
	'0.25'		=> '1/4 Mile',
	'0.5'		=> '1/2 Mile',
	'1'			=> '1 Mile',
	'2'			=> '2 Miles',
	'16000'		=> 'Anywhere'
);

/* Foursquare Triggers */
$config['actions_triggers_type_foursquare'] = array(
	'none'			=> '---select---',
	'checkin_at'	=> 'Checkin',
	'last_checkin'	=> 'Last Checkin Was'
);