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
	'within_quarter_mile'	=> 'Within 1/4 Mile',
	'within_half_mile'		=> 'Within 1/2 Mile',
	'within_one_mile'		=> 'Within 1 Mile',
	'within_two_miles'		=> 'Within 2 Miles',
	'within_anywhere'		=> 'Within Anywhere'
);

/* Foursquare Triggers */
$config['actions_triggers_foursquare']	= array(
	'none'			=> '---select---',
	'checkin_at'	=> 'I Checkin',
	'last_checkin'	=> 'Last Checkin Was'
);