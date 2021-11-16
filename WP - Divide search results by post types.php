/*In search.php template*/

<?php
$types = array( 'products', 'post', 'holidays', 'departments' ); // your posts types

foreach( $types as $type ){
    echo 'your container opens here for ' . $type;
    while( have_posts() ){
        the_post();
        if( $type == get_post_type() ){
            get_template_part('template-parts/content', $type);
        }
    }
    rewind_posts();
    echo 'your container closes here for ' . $type;
} ?>
