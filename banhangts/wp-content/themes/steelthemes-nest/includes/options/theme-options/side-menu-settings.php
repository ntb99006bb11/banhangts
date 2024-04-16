<?php
/*
=================================
Header Extra Settings
==================================
*/
Redux::set_section( $opt_name, array(
            'title'  => esc_html__( 'Side Menu Settings', 'steelthemes-nest' ),
            'id'     => 'side_menu_settings',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'icon'   => 'el el-cog',
            'fields' => array(
            array(
                'id'       => 'side_menu_enable',
                'type'     => 'switch', 
                'title'    => __('Side Menu  Enable', 'steelthemes-nest'),
                'default'  => false,
            ),

            array(
                'id'       => 'side_menu_icon_image',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Side Menu Icon Image ', 'steelthemes-nest'),
                'required' => array( 'side_menu_enable', '=', true ),
                'default'  => array(
                    'url'=> get_template_directory_uri() . '/assets/images/demo.svg', 
                ),
            ),

            array(
                'id'       => 'side_menu_button_texts',
                'type'     => 'text',
                'title'    => esc_html__( 'Side Menu  Text', 'steelthemes-nest' ),
                'placeholder' => esc_html__('Demos', 'steelthemes-nest') ,
                'default' => esc_html__('Demos', 'steelthemes-nest') ,
                'required' => array( 'side_menu_enable', '=', true ),
            ),   
            
            array(
                'id'       => 'side_menu_display_area',
                'type'     => 'select',
                'title'    => __('Select Mega Menu Style For display in Side Menu', 'steelthemes-nest'),  
                // Must provide key => value pairs for select options
                'options'  => nest_common_query('mega_menu'),
                'required' => array( 'side_menu_enable', '=', true ),
            ),

 

            array(
                'id'       => 'mini_cart_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Minu Cart Button Text', 'steelthemes-nest' ),
                'placeholder' => esc_html__('Cart', 'steelthemes-nest') ,
                'default' => esc_html__('Cart', 'steelthemes-nest') ,
                'required' => array( 'mini_cart_enable', '=', true ),
            ), 

 
        

            array(
                'id'       => 'content_one_enable',
                'type'     => 'switch', 
                'default'  => false,
                'title'    => __('Content One Enable / Disable', 'steelthemes-nest'),
            ),

            array(
                'id'       => 'content_one_icon_image',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Content One Icon Image ', 'steelthemes-nest'),
                'required' => array( 'content_one_enable', '=', true ),
                'default'  => array(
                    'url'=> get_template_directory_uri() . '/assets/images/docs.svg', 
                ),
            ),

            array(
                'id'       => 'content_one_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Content One Menu  Text', 'steelthemes-nest' ),
                'placeholder' => esc_html__('Docs', 'steelthemes-nest') ,
                'default' => esc_html__('Docs', 'steelthemes-nest') ,
                'required' => array( 'content_one_enable', '=', true ),
            ), 

            array(
                'id'       => 'content_one_text_link',
                'type'     => 'text',
                'title'    => esc_html__( 'Content One Menu  Link', 'steelthemes-nest' ),
                'placeholder' => esc_html__('#', 'steelthemes-nest') ,
                'default' => esc_html__('#', 'steelthemes-nest') ,
                'required' => array( 'content_one_enable', '=', true ),
            ), 

 
            array(
                'id'       => 'content_two_enable',
                'type'     => 'switch', 
                'default'  => false,
                'title'    => __('Content Two Enable / Disable', 'steelthemes-nest'),
            ),

            array(
                'id'       => 'content_two_icon_image',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Content Two Icon Image ', 'steelthemes-nest'),
                'required' => array( 'content_two_enable', '=', true ),
                'default'  => array(
                    'url'=> get_template_directory_uri() . '/assets/images/support.svg', 
                ),
            ),

            array(
                'id'       => 'content_two_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Content Two Menu  Text', 'steelthemes-nest' ),
                'placeholder' => esc_html__('Support', 'steelthemes-nest') ,
                'default' => esc_html__('Support', 'steelthemes-nest') ,
                'required' => array( 'content_two_enable', '=', true ),
            ), 

            array(
                'id'       => 'content_two_link',
                'type'     => 'text',
                'title'    => esc_html__( 'Content Two Menu  Link', 'steelthemes-nest' ),
                'placeholder' => esc_html__('#', 'steelthemes-nest') ,
                'default' => esc_html__('#', 'steelthemes-nest') ,
                'required' => array( 'content_two_enable', '=', true ),
            ), 
          
          
          
    )
));


 