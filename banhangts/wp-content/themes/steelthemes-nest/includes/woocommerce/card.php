<?php 
/*
* ==============================   
**   Product Card 
**==============================
*/

/*
**==============================   
**  Nest_get_star_rating
**==============================
*/
add_action('get_nest_get_star_rating', 'nest_get_star_rating');
function nest_get_star_rating(){
    global $woocommerce, $product;
    $average = $product->get_average_rating();
    $ratingcount = $product->get_review_count();
    echo '<div class="product-rate-cover">
    <div class="product-rate d-inline-block"><span class="star-rating"><span style="width:'.( ( esc_attr($average) / 5 ) * 100 ) . '%"><strong  class="rating">'.esc_attr($average).'</strong> '.__( 'out of 5', 'steelthemes-nest' ).'</span></span> <span class="font-small ml-5 text-muted"> ' .esc_attr($ratingcount).'</span></div></div>';
}  

/*
* ==============================   
**   Product store name
**==============================
*/
add_action( 'get_nest_product_store_name' , 'nest_product_store_name' );
function nest_product_store_name(){
    global $product;
    $porduct_store_name = get_post_meta(get_the_ID() , 'porduct_store_name', true);
    $porduct_store_link = get_post_meta(get_the_ID() , 'porduct_store_link', true);
     if(!empty($porduct_store_name)): ?>
<div class="vendord">
    <span class="font-small text-muted"><?php echo esc_html__('By' , 'steelthemes-nest') ?>
        <a href="<?php if(!empty($porduct_store_link)): ?><?php echo esc_attr($porduct_store_link); else: echo esc_html('#','steelthemes-nest'); endif;?>"
            target="_blank">
            <?php echo esc_attr($porduct_store_name); ?>
        </a></span>
</div>
<?php
  
endif;  
}

/*
* ==============================   
**   Product Hover Image 
**==============================
*/
add_action( 'get_nest_hover_product_image' , 'nest_hover_product_image' );
function nest_hover_product_image(){
    global $product;
$product_hover_images =   get_post_meta(get_the_ID() , 'hover_product_image', true); 
$product_hover_images =   get_post_meta(get_the_ID() , 'hover_product_image', true);  
$porduct_store_name = get_post_meta(get_the_ID() , 'porduct_store_name', true);
$porduct_store_link = get_post_meta(get_the_ID() , 'porduct_store_link', true);
if(is_array($product_hover_images) || is_object($product_hover_images)):
    if(!empty($product_hover_images['url'])): 
?>
<img src="<?php echo esc_url($product_hover_images['url']); ?>" class="hover-img" alt="<?php the_title(); ?>">
<?php
endif; endif;
 
}
/*
* ==============================   
**   Product Card Style One
**==============================
*/
add_action( 'get_nest_product_card_one' , 'nest_product_card_one' );
function nest_product_card_one(){
    global $product;
 
    ?>
<div class="product_wrapper product-cart-wrap style_one">
    <div class="product-img-action-wrap">
        <div class="product-img product-img-zoom">
            <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>">
                <?php echo woocommerce_get_product_thumbnail('default-img'); ?>
                <?php do_action('get_nest_hover_product_image'); ?>
            </a>
        </div>
        <?php nest_product_action_button(); ?>
        <div class="product-badges product-badges-position product-badges-mrg">
            <?php  do_action('get_nest_sales_badges'); ?>
        </div>
    </div>
    <div class="product-content-wrap">
        <div class="product-category">
            <?php do_action('get_nest_current_product_category'); ?>
        </div>
        <h2><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h2>
            <?php  do_action('get_nest_get_star_rating'); ?>
                <?php do_action('get_nest_product_store_name') ?>
               
        <div class="product-card-bottom">
            <div class="product-price">
                <?php woocommerce_template_loop_price(); ?>
            </div>
            <div class="add-cart">
                <?php  woocommerce_template_loop_add_to_cart(); ?>

            </div>
        </div>
    </div>


</div>
<?php
 }

 /*
* ==============================   
**   Product Card Style One
**==============================
*/
add_action( 'get_nest_product_card_onesold' , 'nest_product_card_one_sold' );
function nest_product_card_one_sold(){
    global $product;
 
    ?>
<div class="product_wrapper product-cart-wrap style_one">
    <div class="product-img-action-wrap">
        <div class="product-img product-img-zoom">
            <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>">
                <?php echo woocommerce_get_product_thumbnail('default-img'); ?>
                <?php do_action('get_nest_hover_product_image'); ?>
            </a>
        </div>
        <?php nest_product_action_button(); ?>
        <div class="product-badges product-badges-position product-badges-mrg">
            <?php  do_action('get_nest_sales_badges'); ?>
        </div>
    </div>
    <div class="product-content-wrap">
        <div class="product-category">
            <?php do_action('get_nest_current_product_category'); ?>
        </div>
        <h2><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h2>
            <?php  do_action('get_nest_get_star_rating'); ?>
                <?php do_action('get_nest_product_store_name') ?>
                <?php do_action('get_nest_shop_product_sold_count'); ?>
        <div class="product-card-bottom">
            <div class="product-price">
                <?php woocommerce_template_loop_price(); ?>
            </div>
            <div class="add-cart">
                <?php  woocommerce_template_loop_add_to_cart(); ?>

            </div>
        </div>
    </div>


</div>
<?php
 }

