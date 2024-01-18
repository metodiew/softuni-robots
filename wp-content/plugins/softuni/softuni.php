<?php
 /*
 * Plugin Name:       SoftUni Plugin
 * Plugin URI:        https://softuni.bg
 * Description:       Our first plugin for the course
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      8.0
 * Author:            SoftUni
 * Author URI:        https://softuni.bg/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       softuni
 * Domain Path:       /languages
 */

/**
 * Plugin structure
 * main file
 * index.php
 *
 * assets
 *  - css
 *  - js
 *  - img
 * includes
 *  - files
 * root, if we need some
 */

//  var_dump( 'test' ); die();

/**
 * CPT - Robots - done
 * Custom taxonomy - done
 * Single view of the CPT - done
 * Show post meta and work with it
 * @TODO: Settings/Options page if we have time
 * @TODO: deploy the project in GitHub
 *
 * Upload this to GitHub
 */

if ( ! defined( 'ROBOTS_INCLUDE' ) ) {
    define( 'ROBOTS_INCLUDE', plugin_dir_path( __FILE__ ) . 'includes'  );
}

require ROBOTS_INCLUDE . '/functions.php';
require ROBOTS_INCLUDE . '/cpt-robots.php';

/**
 * Enqueue all of the assets for my plugin
 *
 * @return void
 */
function su_robots_enqueue() {

    wp_enqueue_script( 'robots-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), 1.0 );

    wp_localize_script( 'robots-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'su_robots_enqueue' );