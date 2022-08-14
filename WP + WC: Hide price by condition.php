<?php

/* 
* Hide all prices
*/
add_filter( 'woocommerce_get_price_html', function( $price ) {
	if ( is_admin() ) return $price;

	return '';
} );

add_filter( 'woocommerce_cart_item_price', '__return_false' );
add_filter( 'woocommerce_cart_item_subtotal', '__return_false' );


/* 
* Hiding prices for specific user roles
*/
add_filter( 'woocommerce_get_price_html', function( $price ) {
	if ( is_admin() ) return $price;

	$user = wp_get_current_user();
	$hide_for_roles = array( 'wholesale', 'wholesale-silver', 'wholesale-gold' );

	// If one of the user roles is in the list of roles to hide for.
	if ( array_intersect( $user->roles, $hide_for_roles ) ) {
		return ''; // Return empty string to hide.
	}

	return $price; // Return original price
} );

add_filter( 'woocommerce_cart_item_price', '__return_false' );
add_filter( 'woocommerce_cart_item_subtotal', '__return_false' );


/* 
* Hiding prices for guest users
*/
add_filter( 'woocommerce_get_price_html', function( $price ) {
	if ( ! is_user_logged_in() ) {
		return '';
	}

	return $price; // Return original price
} );

add_filter( 'woocommerce_cart_item_price', '__return_false' );
add_filter( 'woocommerce_cart_item_subtotal', '__return_false' );



/* 
* Hiding prices in specific categories
*/
add_filter( 'woocommerce_get_price_html', function( $price, $product ) {
	if ( is_admin() ) return $price;

	// Hide for these category slugs / IDs
	$hide_for_categories = array( 'singles', 'albums' );

	// Don't show price when its in one of the categories
	if ( has_term( $hide_for_categories, 'product_cat', $product->get_id() ) ) {
		return '';
	}

	return $price; // Return original price
}, 10, 2 );

add_filter( 'woocommerce_cart_item_price', '__return_false' );
add_filter( 'woocommerce_cart_item_subtotal', '__return_false' );


/* 
* Hiding prices for specific products
*/
add_filter( 'woocommerce_get_price_html', function( $price, $product ) {

	$hide_for_products = array( 95, 115 );
	if ( in_array( $product->get_id(), $hide_for_products ) ) {
		return '';
	}

	return $price; // Return original price
}, 10, 2 );

add_filter( 'woocommerce_cart_item_price', '__return_false' );
add_filter( 'woocommerce_cart_item_subtotal', '__return_false' );
