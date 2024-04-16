<?php
/*
** ============================== 
**   Nest Ecommerce Header Source
** ==============================
*/
add_action('pre_loader',  'nest_preloader'); 
add_action('nest_custom_search_setup',  'nest_simple_search'); 
add_filter('get_the_archive_title', 'nest_the_archive_title');
add_action('nest_custom_header_search' , 'nest_header_simple_search');
 /*
** ============================== 
**  preloader
** ============================== 
*/   
function nest_preloader(){
global $nest_theme_mod;
$preloader_image = '';
if(!empty($nest_theme_mod['preloader_image'])):
$preloader_image = $nest_theme_mod['preloader_image']['url'];
else:
$preloader_image =  get_template_directory_uri().'/assets/images/loading.gif'; 
endif;
?>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="<?php echo esc_url($preloader_image); ?>" alt="preloader" />
            </div>
        </div>
    </div>
</div>
<?php
}   
/*
** ============================== 
**  nest_the_archive_title
** ============================== 
*/
function nest_the_archive_title($title){
if(is_search()):
    $title = sprintf(esc_html__('Search Results', 'steelthemes-nest'));
    elseif(is_404()):
        $title = sprintf(esc_html__('Page Not Found', 'steelthemes-nest'));
    elseif(is_page()):
        $title = get_the_title();
    elseif(is_single()):
        $title = get_the_title();
    elseif (is_home() && is_front_page()):
        $title = esc_html__('The Latest Posts', 'steelthemes-nest');
    elseif (is_home() && !is_front_page()):
        $title = get_the_title(get_option('page_for_posts'));
    elseif(is_singular('product')):
        $title = get_the_title(get_the_ID());
    elseif(is_tax() || is_category()  || is_tag()):
        $title = single_term_title('', false);
    elseif(is_singular('post')):
        $title = get_the_title(get_the_ID());
    elseif(function_exists( 'dokan_is_store_page' ) && dokan_is_store_page()):
        $store_user = wcfmmp_get_store( get_query_var( 'author' ) );
        $store_info = $store_user->get_shop_info();
        $title = $store_info['store_name'];
    elseif(function_exists( 'wcfm_is_store_page' ) && wcfm_is_store_page()):
        $store_user   = dokan()->vendor->get( get_query_var( 'author' ) );
        $title = $store_user->get_shop_name();
    elseif(is_post_type_archive('service')):
        $services_page_id = get_option('st_services_page_id');
        if($services_page_id && get_post($services_page_id)):
            $title = get_the_title($services_page_id);
        else:
            $title = esc_html__('Service',  'steelthemes-nest');
        endif;
    elseif(is_post_type_archive('product')):
        $product_page_id = get_option('st_product_page_id');
        if($product_page_id && get_post($product_page_id)):
            $title = get_the_title($product_page_id);
        else:
            $title = esc_html__('Product',  'steelthemes-nest');
    endif;
endif;
return $title;
}
/*
** ============================== 
**  Simple Serch
** ============================== 
*/
function nest_simple_search() { ?>
<form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
    <input type="search" class="search" placeholder="<?php echo esc_attr__( 'Search...', 'steelthemes-nest' ); ?>"
        value="<?php echo get_search_query() ?>" name="s" title="Search" />
    <button type="submit" class="sch_btn"> <i class="icon-search"></i></button>
</form>
<?php 
} 