<div id="create_action">

	<h2>Create Action</h2>

	<p>When
		<select name="trigger_type" id="trigger_type">
			<option value="">---select---</option>
			<option value="location">My Location</option>
			<option value="message">I Recieve a Message</option>
			<option value="post">I Publish a</option>
			<option value="person">A Person</option>
			<option value="date_time">The Date / Time</option>
		</select>

		<!-- TRIGGERS -->
		<span id="triggers_location" class="trigger_type_tool hide"> tracked via <?= form_dropdown('trigger_location', config_item('actions_triggers_location_apps'), 'none', 'id="trigger_location_apps"') ?></span>
		<span id="triggers_message" class="trigger_type_tool hide"> Message Action Shizzzle Will Go Here</span>	
		<span id="triggers_post" class="trigger_type_tool hide">When I get this</span>	
		<span id="triggers_person" class="trigger_type_tool hide">When this Person does something</span>
		<span id="triggers_date_time" class="trigger_type_tool hide">is <input type="date" name="date-fullyear" value="<?= unix_to_mysql(now()) ?>"> <input type="time"></span>

	</p>
	
	<!-- Foursquare -->
	<div id="triggers_foursquare" class="trigger_type_apps hide">
		<!--
		<span class="actions_normal action_person"></span> 
		<span class="actions_normal action_crosshairs"></span>
		<span class="actions_normal action_place"></span>
		-->
		<p>
			And <?= form_dropdown('trigger_type', config_item('actions_triggers_type_foursquare'), 'none', 'id="trigger_location_type_foursquare"') ?>
	
			is within <?= form_dropdown('trigger_type', config_item('actions_triggers_location'), 'none', 'id="trigger_location_param_foursquare"') ?>
	
			of 

			<select name="trigger_location" id="trigger_location_value_foursquare" class="trigger_last_value">
				<option value="none">---select---</option>
				<?php foreach ($places as $place): ?>
				<option value="<?= $place->geo_lat.','.$place->geo_long ?>"><?= $place->title ?></option>
				<?php endforeach; ?>
			</select>
		</p>
	</div>

	<!-- GeoLoqi -->
	<div id="triggers_geoloqi" class="trigger_type_apps hide">
		<p>
			Some wicked sweet GeoLoqi triggers will go here! But for now have fun with Foursquare
		</p>
	</div>
	

	
	<!-- ACTIONS -->
	<div id="actions" class="hide">
		<p>I would like to 
			<select name="action_type" id="action_type">
				<option value="none">---select---</option>
				<option value="message">Send a Message</option>
				<option value="post">Post Some Content</option>
			</select>
	
			<!-- Actions : Message -->
			<span id="actions_message" class="actions_type_tool hide">
				via 
					<select name="action_type_message" id="action_type_message">
						<option value="none">---select---</option>
						<option value="phone_number">SMS</option>
						<option value="email">Email</option>
					</select>
				to 
					<select name="action_message_user" id="action_message_user" class="action_last_value">
						<option value="none">---select---</option>
						<?php foreach ($users as $user): if (($user->phone_number) && ($user->user_id != $this->session->userdata('user_id'))): ?>
						<option value="<?= $user->user_id ?>" data-email="<?= $user->email ?>" data-phone_number="<?= $user->phone_number ?>"><?= $user->name ?></option>
						<?php endif; endforeach; ?>
					</select>
			</span>
		</p>
		
		<p id="actions_message_phone_number" class="hide">
			<textarea name="action_message_data" id="action_message_data" cols="40" rows="3" placeholder="Hey there Boss Hog..."></textarea>
		</p>

		<p id="actions_message_email" class="hide">
			<input type="text" name="action_message_email_subject" id="action_message_email_subject" placeholder="Howdi Bud"><br>
			<textarea name="action_message_email_data" id="action_message_email_data" cols="60" rows="3" placeholder="I'm just letting ya know..."></textarea>
		</p>
				
		<!-- Actions : Post -->
		<div id="actions_post" class="actions_type_tool hide">
			<h3>Post</h3>
		</div>

		<button id="action_complete" class="hide">Complete</button>

	</div>
	
</div>

<form name="create_action" id="create_action"></form>
