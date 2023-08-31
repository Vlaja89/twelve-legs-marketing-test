<?php get_header(); ?>
<div id="wrapp">

    <!-- Banner --> 
    <div id="small-banner">
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 text-center">
                    <h2>Search Results for </br> <span style="color: #C9433C;">'<?php the_search_query(); ?>'</span></h2>
                </div>
            </div>
            
        </div>
    </div>
     
    <!-- Search Content -->
    <div id="search" class="pt-5">
        <div class="container">
            <div class="row flex-wrap align-items-center justify-content-center">

                <?php if(have_posts() ): ?>
                    <?php $count = 1 ?>
                    <?php while (have_posts()): ?>
                    <?php the_post(); ?>

                    <!-- Deafult Posts Search -->
                    <div class="single-blog-desc">
                        <div class="single-blog-img">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>" class="img-fluid mb-3">
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="author">
                                <p class="pb-0">Writen by <span><?php the_author(); ?></span></p>
                            </div>
                            <div class="date">
                                <p class="pb-0"><?php echo get_the_date(); ?></p>
                            </div>
                        </div>
                        <div class="post-title">
                            <p><?php the_title(); ?></p>
                        </div>

                        <!-- Excerpt Content -->
                        <p> <?php echo substr(get_the_excerpt(), 0,135)." ..." ?></p>

                        
                        <div class="d-flex align-itmes-center link">
                            <a href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                        
                        <!-- Category Name -->
                        <div class="category-name">
                            <?php 
                                foreach(get_the_category() as $category)
                                {
                                    echo '<a href="'.get_category_link($category->cat_ID).'"><p>'.$category->cat_name.'</p></a>';
                                }
                            ?>
                        </div>
                    </div>

                    <!-- Custom Post Search -->
                    <?php 
                         if ( 'post_one' == get_post_type() ){
                    ?> 
                        

                    <?php
                        } elseif ( 'post_two' == get_post_type()){
                    ?> 
                    

                    <?php
                        } else{
                            //code for anything else
                        } 
                    ?>

                    <!-- Pagination with numbers -->
                    <div class="custom-pagination">
                        <?php
                                global $wp_query;
                                $big = 999999999; // need an unlikely integer
                                
                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $wp_query->max_num_pages
                                ) );
                            ?>
                    </div>

                <?php $count++; endwhile; else: ?>

                <!-- If there no have search results display this message. Before adding this, you must create a new template in includes folder (section-searchresults.php). Copy and past whole code from Acrhive template and change the root  -->
                <div class="text-cetner">
                    <p><strong>There are no search Results for <span style="color: #C9433C;">'<?php the_search_query(); ?>'</span></strong></p>
                </div>
                        
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

     
<?php get_footer(); ?>

                           
