<?php

add_theme_support( 'post-thumbnails' );

/**
 * Never worry about cache again!
 */
function softunit_assets( $hook ) {
	// create my own version codes
	// $my_js_ver  = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'js/custom.js' ));
	// $my_css_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'style.css' ));

    $args = array(
        'in_footer' => true,
        'strategy'  => 'defer',
    );

    $main_css = get_template_directory_uri() . '/assets/css/main.css';

    // if ( ! defined( 'SOFTUNI_ASSETS_VER' ) ) {
    //     define( 'SOFTUNI_ASSETS_VER', filemtime( $main_css ) );
    // } else {
    //     var_dump( 'in else' );
    // }

	wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', $args );
    wp_enqueue_script( 'jquery.magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), '1.0.0', $args );
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '1.0.0', $args );
	wp_enqueue_script( 'softuni-scripts', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0.3', $args );

    wp_enqueue_style( 'bootstrap.min-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, '1.0.0' );
    wp_enqueue_style( 'ionicons.css', get_template_directory_uri() . '/assets/css/ionicons.css', false, '1.0.0' );
    wp_enqueue_style( 'magnific-popup.css', get_template_directory_uri() . '/assets/css/magnific-popup.css', false, '1.0.0' );
    wp_enqueue_style( 'owl.carousel.css', get_template_directory_uri() . '/assets/css/owl.carousel.css', false, '1.0.0' );
    wp_enqueue_style( 'owl.carousel.theme.min.css', get_template_directory_uri() . '/assets/css/owl.carousel.theme.min.css', false, '1.0.0' );
    wp_enqueue_style( 'main.css', get_template_directory_uri() . '/assets/css/main.css', false, '1.0.4' );

}
add_action( 'wp_enqueue_scripts', 'softunit_assets' );

/**
 * Register our navigation menus
 *
 * @return void
 */
function softuni_register_nav_menus() {
	register_nav_menus(
		array(
			'primary_menu'      => __( 'Primary Menu', 'softuni' ),
			'popular_services'  => __( 'Popular Services', 'softuni' ),
			'important_links'   => __( 'Important Links', 'softuni' ),
            'latest_services'   => __( 'Latest Services', 'softuni' )
		)
	);
}
add_action( 'after_setup_theme', 'softuni_register_nav_menus' );

/**
 * Our Sidebars here
 *
 * @return void
 */
function softuni_sidebars() {
    register_sidebar(
		array(
			'id'            => 'footer-1',
			'name'          => __( 'Footer 01' ),
			'description'   => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

    register_sidebar(
		array(
			'id'            => 'footer-2',
			'name'          => __( 'Footer 02' ),
			'description'   => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

    register_sidebar(
		array(
			'id'            => 'footer-3',
			'name'          => __( 'Footer 03' ),
			'description'   => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

    register_sidebar(
		array(
			'id'            => 'footer-4',
			'name'          => __( 'Footer 04' ),
			'description'   => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'softuni_sidebars' );