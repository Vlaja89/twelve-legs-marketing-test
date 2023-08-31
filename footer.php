<section id="newsletter" style="background-image: url('<?php the_field('newsletter_background_image', 'option'); ?>'); background-color:<?php the_field('newsletter_background_color', 'option'); ?>">
    <div class="container">

        <div class="row flex-wrap align-items-end">
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                <div class="news-title">
                    <h2><?php the_field('newsletter_title', 'option'); ?></h2>
                </div>
                <div class="news-desc">
                    <?php the_field('newsletter_description', 'option'); ?>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 news-form-col">
                <div class="news-form">
                    <?php the_field('newsletter_form', 'option'); ?>
                </div>
            </div>
        </div>

    </div>
</section>

<footer style="background-image: url('<?php the_field('footer_background_image', 'option'); ?>'); background-color:<?php the_field('footer_background_color', 'option'); ?>">

    <div class="container">
        <div class="row flex-wrap align-items-start justify-content-center">

            <!-- Col One -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 foot-border">
                <div class="showBtn active">
                    <div class="foot-title">
                        <h4><?php the_field('footer_contact_title', 'option'); ?></h4>
                    </div>
                </div>
                <div class="foot-info hideme" style="display: block;">
                    <?php the_field('footer_contact', 'option'); ?>
                </div>
            </div>

            <!-- Col Two -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 foot-border">
                <div class="showBtn">
                    <div class="foot-title">
                        <h4><?php the_field('footer_information_title', 'option'); ?></h4>
                    </div>
                </div>
                <div class="footer-menu hideme">
                    <?php
                        if (has_nav_menu('menu_footer_info')) {
                            wp_nav_menu(array(
                                'theme_location' => 'menu_footer_info',
                                'menu_class' => '',
                                'container' => 'ul'
                            ));
                        }
                    ?>
                </div>
            </div>
            
            <!-- Col Three -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 foot-border">
                <div class="showBtn">
                    <div class="foot-title">
                        <h4><?php the_field('footer_company_title', 'option'); ?></h4>
                    </div>
                </div>
                <div class="footer-menu hideme">
                    <?php
                        if (has_nav_menu('menu_footer_comp')) {
                            wp_nav_menu(array(
                                'theme_location' => 'menu_footer_comp',
                                'menu_class' => '',
                                'container' => 'ul'
                            ));
                        }
                    ?>
                </div>
            </div>
        </div>

       <div class="foot-bot">
            <div class="row flex-wrap align-items-center justify-content-center">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="socil-media">
                        <div class="foot-title">
                            <h4><?php the_field('social_media_title', 'option'); ?></h4>
                        </div>
                        <div class="media-links">
                            <?php if( have_rows('social_media', 'option') ): ?>
                                <?php while( have_rows('social_media', 'option') ): the_row(); ?>
                                    
                                    <div class="media-single">
                                        <a href="<?php the_sub_field('social_media_url', 'option') ?>" target="_blank">
                                            <img src="<?php the_sub_field('social_media_icon', 'option') ?>" alt="">
                                        </a>
                                    </div>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="payment-cards">
                        <?php if( have_rows('payment_cards', 'option') ): ?>
                            <?php while( have_rows('payment_cards', 'option') ): the_row(); ?>
                                
                                <div class="card-single">
                                    <img src="<?php the_sub_field('payment_cards', 'option') ?>" alt="">
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
       </div>
        <div class="copyright text-center mt-3">
            <?php the_field('copyright', 'option'); ?>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>


</div>
</body>
</html>