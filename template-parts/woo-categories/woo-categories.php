<?php $WooCatTitle = get_sub_field('shop_categories_ttile'); ?>
<?php $WooCatContent = get_sub_field('shop_categories_description'); ?>
<?php $WooCatBgImage = get_sub_field('shop_categories_background_image'); ?>
<?php $WooCatBgColor = get_sub_field('shop_categories_background_color'); ?>

<section id="woo-cat" style="background-image: url('<?php echo $WooCatBgImage ?>'); background-color: <?php echo $WooCatBgColor ?>">
    <div class="container">
    
        <div class="main-title">
            
            <!-- Title -->
            <?php if( $WooCatTitle ): ?>
                <div class="woo-title">
                    <h3><?php echo $WooCatTitle ?></h3>
                </div>
            <?php endif; ?>
            
            <!-- Content -->
            <?php if( $WooCatContent ): ?>
                <div class="woo-desc">
                    <?php echo $WooCatContent ?>
                </div>
            <?php endif; ?>

        </div>

        <div class="product-cat">

            <?php
            $args = array(
                'taxonomy'     => 'product_cat',
                'orderby'      => 'name',
                'show_count'   => 1,
                'pad_counts'   => 1,
                'hierarchical' => 1,
                'title_li'     => '',
                $terms = get_terms( 
                    'device', array( 
                        'hide_empty' => false, 
                        'parent' => 0 
                        )
                    )
            );
            $all_categories = get_categories( $args ); ?>
            
            <div class="cat-slider">
                <?php foreach ($all_categories as $cat) {
                    if($cat->category_parent == 0) {
                        $category_id = $cat->term_id;       
                        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_url( $thumbnail_id ); ?>

                            <div class="single-cat-prod">
                                <a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>">
                                    <div class="product-img">
                                        <img src="<?php echo $image ?>" alt="" class="img-fluid">
                                        <div class="product-name">
                                            <p><?php echo $cat->name ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        
                    <?php } ?>
                <?php } ?>
            </div>

        </div>

    </div>
</section>