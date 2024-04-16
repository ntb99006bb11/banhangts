<?php
/**  nest edited
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
global  $nest_theme_mod;
global  $product;
 
$extra_content = '';
$extra_content_two = '';
$product_archive_styleclass = '';
$product_archive_style = isset( $nest_theme_mod['product_archive_style'] ) ? $nest_theme_mod['product_archive_style'] : '';
if($product_archive_style == 'style_two' || nest_get_product_card_option_via_url() == 'style_two'):
	$product_archive_styleclass = 'product_arch_style_two';
elseif($product_archive_style == 'style_three' || nest_get_product_card_option_via_url() == 'style_three'):
	$product_archive_styleclass = 'product_arch_style_three';
elseif($product_archive_style == 'style_four' || nest_get_product_card_option_via_url() == 'style_four'):
	$product_archive_styleclass = 'product_arch_style_four';
else:
	$product_archive_styleclass = 'product_arch_style_one';
endif;

 if(!empty($nest_theme_mod['grid_list_vide_enable']) == true): 
	$extra_content = 'grid_list_enable';
 endif;

 if(!empty($nest_theme_mod['filter_content_enable']) == true): 
	$extra_content_two = 'filter_content_enabled';
 endif;
 
?>

<div id="primary" class="content-area <?php nest_column_for_shop(); ?>">
<main id="mains" class="site-main">
<div class="row">
	<div class="col-lg-12">
	<?php

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header  clearfix">
	<?php // if ( apply_filters( 'woocommerce_show_page_title', true ) ) :
	 // <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title();  </h1>
     //endif;
	  ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */	  
	do_action('woocommerce_archive_description'); 
	?>
	<div class="woocommerce_output_all_notices">
		<?php woocommerce_output_all_notices(); ?>
	</div>
	<div class="position-relative <?php echo esc_attr($extra_content); ?> <?php echo esc_attr($extra_content_two); ?>">
	<?php 
	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );
	?>
	</div>
</header>


<div class="products_box_outer <?php echo esc_attr($product_archive_styleclass); ?> clearfix">

<?php
if ( woocommerce_product_loop() ) { ?>
 
		<?php
	woocommerce_product_loop_start();
  
	if ( wc_get_loop_prop( 'total' ) ) { ?>
	
	
		<?php	while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );
	
			wc_get_template_part( 'content', 'product' ); 
	
		} ?>
	
		<?php
	}  
	 	
	woocommerce_product_loop_end(); ?>
	 
	<?php
	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
?>



</div><!-- #primary -->
</div>
</div>
</main><!-- #main -->
</div>

<?php


/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
