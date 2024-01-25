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

/**
 * Show the feautred posts from Robots CPT
 *
 * @param [type] $posts_per_page
 * @return void
 */
function robots_display_fetured_posts( $posts_per_page ) {
    if ( empty( $posts_per_page ) ) {
        $posts_per_page = 3;
    }

    $robots_query_args = array(
        'post_type' => 'robot',
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'meta_query' => array(
            array(
                'key' => 'is_featured',
                'value' => 1,
                'compare' => '=',
            ))
    );

    $robots_query = new WP_Query( $robots_query_args );
    ?>

    <?php if ( $robots_query->have_posts() ) : ?>

        <section id="product" class="product">
            <div class="container section-bg">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box">
                            <h2 class="title">Welcom to our <span>Robot Factory</span></h2>
                            <a href="#" class="btn btn-default btn-robot">view products</a>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php while( $robots_query->have_posts() ) : $robots_query->the_post(); ?>
                        <?php
                        $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' );
                        ?>
                        <div class="col-sm-4">
                            <div class="porduct-box">
                                <?php if ( ! empty( $featured_img_url ) ) :  ?>
                                    <img class="img-responsive" src="<?php echo $featured_img_url; ?>" alt="product">
                                <?php else : ?>
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/assets/images/product-3.jpg' ?>" alt="product">
                                <?php endif; ?>

                                <h3 class="product-title"><?php echo the_title(); ?></h3>
                            </div>

                        </div>
                    <?php endwhile; ?>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="classic-title">
                        <div class="stiker">
                            <h3 class="inner-stiker">Why we are best</h3>
                        </div>
                        <h3 class="outer-stiker">We Received best factory award in the 1998</h3>
                        <div class="incline-div"></div>
                    </div>
                </div>
                <div class="boxed">
                    <div class="col-sm-4">
                        <p class="p-large">
                            Sed lobortis volutpat imperdiet. faci.Fusce nec arcu ac neque tincidunt rutru tristique feugiat purus, id semper nisl tin vitae.Roin lobortis porta mattis. Mauris tincidunurus nec viverra mattis. Nunc convallis massa at eleifend blandit. Donec interdum.
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <p>
                            Ead lobortis volutpat imperdiet. Nulla faci.Fusce nec arcu ac neque tincidunt rutrum. Pro tristique feugiat purus, id semper nisl tincidunt vitae.Roin lobortis porta mattis. Mauris tincidunt purus nec viverra mattis. Nunc convallis massa at eleifend blandit. Donec interdum, sem lacinia dignissime varius, nulla eros consectetur mauris. 
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <p>
                            Sed lobortis volutpat imperdiet. Nulla faci.Fusce nec arcu ac neque tincidunt rutrum. Pro tristique feugiat purus, id semper nisl tincidunt vitae.Roin lobortis porta mattis. Mauris tincidunt purus nec viverra mattis. Nunc convallis massa at eleifend blandit. Donec interdum, sem lacinia dignissime varius, nulla eros consectetur mauris. 
                        </p>
                    </div>
                </div>
            </div>

        </section>

    <?php endif; ?>
    <?php
}
/**
 * Add the top level menu page.
 */
function softuni_options_page() {
	add_menu_page(
		'SoftUni',
		'SoftUni Options',
		'manage_options',
		'softuni-options',
		'softuni_options_page_html'
	);
}
/**
 * Register our softuni_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'softuni_options_page' );


/**
 * Top level menu callback function
 */
function softuni_options_page_html() {
	// check user capabilities
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

    $softuni_options = get_option( 'softuni_options' );
    $hide_product = get_option( 'softuni_hide_product_count' );

    if ( ! empty( $_POST['robots_save'] ) ) {

        if ( ! empty( $_POST['custom_option'] ) ) {
            $custom_option = esc_attr( $_POST['custom_option'] );
            update_option( 'softuni_options', $custom_option, false );
        }

        if ( ! empty( $_POST['hide_product'] ) ) {
            $hide_product = esc_attr( $_POST['hide_product'] );
            update_option( 'softuni_hide_product_count', $hide_product  );
        } else {
            delete_option( 'softuni_hide_product_count' );
        }
    }

	?>
	<div class="wrap">

		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="" method="post">
            <div>
                <label for="custom_option">Custom Options</label>
                <input type="text" id="custom_option" name="custom_option" value="<?php echo esc_attr( $softuni_options );  ?>">
            </div>
            <div>
                <label for="hide_product">Hide Products?</label>
                <input type="checkbox" name="hide_product" <?php echo checked( $hide_product, 1, true ) ?> id="hide_product" value="1">
            </div>
            <div>
                <input type="submit" value="Update me">
            </div>
            <input type="hidden" name="robots_save" value="1">
		</form>
	</div>
	<?php
}