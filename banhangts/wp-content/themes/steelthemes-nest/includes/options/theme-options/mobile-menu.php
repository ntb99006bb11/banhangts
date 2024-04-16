<?php
/*
=================================
Mobile Header Settings
==================================
*/
Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Mobile Header Settings', 'steelthemes-nest' ),
            'id'     => 'mobile_header_settings',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
      
            'icon'   => 'el el-cog',
            'fields' => array(


                array(
                    'id' => 'mobileheader-sec-start',
                    'type' => 'section',
                    'title' => __('Header  Section', 'steelthemes-nest'),
                    'indent' => true 
                ),      
 
                array(
                    'id'       => 'notice_enable',
                    'type'     => 'switch', 
                    'title'    => __('Notice  Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'notice_bg_image',
                    'type'     => 'media', 
                    'url'      => true,
                    'title'    => __('Notice Background Image', 'steelthemes-nest'),
                    'default'  => array(
                        'url'=> get_template_directory_uri() . '/assets/images/notice.jpg', 
                    ),
                    'required' => array( 'notice_enable', '=', true ),
                ),
                
                array(
                    'id'       => 'notice_content',
                    'type'     => 'textarea',
                    'title'    => esc_html__( 'Contact Title', 'steelthemes-nest' ),
                    'required' => array( 'notice_enable', '=', true ),
                    'default' => esc_html__('Senior’s Member Discount Days! Save 25% Each Tuesday', 'steelthemes-nest') ,
                ),

                array(
                    'id'       => 'mobile_logo_enable',
                    'type'     => 'switch', 
                    'title'    => __('Mobile Logo  Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'mobile_logo_default',
                    'type'     => 'media', 
                    'url'      => true,
                    'title'    => __('Mobile Header Logo', 'steelthemes-nest'),
                    'default'  => array(
                        'url'=> get_template_directory_uri() . '/assets/images/logo.svg', 
                    ),
                    'required' => array( 'mobile_logo_enable', '=', true ),
                ),
                array(
                    'id'       => 'mobile_logo_link',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Logo LInk', 'steelthemes-nest' ),
                    'placeholder' => esc_html__('https://example.com', 'steelthemes-nest') ,
                    'required' => array( 'mobile_logo_enable', '=', true ),
                ),      
    
                array(
                    'id'       => 'mobile_logo_width',
                    'type'     => 'dimensions',
                    'units'    => array('em','px','%'),
                    'title'    => esc_html__('Logo Width', 'steelthemes-nest'),
                    'height' => false,
                    'subtitle' => esc_html__('Allow your users to choose width', 'steelthemes-nest'),
                    'desc'     => esc_html__('Enable or disable any piece of this field. Width, or Units.', 'steelthemes-nest'),
                    'default'  => array(
                        'Width'   => '120', 
                        'Height'  => false
                    ),
                    'output' => array(
                        '.mobile_header .mobile_midbar_content .logo img'
                    ),
                    'required' => array( 'mobile_logo_enable', '=', true ),
                ),

 
                array(
                    'id'       => 'mob_cart_enable',
                    'type'     => 'switch', 
                    'title'    => __('Cart Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),
                
              
                array(
                    'id'       => 'header_search_enable',
                    'type'     => 'switch', 
                    'title'    => __('Search  Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),  

                array(
                    'id'    => 'mbsheader_search_style',
                    'type'  => 'select',
                    'title' => esc_html__( 'Search Type', 'steelthemes-nest' ),
                    'options'  => array(
                        'default_search' => esc_html('Default Search' , 'steelthemes-nest'),
                        'fibosearch' => esc_html('Fibo Search' , 'steelthemes-nest'), 
                    ),
                    'default'  => 'default_search',
                    'required' => array( 'header_search_enable', '=', true ),
                ),

                array(
                    'id' => 'mobileheader-sidecontent-start',
                    'type' => 'section',
                    'title' => __('Header Menu Panel  Section', 'steelthemes-nest'),
                    'indent' => true 
                ),    
                array(
                    'id'       => 'panel_search_enable',
                    'type'     => 'switch', 
                    'title'    => __('Search  Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),  

               

                array(
                    'id'       => 'contact_enable',
                    'type'     => 'switch', 
                    'title'    => __('Contact  Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),
             
              
                array(
                    'id'       => 'mobile_phone_number',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Phone Number', 'steelthemes-nest' ),
                    'required' => array( 'mobile_phone_enable', '=', true ),
                    'default' => esc_html__('9806071234', 'steelthemes-nest') ,
                    'required' => array( 'contact_enable', '=', true ),
                ),
    
              
                array(
                    'id'       => 'mobile_mail_number',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Mail Id', 'steelthemes-nest' ),
                    'required' => array( 'mobile_email_enable', '=', true ),
                    'default' => esc_html__('sendmail@example.com', 'steelthemes-nest') ,
                    'required' => array( 'contact_enable', '=', true ),
                ),
    
               
                array(
                    'id'       => 'mobile_button_enable',
                    'type'     => 'switch', 
                    'title'    => __('Button Enable', 'steelthemes-nest'),
                    'default'  => false,
                ),
                array(
                    'id'       => 'mobile_button_text',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button Text One', 'steelthemes-nest' ),
                    'required' => array( 'mobile_button_enable', '=', true ),
                    'default' => esc_html__('Contact', 'steelthemes-nest') ,
                ),
                array(
                    'id'       => 'mobile_button_link',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button Link One', 'steelthemes-nest' ),
                    'placeholder' => esc_html__('https://example.com', 'steelthemes-nest') ,
                    'required' => array( 'mobile_button_enable', '=', true ),
                ),   
                array(
                    'id'       => 'mobile_button_text_two',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button Text Two', 'steelthemes-nest' ),
                    'required' => array( 'mobile_button_enable', '=', true ),
                    'default' => esc_html__('My Account', 'steelthemes-nest') ,
                ),
                array(
                    'id'       => 'mobile_button_link_two',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Button Link Two', 'steelthemes-nest' ),
                    'placeholder' => esc_html__('https://example.com', 'steelthemes-nest') ,
                    'required' => array( 'mobile_button_enable', '=', true ),
                ),    
                array(
                    'id'       => 'mobile_social_media_enable',
                    'type'     => 'switch', 
                    'title'    => __('Share Enable (Social Media)', 'steelthemes-nest'),
                    'default'  => false,
                ), 
                array(
                    'id'          => 'social_media_text',
                    'type'        => 'text',
                    'title'    => esc_html__( 'Social Media Icon Text One', 'steelthemes-nest' ),
                    'placeholder' => __( 'fab fa-facebook', 'steelthemes-nest' ),
                    'default' => __( 'fa fa-facebook', 'steelthemes-nest' ),
                    'required' => array( 'mobile_social_media_enable', '=', true ),
                ),
                array(
                    'id'          => 'social_media_link',
                    'type'        => 'text',
                    'title'    => esc_html__( 'Social Media Icon Link One', 'steelthemes-nest' ),
                    'placeholder' => __( '#', 'steelthemes-nest' ),
                    'required' => array( 'mobile_social_media_enable', '=', true ),
                ),
            
                array(
                    'id'          => 'social_media_text_two',
                    'type'        => 'text',
                    'title'    => esc_html__( 'Social Media Icon Text Two', 'steelthemes-nest' ),
                    'placeholder' => __( 'fa fa-twitter', 'steelthemes-nest' ),
                    'default' => __( 'fa fa-twitter', 'steelthemes-nest' ),
                    'required' => array( 'mobile_social_media_enable', '=', true ),
                ),
                array(
                    'id'          => 'social_media_link_two',
                    'type'        => 'text',
                    'title'    => esc_html__( 'Social Media Icon Link Two', 'steelthemes-nest' ),
                    'placeholder' => __( '#', 'steelthemes-nest' ),
                    'required' => array( 'mobile_social_media_enable', '=', true ),
                ),
               
                array(
                    'id'          => 'social_media_text_three',
                    'type'        => 'text',
                    'title'    => esc_html__( 'Social Media Icon Text Three', 'steelthemes-nest' ),
                    'placeholder' => __( 'fab fa-skype', 'steelthemes-nest' ),
                    'default' => __( 'fa fa-skype', 'steelthemes-nest' ),
                    'required' => array( 'mobile_social_media_enable', '=', true ),
                ),
                array(
                    'id'          => 'social_media_link_three',
                    'type'        => 'text',
                    'title'    => esc_html__( 'Social Media Icon Link Three', 'steelthemes-nest' ),
                    'placeholder' => __( '#', 'steelthemes-nest' ),
                    'required' => array( 'mobile_social_media_enable', '=', true ),
                ),
              
                array(
                    'id'          => 'social_media_text_four',
                    'type'        => 'text',
                    'title'    => esc_html__( 'Social Media Icon Text Four', 'steelthemes-nest' ),
                    'placeholder' => __( 'fa fa-youtube', 'steelthemes-nest' ),
                    'default' => __( 'fab fa-youtube', 'steelthemes-nest' ),
                    'required' => array( 'mobile_social_media_enable', '=', true ),
                ),
                array(
                    'id'          => 'social_media_link_four',
                    'type'        => 'text',
                    'title'    => esc_html__( 'Social Media Icon Link Four', 'steelthemes-nest' ),
                    'placeholder' => __( '#', 'steelthemes-nest' ),
                    'required' => array( 'mobile_social_media_enable', '=', true ),
                ),
              
                array(
                    'id'          => 'social_media_text_five',
                    'type'        => 'text',
                    'title'    => esc_html__( 'Social Media Icon Text Five', 'steelthemes-nest' ),
                    'placeholder' => __( 'fa fa-instagram', 'steelthemes-nest' ),
                    'default' => __( 'fab fa-instagram', 'steelthemes-nest' ),
                    'required' => array( 'mobile_social_media_enable', '=', true ),
                ),
                array(
                    'id'          => 'social_media_link_five',
                    'type'        => 'text',
                    'title'    => esc_html__( 'Social Media Icon Link Five', 'steelthemes-nest' ),
                    'placeholder' => __( '#', 'steelthemes-nest' ),
                    'required' => array( 'mobile_social_media_enable', '=', true ),
                ),


                array(
                    'id'       => 'mobile_copy_enable',
                    'type'     => 'switch', 
                    'title'    => __('Copy Right Enale', 'steelthemes-nest'),
                    'default'  => false,
                ), 
                
                array(
                    'id'  => 'mobile_panel_copy_right',
                    'type'   => 'textarea',
                    'title'    => esc_html__( 'Copy Right', 'steelthemes-nest' ),
                    'placeholder' => __( 'Copyright 2023 © Nest. All rights reserved. Powered by Steelthemes.', 'steelthemes-nest' ),
                    'default' => __( 'Copyright 2023 © Nest. All rights reserved. Powered by Steelthemes.', 'steelthemes-nest' ),
                    'required' => array( 'mobile_copy_enable', '=', true ),
                ),
               



            
                    
               
    )
));


 