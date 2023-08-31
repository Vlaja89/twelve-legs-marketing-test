<?php 

function my_script_enqueuer() {
    
    wp_enqueue_style('style', get_stylesheet_uri() );
    wp_enqueue_style('style-bootstrap', get_stylesheet_directory_uri() . '/dist/css/bootstrap.min.css', false, '4.0', 'all');
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/dist/css/slick.css?v=' . time(), false);
    wp_enqueue_style('slikc-theme', get_stylesheet_directory_uri() . '/dist/css/slick-theme.css?v=' . time(), false);
    wp_enqueue_style('sides-menu.min', get_stylesheet_directory_uri() . '/dist/css/sides-menu.min.css?v=' . time(), false);
    wp_enqueue_style('theme', get_stylesheet_directory_uri() . '/dist/css/main.css?v=' . time(), false);
    wp_enqueue_style('style', get_stylesheet_uri());
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    wp_enqueue_script('jquery');
    wp_enqueue_script('script-bootstrap', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array(), '1.0', true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/dist/js/slick.js', array(), '1.0', true);
    wp_enqueue_script('slick.min', get_template_directory_uri() . '/dist/js/slick.min.js', array(), '1.0', true);
    wp_enqueue_script('sides-menu.min', get_template_directory_uri() . '/dist/js/sides-menu.min.js', array(), '1.0', true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/dist/js/custom.js', array(), '1.0', true);

}

add_action('wp_enqueue_scripts', 'my_script_enqueuer');

// Add WooCommerce inside theme
add_theme_support('woocommerce');

// Add Menu
add_theme_support('menus');

register_nav_menus(
    array(
        'menu' => __('Menu', 'theme'),
        'menu_footer_info' => __('Footer Menu Information', 'theme'),
        'menu_footer_comp' => __('Footer Menu Company', 'theme'),
    )
    );

// Add Post Thumbnails
add_theme_support('post-thumbnails');

add_image_size('smallest', 300, 300, true);
add_image_size('large', 800, 500, true);

// Options Pages and Subpages ACF
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent page
        acf_add_options_page(array(
            'page_title'  => 'Option Page',
            'menu_title'  => 'Options',
            'menu_slug'   => 'option-page',
            'redirect'    => true,
        ));
        
        // Add sub Footer page
        acf_add_options_sub_page(array(
            'page_title'  => 'Footer Page',
            'menu_title'  => 'Footer',
            'parent_slug'   => 'option-page',
        ));
        
        // Add sub Header page
        acf_add_options_sub_page(array(
            'page_title'  => 'Header Page',
            'menu_title'  => 'Header',
            'parent_slug'   => 'option-page',
        ));
        
        // Add sub Newsletter page
        acf_add_options_sub_page(array(
            'page_title'  => 'Newsletter Page',
            'menu_title'  => 'Newsletter',
            'parent_slug'   => 'option-page',
        ));
        
        // Add sub Shop page
        acf_add_options_sub_page(array(
            'page_title'  => 'Shop Page',
            'menu_title'  => 'Shop',
            'parent_slug'   => 'option-page',
        ));
        
    }
}

// Add Logo inside Appearance
add_theme_support('custom-logo', array(
    'height' => 38,
    'flex-width' => true,
    'width' => 185,
    'flex-height' => true,
));

// Add Logo
function theme_prefix_the_custom_logo() {
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
}

add_filter('get_custom_logo', 'change_logo_class');

function change_logo_class($html) {
    $html = str_replace('custom-logo-link', 'navbar-brand', $html);
    return $html;
}


// Menu Class
function add_classes_on_li($classes, $item, $args) {
    $classes[] = 'nav-item';
    return $classes;
}

add_filter('nav_menu_css_class', 'add_classes_on_li', 1, 3);

add_filter('nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3);

function wpse156165_menu_add_class($atts, $item, $args) {
    $class = 'nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}


// Register Sidebar
function my_sidebar() {
    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'page_sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog_sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
}
add_action('widgets_init','my_sidebar');

// Add Custom Post Type Inisde Archive Category Page (Mutual page for all posts)
function custom_post_type_cat_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
      if ($query->is_category()) {
        $query->set( 'post_type', array( 'post', 'NEW POST' ) );
      }
    }
  }
  
  add_action('pre_get_posts','custom_post_type_cat_filter');

// SVG 
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

// Extend WordPress search to include custom fields
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

// Modify the search query with posts_where
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

// Prevent duplicates
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

// End Extend WordPress search to include custom fields

/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
add_shortcode ('woo_cart_but', 'woo_cart_but' );

function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
            <li>
                <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
                <?php
                    if ( $cart_count > 0 ) {
                ?>
                <span class="cart-contents-count"><?php echo $cart_count; ?></span>
                
            <?php } ?>
            
                </a>
            </li>
        <?php
	        
    return ob_get_clean();
 
}

/**
 * Add AJAX Shortcode when cart contents update
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?></a>
    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}


/**
 * Add WooCommerce Cart Menu Item Shortcode to particular menu
 */
add_filter( 'wp_nav_menu_top-menu_items', 'woo_cart_but_icon', 10, 2 ); // Change menu to suit - example uses 'top-menu'

function woo_cart_but_icon ( $items, $args ) {
       $items .=  '[woo_cart_but]'; // Adding the created Icon via the shortcode already created
       
       return $items;
}

