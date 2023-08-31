<?php get_header(); ?>

<div id="wrapp" style="padding: 20vh 0; min-height: 30vh">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div>
</div>

     
<?php get_footer(); ?>