<?php
/*
** ============================== 
**   Nest Ecommerce Theme main file
** ==============================
*/
add_action('wp_enqueue_scripts', 'nest_enqueue_scripts_before_install_plugin');
add_action('admin_enqueue_scripts',  'nest_cat_meta_postbox_css');
add_action('after_setup_theme',  'nest_setup');
add_action('widgets_init',   'nest_register_sidebar');
 
/*
========================
includeslude  file
========================
*/
//WP Bootstrap Navwalke
require_once get_template_directory() . '/includes/lib/WP_Bootstrap_Navwalker.php';
//plugin activation
require get_template_directory() . '/includes/class-tgm-plugin-activation.php';
require get_template_directory() . '/includes/lib/pluginarrays.php';
require_once get_template_directory() . '/includes/functions/functions.php';
if(class_exists('Redux')){
    require get_template_directory() . '/includes/options/config.php';
}

if(class_exists('OCDI_Plugin')){
    require get_template_directory() . '/includes/Demo_content/Demo_content.php';  
}
require_once get_template_directory() . '/includes/options/theme-option.php'; 

//Theme Custom Extension
require_once get_template_directory() . '/includes/functions/header-source.php';
require_once get_template_directory() . '/includes/functions/layout.php';
require_once get_template_directory() . '/includes/functions/classes.php';
require_once get_template_directory() . '/includes/functions/extra/breadcrumbs.php';
require_once get_template_directory() . '/includes/functions/extra/comments.php';
require_once get_template_directory() . '/includes/functions/extra/nav.php';
require_once get_template_directory() . '/template-parts/page-header/default-page-header.php';
require_once get_template_directory() . '/template-parts/page-header/page-header.php';
require_once get_template_directory() . '/template-parts/blog-functions.php';
 
// side menu
require_once get_template_directory() . '/includes/custom/side-menu-btn.php';
require_once get_template_directory() . '/includes/custom/side-menu.php';
//custom menu option
require_once get_template_directory() . '/includes/lib/custom-menu-option.php'; 
//Mobile Menu
require_once get_template_directory() . '/template-parts/headers/mobile-menu.php';
require_once get_template_directory() . '/template-parts/headers/mobile-floating-menu.php';

//woocommerce Custom Extension
if (class_exists('woocommerce')):
    require_once get_template_directory() . '/includes/woocommerce/action.php';
    require_once get_template_directory() . '/includes/woocommerce/card.php';
    require_once get_template_directory() . '/includes/woocommerce/quick-view-template.php';
    require_once get_template_directory() . '/includes/woocommerce/mini-cart.php';
endif;
/*
==========================================
Metabox admin styles
==========================================
*/
function nest_cat_meta_postbox_css(){
    wp_enqueue_style('meta-box-css', get_template_directory_uri().'/assets/css/metabox.css' );
} 
/*
==========================================
Font Loading
==========================================
*/
function nest_fonts_url() {
    $font_url = '';
    $Lato = _x( 'on', 'Lato font: on or off', 'steelthemes-nest' );
/* Translators: If there are characters in your language that are not
* supported by Open Sans, translate this to 'off'. Do not translate
* into your own language.
*/
$Quicksand = _x( 'on', 'Quicksand font: on or off', 'steelthemes-nest' );
if ( 'off' !== $Lato || 'off' !== $Quicksand ) {
            $font_families = array();
    if ( 'off' !== $Lato ) {
        $font_families[] = 'Lato:300,300i,400,400i,700,700i,900,900i';
    }
    if ( 'off' !== $Quicksand ) {
         $font_families[] = 'Quicksand:300,400,500,600,700';
    }
    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
    );
    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
}
return esc_url_raw( $fonts_url );
}

/*
** ============================== 
** Register and enqueue styles
** ============================== 
*/
function nest_enqueue_scripts_before_install_plugin(){
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/vendors/bootstrap.min.css', array() , '5.0.0', 'all');
    wp_enqueue_style('style', get_template_directory_uri().'/style.css' );  
    wp_enqueue_style('uicons', get_template_directory_uri() . '/assets/css/vendors/uicons-regular-straight.css', array() , '1.0.0', 'all');
    wp_enqueue_style( 'nest-fonts', nest_fonts_url(), array(), null );
    wp_enqueue_style('nest-meta-box', get_template_directory_uri().'/assets/css/metabox.css' , array() , time() , 'all');
    wp_enqueue_style('nest-main-style', get_template_directory_uri().'/assets/css/main.css' , array() , time() , 'all');
    wp_enqueue_style('nest-scondary-style', get_template_directory_uri().'/assets/css/overwrite/theme-extra.css' );  
    wp_enqueue_style('nest-main-mb-style', get_template_directory_uri().'/assets/css/overwrite/mobile.css' );
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/vendor/bootstrap.bundle.min.js', array('jquery') , '5.0.0', true);
    wp_enqueue_script('waypoints',  get_template_directory_uri() . '/assets/js/plugins/waypoints.js', array('jquery') , '4.0.1', true);
    wp_enqueue_script('nest-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery') , '1.0.0', true);
  

    if(is_singular() && comments_open() && get_option('thread_comments')):
        wp_enqueue_script('comment-reply');
    endif;

 

}  
/*
==========================================
add_theme_support
==========================================
*/
function nest_setup(){
if(!isset($content_width))
    $content_width = 840;
/*---------- Make theme available for translation-----------*/
    load_theme_textdomain('steelthemes-nest', get_template_directory() . '/lang');
/*----------Add Theme Support-----------*/
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form'
    ));
    add_theme_support('title-tag');
    add_theme_support('post_format', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat']);
    add_theme_support('automatic-feed-links');
/*----------woocommerce Theme Support-----------*/ 
    add_theme_support( 'woocommerce');
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
/*----------editor-style-----------*/
    add_editor_style('assets/css/editor-style.css');
/*----------register_nav_menus-----------*/
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'steelthemes-nest') ,
        'mobile_menu' => esc_html__('Mobile Menu', 'steelthemes-nest') ,
        'mobile_cat_menu' => esc_html__('Category Display on Mobile Menu', 'steelthemes-nest') ,
    ));
}
/*
==========================================
Register widgetized area and update sidebar with default widgets.
==========================================
*/
function nest_register_sidebar(){
$sidebars = array(
'sidebar-blog' => esc_html__('Blog Sidebar', 'steelthemes-nest') ,
'page-sidebar' => esc_html__('Page Sidebar', 'steelthemes-nest') ,
'shop-sidebar' => esc_html__('Shop Sidebar', 'steelthemes-nest') ,
'filter-sidebar' => esc_html__('Filter Sidebar', 'steelthemes-nest') ,
);

// Register sidebars
foreach ($sidebars as $id => $name){
register_sidebar(
    array(
        'name' => $name,
        'id' => $id,
        'description' => esc_html__('Add widgets here in order to display on pages', 'steelthemes-nest') ,
        'before_widget' => '<div class="sidebar-widget mb-50"><div id="%1$s" class="widget widget_box  %2$s">',
        'after_widget' => '</div> </div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
} 
 
/**
 * Get Elementor builder content for display.
 *
 * @param int $post_id Post ID of the Elementor builder content.
 * @return string|null The builder content HTML.
 */
function nest_elementor_builder_content_for_display($post_id) {
    global $nest_theme_mod;
    if( empty( $post_id)){
        return;
    }
    $content = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($post_id);
    return  $content;
}
