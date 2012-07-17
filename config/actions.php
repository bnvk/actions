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
	'none'					=> '---select---',
	'within_quarter_mile'	=> '1/4 Mile',
	'within_half_mile'		=> '1/2 Mile',
	'within_one_mile'		=> '1 Mile',
	'within_two_miles'		=> '2 Miles',
	'within_anywhere'		=> 'Anywhere'
);

/* Foursquare Triggers */
$config['actions_triggers_type_foursquare'] = array(
	'none'			=> '---select---',
	'checkin_at'	=> 'Checkin',
	'last_checkin'	=> 'Last Checkin Was'
);