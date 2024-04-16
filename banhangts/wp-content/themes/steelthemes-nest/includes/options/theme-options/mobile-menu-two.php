<?php
/*
=================================
Mobile Header Settings
==================================
*/
Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Mobile Fixed Menu Settings', 'steelthemes-nest' ),
            'id'     => 'mobile_fixed_header_settings',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'subsection' => true,
            'icon'   => 'el el-cog',
            'fields' => array(   
                array(
                    'id'       => 'mobile_floating_enable',
                    'type'     => 'switch', 
                    'title'    => __('Mobile Floating menu  Enable', 'steelthemes-nest'),
                    'default'  => false,
                    'desc'    => __('Enable this before using btns below', 'steelthemes-nest'),
                ),
                array(
                    'id'       => 'home_enable',
                    'type'     => 'switch', 
                    'title'    => __('Home  Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'home_button_img',
                    'type'     => 'media', 
                    'url'      => true,
                    'title'    => __('Home Button Image', 'steelthemes-nest'),
                    'default'  => array(
                        'url'=> get_template_directory_uri() . '/assets/images/btn-1.svg', 
                    ),
                    'required' => array(
                         'home_enable', '=', true 
                    ),
                ),
                array(
                    'id'       => 'home_btn_text',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Home Button Text', 'steelthemes-nest' ),
                    'required' => array( 'home_enable', '=', true ),
                    'default' => esc_html__('Home', 'steelthemes-nest') ,
                ),
                array(
                    'id'       => 'home_btn_link',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Home Button Link', 'steelthemes-nest' ),
                    'required' => array( 'home_enable', '=', true ),
                    'default' => esc_html__('#', 'steelthemes-nest') ,
                ),

                array(
                    'id'       => 'button_one_enable',
                    'type'     => 'switch', 
                    'title'    => __('Button One Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'btn_one_img',
                    'type'     => 'media', 
                    'url'      => true,
                    'title'    => __('Button One Image', 'steelthemes-nest'),
                    'default'  => array(
                        'url'=> get_template_directory_uri() . '/assets/images/btn-3.svg',
                    ),
                    'required' => array( 'button_one_enable', '=', true ),
                ),
                array(
                    'id'       => 'btn_one_text',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button One Text', 'steelthemes-nest' ),
                    'required' => array( 'button_one_enable', '=', true ),
                    'default' => esc_html__('Whishlist', 'steelthemes-nest') ,
                ),

                array(
                    'id'       => 'btn_one_link',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button One Link', 'steelthemes-nest' ),
                    'required' => array( 'button_one_enable', '=', true ),
                    'default' => esc_html__('#', 'steelthemes-nest') ,
                ),


                
                array(
                    'id'       => 'button_two_enable',
                    'type'     => 'switch', 
                    'title'    => __('Button Two Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'btn_two_img',
                    'type'     => 'media', 
                    'url'      => true,
                    'title'    => __('Button Two Image', 'steelthemes-nest'),
                    'default'  => array(
                        'url'=> get_template_directory_uri() . '/assets/images/btn-2.svg',
                    ),
                    'required' => array( 'button_two_enable', '=', true ),
                ),
                array(
                    'id'       => 'btn_two_text',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button Two Text', 'steelthemes-nest' ),
                    'required' => array( 'button_two_enable', '=', true ),
                    'default' => esc_html__('Compare', 'steelthemes-nest') ,
                ),

                array(
                    'id'       => 'btn_two_link',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button Two Link', 'steelthemes-nest' ),
                    'required' => array( 'button_two_enable', '=', true ),
                    'default' => esc_html__('#', 'steelthemes-nest') ,
                ),


                array(
                    'id'       => 'button_three_enable',
                    'type'     => 'switch', 
                    'title'    => __('Button Three Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'btn_three_img',
                    'type'     => 'media', 
                    'url'      => true,
                    'title'    => __('Button Three Image', 'steelthemes-nest'),
                    'default'  => array(
                        'url'=> get_template_directory_uri() . '/assets/images/btn-4.svg',
                    ),
                    'required' => array( 'button_three_enable', '=', true ),
                ),
                array(
                    'id'       => 'btn_three_text',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button Three Text', 'steelthemes-nest' ),
                    'required' => array( 'button_three_enable', '=', true ),
                    'default' => esc_html__('Checkout', 'steelthemes-nest') ,
                ),

                array(
                    'id'       => 'btn_three_link',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button Three Link', 'steelthemes-nest' ),
                    'required' => array( 'button_three_enable', '=', true ),
                    'default' => esc_html__('#', 'steelthemes-nest') ,
                ),

               
                array(
                    'id'       => 'button_four_enable',
                    'type'     => 'switch', 
                    'title'    => __('Button Four Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'btn_four_img',
                    'type'     => 'media', 
                    'url'      => true,
                    'title'    => __('Button Four Image', 'steelthemes-nest'),
                    'default'  => array(
                        'url'=> get_template_directory_uri() . '/assets/images/icon-user.svg',
                    ),
                    'required' => array( 'button_four_enable', '=', true ),
                ),
                array(
                    'id'       => 'btn_four_text',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button Four Text', 'steelthemes-nest' ),
                    'required' => array( 'button_four_enable', '=', true ),
                    'default' => esc_html__('Account', 'steelthemes-nest') ,
                ),

                array(
                    'id'       => 'btn_four_link',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button Four Link', 'steelthemes-nest' ),
                    'required' => array( 'button_four_enable', '=', true ),
                    'default' => esc_html__('#', 'steelthemes-nest') ,
                ),

 
               
    )
));


 