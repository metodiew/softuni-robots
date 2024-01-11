<?php get_header(); ?>

        <div class="intro row">
            <div class="overlay"></div>
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo get_home_url( '/' ); ?>">Home</a></li>
                    <li class="active"><?php the_archive_title(); ?></li>
                </ol>
            </div>
        </div> <!-- /.intro.row -->
    </div> <!-- /.container -->
    <div class="nutral"></div>
</section> <!-- /#header -->
<section class="faq">
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'partials/content', 'post' ); ?>

        <?php endwhile; ?>

    <?php else : ?>

        Sorry, there is nothing I can show you.

    <?php endif; ?>
</section>

<?php get_footer(); ?>