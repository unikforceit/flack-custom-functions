<?php
function woo_multi_product_cat($tax)
{
    $args =  [
        'taxonomy'=> $tax,
        'parent'   => 0,
        'hide_empty' => true,
    ];
    $categories_obj = get_categories($args);
    $categories = array();

    foreach ($categories_obj as $pn_cat) {
        $categories[$pn_cat->term_id] = $pn_cat->cat_name;
    }

    return $categories;
}

//add_action('posts_table_after_get_table', 'flack_table_after_get_table');

function flack_table_after_get_table(){
    ?>
    <div class="image-hover-wrapper"><img src=""></div>
    <?php
}

add_filter( 'posts_table_shortcode_output', function( $html ) {
    ob_start();
    ?>
    <div class="flack-table-wrapper">
        <div class="flack-table">
            <?php echo $html;?>
        </div>
        <div class="flack-image">
            <div class="image-hover-wrapper"><img src=""></div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}, 10, 1 );


add_filter( 'posts_table_column_class_layout', function( $classes ) {
    $classes[] = 'layout-button';
    return $classes;
} );
add_filter( 'posts_table_column_class_image', function( $classes ) {
    $classes[] = 'image-source';
    return $classes;
} );
add_filter( 'posts_table_data_title', function( $title, $post ) {
    // Wrap the image in an extra div.
    return '<div class="title">' . wp_strip_all_tags($title) . '</div>';
}, 10, 2 );
add_filter( 'posts_table_column_sortable_title', '__return_false' );