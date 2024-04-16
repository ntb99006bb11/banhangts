<?php
/*
 *=================================
 * Theme Options
 * Contains Redux Option Output
 * @package nest WordPress Theme
 *==================================
*/
/*--------------------------Enqueues front-end CSS for theme customization-----------------*/
add_action('wp_enqueue_scripts', 'nest_customize_css' );
function nest_customize_css(){
 
global $nest_theme_mod;
  global $product;
global $post;
global $woocommerce;
$customize_css = '';
  
if(!empty($nest_theme_mod['theme_setttings_enable']) == true):
/*--=========Theme Color Settings============--*/

        /*--============= Theme Font Family Common Settings ============--*/
        $font_familt_commoncss = '';
        $font_familt_common = $nest_theme_mod['font_familt_default_one']['font-family'];
        $font_familt_commoncss = $font_familt_common ?  $font_familt_common  : '';
        if(!empty($font_familt_commoncss)){
          $customize_css .= ':root   {--font-heading:' . $font_familt_commoncss . '!important}';
        }
         
        $font_familt_common_twocss = '';
        $font_familt_common_two = $nest_theme_mod['font_familt_second_one']['font-family'];
        $font_familt_common_twocss = $font_familt_common_two ?  $font_familt_common_two  : '';
        if(!empty($font_familt_common_twocss)){
        $customize_css .= ':root   {--font-text:' . $font_familt_common_twocss . '!important}';
        }
        /*--============= Theme Font Family Common Settings end ============--*/
        
      

    /*--========= Theme Color Settings one ============--*/
    $theme_color_one = '';
    $theme_color_one_css = '';
    if(!empty($nest_theme_mod['theme_color_one'])):
    $theme_color_one = $nest_theme_mod['theme_color_one'];
    endif;
    $theme_color_one_css = $theme_color_one;
    if(!empty($theme_color_one_css)){

        $customize_css .= ':root   {--color-brand:' . $theme_color_one_css . '!important}';
    } 
    /*--========= Theme Color Settings Two end ============--*/
    $theme_color_two = '';
    if(!empty($nest_theme_mod['theme_color_two'])):
    $theme_color_two = $nest_theme_mod['theme_color_two'];
    endif;
    $theme_color_two_css = $theme_color_two;
    if(!empty($theme_color_two_css)){
        $customize_css .= ':root   {--color-brand-dark:' . $theme_color_two_css . '!important; }';
    } 
    /*--========= Theme Color Settings Two end ============--*/

    /*--========= Theme Color Settings Three  ============--*/
     $theme_color_three = '';
     if(!empty($nest_theme_mod['theme_color_three'])):
     $theme_color_three = $nest_theme_mod['theme_color_three'];
     endif;
     $theme_color_three_css = $theme_color_three;
     if(!empty($theme_color_three_css)){
        $customize_css .= ':root   {--color-brand-2:' . $theme_color_three_css . '!important; }';
     } 
     /*--========= Theme Color Settings Three end ============--*/


     /*--========= Theme background Color Settings one  ============--*/
     $theme_bgcolor_one = '';
     if(!empty($nest_theme_mod['theme_bgcolor_one'])):
     $theme_bgcolor_one = $nest_theme_mod['theme_bgcolor_one'];
     endif;
     $theme_bgcolor_one_css = $theme_bgcolor_one;
     if(!empty($theme_bgcolor_one_css)){
        $customize_css .= ':root   {--background-1:' . $theme_bgcolor_one_css . '!important; }';
     } 
     /*--========= Theme background Color Settings one end ============--*/

      /*--========= Theme background Color Settings Two  ============--*/
      $theme_bgcolor_two = '';
      if(!empty($nest_theme_mod['theme_bgcolor_two'])):
      $theme_bgcolor_two = $nest_theme_mod['theme_bgcolor_two'];
      endif;
      $theme_bgcolor_two_css = $theme_bgcolor_two;
      if(!empty($theme_bgcolor_two_css)){
         $customize_css .= ':root   {--background-2:' . $theme_bgcolor_two_css . '!important; }';
      } 
      /*--========= Theme background Color Settings Two end ============--*/

      
      /*--========= Theme background Color Settings TwThreeo  ============--*/
      $theme_bgcolor_three = '';
      if(!empty($nest_theme_mod['theme_bgcolor_three'])):
      $theme_bgcolor_three = $nest_theme_mod['theme_bgcolor_three'];
      endif;
      $theme_bgcolor_three_css = $theme_bgcolor_three;
      if(!empty($theme_bgcolor_three_css)){
         $customize_css .= ':root   {--background-3:' . $theme_bgcolor_three_css . '!important; }';
      } 
      /*--========= Theme background Color Settings Two end ============--*/


  /*--========= Theme Heading Color Settings TwThreeo  ============--*/
  $heading_color = '';
  if(!empty($nest_theme_mod['heading_color'])):
  $heading_color = $nest_theme_mod['heading_color'];
  endif;
  $heading_color_css = $heading_color;
  if(!empty($heading_color_css)){
     $customize_css .= ':root   {--color-heading:' . $heading_color_css . '!important; }';
  } 
  /*--========= Theme Heading Color Settings Two end ============--*/

  /*--========= Theme description Color Settings TwThreeo  ============--*/
  $description_color = '';
  if(!empty($nest_theme_mod['description_color'])):
  $description_color = $nest_theme_mod['description_color'];
  endif;
  $description_color_css = $description_color;
  if(!empty($description_color_css)){
     $customize_css .= ':root   {--color-text:' . $description_color_css . '!important;  --color-body:' . $description_color_css . '!important; --color-grey-4 :' . $description_color_css . '!important; }';
  } 
  /*--========= Theme description Color Settings Two end ============--*/
      
  /*--========= Theme Border Color Settings One  ============--*/
  $border_color = '';
  if(!empty($nest_theme_mod['border_color'])):
  $border_color = $nest_theme_mod['border_color'];
  endif;
  $border_color_css = $border_color;
  if(!empty($border_color_css)){
     $customize_css .= ':root   {--border-color:' . $border_color_css . '!important; }';
  } 
  /*--========= Theme Border Color Settings One end ============--*/

    /*--========= Theme Border Color  Settings Two  ============--*/
    $border_color_two = '';
    if(!empty($nest_theme_mod['border_color_two'])):
    $border_color_two = $nest_theme_mod['border_color_two'];
    endif;
    $border_color_two_css = $border_color_two;
    if(!empty($border_color_two_css)){
       $customize_css .= ':root   {--border-color-2:' . $border_color_two_css . '!important; }';
    } 
    /*--========= Theme Border Color Settings Two end ============--*/

 

endif;


/*--=========page header color============--*/
$page_header_bg = '';
if(!empty($nest_theme_mod['pageheader_bg_color'])){
    $page_header_bg = $nest_theme_mod['pageheader_bg_color'];
}
$page_header_bg_custom  = $page_header_bg;
if(get_post_meta(get_the_ID() , 'page_header_bgcolor', true) && is_page() || is_singular(array('post','project' ,'product','service'))){
    $page_header_bg_custom = get_post_meta(get_the_ID() , 'page_header_bgcolor', true);
}

$page_header_bg_css = $page_header_bg_custom ? 'background-color:' . $page_header_bg_custom . ' ' : '';
if(!empty($page_header_bg_css)){
    $customize_css .= ' .page-header .archive-header , .page_header_default {' . $page_header_bg_css . '!important}';
}
 
/*--=========page header color============--*/
/*--========= pageheader title color ============--*/
$pageheader_title_color = '';
if(!empty($nest_theme_mod['pageheader_title_color'])):
    $pageheader_title_color = $nest_theme_mod['pageheader_title_color'];
endif;
$pageheader_title_color_css = $pageheader_title_color;
if(!empty($pageheader_title_color_css)){
    $customize_css .= '.page_header_content .banner_title_inner h1 , .page-header.style_two  h1  {color:' . $pageheader_title_color_css . '!important; }';
} 
/*--========= pageheader title color ============--*/
 
 /*--========= breadcrumb color title color ============--*/
$pageheader_breadcrumb_color = '';
if(!empty($nest_theme_mod['pageheader_breadcrumb_color'])):
    $pageheader_breadcrumb_color = $nest_theme_mod['pageheader_breadcrumb_color'];
endif;
$pageheader_breadcrumb_color_css = $pageheader_breadcrumb_color;
if(!empty($pageheader_breadcrumb_color_css)){
    $customize_css .= ' .breadcrumb li a , .breadcrumb li a::before {color:' . $pageheader_breadcrumb_color_css . '!important; }';
} 
/*--========= breadcrumb title color ============--*/


 /*--========= breadcrumb active color title color ============--*/
 $pageheader_breadcrumb_active_color = '';
 if(!empty($nest_theme_mod['pageheader_breadcrumb_active_color'])):
     $pageheader_breadcrumb_active_color = $nest_theme_mod['pageheader_breadcrumb_active_color'];
 endif;
 $pageheader_breadcrumb_active_colorr_css = $pageheader_breadcrumb_active_color;
 if(!empty($pageheader_breadcrumb_active_colorr_css)){
     $customize_css .= ' .breadcrumb li {color:' . $pageheader_breadcrumb_active_colorr_css . '!important; }';
 } 
 /*--========= breadcrumb active title color ============--*/


  /*--========= breadcrumb active color title color ============--*/
  $pageheader_breadcrumb_active_color = '';
  if(!empty($nest_theme_mod['pageheader_breadcrumb_active_color'])):
      $pageheader_breadcrumb_active_color = $nest_theme_mod['pageheader_breadcrumb_active_color'];
  endif;
  $pageheader_breadcrumb_active_colorr_css = $pageheader_breadcrumb_active_color;
  if(!empty($pageheader_breadcrumb_active_colorr_css)){
      $customize_css .= ' .breadcrumb li {color:' . $pageheader_breadcrumb_active_colorr_css . '!important; }';
  } 
  /*--========= breadcrumb active title color ============--*/


  /*--========= breadcrumb active color title color ============--*/
  $pageheader_tag_color = '';
  if(!empty($nest_theme_mod['pageheader_tag_color'])):
      $pageheader_tag_color = $nest_theme_mod['pageheader_tag_color'];
  endif;
  $pageheader_tag_color_css = $pageheader_tag_color;
  if(!empty($pageheader_tag_color_css)){
      $customize_css .= ' .tags-list li a {color:' . $pageheader_tag_color_css . '!important; }';
  } 
  /*--========= breadcrumb active title color ============--*/

  /*--========= breadcrumb active color title color ============--*/
  $pageheader_tah_bg_color = '';
  if(!empty($nest_theme_mod['pageheader_tah_bg_color'])):
      $pageheader_tah_bg_color = $nest_theme_mod['pageheader_tah_bg_color'];
  endif;
  $pageheader_tah_bg_color_css = $pageheader_tah_bg_color;
  if(!empty($pageheader_tah_bg_color_css)){
      $customize_css .= ' .tags-list li a {background:' . $pageheader_tah_bg_color_css . '!important; }';
  } 
  /*--========= breadcrumb active title color ============--*/
  
  $pageheader_tag_border_color = '';
  if(!empty($nest_theme_mod['pageheader_tag_border_color'])):
      $pageheader_tag_border_color = $nest_theme_mod['pageheader_tag_border_color'];
  endif;
  $pageheader_tag_border_color_css = $pageheader_tag_border_color;
  if(!empty($pageheader_tag_border_color_css)){
      $customize_css .= ' .tags-list li a {border-color:' . $pageheader_tag_border_color_css . '!important; }';
  } 
  /*--========= breadcrumb active title color ============--*/


  /*------=======layout_width_enable======------*/
  if(!empty($nest_theme_mod['layout_width_enable']) == true):
    $layout_width_control = '';
    if(!empty($nest_theme_mod['layout_width_control'])):
        $layout_width_control = $nest_theme_mod['layout_width_control'];
    endif;
    $customize_css .= '.container {max-width:'.$layout_width_control.'!important;}';
endif;    
/*------=======dokan_logo_width======------*/
if(!empty($nest_theme_mod['dokan_logo_width']['width'])):
    $dokan_logo_width = '';
    if(!empty($nest_theme_mod['dokan_logo_width'])):
        $dokan_logo_width = $nest_theme_mod['dokan_logo_width']['width'];
    endif;

    $customize_css .= '.logo_dokan_dash img {width:'.$dokan_logo_width.'!important;}';
endif; 
/*------=======pre_loader_background======------*/
if(!empty($nest_theme_mod['preloader_enables']) == true):
    $pre_loader_background = '';
    if(!empty($nest_theme_mod['pre_loader_background'])):
        $pre_loader_background = $nest_theme_mod['pre_loader_background'];
    endif;
    $pre_loader_background_css = $pre_loader_background;
    if(!empty($pre_loader_background_css)):
    $customize_css .= '#preloader-active {background-color:'.$pre_loader_background_css.'!important;}';
endif; 
endif; 


/*------=======pre_loader_background======------*/
if(get_post_meta(get_the_ID() , 'body_css_enable', true) == true): 
    $padding_for_body = get_post_meta(get_the_ID() , 'padding_for_body', true);
    if(!empty($padding_for_body)):
        $customize_css .= 'body {padding:'.$padding_for_body.'!important;}';
    endif;

    $padding_for_body_mb = get_post_meta(get_the_ID() , 'padding_for_body_mb', true);
    if(!empty($padding_for_body_mb)):
        $customize_css .= '@media(max-width:992px){ body {padding:'.$padding_for_body_mb.'!important;} }';
    endif;
endif; 


$body_bg_image ='';
    if(!empty($nest_theme_mod['theme_bg_image'])): 
        $body_bg_image = $nest_theme_mod['theme_bg_image']['url'];
    endif;
    if(get_post_meta(get_the_ID() , 'body_css_enable', true) == true): 
        if(get_post_meta(get_the_ID() , 'bg_image_or_color', true) == 'background_image'):
            $body_bg_images = get_post_meta(get_the_ID() , 'body_bg_image', true);
            $body_bg_image = $body_bg_images['url'];
        endif;
    endif;

$body_bg_imagecss =  $body_bg_image;
if(!empty($body_bg_imagecss)):
    $customize_css .= 'body {background-image:url('.$body_bg_imagecss.')!important; background-size:cover; background-repeat:no-repeat;
    background-position:center; }';