/*
* ==============================   
**   Product Card Style One
**==============================
*/
add_action( 'get_nest_product_card_two' , 'nest_product_card_two' );
function nest_product_card_two(){
    global $product;
?>
<div class="product_wrapper product-cart-wrap style_two">
    <div class="product-img-action-wrap">
        <div class="product-img product-img-zoom">
            <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>">
                <?php echo woocommerce_get_product_thumbnail('default-img'); ?>
                <?php do_action('get_nest_hover_product_image'); ?>
            </a>
        </div>
        <?php nest_product_action_button(); ?>
        <div class="product-badges product-badges-position product-badges-mrg">
            <?php  do_action('get_nest_sales_badges'); ?>
        </div>
    </div>
    <div class="product-content-wrap">
        <div class="product-category">
            <?php do_action('get_nest_current_product_category'); ?>
        </div>
        <h2><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h2>
        <?php  do_action('get_nest_get_star_rating'); ?>
        <div class="product-price mt-10">
            <?php woocommerce_template_loop_price(); ?>
        </div>

        <?php do_action('get_nest_shop_product_sold_count'); ?>

        <div class="position-relative mt-10">
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
    </div>
</div>

<?php
 }

/*
* ==============================   
**   Product Card Style Three
**==============================
*/
add_action( 'get_nest_product_card_three' , 'nest_product_card_three' );
function nest_product_card_three(){
    global $product;
?>
<div class="product-list-small product_wrapper style_three_list  animated animated">
    <article class="d-flex align-items-center hover-up">
        <div class="col-md-4 pr-15 mb-0">
            <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>">
                <?php echo woocommerce_get_product_thumbnail('default-img'); ?>
            </a>
        </div>
        <div class="col-md-8 mb-0">
            <h6 class="pro_title"><a
                    href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h6>

            <?php  do_action('get_nest_get_star_rating'); ?>

            <div class="product-price">
                <?php woocommerce_template_loop_price(); ?>
            </div>

        </div>
    </article>
</div>

<?php
 }


 /*
* ==============================   
**   Product Card Style four
**==============================
*/

