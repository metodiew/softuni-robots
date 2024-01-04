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

            <div class="container page-bgc">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box">
                            <h2 class="title mt0">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="inner-p">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    <?php else : ?>

        Sorry, there is nothing I can show you.

    <?php endif; ?>
</section>

<?php get_footer(); ?>