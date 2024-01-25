<?php
/**
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>
        <div class="intro row">
            <div class="overlay"></div>
            <div class="col-sm-6 col-sm-offset-6">
                <h2 class="header-quote">Save time and lower</h2>
                <p>
                    Your sweeping costs with the
                </p>
                <h1 class="header-title">Robot<br><span class="thin">Factory</span></h1>
            </div>
        </div> <!-- /.intro.row -->
    </div> <!-- /.container -->
    <div class="nutral"></div>
</section> <!-- /#header -->

<!-- Product -->

<?php
if ( function_exists( 'robots_display_fetured_posts' ) ) {
    robots_display_fetured_posts( 3 );
}
?>

<!-- History -->
<section id="history" class="history">
    <div class="container section-bg">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box">
                    <p>Since 1990</p>
                    <h2 class="title mt0">Discover our history</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="boxed">
                <div class="col-sm-10 col-sm-offset-1">
                    <p>
                        Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummynibh euismod tincidunt ut laoree Dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummynibh euismod tincidunt ut laoree Dolore magna aliquam erat .
                    </p>
                </div>
                <div class="col-sm-12">
                    <img class="img-responsive" src="http://localhost/softuni/wp-content/themes/softuni/assets/images/history.png" alt="history">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partner -->
<section id="partner" class="partner">
    <div class="container section-bg">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box">
                    <p>Our media</p>
                    <h2 class="title mt0">Partner</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="boxed">
                <div class="col-sm-12">
                    <div id="partner-slider" class="owl-carousel">
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/6.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/http://localhost/softuni/wp-content/themes/softuni/assets/images/7.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/http://localhost/softuni/wp-content/themes/softuni/assets/images/8.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/9.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/6.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/7.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/8.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/9.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/6.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/7.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/8.png" alt="partner">
                        </div>
                        <div class="item">
                            <img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/9.png" alt="partner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>