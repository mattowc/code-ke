<?php
/**
 * Up-sells
 * Modified by Jonathon McDonald on June 26th, 2012
 * Displays cross-sell products, and labels them as accessories
 */
 
/**
 * Begin modification on June 26th, 2012
 */

global $woocommerce_loop, $woocommerce, $product;

/**
 * Resume normal code
 */

$upsells = $product->get_upsells();
if (sizeof($upsells)==0) return;
?>
<div class="upsells products">
	<h2><?php _e('You may also like&hellip;', 'woocommerce') ?></h2>
	<?php
	$args = array(
		'post_type'	=> 'product',
		'ignore_sticky_posts'	=> 1,
		'posts_per_page' => 4,
		'no_found_rows' => 1,
		'orderby' => 'rand',
		'post__in' => $upsells
	);
	query_posts($args);
	woocommerce_get_template_part( 'loop', 'shop' );
	wp_reset_query();
	?>
</div>



