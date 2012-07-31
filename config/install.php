<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Actions : Install
* Author: 		Brennan Novak
* 		  		hi@brennannovak.com
*          
* Project:		http://social-igniter.com/
*
* Description: 	Installer values for Actions for Social Igniter 
*/

/* Settings */
$config['actions_settings']['widgets']				= 'TRUE';
$config['actions_settings']['enabled']				= 'TRUE';
$config['actions_settings']['create_permission'] 	= '3';
$config['actions_settings']['publish_permission']	= '2';
$config['actions_settings']['manage_permission']	= '2';


/* Data Table */
$config['database_actions_actions_table'] = array(
'action_id' => array(
	'type' 					=> 'INT',
	'constraint' 			=> 11,
	'unsigned' 				=> TRUE,
	'auto_increment'		=> TRUE
),
'user_id' => array(
	'type' 					=> 'INT',
	'constraint' 			=> '11',
	'null'					=> TRUE
),
'user_state' => array(
	'type'					=> 'CHAR',
	'constraint' 			=> '32',
	'null'					=> TRUE
),
'trigger' => array(
	'type'					=> 'VARCHAR',
	'constraint' 			=> '32',
	'null'					=> TRUE
),
'trigger_type' => array(
	'type'					=> 'CHAR',
	'constraint' 			=> '16',
	'null'					=> TRUE
),
'trigger_param' => array(
	'type'					=> 'CHAR',
	'constraint' 			=> '128',
	'null'					=> TRUE
),
'trigger_value' => array(
	'type'					=> 'VARCHAR',
	'constraint' 			=> '255',
	'null'					=> TRUE
),
'action' => array(
	'type'					=> 'VARCHAR',
	'constraint' 			=> '32',
	'null'					=> TRUE
),
'action_target' => array(
	'type'					=> 'VARCHAR',
	'constraint' 			=> '64',
	'null'					=> TRUE
),
'action_data' => array(
	'type'					=> 'TEXT',
	'null'					=> TRUE
),
'action_life' => array(
	'type'					=> 'CHAR',
	'constraint'			=> 16,
	'null'					=> TRUE
),
'action_time' => array(
	'type'					=> 'DATETIME',
	'default'				=> '9999-12-31 00:00:00'
),
'action_status' => array(
	'type'					=> 'CHAR',
	'constraint'			=> 16,
	'null'					=> TRUE
),
'completed_at' => array(
	'type'					=> 'DATETIME',
	'default'				=> '9999-12-31 00:00:00'
),
'created_at' => array(
	'type'					=> 'DATETIME',
	'default'				=> '9999-12-31 00:00:00'
),
'updated_at' => array(
	'type'					=> 'DATETIME',
	'default'				=> '9999-12-31 00:00:00'
));

