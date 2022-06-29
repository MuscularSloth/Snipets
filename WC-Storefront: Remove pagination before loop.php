<?php 

if ( ! function_exists( 'disable_pagination_before_loop' ) ) {
	function disable_pagination_before_loop() {
		remove_action( 'woocommerce_before_shop_loop', 'storefront_woocommerce_pagination', 30 );
	}
	add_action('init', 'disable_pagination_before_loop');
}
