<?php

if ( ! function_exists( 'yith_wcwl_change_remove_from_list_label' ) ) {
	function yith_wcwl_change_remove_from_list_label() {
		return null;
	}
	add_filter( 'yith_wcwl_remove_from_wishlist_label', 'yith_wcwl_change_remove_from_list_label' );
}
