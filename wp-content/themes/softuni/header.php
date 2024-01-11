<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <?php wp_head(); ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php wp_title(); ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <!-- google fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body <?php body_class(); ?>>

    <!-- Site Header -->
        <div class="site-header-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="<?php echo get_home_url(); ?>"><img src="http://localhost/softuni/wp-content/themes/softuni/assets/images/logo.png" alt="logo"></a>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3 text-right">
                        <span class="ion-android-cart"></span> 0 products
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-robot" type="button">Search</button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- Header -->
    <section id="header" class="main-header faq-header inner-header">
    <div class="container">

        <div class="row">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-nav-bar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <?php
                wp_nav_menu( array(
                    'menu'           => 'primary-menu',
                    'menu_id'        => 'site-nav-bar',
                    'theme_location' => 'primary_menu',
                    'menu_class'     => 'nav navbar-nav',
                    'container_class'=> 'collapse navbar-collapse',
                ));
                ?>
            </nav>
        </div>