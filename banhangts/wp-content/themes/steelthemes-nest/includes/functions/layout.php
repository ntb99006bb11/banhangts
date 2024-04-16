<?php
/*
** ============================== 
**   Nest Ecommerce Layout
** ==============================
*/
/*
======================================
Display page header
======================================
*/
if(!function_exists('nest_has_page_header')):
/*
** Check ifcurrent page has page header
** @return bool && get_post_meta(get_the_ID() , 'page_header_enable_disable', true))
*/
function nest_has_page_header(){
     global $nest_theme_mod;
     $page_header_options = '';
     if(!empty($nest_theme_mod['page_header_enable'])):
        $page_header_options =  $nest_theme_mod['page_header_enable'];
     endif;
        if((is_page()  || is_singular(array('project' , 'service' , 'post' , 'product'))) && get_post_meta(get_the_ID() , 'page_header_enable_disable', true)):
            return false;
        elseif(is_singular('mega-menu')):
            return false;
        elseif(is_singular('header')):
            return false;
        elseif(is_singular('sticky_header')):
            return false;
        elseif(is_singular('footer')):
            return false;
        elseif(is_page_template('template-homepage.php')):
            return false;
        elseif(is_page_template('template-blog.php')):
            return false;
        elseif(is_attachment()):
            return false;
        endif;
        return $page_header_options;
    }
endif;
/*
======================================
Display page header Image
======================================
*/
if(!function_exists('nest_get_page_header_image')):
    /**
    * Get page header image URL
    * @return string
    */
    function nest_get_page_header_image(){   
         global $nest_theme_mod;
            if(!nest_has_page_header()){
                return '';
            }
            if((is_page()  || is_singular(array('post' , 'product')) || is_post_type_archive('product') || is_tax() || is_tag() || is_day() || is_year() || is_month()  || is_tax( 'product_cat') || is_category())){
                $page_header_bgimages = '';
                if(!empty($nest_theme_mod['page_header_bg_image']['url'])):
                    $page_header_bgimages = $nest_theme_mod['page_header_bg_image']['url'];
                endif;
                if(get_post_meta(get_the_ID() , 'page_header_bg_image_showss', true) == true){
                    $page_pg_image = get_post_meta(get_the_ID() , 'page_header_bgimage', true);
                    $page_header_bgimages =  $page_pg_image['url'];
                }
            if(!empty($page_header_bgimages)):
            ?>
             <div class="bakground_cover"> 
                <img src="<?php echo esc_url($page_header_bgimages); ?>" alt="<?php echo esc_attr('bg_image' , 'steelthemes-nest'); ?>"  class="cover-parallax" />
            </div>
            <?php
        endif;
             
            } 
            
        else{
            $page_header_blog = '';
            if(!empty($nest_theme_mod['blog_page_header_bg_image']['url'])):
                $page_header_blog = $nest_theme_mod['blog_page_header_bg_image']['url'];
            endif;
            if(!empty($page_header_blog)):
            ?>
                <div class="bakground_cover"> 
                    <img src="<?php echo esc_url($page_header_blog); ?>" alt="<?php echo esc_attr('bg_image' , 'steelthemes-nest'); ?>"  class="cover-parallax" />
                </div>
                <?php
            endif;  
               
        
    }  
}
endif;
/*
======================================
Display Columns
======================================
*/
if(!function_exists('nest_get_layout')):
/*
**Get Column base on current page
** @return string
*/
function nest_get_layout(){
    global $nest_theme_mod;
    global $post;
    $nest_layout = '';
    $page_layouts = '';
    $product_layouts = '';
    $product_archive_layouts = '';
    if(!empty($nest_theme_mod['default_layouts'])):
        $nest_layout = $nest_theme_mod['default_layouts'];
    endif;
    if(!empty($nest_theme_mod['page_layouts'])):
        $page_layouts =  $nest_theme_mod['page_layouts'];
    endif;
    if(!empty($nest_theme_mod['product_layouts'])):
        $product_layouts =  $nest_theme_mod['product_layouts'];
    endif;
    if(!empty($nest_theme_mod['product_archive_layouts'])):
        $product_archive_layouts =  $nest_theme_mod['product_archive_layouts'];
    endif;
    

    if(is_singular() && get_post_meta(get_the_ID() , 'custom_layout', true)):
        $nest_layout = get_post_meta(get_the_ID() , 'layout', true);
    elseif(is_page()):
        $nest_layout =   $page_layouts;
    elseif(is_404()):
        $nest_layout = 'no-sidebar';
    elseif(is_post_type_archive('product')  || is_tax('product_cat') ):
        $nest_layout =  $product_archive_layouts;
    elseif(is_singular('product')):
        $nest_layout =  $product_layouts;
    elseif ( function_exists( 'wcfm_is_store_page' ) && wcfm_is_store_page() ):
            $nest_layout = 'no-sidebar';
    elseif ( function_exists( 'dokan_is_store_page' ) && dokan_is_store_page() ):
        $nest_layout = 'no-sidebar';
    endif;
return $nest_layout;
}
endif;
/*
======================================
Display Columns
======================================
*/
if(!function_exists('nest_get_content_columns')):
/*
**Get CSS classes for content columns output
**@param string $layout
**@return array
*/
function nest_get_content_columns($nest_layout = null){
    $nest_layout = $nest_layout ? $nest_layout : nest_get_layout();
    if('no-sidebar' == $nest_layout):
        echo esc_html__('no_column' , 'steelthemes-nest');
    else:
        echo esc_html__('col-lg-9 col-md-12 col-sm-12 col-xs-12', 'steelthemes-nest');
    endif;  
   }
endif;

if(!function_exists('nest_column_for_page')):
    function nest_column_for_page(){
        if(is_active_sidebar('page-sidebar')):
            nest_get_content_columns();
        elseif(!is_active_sidebar('page-sidebar')):
            echo esc_html('no_column no_sidebar', 'steelthemes-nest');
        endif;
    }
endif;

if(!function_exists('nest_column_for_service')):
    function nest_column_for_service(){
        if(is_active_sidebar('service-sidebar')):
            nest_get_content_columns();
        elseif(!is_active_sidebar('service-sidebar')):
            echo esc_html('no_column no_sidebar', 'steelthemes-nest');
        endif;
    }
endif;

if(!function_exists('nest_column_for_blog')):
    function nest_column_for_blog(){
        if(is_active_sidebar('sidebar-blog')):
            nest_get_content_columns();
        elseif(!is_active_sidebar('sidebar-blog')):
            echo esc_html('no_column', 'steelthemes-nest');
        endif;
    }
endif;
   
if (!function_exists('nest_column_for_shop')):
    function nest_column_for_shop(){
        if(is_active_sidebar('shop-sidebar')):
            nest_get_content_columns();
        elseif(!is_active_sidebar('shop-sidebar')):
            echo esc_html('no_column no_sidebar', 'steelthemes-nest');
        endif;
    }
endif;