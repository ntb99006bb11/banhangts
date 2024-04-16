<?php
/*
** ============================== 
**   Nest Ecommerce Query
** ==============================
*/
/*
** ============================== 
**  nest_common_query
** ============================== 
*/
if(!function_exists('nest_common_query')):
    function nest_common_query($post_type){
        $post_list = get_posts(array(
            'post_type' => $post_type,
            'showposts' => -1,
        ));
        $posts = array();
        if (!empty($post_list) && !is_wp_error($post_list)) {
            foreach ($post_list as $post) {
                $options[$post->ID] = $post->post_title;
            }
            return $options;
        }
    }
endif; 

/*
** ============================== 
**  nest_render_content megamenu
** ============================== 
*/
if(!function_exists('nest_render_content')):
    function nest_render_content($post_id ) {

        $content = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id );
        return $content; 
    }
endif;  