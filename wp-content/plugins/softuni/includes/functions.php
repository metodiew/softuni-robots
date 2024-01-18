<?php
// File for generic functions

$var = 123;

$array = array(
    1,
    2,
    3,
    4,
    5
);

// echo '<pre>';
// var_dump( $array );
// echo '</pre>';
// die();


/**
 * Custom Shortcode to show the title by ID
 *
 * @return void
 */
function show_post_title_by_id( $atts ) {

    $shortcode_atts = shortcode_atts(array(
            'id' => '',
            'option_1' => 'Option 1',
            'option_2' => 'Option 2',
        ),
        $atts
    );

    $title = '';

    if ( ! empty( $shortcode_atts['id'] ) ) {
        $title = get_the_title( $shortcode_atts['id'] );
    }

    return $title;
}
add_shortcode( 'show_post_title', 'show_post_title_by_id' );
