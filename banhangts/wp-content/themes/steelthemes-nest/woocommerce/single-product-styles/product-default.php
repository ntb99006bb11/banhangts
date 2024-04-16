<?php
/*
**====================================
** Nest Ecommerce woocommerce action
**====================================
*/
global $product;

?>

<div class="default_single_product slick_slider_one product-detail accordion-detail">

	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>> 
	<div class="row">
	<div class="col-lg-5 col-md-12">
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	//
	do_action( 'woocommerce_before_single_product_summary' );
	do_action('get_nest_woocommerce_other_product_video');
	?>
		</div>
		<div class="col-lg-7 col-md-12">
			<div class="summary entry-summary detail-info pr-30 pl-30">

				<?php woocommerce_show_product_sale_flash(); ?>

				<?php do_action('nest_single_title'); ?>
				<?php do_action('get_nest_product_deals');?>
				<div class="product-detail-rating">
					<div class="product-rate-cover text-end">
						<?php do_action('nest_single_rating'); ?>
					</div>
				</div>
				<div class="clearfix product_main_content">
				<?php do_action('woocommerce_single_product_summary'); ?>
				</div>
				 
				<div class="attr-detail attr-size mb-20">
	                <div class="product_meta_same smae_meta">
                        <?php do_action('get_nest_woocommerce_other_product_meta'); ?>
                        <?php do_action('nest_single_meta'); ?>
                    </div>
                </div>
				<?php do_action('nest_single_sharing'); ?>
				<?php do_action('get_nest_woocommerce_other_product_message'); ?>
				<?php do_action('get_nest_woocommerce_other_product_add'); ?>
				 
			
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		//do_action( 'woocommerce_single_product_summary' );
		?>
			</div>
			</div>
			</div>
	 
		<div class="product-info">
			<div class="tab-style3">
				<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	//do_action( 'woocommerce_after_single_product_summary' );
	woocommerce_output_product_data_tabs();
	woocommerce_upsell_display();
	?>
			</div>
		</div>
	</div>
	<?php woocommerce_output_related_products(); ?>
</div>
