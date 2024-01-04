<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	$parenthandle = 'twentynineteen'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	$theme        = wp_get_theme();

    wp_enqueue_style( $parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // If the parent theme code has a dependency, copy it to here.
		$theme->parent()->get( 'Version' )
	);

	wp_enqueue_style( 'child-style',
		get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get( 'Version' ) // This only works if you have Version defined in the style header.
	);
}