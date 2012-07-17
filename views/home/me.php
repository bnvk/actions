<div id="content_wide_content">

	<h3>Create Yo Trigger, Fool!</h3>
	<p>
		<select name="trigger_type" id="trigger_type">
			<option value="">---select---</option>
			<option value="location">Location</option>
			<option value="message">Message</option>
			<option value="post">Post</option>
			<option value="person">Person</option>
		</select>
	</p>
	
	<!-- TRIGGERS -->
	<!-- Location -->
	<div id="triggers_location" class="trigger_type_tool hide">
		<h3>Select App</h3>
		<?= form_dropdown('trigger_location', config_item('actions_triggers_location_apps'), 'none', 'id="trigger_location_apps"') ?>
	
		<div id="triggers_foursquare" class="trigger_type_apps hide">
			<p>
				<?= form_dropdown('location_trigger', config_item('actions_triggers_type_foursquare'), 'none', 'id=""') ?>
				<?= form_dropdown('location_trigger', config_item('actions_triggers_location'), 'none', 'id=""') ?> of 
				
				<select name="trigger_target_location" class="trigger_last_value">
					<option value="none">---select---</option>
				<?php foreach ($places as $place): ?>
					<option value="<?= $place->content_id ?>" data-lat="<?= $place->geo_lat ?>" data-long="<?= $place->geo_long ?>"><?= $place->title ?></option>
				<?php endforeach; ?>
				</select>
			</p>
		</div>
		
		<div id="triggers_geoloqi" class="trigger_type_apps hide">
			<p>
				Some wicked sweet GeoLoqi triggers will go here! But for now have fun with Foursquare
			</p>
		</div>
	</div>
	
	<!-- Message -->
	<div id="triggers_message" class="trigger_type_tool hide">
		<h3>Message</h3>
		<p>Message Action Shizzzle Will Go Here</p>
	</div>	

	<!-- Post -->
	<div id="triggers_post" class="trigger_type_tool hide">
		<h3>Post</h3>
		<p>When I get this</p>
	</div>	
	
	<!-- Person -->
	<div id="triggers_person" class="trigger_type_tool hide">
		<h3>Person</h3>
		<p>When this Person does something</p>
		<p></p>
	</div>		
	
	<!-- ACTIONS -->
	<div id="actions" class="hide">
		<h3>Do This Cool Thing</h3>
		<select name="action_type" id="action_type">
			<option value="">---select---</option>
			<option value="message">Message</option>
			<option value="post">Post</option>
		</select>
	
		<div id="actions_message" class="actions_type_tool hide">
			<h3>Send a Message to</h3>
			<p>
				<select name="message_type">
					<option value="sms">SMS</option>
					<option value="call">Call</option>
					<option value="email">Email</option>
				</select>
				<select name="message_user">
					<?php foreach ($users as $user): if ($user->phone_number): ?>
					<option value="<?= $user->user_id ?>" data-email="<?= $user->email ?>" data-phone_number="<?= $user->phone_number ?>"><?= $user->name ?></option>
					<?php endif; endforeach; ?>
				</select><br>
				<textarea name="message_text" cols="40" rows="3" placeholder="Hey there Boss Hog..."></textarea>
			</p>
		</div>
		
		<div id="actions_post" class="actions_type_tool hide">
			<h3>Post</h3>
		</div>

	</div>

	
</div>

<div id="content_wide_toolbar">

	<h3>Status</h3>
	<p id="content_status"><span class="actions action_unpublished"></span> Unpublished</p>
	
	<p><input type="submit" name="publish" id="content_publish" value="Publish" autocomplete="off"> <input type="submit" name="save" id="content_save" value="Save" autocomplete="off"></p>

</div>
<div class="clear"></div>


<script type="text/javascript">
$(document).ready(function()
{

	// Triggers
	$('#trigger_type').change(function()
	{
		$('.trigger_type_tool').hide();
		$('#triggers_' + $(this).val()).fadeIn();
	});
	
	// Location Apps
	$('#trigger_location_apps').change(function()
	{
		console.log($(this).val());
		$('.trigger_type_apps').hide();
		$('#triggers_' + $(this).val()).fadeIn();		
	})


	// Last Trigger (show actions)
	$('.trigger_last_value').change(function()
	{
		console.log($(this).val());
		if ($(this).val() != 'none')
		{
			$('#actions').fadeIn();
		}
	});

	// Actions
	$('#action_type').change(function()
	{
		$('.action_type_tool').hide();
		$('#actions_' + $(this).val()).fadeIn();
	});

	$('#button_apply_scholarship').bind('click', function(e)
	{
		e.preventDefault();
	
		var user_state = 'hackin';
		var trigger = '';
		var trigger_type = '';
		var trigger_detail = '';
		var action = '';
		var action_data = '';
	
		var action_data = $('#form_name').serializeArray();
		action_data.push({'name':'user_state','value':user_state});
		action_data.push({'name':'trigger','value':tigger});
		action_data.push({'name':'trigger_type','value':trigger_type});
		action_data.push({'name':'trigger_detail','value':trigger_detail});
		action_data.push({'name':'action','value':action});
		action_data.push({'name':'action_data','value':action_data});


		 $.oauthAjax(
		 {
			oauth 	: user_data,
			url		: base_url + 'api/actions/create',
			type		: 'POST',
			dataType	: 'json',
			data		: action_data,
		  	success	: function(result)
		  	{							  	
				$('#content_message').notify({scroll:true,status:result.status,message:result.message});									
				$parent_dialog.dialog('close');
		  	}		
		});	
	});

});
</script>