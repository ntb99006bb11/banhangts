<?php
/*
**====================================
** Nest Ecommerce woocommerce action
**====================================
*/
global $product;
$product_deals_date = get_post_meta(get_the_ID() , 'product_deals_date', true);
?>
<div class="default_single_product product-detail slick_slider_two accordion-detail product_single_style_two">
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
        <div class="upper_content">
            <div class="row">
                <div class="<?php if(empty($product_deals_date)): ?> col-lg-12 <?php else: ?> col-lg-8  col-md-8 col-sm-12 <?php endif; ?>">
                    <div class="titl_w">
                        <?php do_action('nest_single_title'); ?>
                    </div>
                
                    <div class="other_content  d-flex align-items-center">
                        <div class="top  d-flex align-items-center">
                        <?php if(function_exists('woocommerce_show_product_sale_flash')): ?>
                              <div class="sale_flash"> <?php woocommerce_show_product_sale_flash(); ?></div>
                            <?php endif; ?>
                            <?php do_action('nest_single_rating'); ?>
                        </div>
                        <div class="meta">
                            <?php do_action('get_nest_woocommerce_other_product_meta'); ?> 
                        </div>
                    </div>
                </div>
                <?php if(!empty($product_deals_date)): ?>
                <div class="col-lg-4  col-md-4 col-sm-12">
                    <?php do_action('get_nest_product_deals');  ?>
                </div>
                <?php endif; ?>
            </div>
       
        </div>
        
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
                    <div class="clearfix product_main_content">
                        <?php do_action('woocommerce_single_product_summary'); ?>
                    </div>
                    <div class="attr-detail attr-size mb-15">
                        <div class="product_meta_same smae_meta">
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