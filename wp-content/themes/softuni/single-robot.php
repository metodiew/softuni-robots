<?php get_header(); ?>

        <div class="intro row">
            <div class="overlay"></div>
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo get_home_url( '/' ); ?>">Home</a></li>
                    <li class="active"><?php the_title(); ?></li>
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
                            <h1 class="title mt0"><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="inner-p">
                            <?php the_content(); ?>
                        </div>

                        <div class="like-button">
                            <a class="robots-like" href="javascript:void(0)" data-post-id="<?php echo get_the_ID(); ?>">Like me</a>
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