endif;

$body_bg_color = '';
 
    if(!empty($nest_theme_mod['theme_bg_color'])):
        $body_bg_color = $nest_theme_mod['theme_bg_color'];
    endif;
 
if(get_post_meta(get_the_ID() , 'body_css_enable', true) == true):
    if(get_post_meta(get_the_ID() , 'bg_image_or_color', true) == 'background_color'):
        $body_bg_color = get_post_meta(get_the_ID() , 'body_bg_color', true);
    endif;
endif; 

if(!empty($body_bg_color)):
    $customize_css .= 'body {background:'.$body_bg_color.'!important}';
endif;

/*------=======deals text======------*/

if(!empty($nest_theme_mod['deal_day'])):
        $deal_day = $nest_theme_mod['deal_day'];
    $deal_daycss = $deal_day;
    if(!empty($deal_daycss)):
        $customize_css .= '.countdown-period.days:before {content:"'.$deal_daycss.'"!important;}';
    endif; 
endif; 

if(!empty($nest_theme_mod['deal_hours'])):
    $deal_hours = $nest_theme_mod['deal_hours'];
$deal_hourscss = $deal_hours;
if(!empty($deal_hourscss)):
    $customize_css .= '.countdown-period.hours:before {content:"'.$deal_hourscss.'"!important;}';
endif; 
endif; 

if(!empty($nest_theme_mod['deal_min'])):
    $deal_min = $nest_theme_mod['deal_min'];
$deal_mincss = $deal_min;
if(!empty($deal_mincss)):
    $customize_css .= '.countdown-period.mins:before {content:"'.$deal_mincss.'"!important;}';
endif; 
endif; 

if(!empty($nest_theme_mod['deal_sec'])):
    $deal_sec = $nest_theme_mod['deal_sec'];
$deal_seccss = $deal_sec;
if(!empty($deal_seccss)):
    $customize_css .= '.countdown-period.sec:before {content:"'.$deal_seccss.'"!important;}';
endif; 
endif; 
wp_add_inline_style('nest-main-style', $customize_css);
}

 