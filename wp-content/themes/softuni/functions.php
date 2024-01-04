<?php

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
	
	wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', $args );
    wp_enqueue_script( 'jquery.magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), '1.0.0', $args );
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '1.0.0', $args );
	
    wp_enqueue_style( 'bootstrap.min-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, '1.0.0' );
    wp_enqueue_style( 'ionicons.css', get_template_directory_uri() . '/assets/css/ionicons.css', false, '1.0.0' );
    wp_enqueue_style( 'magnific-popup.css', get_template_directory_uri() . '/assets/css/magnific-popup.css', false, '1.0.0' );
    wp_enqueue_style( 'main.css', get_template_directory_uri() . '/assets/css/main.css', false, '1.0.2' );
    wp_enqueue_style( 'owl.carousel.css', get_template_directory_uri() . '/assets/css/owl.carousel.css', false, '1.0.0' );
    wp_enqueue_style( 'owl.carousel.theme.min.css', get_template_directory_uri() . '/assets/css/owl.carousel.theme.min.css', false, '1.0.0' );

}
add_action( 'wp_enqueue_scripts', 'softunit_assets' );