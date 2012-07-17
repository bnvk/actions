<div id="content_wide_content">

	<h3>Title</h3>
	<input type="text" name="title" id="title" class="input_full" value="" autocomplete="off" style="color: rgb(153, 153, 153); ">
	<p id="title_slug" class="slug_url">http://localhost/blog/posts/<span class="slugify-preview"></span><input class="slugify-input" type="text" value="" name="title_url" style="display: none; "></p>
	
	<h3>Content</h3>
	<link rel="stylesheet" href="http://localhost/css/redactor.css">
	<div id="wysiwyg_media"><a href="http://localhost/ajax/images" class="media_manager"><img src="http://localhost/application/modules/media/assets/images_24.png" border="0"></a>
	<a href="http://localhost/ajax/music" class="media_manager"><img src="http://localhost/application/modules/media/assets/music_24.png" border="0"></a>
	<a href="http://localhost/ajax/video" class="media_manager"><img src="http://localhost/application/modules/media/assets/video_24.png" border="0"></a></div>
	<script src="http://localhost/js/redactor.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{
	$('#wysiwyg_content').redactor(
	{
	buttons: [ 
		'formatting', '|', 
		'bold', 'italic', 'deleted', '|', 
		'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',
		'image', 'video', 'table', 'link', '|', 
		'fontcolor', 'backcolor', '|', 
		'alignleft', 'aligncenter', 'alignright', '|',
		'html', '|', 
		'fullscreen'
	],
	autoresize: true,
	removeStyles: true,
	focus: false
	});
	});
	</script>
	<p><div class="redactor_box"><ul class="redactor_toolbar"><li><a href="javascript:void(null);" title="Formatting" class="redactor_btn_formatting"><span>&nbsp;</span></a></li><li class="redactor_separator"></li><li><a href="javascript:void(null);" title="Bold" class="redactor_btn_bold"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="Italic" class="redactor_btn_italic"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="Deleted" class="redactor_btn_deleted"><span>&nbsp;</span></a></li><li class="redactor_separator"></li><li><a href="javascript:void(null);" title="? Unordered List" class="redactor_btn_unorderedlist"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="1. Ordered List" class="redactor_btn_orderedlist"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="&lt; Outdent" class="redactor_btn_outdent"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="&gt; Indent" class="redactor_btn_indent"><span>&nbsp;</span></a></li><li class="redactor_separator"></li><li><a href="javascript:void(null);" title="Insert Image..." class="redactor_btn_image"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="Insert Video..." class="redactor_btn_video"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="Table" class="redactor_btn_table"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="Link" class="redactor_btn_link"><span>&nbsp;</span></a></li><li class="redactor_separator"></li><li><a href="javascript:void(null);" title="Font Color" class="redactor_btn_fontcolor"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="Back Color" class="redactor_btn_backcolor"><span>&nbsp;</span></a></li><li class="redactor_separator"></li><li><a href="javascript:void(null);" title="Align Left" class="redactor_btn_alignleft"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="Align Center" class="redactor_btn_aligncenter"><span>&nbsp;</span></a></li><li><a href="javascript:void(null);" title="Align Right" class="redactor_btn_alignright"><span>&nbsp;</span></a></li><li class="redactor_separator"></li><li><a href="javascript:void(null);" title="HTML" class="redactor_btn_html"><span>&nbsp;</span></a></li><li class="redactor_separator"></li><li class="redactor_toolbar_right"><a href="javascript:void(null);" title="Fullscreen" class="redactor_btn_fullscreen"><span>&nbsp;</span></a></li></ul><iframe frameborder="0" scrolling="auto" style="height: 330px; " class="redactor_frame"></iframe><textarea id="wysiwyg_content" name="content" class="wysiwyg_norm_full" style="height: 300px; width: 100%; display: none; "></textarea></div></p>
	
	<h3>Category</h3>
	<p><select name="category_id" id="category_id">
	<option value="0">----select----</option>
	<option value="1">News</option>
	<option value="2">Press</option>
	<option value="3">Gallery</option>
	<option value="4">API &amp; Developers</option>
	<option value="7">Tutorials</option>
	<option value="add_category">+ Add Blog Category</option>
	</select></p>
	
	 <h3>Tags</h3>
	 <p><input name="tags" type="text" id="tags" size="75" value="" autocomplete="off" style="color: rgb(153, 153, 153); " class="ui-autocomplete-input" role="textbox" aria-autocomplete="list" aria-haspopup="true"></p>
	 
	<h3>Comments</h3>
	<p><select name="comments_allow">
	<option value="Y">Yes</option>
	<option value="N">No</option>
	<option value="A">Require Approval</option>
	</select></p>
	
	<h3>Access</h3>
	<p><select name="access">
	<option value="E" selected="selected">Everyone</option>
	<option value="F">Friends</option>
	<option value="O">Only Me</option>
	<option value="M">A Specific Module</option>
	</select></p>
	
	<input type="hidden" name="geo_lat" id="geo_lat" value="" autocomplete="off">
	<input type="hidden" name="geo_long" id="geo_long" value="" autocomplete="off">
	
</div>

<div id="content_wide_toolbar">

	<h3>Share</h3>
	<ul id="social_post"><li><input type="checkbox" value="1" id="social_post_twitter" class="social_post" checked="checked" name="twitter" autocomplete="off"> Twitter<div class="clear"></div></li></ul>
	<h3>Status</h3>
	<p id="content_status"><span class="actions action_unpublished"></span> Unpublished</p>
	
	<p><input type="submit" name="publish" id="content_publish" value="Publish" autocomplete="off"> <input type="submit" name="save" id="content_save" value="Save" autocomplete="off"></p>

</div>

<script type="text/javascript">
$(document).ready(function()
{
		// Publishes / Saves Content from form
	$('#content_publish, #content_save').bind('click', function(e)
	{
		e.preventDefault();
		$form = $('#blog_editor');

		// Validation	
		if (validationRules(validation_rules))
		{
			// Strip Empty
			cleanAllFieldsEmpty(validation_rules);

			var status		= $(this).attr('name');		
			var form_data	= $form.serializeArray();
			form_data.push({'name':'module','value':'blog'},{'name':'type','value':'article'},{'name':'source','value':'website'},{'name':'status','value':status});

			$.oauthAjax(
			{
				oauth 		: user_data,
				url			: 'http://localhost/api/content/create',
				type		: 'POST',
				dataType	: 'json',
				data		: form_data,
		  		success		: function(result)
		  		{		  				  		
					$('html, body').animate({scrollTop:0});
					$('#content_message').notify({status:result.status,message:result.message});
					
					if (result.status == 'success')
					{					
						var new_status = displayContentStatus(result.data.status, result.data.approval);
						$('#content_status').html('<span class="actions action_' + new_status + '"></span> ' + new_status);	
					}
			 	}
			});
		}
		else
		{		
			eve.preventDefault();
		}
	});			
	});
</script>