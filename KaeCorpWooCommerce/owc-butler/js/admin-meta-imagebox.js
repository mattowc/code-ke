jQuery(document).ready(function() {



jQuery('#upload_image_button_right').click(function() {
 side = 'upload_image_text_right';
 formfield = jQuery('#upload_image').attr('name');
 tb_show('Right Sidebar Images', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
 
});