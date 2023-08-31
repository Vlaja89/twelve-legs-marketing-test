<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
        <meta charset="UTF-8">
        <title><?php wp_title(''); ?></title>
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
    <div class="page-holder">
        <?php
        $ptype = get_post_type();
        if (is_home() || is_front_page()) {
            $topClass = 'top-menu';
        } else {
            $topClass = 'top-menu inner-menu';
        }
        ?>
        <div class="<?php echo $topClass; ?>">

            <div class="container">
                <div class="top-menu-line">
                    <div class="menu-logo-search">
                        <div class="logo">
                            <?php the_custom_logo(); ?>
                        </div>
                        <div class="mob-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                        <div class="menu-search mob-none">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                    <div class="top-menu-icons">
                        <div class="phone-contact">
                            <a href="#">
                                <img src="<?php echo get_theme_file_uri('dist/img/black-phone.svg') ?>" alt="">
                            </a>
                        </div>
                        <div class="woo-cart">
                            <?php echo do_shortcode("[woo_cart_but]"); ?>
                        </div>
                        <div class="woo-account">
                            <a href="/my-account">
                                <img src="<?php echo get_theme_file_uri('dist/img/black-account.svg') ?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid p-0">
                <div class="border-menu"></div>
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-expand-lg d-flex justify-content-between align-items-center w-100">
                            
                            <!-- Desktop Menu -->
                            <div class="collapse navbar-collapse mobile-menu justify-content-end">
                                <div class="menu-links">
                                    <?php
                                        if (has_nav_menu('menu')) {
                                            wp_nav_menu(array(
                                                'theme_location' => 'menu',
                                                'menu_class' => 'navbar-nav justify-content-center justify-content-md-end align-items-center',
                                                'container' => 'ul'
                                            ));
                                        }
                                    ?>
                                    
                                </div>
                            
                            </div>
                            
                            <!-- Mobile Menu -->
                            <div class="mob-block">
                                <div class="mobile">
                                    <div class="hamburger-menu">
                                        <div class="bar"></div>	
                                    </div>
                                </div>  
                                <div class="mobile-nav hide">
                                    <?php
                                        if (has_nav_menu('menu')) {
                                            wp_nav_menu(array(
                                                'theme_location' => 'menu',
                                                'menu_class' => 'navbar-nav justify-content-center justify-content-md-end align-items-center',
                                                'container' => 'ul'
                                            ));
                                        }
                                    ?>
                                    <div class="menu-search mob-block">
                                        <?php get_search_form(); ?>
                                    </div>
                                </div>
                            </div>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
