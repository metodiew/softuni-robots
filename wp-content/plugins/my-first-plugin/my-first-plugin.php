<?php
/**
 * Plugin Name: My First Plugin
 * Description: This is our playground plugin for basic tests
 * Plugin Author: Stanko Metodiev
 */

// Hooks

// actions

function my_first_action() {
    ?>
    <div>
        <?php echo "hello, from my action"; ?>
    </div>
    <?php
}
// add_action( 'wp_body_open', 'my_first_action' );

// filter

/**
 * A function that modifies the title of the post
 *
 * @param [type] $title
 * @return void
 */
function modify_the_title( $title ) {

    $title = $title . ' Has been modified in modify_the_title().';

    return $title;
}
// add_filter( 'the_title', 'modify_the_title', 10 );

/**
 * This is our second function for modify the title
 *
 * @param [type] $title
 * @return void
 */
function modify_the_title_with_priority( $title ) {

    $title = $title . ' has been modified in modify_the_title_with_priority() ';

    return $title;
}
// add_filter( 'the_title', 'modify_the_title_with_priority', 11 );


function modify_body_class( $classes ) {

    $my_custom_class = array (
        'my-custom-body-class'
    );

    $classes = array_merge( $classes, $my_custom_class );

    return $classes;
}
add_filter( 'body_class', 'modify_body_class' );

function add_og_tag(){
    ?>
    <meta name="og:title" value='test value'>
    <?php
}
add_action( 'wp_head', 'add_og_tag' );

function my_footer_hook() {
    var_dump( 'in the footer' );
}
add_action( 'wp_footer', 'my_footer_hook' );

/**
 * This function is going to insert a div in the content
 *
 * @param [type] $content
 * @return void
 */
function insert_div_to_the_content( $content ) {

    if ( ! is_single() ) {
        return $content;
    }

    $div = '<div style="background: red;">Our Custom Div here</div>';


    // $content = $content . $div;
    $content .= $div;

    $content = $content . show_last_two_posts();

    return $content;
}
add_filter( 'the_content', 'insert_div_to_the_content', 11 );

function post_words_count( $content ) {

    if ( ! is_single() ) {
        return $content;
    }

    $words_count = str_word_count( $content);
    ?>
    <div>
        This post has <?php echo $words_count; ?> words in it.
    </div>

    <?php
    return $content;
}
add_action( 'the_content', 'post_words_count' );

function is_admin_in_action() {
        var_dump( 'this is the dashboard' );
}
add_action( 'admin_init', 'is_admin_in_action' );

// is_single();
// is_page();
// is_404();



// basic functions

// the loop


// @TODO: fix me later
/**
 * This functions will show the last two posts
 *
 * @return void
 */
function show_last_two_posts() {

    $args = array(
        'post_type'      => 'post',
        'posts_status'   => 'published',
        'posts_per_page' => 2
    );

    $last_two_posts = new WP_Query( $args );

    echo $testtt;
    ?>
    <?php if ( $last_two_posts->have_posts() ) : ?>
        <ul>
            <?php while ( $last_two_posts->have_posts() ) : $last_two_posts->the_post();?>
                <li>
                    <a href="<?php echo get_the_permalink(); ?>">
                        <?php echo the_title(); ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

    <?php
    wp_reset_postdata();
}

// add_action( 'the_content', 'show_last_two_posts', 100 );