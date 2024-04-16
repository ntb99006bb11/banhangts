<?php
/*
====================
General Settings
====================
*/

Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'General Settings', 'steelthemes-nest' ),
            'id'     => 'general_settings',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'icon'   => 'el el-wrench',
            'fields' => array(
                array(
                    'id' => 'backtopreloader-sec-start',
                    'type' => 'section',
                    'title' => __('Preloader / Backtotop Section', 'steelthemes-nest'),
                    'indent' => true 
                ),
                //preloader back ti top
                array(
                    'id'       => 'preloader_enables',
                    'type'     => 'switch', 
                    'title'    => __('Preloader Enable  / Disable', 'steelthemes-nest'),
                    'subtitle' => __('Preloader', 'steelthemes-nest'),
                    'default'  => true,
                ),  
                
                 array(
                    'id'       => 'preloader_image',
                    'type'     => 'media', 
                    'url'      => true,
                    'default'  => array(
                        'url'=>  get_template_directory_uri().'/assets/images/loading.gif', 
                    ),
                    'title'    => __('Preloader Image', 'steelthemes-nest'),
                    'required' => [ 'preloader_enables', '=', true ],
                ),
             
                array(         
                    'id'       => 'pre_loader_background',
                    'type'     => 'color',
                    'title'    => __('Preloader Background', 'steelthemes-nest'),
                    'subtitle' => __('Preloader background color, etc.', 'steelthemes-nest'),
                    'validate' => 'color',
                    'required' => [ 'preloader_enables', '=', true ],
                ),

              
                array(
                    'id'       => 'bactotop_enable',
                    'type'     => 'switch', 
                    'default'  => false,
                    'title'    => __('Back to top Enable /Disable', 'steelthemes-nest'),
                ),
                
 
                //Sidebar
                array(
                    'id' => 'sidebar-sticky-start',
                    'type' => 'section',
                    'title' => __('Sidebar Section', 'steelthemes-nest'),
                    'indent' => true 
                  ),

                  array(
                    'id'       => 'sidebar_sticky_enables',
                    'type'     => 'switch', 
                    'default'  => false,
                    'title'    => __('Sidebar Sticky Enable / Disable', 'steelthemes-nest'),
                ),
                //rtl
                array(
                    'id' => 'rtl-sec-start',
                    'type' => 'section',
                    'title' => __('RTL Section', 'steelthemes-nest'),
                    'indent' => true 
                ),
             
                array(
                    'id'       => 'rtl_enables',
                    'type'     => 'switch', 
                    'title'    => __('Rtl Enable  / Disable', 'steelthemes-nest'),
                    'subtitle' => __('Rtl', 'steelthemes-nest'),
                    'default'  => false
                ), 
                 // animation enable / disable
                array(
                    'id' => 'animation-sec-start',
                    'type' => 'section',
                    'title' => __('Wow Animation Section', 'steelthemes-nest'),
                    'indent' => true 
                ),
             
                array(
                    'id'       => 'wow_animation',
                    'type'     => 'switch', 
                    'title'    => __('Wow Animation Enable  / Disable', 'steelthemes-nest'),
                    'subtitle' => __('Wow', 'steelthemes-nest'),
                    'default'  => true
                ),  


                array(
                    'id' => 'fourntfour-sec-start',
                    'type' => 'section',
                    'title' => __('404 Section', 'steelthemes-nest'),
                    'indent' => true 
                ),
                array(
                    'id'       => '404_image',
                    'type'     => 'media', 
                    'url'      => true,
                    'default'  => array(
                        'url'=>  get_template_directory_uri().'/assets/images/loading.gif', 
                    ),
                    'title'    => __('404 Image', 'steelthemes-nest'),
                   
                ),
              
            ),
        ));