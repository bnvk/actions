<div id="content_wide_content">

	<h2>Create Yo Trigger</h2>
	<p>
		<select name="trigger_type" id="trigger_type">
			<option value="">---select---</option>
			<option value="location">Location</option>
			<option value="message">Message</option>
			<option value="post">Post</option>
			<option value="person">Person</option>
			<option value="date_time">Date / Time</option>
		</select>
	</p>
	
	<!-- TRIGGERS -->
	<!-- Triggers : Location -->
	<div id="triggers_location" class="trigger_type_tool hide">
		<h3>Select App</h3>
		<?= form_dropdown('trigger_location', config_item('actions_triggers_location_apps'), 'none', 'id="trigger_location_apps"') ?>


		<!-- Foursquare -->
		<div id="triggers_foursquare" class="trigger_type_apps hide">
		<table style="margin:0px; padding: 0px;">
		<tr>
			<td>When My</td>
			<td>Is Within</td>
			<td>This Place</td>
		</tr>
		<tr>
			<td><?= form_dropdown('trigger_type', config_item('actions_triggers_type_foursquare'), 'none', 'id="trigger_location_type_foursquare"') ?></td>
			<td><?= form_dropdown('trigger_type', config_item('actions_triggers_location'), 'none', 'id="trigger_location_param_foursquare"') ?></td>
			<td>				
				<select name="trigger_location" id="trigger_location_value_foursquare" class="trigger_last_value">
					<option value="none">---select---</option>
				<?php foreach ($places as $place): ?>
					<option value="<?= $place->geo_lat.','.$place->geo_long ?>"><?= $place->title ?></option>
				<?php endforeach; ?>
				</select>
			</td>
		</tr>
		</table>
		</div>


		<!-- GeoLoqi -->
		<div id="triggers_geoloqi" class="trigger_type_apps hide">
			<p>
				Some wicked sweet GeoLoqi triggers will go here! But for now have fun with Foursquare
			</p>
		</div>
	</div>

	
	<!-- Triggers : Message -->
	<div id="triggers_message" class="trigger_type_tool hide">
		<h3>Message</h3>
		<p>Message Action Shizzzle Will Go Here</p>
	</div>	

	<!-- Triggers : Post -->
	<div id="triggers_post" class="trigger_type_tool hide">
		<h3>Post</h3>
		<p>When I get this</p>
	</div>	
	
	<!-- Triggers : Person -->
	<div id="triggers_person" class="trigger_type_tool hide">
		<h3>Person</h3>
		<p>When this Person does something</p>
		<p></p>
	</div>

	<!-- Triggers : Date / Time -->
	<div id="triggers_date_time" class="traigger_type_tool hide">
		<h3>Date / Time</h3>
		<p>Will be pickable by a date or time happens</p>
	</div>
	
	<!-- ACTIONS -->
	<div id="actions" class="hide">
		<h3>Do This</h3>
		<select name="action_type" id="action_type">
			<option value="">---select---</option>
			<option value="message">Message</option>
			<option value="post">Post</option>
		</select>
	
		<!-- Actions : Message -->
		<div id="actions_message" class="actions_type_tool hide">
			<h3>Send a Message to</h3>
			<p>
				<select name="action_type_message" id="action_type_message">
					<option value="phone_number">SMS</option>
					<option value="email">Email</option>
				</select>
				<select name="action_message_user" id="action_message_user">
					<?php foreach ($users as $user): if ($user->phone_number): ?>
					<option value="<?= $user->user_id ?>" data-email="<?= $user->email ?>" data-phone_number="<?= $user->phone_number ?>"><?= $user->name ?></option>
					<?php endif; endforeach; ?>
				</select><br>
				<textarea name="action_message_data" id="action_message_data" cols="40" rows="3" placeholder="Hey there Boss Hog..."></textarea>
			</p>
		</div>
		
		
		<!-- Actions : Post -->
		<div id="actions_post" class="actions_type_tool hide">
			<h3>Post</h3>
		</div>

		<button id="action_complete" class="hide">Complete</button>

	</div>

	
</div>

<div id="content_wide_toolbar">

	<h3>Active Actions</h3>
	<p>This will be a list of user actions that are turned on</p>

	<h3>Inactive Actions</h3>
	<p>This will be a list of user actions that are turned off</p>


</div>
<div class="clear"></div>

<form name="create_action" id="create_action"></form>
<script type="text/javascript" src="<?= $modules_assets ?>actions.js"></script>