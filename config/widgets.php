<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Actions : Widgets
* Author: 		Brennan Novak
* 		  		hi@brennannovak.com
*          
* Project:		http://social-igniter.com/
*
* Description: 	Installer values for Actions for Social Igniter 
*/

$config['actions_widgets'][] = array(
	'regions'	=> array('sidebar','content'),
	'widget'	=> array(
		'module'	=> 'actions',
		'name'		=> 'Recent Data',
		'method'	=> 'run',
		'path'		=> 'widgets_recent_data',
		'multiple'	=> 'FALSE',
		'order'		=> '1',
		'title'		=> 'Recent Data',
		'content'	=> ''
	)
);