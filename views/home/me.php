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
	<div id="triggers_location" class="trigger_type_tool hide">
		<h3>Select App</h3>
		<p>
			<?= form_dropdown('location_trigger', config_item('actions_triggers_location_apps'), 'none', 'id=""') ?>
		</p>

		<div id="triggers_fourquare">
			<p>
				<?= form_dropdown('location_trigger', config_item('actions_triggers_foursquare'), 'none', 'id=""') ?>
				<?= form_dropdown('location_trigger', config_item('actions_triggers_location'), 'none', 'id=""') ?>
			</p>
		</div>
	</div>

	<div id="triggers_message" class="trigger_type_tool hide">
		<h3>Message</h3>
		<p>Message Action Shizzzle Will Go Here</p>
	</div>	

	<div id="triggers_post" class="trigger_type_tool hide">
		<h3>Post</h3>
		<p>When I get this</p>
	</div>	
	
	<div id="triggers_person" class="trigger_type_tool hide">
		<h3>Person</h3>
		<p>When this Person does something</p>
		<p></p>
	</div>		
	
	<!-- ACTIONS -->
	<div id="actions">
		<h3>Do This Cool Thing</h3>
		<select name="action_type" id="action_type">
			<option value="">---select---</option>
			<option value="message">Message</option>
			<option value="post">Post</option>
		</select>
	
		<div id="actions_message" class="actions_type_tool hide">
			<h3>Send a Message to</h3>
			<p>
				<select name="message_user">
					<?php foreach ($users as $user): ?>
					<option value="<?= $user->user_id ?>" data-email="<?= $user->email ?>" data-phone_number="<?= $user->phone_number ?>"><?= $user->name ?></option>
					<?php endforeach; ?>
				</select> 
			<p><textarea name="message_text" cols="40" rows="3" placeholder="Hey there Boss Hog..."></textarea></p>
		</div>
		
		<div id="actions_post" class="actions_type_tool hide">
			<h3>Post</h3>
		</div>

	</div>


	<input type="hidden" name="geo_lat" id="geo_lat" value="" autocomplete="off">

	
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