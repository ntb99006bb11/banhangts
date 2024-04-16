<?php
/** nest edited
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $nest_theme_mod;
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

 
$product_single_style = '';
if(!empty($nest_theme_mod['product_single_style'])):
    $product_single_style = $nest_theme_mod['product_single_style'];
endif;
if(get_post_meta(get_the_ID() , 'product_signle_style_enable', true)):
    $product_single_style = get_post_meta(get_the_ID() , 'product_single_styles', true);
endif;

if(!empty($product_single_style == 'style_one')):
	wc_get_template_part('single-product-styles/product-default'); 
elseif(!empty($product_single_style == 'style_two')):	  
	wc_get_template_part('single-product-styles/product-style-one'); 
elseif(!empty($product_single_style == 'style_three')):	 
	wc_get_template_part('single-product-styles/product-style-two'); 
elseif(!empty($product_single_style == 'style_four')):	   
	wc_get_template_part('single-product-styles/product-style-three'); 
endif;

do_action( 'woocommerce_after_single_product' ); ?>