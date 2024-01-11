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