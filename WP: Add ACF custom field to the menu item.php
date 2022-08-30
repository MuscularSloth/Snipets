<?php

function add_custom_bgcolor_on_hover_atts( $atts, $item, $args ) {
    
    $bgOnHoverColor = get_field('hover_bg_color', $item);

    if($bgOnHoverColor){
        $atts['data-bgcolor'] = $bgOnHoverColor;
    }
         
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_custom_bgcolor_on_hover_atts', 10, 3 );
