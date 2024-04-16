<?php

/**
 * Plugin Name: Nest Addons
 * Plugin URI: http://demo2.steelthemes.com/
 * Description: Extra Addons For Nest theme. No Auto Updates For This Plugin
 * Version: 1.2.6
 * Author:  Steelthemes
 * Author URI: http://steelthemes.com
 * License: GPL2+
 * Text Domain: nest-addons
 * Domain Path: /lang/
 */

if (! defined('ABSPATH' )){
	die('-1');
}

if (!defined('NEST_ADDONS_DIR')){
  define('NEST_ADDONS_DIR', plugin_dir_path( __FILE__ ));
}

if (!defined('NEST_ADDONS_URL')){
  define('NEST_ADDONS_URL', plugin_dir_url( __FILE__ ));
}
 

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
require_once __DIR__ . '/vendor/autoload.php';

/**
* Main Nest Addons Class
*
* The main class that initiates and runs the plugin.
*
* @since 1.0.0
*/
final class  Nest_elementor_extension {

  /**
   * Plugin Version
   *
   * @since 1.0.0
   *
   * @var string The plugin version.
   */
  const VERSION = '1.0.0';

  /**
   * Minimum Elementor Version
   *
   * @since 1.0.0
   *
   * @var string Minimum Elementor version required to run the plugin.
   */
  const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

  /**
   * Minimum PHP Version
   *
   * @since 1.0.0
   *
   * @var string Minimum PHP version required to run the plugin.
   */
  const MINIMUM_PHP_VERSION = '7.0';

  /**
   * Instance
   *
   * @since 1.0.0
   *
   * @access private
   * @static
   *
   * @var  Nest_elementor_extension The single instance of the class.
   */
  private static $_instance = null;

  /**
   * Instance
   *
   * Ensures only one instance of the class is loaded or can be loaded.
   *
   * @since 1.0.0
   *
   * @access public
   * @static
   *
   * @return  Nest_elementor_extension An instance of the class.
   */
  public static function instance() {

      if ( is_null( self::$_instance ) ) {
    self::$_instance = new self();
      }
      return self::$_instance;

  }

  /**
   * Constructor
   *
   * @since 1.0.0
   *
   * @access public
   */
  public function __construct() {

      add_action( 'init', [ $this, 'i18n' ] );
      add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );
      add_action( 'elementor/controls/register', [ $this, 'get_register_controls' ] );
      remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
      $this->add_nest_extra();
      add_filter( 'init', array( $this, 'enable_elementor_posttype_supports' ));
      $this->update_theme_plugin();
      $this->get_shortcodes();
  }

  public function update_theme_plugin() {
    require_once NEST_ADDONS_DIR . '/update/plugin-update-checker.php';
    $myUpdateCheckers = PucFactory::buildUpdateChecker(
      'https://themepanthers.com/updatedplugin/nest/plugin.json',
      __FILE__, //Full path to the main plugin file or functions.php.
      'nest-plugin-addons'
    );
  }


   /**
    * Get All the wanted files
    *
    * @return void
    */
    public function add_nest_extra(){ 
        require_once NEST_ADDONS_DIR . '/update.php';
        require_once NEST_ADDONS_DIR . '/woocommerce/product-search/product-search.php'; 
        require_once NEST_ADDONS_DIR . '/woocommerce/product-search/product-widgets.php'; 
        require_once NEST_ADDONS_DIR . '/includes/theme-panel/theme-panel.php';
        require_once NEST_ADDONS_DIR . '/includes/Plugins/Widgets/Shop_banner.php';
        require_once NEST_ADDONS_DIR . '/includes/Core/Widgets/Controls/getproduct.php';
        if ('no' === get_option('woocommerce_cart_redirect_after_add') || 'yes' === get_option('woocommerce_enable_ajax_add_to_cart') ) { 
            require_once NEST_ADDONS_DIR . '/includes/Core/ajax-view-product.php';
        }
        if (!class_exists('Redux' )){
            require_once NEST_ADDONS_DIR . 'redux-framework/redux-framework.php';
            require_once NEST_ADDONS_DIR . 'metabox/metaboxes.php';
        }
        add_action('elementor/editor/before_enqueue_scripts', function() {
            wp_enqueue_style('nest-widgets-icon', get_template_directory_uri() . '/assets/fonts/fontello/nest.css', array() , '1.0.0', 'all'); 
        });
    }
    public function get_register_controls( $controls_manager ){
		require_once NEST_ADDONS_DIR .'/includes/Core/Widgets/Controls/autosearch.php';
		$controls_manager->register( new Nest_select2_get_auto_Control() );
	}
    public function on_plugins_loaded(){
        new Nestaddons\Startnest();
        new Nestaddons\Admin();
        if ($this->is_compatible()) {
            add_action('elementor/init', [$this, 'init']);
        }
    }
    public function enable_elementor_posttype_supports() {
        $elementor_enable = get_option( 'elementor_cpt_support' );
        if ( ! $elementor_enable ) {
            $elementor_enable = array( 'page', 'post', 'product', 'header' , 'sticky_header' , 'footer' , 'mega_menu' );
            update_option( 'elementor_cpt_support', $elementor_enable );
        }  else  {
            $else_support = array( 'page', 'post', 'product', 'header', 'footer' , 'sticky_header'  , 'mega_menu' );
            $elementor_enable = array_unique (array_merge ($elementor_enable, $else_support));
            update_option( 'elementor_cpt_support', $elementor_enable );
        }
    }
