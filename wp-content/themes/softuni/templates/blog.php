<?php
/**
 * Template Name: Blog Template
 */
?>

<?php
$blog_query_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 6,
    'paged'          => get_query_var( 'paged' )
);

$blog_query = new WP_Query( $blog_query_args );
?>

<?php get_header(); ?>

<?php if ( $blog_query->have_posts() ) : ?>

<section id="product" class="product">

    <div class="container section-bg">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box">
                    <h2 class="title"><?php _e( 'Blog', 'softuni' ); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php while( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

                <?php get_template_part( 'partials/content', 'blog' ); ?>

            <?php endwhile; ?>
        </div>
    </div>
</section>

<div style="text-align:center;">
<?php
$GLOBALS['wp_query'] = $blog_query;
the_posts_pagination( array(
    'mid_size'  => 2,
    'prev_text' => __( 'Previous', 'softuni' ),
    'next_text' => __( 'Next', 'softuni' ),
) );
?>
</div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>