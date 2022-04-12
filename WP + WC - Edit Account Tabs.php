/** DELETING */
add_filter ( 'woocommerce_account_menu_items', 'mktech_remove_my_account_links' );
function mktech_remove_my_account_links( $menu_links ){
	
	unset( $menu_links['downloads'] ); // Disable Downloads
	
	// unset( $menu_links['edit-address'] ); // Addresses
	//unset( $menu_links['dashboard'] ); // Remove Dashboard
	//unset( $menu_links['payment-methods'] ); // Remove Payment Methods
	//unset( $menu_links['orders'] ); // Remove Orders
	//unset( $menu_links['edit-account'] ); // Remove Account details tab
	//unset( $menu_links['customer-logout'] ); // Remove Logout link
	
	return $menu_links;
	
}


/** ADDING */
add_filter ( 'woocommerce_account_menu_items', 'mktech_one_more_link' );
function mktech_one_more_link( $menu_links ){

	// we will hook "anyuniquetext123" later
	$new = array( 'anyuniquetext123' => 'Gift for you' );

	// or in case you need 2 links
	// $new = array( 'link1' => 'Link 1', 'link2' => 'Link 2' );

	// array_slice() is good when you want to add an element between the other ones
	$menu_links = array_slice( $menu_links, 0, 1, true ) 
	+ $new 
	+ array_slice( $menu_links, 1, NULL, true );


	return $menu_links;
 
 
}

add_filter( 'woocommerce_get_endpoint_url', 'mktech_hook_endpoint', 10, 4 );
function mktech_hook_endpoint( $url, $endpoint, $value, $permalink ){
 
	if( $endpoint === 'anyuniquetext123' ) {
 
		// ok, here is the place for your custom URL, it could be external
		$url = site_url();
 
	}
	return $url;
 
}

/* SET ICON FROM FONT AWESOME
 *
  body.woocommerce-account ul li.woocommerce-MyAccount-navigation-link--anyuniquetext123 a:before{
	  content: "\f1fd"
  }
*/
