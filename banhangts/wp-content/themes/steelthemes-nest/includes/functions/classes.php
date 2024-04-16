<?php
/*
** ============================== 
**   Nest Ecommerce Classes Default
** ==============================
*/
add_filter('body_class', 'nest_body_classes');
function nest_body_classes($classes){
    global $nest_theme_mod;
    global $post;
    // Add a class of layout
    $classes[] = nest_get_layout();
    $classes[] = 'scrollbarcolor';
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()):
        $classes[] = 'group-blog';
    endif;
    if (is_singular('page')):
        $classes[] = 'page-' . $post->post_name; 
    endif;
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()):
         $classes[] = 'hfeed';
    endif;
  
    if((!empty($nest_theme_mod['rtl_enables']) == true) || (get_post_meta(get_the_ID() , 'rtl_enable_for_indvidual', true) == true)):
        $classes[] = 'rtl';
    endif;
    if(!empty($nest_theme_mod['preloader_enables']) == true):
        $classes[] = 'prelder_enabled';
    endif;
    if(!empty($nest_theme_mod['mobile_floating_enable']) == true):
        $classes[] = 'mob_float_enble';
    endif;
    

    return $classes;
}
 

 