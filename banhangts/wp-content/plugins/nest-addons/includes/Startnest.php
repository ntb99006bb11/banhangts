<?php
namespace Nestaddons;
if (! defined('ABSPATH' )){
	die('-1');
}
class Startnest{
      /**
      * Instance
      *
      * @var $instance
      */
      private static $instance;
      /**
      * Initiator
      *
      * @since 1.0.0
      * @return object
      */
      public static function instance() {
        if ( ! isset( self::$instance ) ) {
          self::$instance = new self();
        }

        return self::$instance;
      }


      /**
      * Instantiate the object.
      *
      * @since 1.0.0
      *
      * @return void
      */
      public function __construct() {
          add_action('wp_enqueue_scripts', array($this, 'nest_enqueue_scripts'));  
          add_action('elementor/editor/before_enqueue_scripts', array($this, 'nest_elementor_scripts'));
          add_action( 'elementor/elements/categories_registered', array($this, 'add_category' ) );

      }

      

 	      /**
	      * Add  category
	      *
	      * @since 1.0.0
	      *
	      * @return void
	      */
	      public function add_category( $elements_manager ) {
            $elements_manager->add_category(
              '100',
              [
                  'title'  => 'Nest Headers Content',
                  'icon' => 'font',
              ],
              1
            );
            $elements_manager->add_category(
              '101',
              [
                'title'  => 'Nest Sliders',
                'icon' => 'font',
              ],
              2
            );
            $elements_manager->add_category(
              '102',
              [
                  'title'  => 'Nest Content',
                  'icon' => 'font',
              ],
              3
            );
          $elements_manager->add_category(
            '103',
              [
                'title'  => 'Nest Shop Content',
                'icon' => 'font',
              ],
            4
          );
          $elements_manager->add_category(
              '104',
              [
                'title'  => 'Nest Footer Content',
                'icon' => 'font',
              ],
            5
          );
	    }
      /**
      * Get All ths scriptis and styles
      *
      * @return void
      */
      public function nest_enqueue_scripts(){
        global $nest_theme_mod;
      
        $product_paginaion_type = isset( $nest_theme_mod['product_paginaion_type'] ) ? $nest_theme_mod['product_paginaion_type'] : '';
        $rtl_enables = isset( $nest_theme_mod['rtl_enables'] ) ? $nest_theme_mod['rtl_enables'] : '';
        $wow_animation = isset( $nest_theme_mod['wow_animation'] ) ? $nest_theme_mod['wow_animation'] : '';
        $productpaginaionurl = '';
        if(function_exists('nest_get_spagination_option_via_url')):
          $productpaginaionurl = nest_get_spagination_option_via_url();  
        endif;
        if($rtl_enables == true || is_rtl() || (get_post_meta(get_the_ID() , 'rtl_enable_for_indvidual', true) == true)):
          wp_enqueue_style('bootstrap', NEST_ADDONS_URL . 'assets/css/vendors/bootstrap-rtl.min.css', array() , '5.0.2', 'all');
        else:
          wp_enqueue_style('bootstrap', NEST_ADDONS_URL . 'assets/css/vendors/bootstrap.min.css', array() , '5.0.2', 'all');
        endif;
        if($wow_animation == true):
          wp_enqueue_style('animation', NEST_ADDONS_URL .'assets/css/plugins/animate.min.css' , array() , '4.1.1', 'all');  
        endif; 
        wp_enqueue_style('infinite', NEST_ADDONS_URL . 'assets/css/plugins/infinite-scroll-docs.css', array() , '8.0.1', 'all');
        wp_enqueue_style('uicons', NEST_ADDONS_URL . 'assets/css/vendors/uicons-regular-straight.css', array() , '1.0.0', 'all');
        wp_enqueue_style('icomoon', NEST_ADDONS_URL . 'assets/fonts/icomoon/icomoon.css', array() , '1.0.0', 'all');
        wp_enqueue_style('swicss', NEST_ADDONS_URL . 'assets/css/plugins/swiper.css', array() , '8.4.6', 'all');
        wp_enqueue_style('nest-meta-box', get_template_directory_uri().'/assets/css/metabox.css' , array() , time() , 'all' );    
        wp_enqueue_style('style', get_template_directory_uri().'/style.css' , array() , time() , 'all'); 
        if(is_singular('product')):
          wp_enqueue_style('nest-slick-css', NEST_ADDONS_URL . 'assets/css/slick.css', array() , '1.8.1', 'all');
        endif;
        wp_enqueue_style('nest-wooproductfilter', get_template_directory_uri().'/assets/css/overwrite/woofilter.css' );   
        wp_enqueue_style('nest-main-style', NEST_ADDONS_URL .'assets/css/sass/main.css' , array() , time() , 'all');  
        if($rtl_enables == true || is_rtl() || (get_post_meta(get_the_ID() , 'rtl_enable_for_indvidual', true) == true)):
          wp_enqueue_style('nest-rtl', get_template_directory_uri() .'/assets/css/rtl.css' , array() , time() , 'all');   
        endif; 
       // wp_add_inline_style('nest-main-style', nest_customize_css());
        if(is_singular() && comments_open() && get_option('thread_comments')):
            wp_enqueue_script('comment-reply');
        endif;
        // ============================================================js start===================================================================================
       // wp_enqueue_script('bootstrap-bundle', NEST_ADDONS_URL . 'assets/js/vendor/bootstrap.bundle.min.js', array('jquery') , '5.0.0', true);
        wp_enqueue_script('owl', NEST_ADDONS_URL . 'assets/js/plugins/owl.js', array('jquery') , '', true);
        if(is_singular('product')):
          wp_enqueue_script('nest-slick', NEST_ADDONS_URL . 'assets/js/plugins/slick.js', array('jquery') , '1.8.1', true);  
        endif;
        wp_enqueue_script('OwlCarousel2Thumbs', NEST_ADDONS_URL . 'assets/js/plugins/OwlCarousel2Thumbs.min.js', array('jquery') , '0.1.3', true);
        wp_enqueue_script('syotimer', NEST_ADDONS_URL . 'assets/js/plugins/jquery.syotimer.min.js', array('jquery') , '2.1.2', true);
        wp_enqueue_script('select2', NEST_ADDONS_URL . 'assets/js/plugins/select2.min.js', array('jquery') , '4.0.7', true);
        wp_enqueue_script('waypoints', NEST_ADDONS_URL . 'assets/js/plugins/waypoints.js', array('jquery') , '4.0.1', true);
        wp_enqueue_script('infinite-scroll', NEST_ADDONS_URL . 'assets/js/plugins/infinite-scroll.pkgd.min.js', array('jquery') , '4.0.1', true);
        wp_enqueue_script('countdown', NEST_ADDONS_URL . 'assets/js/plugins/jquery.countdown.min.js', array('jquery') , '2.2.0', true);
        wp_enqueue_script('swipernest', NEST_ADDONS_URL . 'assets/js/plugins/swiper.min.js', array('jquery') , '8.4.6', true);
        wp_enqueue_script('sticky', NEST_ADDONS_URL . 'assets/js/plugins/jquery.theia.sticky.js', array('jquery') , '1.7.0', true);
        wp_enqueue_script('counterup', NEST_ADDONS_URL . 'assets/js/plugins/counterup.js', array('jquery') , '1.0', true);
        if($wow_animation == true):
          wp_enqueue_script('nest-wow', NEST_ADDONS_URL . 'assets/js/plugins/wow.js', array('jquery') , '1.1.3', true);
          wp_enqueue_script('wow-active', NEST_ADDONS_URL . 'assets/js/wow-active.min.js', array('jquery'),'1.0' , true);
        endif;
        wp_enqueue_script('magnific-popup', NEST_ADDONS_URL . 'assets/js/plugins/jquery.magnific-popup.js', array('jquery') , '1.1.0', true);
        wp_enqueue_script('sharer', NEST_ADDONS_URL . 'assets/js/plugins/sharer.js', array('jquery') , '0.4.0', true);
        wp_enqueue_script( 'nest_quick_view', get_template_directory_uri() . '/assets/js/shop.js',array('jquery'),'', true);
        wp_localize_script( 'nest_quick_view', 'NestAjax', array(
          'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
        ));
        wp_enqueue_script('nest-main', NEST_ADDONS_URL . 'assets/js/main.js', array('jquery') , time() , true);
        if ('no' === get_option('woocommerce_cart_redirect_after_add') && 'yes' === get_option('woocommerce_enable_ajax_add_to_cart') ) { 
          wp_enqueue_script('custom_script', NEST_ADDONS_URL . 'assets/js/add-to-cart-ajax.js', array('jquery'),'' , true);
          wp_enqueue_script('custom_script_two', NEST_ADDONS_URL . 'assets/js/add-to-cart-ajax-single.js', array('jquery'),'' , true);
        }
        if($product_paginaion_type == 'infinite' || $productpaginaionurl  == 'infinite'):
          wp_enqueue_script('infinite-scroll-active', NEST_ADDONS_URL . 'assets/js/infinite-active.js', array('jquery') , '1.0', true);
        endif;
        wp_enqueue_script('nest-loadmore', NEST_ADDONS_URL . 'assets/js/loadmore.js', array('jquery') , '1.0', true);
    }
   
    /**
    * Get All ths Elementor Call back scripts
    *
    * @return void
    */
    public function nest_elementor_scripts(){
        wp_enqueue_style('uicons', get_template_directory_uri() . '/assets/css/vendors/uicons-regular-straight.css', array() , '1.0.0', 'all');
        wp_enqueue_style('icomoon', NEST_ADDONS_URL . '/assets/fonts/icomoon/icomoon.css', array() , '1.0.0', 'all');
    }
   
}