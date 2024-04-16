<?php
/*
** ============================== 
**   nest_contact_form_7_query
** ==============================
 */ 

function nest_get_posts($post_type){
    $post_list = get_posts(array(
        'post_type' => $post_type,
        'showposts' => -1,
    ));
    $posts = array();
        if (!empty($post_list)) {
            foreach ($post_list as $post) {
                $options[$post->ID] = $post->post_title;
        }
        return $options;
    }
}


