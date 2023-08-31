<?php $IconColBgImage = get_sub_field('icons_column_background_image'); ?>
<?php $IconColBgColor = get_sub_field('icons_column_background_color'); ?>

<section id="icon-col" style="background-image: url('<?php echo $IconColBgImage ?>'); background-color: <?php echo $IconColBgColor ?>">
    <div class="container">

        <div class="row flex-wrap align-items-start justify-content-center">
            <?php if( have_rows('icons_column') ): ?>
                <?php while( have_rows('icons_column') ): the_row(); ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    
                        <div class="icon-single-box">
                            <div class="icon">
                                <img src="<?php the_sub_field('icons_column_image') ?>" alt="">
                            </div>
                            <div class="icon-content">
                                <div class="icon-title">
                                    <p><?php the_sub_field('icons_column_title') ?></p>
                                </div>
                                <div class="icon-desc">
                                    <p><?php the_sub_field('icons_column_description') ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    
    </div>
</section>