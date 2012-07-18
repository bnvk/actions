$(document).ready(function()
{

	// Triggers
	$('#trigger_type').change(function()
	{
		$('.trigger_type_tool').hide();
		$('#actions').hide();
		$('#triggers_' + $(this).val()).fadeIn();
	});
	
	// Location Apps
	$('#trigger_location_apps').change(function()
	{
		$('.trigger_type_apps').hide();
		$('#triggers_' + $(this).val()).fadeIn();		
	})



	// Last Trigger (show actions)
	$('.trigger_last_value').change(function()
	{
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
		$('#action_complete').fadeIn();
	});


	// Last Action Value (show actions)
	$('.action_last_value').change(function()
	{
		if ($(this).val() != 'none')
		{
			var action_param = $('#action_type_message').val();
		
			$('#actions_message_' + action_param).fadeIn();
			$('#action_complete').fadeIn();
		}
	});


	// Send Datas to Servers
	$('#action_complete').bind('click', function(e)
	{
		e.preventDefault();

	
		var user_state		= 'hackin';
		var type 			= $('#trigger_type').val();
		var trigger			= $('#trigger_' + type + '_apps').val();
		var trigger_type 	= $('#trigger_' + type + '_type_' + trigger).val();
		var trigger_param 	= $('#trigger_' + type + '_param_' + trigger).val();
		var trigger_value 	= $('#trigger_' + type + '_value_' + trigger).val();
		var action_type 	= $('#action_type').val();
		var action_param	= $('#action_type_message').val();
		
		console.log(action_param);
		
		var action_select	= $('#action_message_user').find('option:selected');
		
		console.log(action_select);
		
		var action_target	= action_select.data(action_param);
		
		console.log(action_target);
		
		var action_data 	= $('#action_message_data').val();


		var action = $('#create_action').serializeArray();
		action.push({'name':'user_state','value':user_state});
		action.push({'name':'trigger','value':trigger});
		action.push({'name':'trigger_type','value':trigger_type});
		action.push({'name':'trigger_param','value':trigger_param});
		action.push({'name':'trigger_value','value':trigger_value});
		action.push({'name':'action','value':action_type});
		action.push({'name':'action_target','value':action_target});
		action.push({'name':'action_data','value':action_data});

		console.log(action);

		 $.oauthAjax(
		 {
			oauth 	: user_data,
			url		: base_url + 'api/actions/create',
			type		: 'POST',
			dataType	: 'json',
			data		: action,
		  	success	: function(result)
		  	{							  	
		  		console.log(result);
				$('#content_message').notify({scroll:true,status:result.status,message:result.message});									
		  	}		
		});	
		
		
	});

});