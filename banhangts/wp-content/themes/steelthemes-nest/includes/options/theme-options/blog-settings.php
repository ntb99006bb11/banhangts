<?php
/*
====================
Blog Settings
====================
*/
Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Blog Single Settings', 'steelthemes-nest' ),
            'id'     => 'blog_settings_all',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'icon'   => 'el el-cog',
            'fields' => array(
 
               array(
                'id'       => 'category_enable',
                'type'     => 'switch', 
                'default'  => true,
                'title'    => __('Category Enable / Disable', 'steelthemes-nest'),
                'desc'       => esc_html__( 'This is used to enable and disable Category in blog single', 'steelthemes-nest'),
            ),
            array(
                'id'       => 'tag_disable',
                'type'     => 'switch', 
                'default'  => true,
                'title'    => __('Tag Enable / Disable', 'steelthemes-nest'),
                'desc'       => esc_html__('This is used to enable and disable Tags in blog single', 'steelthemes-nest'),
            ),

            array(
                'id'       => 'share_disable',
                'type'     => 'switch', 
                'default'  => false,
                'title'    => __('Share Enable / Disable ', 'steelthemes-nest'),
                'desc'       => esc_html__( 'This is used to enable and disable Share in blog single', 'steelthemes-nest'),
            ),
           
            array(
                'id'       => 'next_prev_enable',
                'type'     => 'switch', 
                'default'  => false,
                'title'    => __('Post Navigation Enable / Disable ', 'steelthemes-nest'),
                'desc'       => esc_html__( 'This is used to enable and disable Share in blog single', 'steelthemes-nest'),
            ),
        
           
            )
        )
    );