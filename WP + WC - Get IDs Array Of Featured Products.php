if ( ! function_exists( 'mktech_get_featured_product_ids' ) ) {
    /* return number[] */

    function mktech_get_featured_product_ids() {
        if( ! function_exists('wc_get_products') ) return;

        $arrayOfIds = array();

        $args = array(
            'featured' => true,
        );
        $products = wc_get_products( $args );

        foreach ($products as $singleProduct){
            array_push($arrayOfIds, $singleProduct->id);
        }

        return $arrayOfIds;
    }
}
