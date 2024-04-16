<?php

namespace Nestaddons\Woocom;
if (! defined('ABSPATH' )){
	die('-1');
}
class Woocomfunctions{
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
       add_action( 'woocommerce_nest_category_image',  array($this ,'nest_woocommerce_category_image'), 10 );
  
      
    }

  
    /*
    **==============================   
    **   Woocommerce Category Image
    **==============================
    */
     
      public static function nest_woocommerce_category_image() {
          $prod_categories = get_terms( 'product_cat', array(
              'orderby'    => 'name',
              'order'      => 'ASC',
              'hide_empty' => true
          ));
      foreach( $prod_categories as $prod_cat ) :
          $cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
          $shop_catalog_img = wp_get_attachment_url( $cat_thumb_id, 'shop_catalog' );
          $term_link = get_term_link( $prod_cat, 'product_cat' );?>
          <li  class="content_cat_list <?php if(!empty($shop_catalog_img)): ?> cat_image_in <?php endif; ?>">
              <a href="<?php echo $term_link; ?>">
              <?php if(!empty($shop_catalog_img)): ?>
                  <img src="<?php echo esc_url($shop_catalog_img); ?>" alt="<?php echo $prod_cat->name; ?>" />
              <?php endif; ?>
                  <?php echo esc_attr($prod_cat->name); ?>
              </a>
          </li>
          <?php endforeach;
     
      } 
       /*
    **==============================   
    **   Woocommerce Category Image
    **==============================
    */
 
    public function nest_woosq_init(){
        if(function_exists('woosq_init' )):
            echo do_shortcode('[woosq]');
        endif;
    }
    
 
    public function nest_woosc_init(){
        if(function_exists('woosc_init' )):
            echo do_shortcode('[woosc]');
        endif;
    }


    public function nest_woosw_init(){
        if(function_exists('woosw_init' )):
            echo do_shortcode('[woosw]');
        endif;
    }
   
 
}


    