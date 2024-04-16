<?php
/*
====================
Dokan Settings
====================
*/
Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Dokan Settings', 'steelthemes-nest' ),
            'id'     => 'dokan_settings_all',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'icon'   => 'el el-cog',
            'fields' => array(
                array(
                    'id'       => 'dokan_dashboard_logo',
                    'type'     => 'media', 
                    'title'    => __('Dokan Dashboard Logo', 'steelthemes-nest'),
                    'url'      => true,
                    'default'  => array(
                        'url'=> get_template_directory_uri() . '/assets/images/logo.svg',
                    ),
                   
                ),
                array(
                    'id'       => 'dokan_logo_width',
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
                ),
            array(
                'id'       => 'copy_right_left',
                'type'     => 'text', 
                'default'  =>  esc_html__( '2023 ©  Nest ( Wordpress Ecommerce Wordpress Theme).', 'steelthemes-nest' ),
                'title'    => esc_html__( 'Copyrights Content Left', 'steelthemes-nest' ),
            ),
            array(
                'id'       => 'copy_right_right',
                'type'     => 'text', 
                'default'  =>  esc_html__( 'All rights reserved', 'steelthemes-nest' ),
                'title'    => esc_html__( 'Copyrights Content Right', 'steelthemes-nest' ),
            ),
            array(
                'id'       => 'dokan_vendor_list_heading',
                'type'     => 'text', 
                'default'  =>  esc_html__( 'Vendors List', 'steelthemes-nest' ),
                'title'    => esc_html__( 'Vendor List Page Title', 'steelthemes-nest' ),
            ),
              
            )
        )
    );