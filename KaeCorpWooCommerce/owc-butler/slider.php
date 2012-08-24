<?php
/**
 *
 * Adds slider shortcode for displaying galleries of photos
 *
 * @author Jonathon McDonald of OneWebCentric
 * @see codex.wordpress.com
 */

/**
 * 
 * Adds custom javascript and CSS to the header through wp_enqueue_script
 *
 * @param 
 */
function add_slider_scripts() {

	wp_enqueue_style( 
		'slider-css',
		plugins_url( '/owc-butler/js/flexslider.css' )
	);

	wp_enqueue_script(
		'slider',
		plugins_url( '/owc-butler/js/jquery.flexslider.js'),
		array( 'jquery' )
	);
}
add_action('wp_enqueue_scripts', 'add_slider_scripts'); 

/**
 *
 * Adds a small javascript snippet that cannot be saved in a file to the header
 *
 * @param
 */
function add_custom_script() {
	?>
	<script type="text/javascript">
	jQuery(window).load(function() {
    	jQuery('.flexslider').flexslider({
    		animation: "slide",
    		animationLoop: false,
    		itemWidth: 210,
    		itemMargin: 5
    	});
  	});
	</script>
	<?php
}
add_action('wp_head', 'add_custom_script');

/**
 *
 * Replaces shortcode with a gallery
 *
 * @param $atts
 */
function owc_slider_shortcode( $atts ) {
	extract( shortcode_atts( array(
			'images' => ''
		), $atts ) );

	//First get a list of images to add
	$prepped_images = explode( ',', $images );
	$return_content = '<div class="flexslider"><ul class="slides">';

	foreach( $prepped_images as $image ) {
		$return_content .= '<li style="padding:0" data-thumb="' . trim($image) . '"><img src="' . trim($image) . '" /></li>';
	}

	$return_content .= '</ul></div>';

	//Return the parsed list, after executing any shortcode nested within it
	return do_shortcode( $return_content );

}
add_shortcode( 'owc_slider', 'owc_slider_shortcode' );
?>