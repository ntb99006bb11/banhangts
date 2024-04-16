<?php
/** nest edited
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$product_archive_style = isset( $nest_theme_mod['product_archive_style'] ) ? $nest_theme_mod['product_archive_style'] : '';
?>
<?php if($product_archive_style == 'style_two' || nest_get_product_card_option_via_url() == 'style_two'): ?>
    <li <?php wc_product_class( 'product_grid_style_two', $product ); ?>>
    <?php  do_action('get_nest_product_single_card_one'); ?>
</li>
<?php elseif($product_archive_style == 'style_three' || nest_get_product_card_option_via_url() == 'style_three'): ?>
    <li <?php wc_product_class( '', $product ); ?>>
        <?php  do_action('get_nest_product_card_three'); ?>
    </li>
<?php elseif($product_archive_style == 'style_four' || nest_get_product_card_option_via_url() == 'style_four'): ?>
    <li <?php wc_product_class( '', $product ); ?>>
    <?php  do_action('get_nest_product_card_two'); ?>
</li>
<?php else: ?>
    <li <?php wc_product_class( '', $product ); ?>>
        <?php  do_action('get_nest_product_card_one'); ?>
    </li>
<?php endif; ?>