/*
** ============================== 
**   get_shortcodes
** ==============================
*/ 
public function get_shortcodes() {
    /*
    ** ============================== 
    **   nest_navmenu
    ** ==============================
    */ 
    if (!function_exists('nest_navmenu')) {
        function nest_navmenu() {
            $options = array();
            $nvmenus = wp_get_nav_menus();
                if (!empty($nvmenus)) {
                    foreach ($nvmenus as $navigationmenu) {
                        if (isset($navigationmenu)) {
                            $options[''] = 'Select';
                            if (isset($navigationmenu->slug) && isset($navigationmenu->name)) {
                                $options[$navigationmenu->slug] = $navigationmenu->name;
                            }
                        }
                    }
                }
            
            return $options;
        }
    }
    
    /*
    ** ============================== 
    **   nest_navmenu
    ** ==============================
    */ 
    if(!function_exists('nest_get_icon')) {
    function nest_get_icon(){ 
        // scrape list of icons from fontawesome css
        
        $pattern = '/\.((?:\w+(?:-)?)+):before\s*{\s*content/';
        $subject = file_get_contents(get_template_directory() . '/assets/css/vendors/uicons-regular-straight.css');
        preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
        $iconss = array();
        //fontawesome
        foreach($matches as $match)
        {
            $iconss[] = array('value' => ' '.$match[1], 'label' => $match[1]);
        }
        
        $patterntwo = '/\.(icon-(?:\w+(?:-)?)+):before\s*{\s*content/';
            $subjectwo = file_get_contents(NEST_ADDONS_DIR . '/assets/fonts/icomoon/icomoon.css');
            preg_match_all($patterntwo, $subjectwo, $matchestwo, PREG_SET_ORDER);
            
        foreach($matchestwo as $match)
        {
            $iconss[] = array('value' => ' '.$match[1], 'label' => $match[1]);
        }
        
        $iconss = array_column($iconss, 'label', 'value');
        //print_r($icons); exit('hellow');
        return $iconss;
    }
    }
    
     
    /*
    ** ============================== 
    **   nest_contact_form_7_query
    ** ==============================
    */ 
    if (!function_exists('nest_contact_form_7_query')):
        function nest_contact_form_7_query($post_type){
        $post_list = get_posts(array(
            'post_type' => $post_type,
            'showposts' => -1,
        ));
        $options = array();
            if (!empty($post_list) && !is_wp_error($post_list)) {
                foreach ($post_list as $post) {
                    $options[$post->ID] = $post->post_title;
            }
            return $options;
        }
    }
    endif;
    /*
    ** ============================== 
    **   nest_product_query
    ** ==============================
    */ 
    if (!function_exists('nest_product_query')):
        function nest_product_query(){
        $post_list = get_posts(array(
            'post_type' => 'product',
            'showposts' => -1,
        ));
        $options = array();
            if (!empty($post_list) && !is_wp_error($post_list)) {
                foreach ($post_list as $post) {
                    $options[$post->ID] = $post->post_title;
            }
            return $options;
        }
    }
    endif;
    
    /*
    ** ============================== 
    ** nest_get_product_categories
    ** ============================== 
    */
    
    
    function nest_get_product_categories() {
        $options = array();
        $taxonomy = 'product_cat';
        if (!empty($taxonomy)) {
            $terms = get_terms(
                array(
                    'orderby'    => 'name',
                    'order'      => 'ASC',
                    'taxonomy' => $taxonomy,
                    'hide_empty' => false,
                    )
                );
                if (!empty($terms)) {
                    foreach ($terms as $term) {
                        if (isset($term)) {
                            $options[''] = 'Select';
                            if (isset($term->slug) && isset($term->name)) {
                                $options[$term->slug] = $term->name;
                            }
                        }
                    }
                }
            }
        return $options;
    }
      /*
    ** ============================== 
    ** nest_get_product_categories
    ** ============================== 
    */
    
    
    function nest_get_blog_categories() {
        $options = array();
        $taxonomy = 'category_name';
        if (!empty($taxonomy)) {
            $terms = get_terms(
                array(
                    'parent' => 0,
                    'taxonomy' => $taxonomy,
                    'hide_empty' => false,
                    )
                );
                if (!empty($terms)) {
                    foreach ($terms as $term) {
                        if (isset($term)) {
                            $options[''] = 'Select';
                            if (isset($term->slug) && isset($term->name)) {
                                $options[$term->slug] = $term->name;
                            }
                        }
                    }
                }
            }
        return $options;
    }
 
}


  /**
   * Load Textdomain
   *
   * Load plugin localization files.
   *
   * Fired by `init` action hook.
   *
   * @since 1.0.0
   *
   * @access public
   */
  public function i18n() {
   load_theme_textdomain( 'nest-addons', NEST_ADDONS_DIR . '/lang' );
  }

  /**
     * Compatibility Checks
     *
     * Checks if the installed version of Elementor meets the plugin's minimum requirement.
     * Checks if the installed PHP version meets the plugin's minimum requirement.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function is_compatible()
    {

         // Check if Elementor installed and activated
      if ( ! did_action( 'elementor/loaded' ) ) {
          add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
          return;
      }

      // Check for required Elementor version
      if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
          add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
          return;
      }

      // Check for required PHP version
      if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
          add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
          return;
      }

        return true;
    }

  /**
   * Initialize the plugin
   *
   * Load the plugin only after Elementor (and other plugins) are loaded.
   * Checks for basic plugin requirements, if one check fail don't continue,
   * if all check have passed load the files required to run the plugin.
   *
   * Fired by `plugins_loaded` action hook.
   *
   * @since 1.0.0
   *
   * @access public
   */
  public function init() {

        $this->i18n();

  // Register widgets

  add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
   
  }

  /**
   * Admin notice
   *
   * Warning when the site doesn't have Elementor installed or activated.
   *
   * @since 1.0.0
   *
   * @access public
   */
  public function admin_notice_missing_main_plugin() {

      if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

      $message = sprintf(
          /* translators: 1: Plugin name 2: Elementor */
          esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'nest-addons' ),
          '<strong>' . esc_html__( 'Nest Addons', 'nest-addons' ) . '</strong>',
          '<strong>' . esc_html__( 'Elementor', 'nest-addons' ) . '</strong>'
      );

      printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

  }

  /**
   * Admin notice
   *
   * Warning when the site doesn't have a minimum required Elementor version.
   *
   * @since 1.0.0
   *
   * @access public
   */
  public function admin_notice_minimum_elementor_version() {

      if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

      $message = sprintf(
          /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
          esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'nest-addons' ),
          '<strong>' . esc_html__( 'nest-addons', 'nest-addons' ) . '</strong>',
          '<strong>' . esc_html__( 'Elementor', 'nest-addons' ) . '</strong>',
           self::MINIMUM_ELEMENTOR_VERSION
      );

      printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

  }

  /**
   * Admin notice
   *
   * Warning when the site doesn't have a minimum required PHP version.
   *
   * @since 1.0.0
   *
   * @access public
   */
  public function admin_notice_minimum_php_version() {

      if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

      $message = sprintf(
          /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
          esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'nest-addons' ),
          '<strong>' . esc_html__( 'Nest Addons', 'nest-addons' ) . '</strong>',
          '<strong>' . esc_html__( 'PHP', 'nest-addons' ) . '</strong>',
           self::MINIMUM_PHP_VERSION
      );

      printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

  }


  
 
  /**
   * Include Files
   *
   * Load required plugin core files.
   *
   * @since 1.0.0
   *
   * @access public
   */

   


public function register_widgets() {
  $widgets_manager = \Elementor\Plugin::instance()->widgets_manager;

//header
$widgets_manager->register(new  Nestaddons\Core\Widgets\Header\Header_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Header\Custom_menu());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Header\Extra_header_items());

//slider
$widgets_manager->register(new  Nestaddons\Core\Widgets\Slider\Single_banner_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Slider\Slider_v1());
//shop
$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Category_carousel_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Category_grid_v1());

$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Category_list_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Popup_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Product_deals_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Product_deals_v2());

$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Product_tab_filter_carousel_v1()); 
$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Product_carousel_v1());

$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Product_tab_filter_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Product_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Shop\Shop_banner_v1());
//Content
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Text_editor_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Title_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Theme_btn_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Social_media_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\List_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Icon_box_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Image_grid_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Simple_image_box_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Blog_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Contact_box_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Contact_form_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Fun_facts_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Team_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Sidebar_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Testimonial_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Content\Subscribe_v1());


//Footer
$widgets_manager->register(new  Nestaddons\Core\Widgets\Footer\About_contact_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Footer\Hot_line_v1());
$widgets_manager->register(new  Nestaddons\Core\Widgets\Footer\Navigation_v1());
      

}
}



Nest_elementor_extension::instance();

