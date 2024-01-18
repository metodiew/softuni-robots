<?php

if ( ! class_exists( 'Su_Robots' ) ) :

/**
 * This is our simple Robots Class for our custom functionality
 */
class Su_Robots {

	private $ctp_name = '';

	public function __construct() {
		// Register the CPT and taxonomies
		add_action( 'init', array( $this, 'robots_cpt' ) );
		add_action( 'init', array( $this, 'robot_category_taxonomy' ) );

		// Register Metaboxes
		add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );

		// Save Actions
		add_action( 'save_post', array( $this, 'robots_meta_save' ) );
	}

	/**
	 * Register our Robots Custom Post Type
	 *
	 * @return void
	 */
	public function robots_cpt() {
		$labels = array(
			'name'                  => _x( 'Robots', 'Post type general name', 'softuni' ),
			'singular_name'         => _x( 'Robot', 'Post type singular name', 'softuni' ),
			'menu_name'             => _x( 'Robots', 'Admin Menu text', 'softuni' ),
			'name_admin_bar'        => _x( 'Robot', 'Add New on Toolbar', 'softuni' ),
			'add_new'               => __( 'Add New', 'softuni' ),
			'add_new_item'          => __( 'Add New Robot', 'softuni' ),
			'new_item'              => __( 'New Robot', 'softuni' ),
			'edit_item'             => __( 'Edit Robot', 'softuni' ),
			'view_item'             => __( 'View Robot', 'softuni' ),
			'all_items'             => __( 'All Robots', 'softuni' ),
			// 'search_items'          => __( 'Search Robots', 'softuni' ),
			// 'parent_item_colon'     => __( 'Parent Robots:', 'softuni' ),
			// 'not_found'             => __( 'No Robots found.', 'softuni' ),
			// 'not_found_in_trash'    => __( 'No Robots found in Trash.', 'softuni' ),
			// 'featured_image'        => _x( 'Robot Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'softuni' ),
			// 'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'softuni' ),
			// 'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'softuni' ),
			// 'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'softuni' ),
			// 'archives'              => _x( 'Robot archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'softuni' ),
			// 'insert_into_item'      => _x( 'Insert into Robot', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'softuni' ),
			// 'uploaded_to_this_item' => _x( 'Uploaded to this Robot', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'softuni' ),
			// 'filter_items_list'     => _x( 'Filter Robots list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'softuni' ),
			// 'items_list_navigation' => _x( 'Robots list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'softuni' ),
			// 'items_list'            => _x( 'Robots list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'softuni' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'revisions',
			),
			// 'show_in_rest'       => true
		);

		register_post_type( 'robot', $args );
	}

	/**
	 * Register our Category taxonomy for our Robots CPT
	 *
	 * @return void
	 */
	public function robot_category_taxonomy () {
		$labels = array(
			'name' => 'Categories',
			'singular_name' => 'Category',

		);

		$args = array(
			'labels'       => $labels,
			'show_in_rest' => true,
			'hierarchical' => true,
		);

		register_taxonomy( 'robot-category', 'robot', $args );
	}

	/**
	 * Register meta box(es).
	 */
	public function register_meta_boxes() {
		add_meta_box( 'featured', __( 'Is Featured?', 'softuni' ), array( $this, 'robots_featured_metabox_callback' ), 'robot', 'side' );
	}

	/**
	 * Callback function for my Featured Metabox
	 *
	 * @return void
	 */
	public function robots_featured_metabox_callback ( $post_id ) {
		$checked = get_post_meta( $post_id->ID, 'is_featured', true );
		?>
		<div>
			<label for='is-featured'>Is Featured?</label>
			<input id='is-featured' name='isfeatured' type='checkbox' value='1' <?php checked( $checked, 1, true ); ?>/>
		</div>
		<?php
	}


	/**
	 * Save my Robotx post meta
	 *
	 * @return void
	 */
	public function robots_meta_save ( $post_id ) {
		if ( empty( $post_id ) ) {
			return;
		}

		$featured = '';

		if ( isset( $_POST['isfeatured'] ) ) {
			$featured = esc_attr( $_POST['isfeatured'] );
		}

		update_post_meta( $post_id, 'is_featured', $featured );
	}

}

$su_robots_instance = new Su_Robots();
endif;