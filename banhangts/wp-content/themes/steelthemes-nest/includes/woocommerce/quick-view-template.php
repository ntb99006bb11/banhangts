<?php
function quick_view_get(){
    global $woocommerce;
    global $product;
$product_type = get_post_meta(get_the_ID() , 'product_type', true);
$product_mfg = get_post_meta(get_the_ID() , 'product_mfg', true);
$product_life = get_post_meta(get_the_ID() , 'product_life', true);
?>
<div class="woocommerce quick_view">
    <div class="default_single_product product-detail accordion-detail srollbar">
        <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <?php do_action('woocommerce_nest_product_image_box'); ?>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="summary entry-summary detail-info pr-30 pl-30">

                        <?php woocommerce_show_product_sale_flash(); ?>

                        <?php woocommerce_template_single_title(); ?>
                        <div class="product-detail-rating">
                            <div class="product-rate-cover text-end">
                                <?php woocommerce_template_single_rating(); ?>
                            </div>
                        </div>
                        <div class="clearfix product-price-cover">
                            <div class="product-price primary-color float-left">
                                <div class="current-price text-brand"> <?php woocommerce_template_single_price(); ?>
                                </div>
                                <div class="save-price font-md color3 ml-15"><?php nest_sales_percentage_only();  ?>
                                </div>
                            </div>
                        </div>
                        <div class="short-desc mb-30">
                            <?php woocommerce_template_single_excerpt(); ?>
                        </div>

                        <div class="detail-extralink clearfix mb-50">
                            <?php woocommerce_template_single_add_to_cart(); ?>
                        </div>
                        <div class="attr-detail attr-size mb-30">
                            <div class="product_meta_same smae_meta">
                                <?php if(!empty($product_type) || !empty($product_mfg) || !empty($product_life)): ?>
                                <div class="product_meta right_move">
                                    <?php if(!empty($product_type)): ?>
                                    <span class="pro_typ"><?php echo esc_html__('Type:', 'steelthemes-nest'); ?>
                                        <span class="sku"><?php echo esc_attr($product_type); ?></span></span>
                                    <?php endif; ?>
                                    <?php if(!empty($product_mfg)): ?>
                                    <span class="pro_mfg"><?php echo esc_html__('MFG:', 'steelthemes-nest'); ?>
                                        <span class="sku"><?php echo esc_attr($product_mfg); ?></span></span>
                                    <?php endif; ?>
                                    <?php if(!empty($product_life)): ?>
                                    <span class="pro_life"><?php echo esc_html__('LIFE:', 'steelthemes-nest'); ?>
                                        <span class="sku"><?php echo esc_attr($product_life); ?></span></span>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <?php woocommerce_template_single_meta(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     

        </div>

    </div>
</div>
<?php
}