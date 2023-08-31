<?php
/*
* Template Name: Flexible Content
*/
get_header(); ?>
 
<div id="wrapp">

    <?php if( have_rows('content') ):
        while ( have_rows('content') ) : the_row(); ?>

            <?php  if( get_row_layout() == 'big_banner' ): ?>
            <!-- Big Banner -->

                <?php get_template_part('template-parts/banner/big-banner'); ?>

            <?php endif; ?>

            <?php  if( get_row_layout() == 'shop_categories' ): ?>
            <!-- Woo Categories -->

                <?php get_template_part('template-parts/woo-categories/woo-categories'); ?>

            <?php endif; ?>

            <?php  if( get_row_layout() == 'icons_column' ): ?>
            <!-- Icons Column -->

                <?php get_template_part('template-parts/columns/icons-column'); ?>

            <?php endif; ?>

            <?php  if( get_row_layout() == 'one_center_column' ): ?>
            <!-- Center Column -->

                <?php get_template_part('template-parts/columns/center-column'); ?>

            <?php endif; ?>

            <?php  if( get_row_layout() == 'brand_category_products' ): ?>
            <!-- Brand Cat Products -->

                <?php get_template_part('template-parts/woo-categories/brand-categories-products'); ?>

            <?php endif; ?>

            <?php  if( get_row_layout() == 'description_shortcode' ): ?>
            <!-- Descriptions / Shortcode -->

                <?php get_template_part('template-parts/description-shortcode/description-shortcode'); ?>

            <?php endif; ?>
            
            <?php  if( get_row_layout() == 'trending_products' ): ?>
            <!-- Trending Products -->

                <?php get_template_part('template-parts/woo-categories/trending-products'); ?>

            <?php endif; ?>


        <?php  endwhile; ?>
        <?php else : ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>