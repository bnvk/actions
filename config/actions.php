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
	'0.75'		=> '3/4 Mile',
	'1'			=> '1 Mile',
	'2'			=> '2 Miles',
	'3'			=> '3 Miles',
	'4'			=> '4 Miles',
	'5'			=> '5 Miles',
	'10'		=> '10 Miles',
	'25'		=> '25 Miles',
	'16000'		=> 'Anywhere'
);

/* Foursquare Triggers */
$config['actions_triggers_type_foursquare'] = array(
	'none'			=> '---select---',
	'checkin_at'	=> 'My Current Checkin',
	'last_checkin'	=> 'My Last Checkin Was'
);