add_action( 'get_nest_product_card_four' , 'nest_product_card_four' );
function nest_product_card_four(){
    global $product;
    $myexcerpt = wp_trim_words(get_the_excerpt());  
?>
<div class="product-list">
    <div class="product-cart-wrap product_wrapper product_list_type">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <div class="product-img-inner">
                    <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>">
                        <?php echo woocommerce_get_product_thumbnail('default-img'); ?>
                        <?php do_action('get_nest_hover_product_image') ?>
                    </a>
                </div>
            </div>
            <?php nest_product_action_button(); ?>
            <div class="product-badges product-badges-position product-badges-mrg">
            <?php  do_action('get_nest_sales_badges'); ?>
            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category">
                <?php do_action('get_nest_current_product_category'); ?>
            </div>
            <h2><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h2>
            <?php  do_action('get_nest_get_star_rating'); ?>
            <div class="mt-15 mb-20">
                <?php echo esc_attr($myexcerpt); ?>
            </div>

            <div class="product-price">
                <?php woocommerce_template_loop_price(); ?>
            </div>
            <div class="mt-30  align-items-center d-inline-block  position-relative">
                <?php woocommerce_template_loop_add_to_cart(); ?>
            </div>
        </div>
    </div>
</div>
<?php
 }

  /*
* ==============================   
**   Product Card Style Five
**==============================
*/

add_action( 'get_nest_product_card_five' , 'nest_product_card_five' );
function nest_product_card_five(){
    global $product;
 
?>
 
    <div class="product_style_five product-cart-wrap product_wrapper">
    <div class="product-img-inner">
                    <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>">
                        <?php echo woocommerce_get_product_thumbnail('default-img'); ?>
                        <?php do_action('get_nest_hover_product_image') ?>
                    </a>
                    <div class="product-badges">
                    <?php  do_action('get_nest_sales_badges'); ?>
                    </div>
                </div>
        <div class="product-content-wrap">
        <?php  do_action('get_nest_get_star_rating'); ?>
            <h5><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h5>
             
            <div class="product-price">
                <?php woocommerce_template_loop_price(); ?>
            </div>
            <div class="mt-10  align-items-center d-inline-block  position-relative">
                <?php woocommerce_template_loop_add_to_cart(); ?>
                <?php nest_product_action_button(); ?>
              
            </div>
        </div>
    </div>
 
<?php
 }
/*
* ==========================================   
**   woocommerce single product card two
**=========================================
*/
function nest_product_single_archive_card_one() {
    global $product;
    ?>
<div class="product_singleized product_wrapper  product-cart-wrap style_one woocommerce-product-gallery--with-images images">
    <figure class="woocommerce-product-gallery__wrapper">
        <?php  $post_thumbnail_id = $product->get_image_id();
                if ( $post_thumbnail_id ) {
                    $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
                } else {
                    $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
                    $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'steelthemes-nest' ) );
                    $html .= '</div>';
                }
                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
            ?>
        <div class="product-badges">
        <?php  do_action('get_nest_sales_badges'); ?>
        </div>
        <?php nest_product_action_button(); ?> 
    </figure>
    <div class="content_mained product-content-wrap">
        <?php  do_action('get_nest_get_star_rating'); ?>
        <h2><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h2>
        <div class="product-price">
        <?php woocommerce_template_single_price(); ?>
            </div>
        <div class="on_hover">
            <div class="carted">
                <?php woocommerce_template_single_add_to_cart(); ?>
            </div>
        </div>
    </div>
</div>
<?php
   
}

add_action('get_nest_product_single_card_one' , 'nest_product_single_archive_card_one' , 15, 9);

/*
* ==========================================   
**   woocommerce single product card two
**=========================================
*/
function nest_product_single_archive_card_two() {
    global $product;
    ?>
<div class="product_singleized  product_wrapper style_two woocommerce-product-gallery--with-images images">
    <figure class="woocommerce-product-gallery__wrapper">
        <?php  $post_thumbnail_id = $product->get_image_id();
                    if ( $post_thumbnail_id ) {
                        $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
                    } else {
                        $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
                        $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'steelthemes-nest' ) );
                        $html .= '</div>';
                    }
                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
                ?>
    </figure>

    <div class="content_mained">
        <?php nest_product_action_button(); ?>
        <?php  do_action('get_nest_get_star_rating'); ?>
        <h2><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h2>
        <?php do_action('get_nest_current_product_category'); ?>
        <?php woocommerce_template_single_price(); ?>
        <div class="carted">
            <?php woocommerce_template_single_add_to_cart(); ?>
        </div>
    </div>
</div>
<?php
}
add_action('get_nest_product_single_card_two' , 'nest_product_single_archive_card_two');




 
