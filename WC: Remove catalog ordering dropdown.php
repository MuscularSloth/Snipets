<?php

if ( ! function_exists( 'disable_filters_before_loop' ) ) {
	function disable_filters_before_loop() {
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	}
	add_action('init', 'disable_filters_before_loop');
}

if ( ! function_exists( 'disable_filters_after_loop' ) ) {
	function disable_filters_after_loop() {
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
	}
	add_action('init', 'disable_filters_after_loop');
}
