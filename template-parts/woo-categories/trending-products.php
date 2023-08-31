<?php $BrandCatPrTitle = get_sub_field('trending_products_title'); ?>
<?php $BrandCatPrContent = get_sub_field('trending_products_description'); ?>
<?php $BrandCatPrBgImage = get_sub_field('trending_products_background_image'); ?>
<?php $BrandCatPrBgColor = get_sub_field('trending_products_background_color'); ?>

<section id="trend-pro" style="background-image: url('<?php echo $BrandCatPrBgImage ?>'); background-color: <?php echo $BrandCatPrBgColor ?>">
    <div class="container">
    
        <div class="main-title">
            
            <!-- Title -->
            <?php if( $BrandCatPrTitle ): ?>
                <div class="trend-title">
                    <h3><?php echo $BrandCatPrTitle ?></h3>
                </div>
            <?php endif; ?>
            
            <!-- Content -->
            <?php if( $BrandCatPrContent ): ?>
                <div class="trend-desc">
                    <?php echo $BrandCatPrContent ?>
                </div>
            <?php endif; ?>

        </div>

        <div class="trend-products">
            <div class="row flex-wrap align-items-start justify-content-center">
                <?php
                    $featured_posts = get_sub_field('trending_products');
                    if ($featured_posts) :
                        foreach ($featured_posts as $post) :
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post);

                            $product = wc_get_product($post->ID);
                            ?>

                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-6 element-space nth-box-child">
                                <div class="product">
                                    <?php woocommerce_show_product_sale_flash($post, $product); ?>

                                    <a href="<?php echo get_permalink() ?>">
                                        <div class="product-img">
                                            <?php if (has_post_thumbnail($post->ID)) echo get_the_post_thumbnail($post->ID, 'shop_catalog');
                                            else echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" />'; ?>
                                            <div class="price">
                                                <p><?php echo $product->get_price_html(); ?></p>
                                            </div>
                                        </div>
                                    </a>

                                    <div class="product-box">
                                        <div class="product-title">
                                            <h4><?php the_title(); ?></h4>
                                        </div>

                                        <div class="product-desc">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <div class="rating-custom">
                                            <?php wc_get_template('single-product/rating.php'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <?php
                        endforeach;
                        // Reset the global post object so that the rest of the page works correctly.
                        wp_reset_postdata();
                    endif;
                ?>

            </div>

        </div>

        <?php if( get_sub_field('trending_products_button') ): ?>
            <div class="main-btn">
                <!-- Button -->
                    <?php
                        $link = get_sub_field('trending_products_button');
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                    ?>
                    <button type="button" class="custom-btn mt-0" onclick="location.href='<?php echo esc_url( $link_url ); ?>';">
                        <div class="button-inner">
                            <?php echo esc_html( $link_title ); ?>
                        </div>
                    </button>
                    <?php endif; ?>
                <!-- End Button -->
            </div>
        <?php endif; ?>

    </div>
</section>

