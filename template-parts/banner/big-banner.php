<?php $BigBannerTitle = get_sub_field('big_banner_title'); ?>
<?php $BigBannerContent = get_sub_field('big_banner_content'); ?>
<?php $BigBannerBgImage = get_sub_field('big_banner_background_image'); ?>
<?php $BigBannerBgColor = get_sub_field('big_banner_background_color'); ?>

<section id="big-banner" style="background-image: url('<?php echo $BigBannerBgImage ?>'); background-color: <?php echo $BigBannerBgColor ?>">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6">
                <div class="banner-title">
                    <!-- Title -->
                    <?php if( $BigBannerTitle ): ?>
                        <h1><?php echo $BigBannerTitle ?></h1>
                    <?php endif; ?>

                    <!-- Content -->
                    <?php if( $BigBannerContent ): ?>
                        <?php echo $BigBannerContent ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-7">
                <!-- Button -->
                <?php if( get_sub_field('big_banner_button') ): ?>
                    <?php
                        $link = get_sub_field('big_banner_button');
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                    ?>
                    <button type="button" class="custom-btn mr-3" onclick="location.href='<?php echo esc_url( $link_url ); ?>';">
                        <div class="button-inner">
                            <?php echo esc_html( $link_title ); ?>
                        </div>
                    </button>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- End Button -->
            </div>
        </div>
    </div>
</section>