jQuery(document).ready(function() {


jQuery('.deleteImages').click(function() {
	theID = this.id;
	if(confirm('Remove the selected image from the sidebar?'))
		jQuery('div').remove("#" + theID + "-div");
});

jQuery('#upload_image_button_right').click(function() {
	window.restore_send_to_editor = window.send_to_editor;
	side = 'upload_image_text_right';
 	formfield = jQuery('#upload_image').attr('name');
 	tb_show('Right Sidebar Images', 'media-upload.php?type=image&amp;TB_iframe=true');
 	
 	window.send_to_editor = function(html) {
 		var field_side = side;
 		url = jQuery(html).attr('href');
 		imgurl = jQuery('img',html).attr('src');
 		jQuery("#" + field_side + "_more_photos" ).append("<img width=\"100px\" height=\"100px\" src=\"" + imgurl + "\" />" + " " );
 		jQuery("#" + field_side + "_more_photos" ).append("<input type=\"hidden\" name=\"" + field_side + "_new[]\" value=\"" + imgurl + "\" />");
 		jQuery("#" + field_side + "_more_photos" ).append("<input type=\"hidden\" name=\"" + field_side + "_new_url[]\" value=\"" + url + "\" />");
 		
 		tb_remove();
 		// restore original send to editor function
		window.send_to_editor = window.restore_send_to_editor;
	};
	return false;
});

jQuery('#upload_image_button_left').click(function() {
	window.restore_send_to_editor = window.send_to_editor;
 	side = 'upload_image_text_left';
 	formfield = jQuery('#upload_image').attr('name');
 	tb_show('Left Sidebar Images', 'media-upload.php?type=image&amp;TB_iframe=true');
 	window.send_to_editor = function(html) {
 		var field_side = side;
 		url = jQuery(html).attr('href');
 		imgurl = jQuery('img',html).attr('src');
 		jQuery("#" + field_side + "_more_photos" ).append("<img width=\"100px\" height=\"100px\" src=\"" + imgurl + "\" />" + " " );
 		jQuery("#" + field_side + "_more_photos" ).append("<input type=\"hidden\" name=\"" + field_side + "_new[]\" value=\"" + imgurl + "\" />");
 		jQuery("#" + field_side + "_more_photos" ).append("<input type=\"hidden\" name=\"" + field_side + "_new_url[]\" value=\"" + url + "\" />");
 		
 		tb_remove();
 		// restore original send to editor function
		window.send_to_editor = window.restore_send_to_editor;
	};
	return false;
});
});