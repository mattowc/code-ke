<?php
/**
 * Shows accessories that they can add to the cart
 *
 * @author Jonathon McDonald <jon@onewebcentric.com>
 */
function jm_show_accessories()
{
	global $woocommerce, $product, $woocommerce_loop;

	$crosssells = $product->get_cross_sells();
	if (sizeof($crosssells)!=0) 
	{
		?>
		<div class="upsells products" style="margin:0 0 1em 0;">
			<h2><?php _e('Options', 'woocommerce') ?></h2>
			<?php
			$args = array(
				'post_type'	=> 'product',
				'ignore_sticky_posts'	=> 1,
				'posts_per_page' => 4,
				'no_found_rows' => 1,
				'orderby' => 'rand',
				'post__in' => $crosssells
			);
			query_posts($args);
			woocommerce_get_template_part( 'loop', 'options' );
			wp_reset_query();
			?>
		</div>
		<?php
	}
}
add_action('jm_show_accessories', 'jm_show_accessories');
?>