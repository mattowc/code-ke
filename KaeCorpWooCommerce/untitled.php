<?php
/*
Programmed:  Jonathon McDonald
Date:        07/09/2012
Purpose:     To remove an option from the cart by clicking a link
*/

//Create a separate function.  (we will later merge this with update cart)
function woocommerce_remove_option() {
	global $woocommerce;

	//First check to see the user's intentions
	if(isset($_GET['remove_option']) && isset($_GET['item_with_option']) && $woocommerce->verify_nonce('cart', '_GET')) {

		//Get the options we will be dealing with
		$cart_item        = $_GET['item_with_option'];
		$options          = apply_filters( 'woocommerce_get_item_data', array(), $cart_item );
		$option_to_remove = $_GET['remove_option'];
		$options_rebuilt  = array();


		$cart_item->remove_this_option($cart_item, $remove_option);
		//Loop through the items, and find the item we are deleting
		/*
		foreach($options as $option) {

			if(!($option['name'] == $option_to_remove)) {
				$options_rebuilt[] = $option;
			}
		}
		*/
		//Update the cart options


		//Redirect the user safely back to the cart
		$referer = ( wp_get_referer() ) ? wp_get_referer() : $woocommerce->cart->get_cart_url();
		wp_safe_redirect( $referer );
		exit;
	}
}

//Function within cart class, that will remove the cart items options 
function remove_this_option($cart_item, $option_to_remove) {
	$options          = apply_filters( 'woocommerce_get_item_data', array(), $cart_item );
	foreach($options as $option) {

		if($option['name'] == $option_to_remove) {
			unset($option);
		}
	}
}