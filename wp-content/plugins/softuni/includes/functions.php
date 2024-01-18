<?php
// File for generic functions


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


/**
 * Function that handles the AJAX call and add a like to the post
 *
 * @return void
 */
function robots_like() {

    if ( empty( $_POST['action'] ) ) {
        return;
    }

    $post_id = esc_attr( $_POST['post_id'] );

    $likes_number = get_post_meta( $post_id, 'likes', true );

    if ( empty( $likes_number ) ) {
        $likes_number = 0;
    }

    // add custom logit to prevent bad users

    update_post_meta( $post_id, 'likes', $likes_number + 1 );
}

add_action( 'wp_ajax_nopriv_robots_like', 'robots_like' );
add_action( 'wp_ajax_robots_like', 'robots_like' );


/**
 * Display related posts to our single robot view
 *
 * @return void
 */
function robots_display_related_posts( $post_id = 0 ) {
    if ( empty( $post_id ) ) {
        return;
    }

    $content = '';

    $related_posts = get_field( 'related_posts', $post_id );

    if ( ! empty( $related_posts ) && is_array( $related_posts ) ) {
        ?>
        <h3>Related Posts:</h3>
        <?php
        foreach ( $related_posts as $post ) {
            ?>
            <div class="relate-posts">
                <a href="<?php echo get_the_permalink( $post->ID ) ?>"><?php echo $post->post_title ?></a>
            </div>
            <?php
        }
    }
}