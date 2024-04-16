<?php
/*
====================
Layout Settings
====================
*/
Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Layout Settings', 'steelthemes-nest' ),
            'id'     => 'layout_settings_all',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'icon'   => 'el el-cog',
            'fields' => array(
                array(
                    'id'       => 'default_layouts',
                    'type'     => 'image_select',
                    'title'    => esc_html__( 'Default Layouts', 'steelthemes-nest' ),
                    'subtitle' => esc_html__( 'Choose your layouts Styles', 'steelthemes-nest' ),
                    'options'  => array(
        
                        'no-sidebar'  => array(
                            'alt' => esc_html__( 'Full Width', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/full-width.png',
                        ),
                        'right-sidebar'  => array(
                            'alt' => esc_html__( 'Right Sidebar', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
                        ),
                        'left-sidebar'  => array(
                            'alt' => esc_html__( 'Left Sidebar', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
                        ),
                       
                    ),

                    'default' => 'right-sidebar',
                ),
                array(
                    'id'       => 'page_layouts',
                    'type'     => 'image_select',
                    'title'    => esc_html__( 'Page Layouts', 'steelthemes-nest' ),
                    'subtitle' => esc_html__( 'Choose your layouts Styles', 'steelthemes-nest' ),
                    'options'  => array(
                        'no-sidebar'  => array(
                            'alt' => esc_html__( 'Full Width', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/full-width.png',
                        ),
                        'right-sidebar'  => array(
                            'alt' => esc_html__( 'Right Sidebar', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
                        ),
                        'left-sidebar'  => array(
                            'alt' => esc_html__( 'Left Sidebar', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
                        ),
                       
                    ),

                    'default' => 'right-sidebar',
                ),
              
                array(
                    'id'       => 'product_archive_layouts',
                    'type'     => 'image_select',
                    'title'    => esc_html__( 'Shop  Layouts', 'steelthemes-nest' ),
                    'subtitle' => esc_html__( 'Choose your layouts Styles', 'steelthemes-nest' ),
                    'options'  => array(
        
                        'no-sidebar'  => array(
                            'alt' => esc_html__( 'Full Width', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/full-width.png',
                        ),
                        'right-sidebar'  => array(
                            'alt' => esc_html__( 'Right Sidebar', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
                        ),
                        'left-sidebar'  => array(
                            'alt' => esc_html__( 'Left Sidebar', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
                        ),
                       
                ),
                'default' => 'no-sidebar',
            ),  
                array(
                    'id'       => 'product_layouts',
                    'type'     => 'image_select',
                    'title'    => esc_html__( 'Shop Single Layouts', 'steelthemes-nest' ),
                    'subtitle' => esc_html__( 'Choose your layouts Styles', 'steelthemes-nest' ),
                    'options'  => array(
        
                        'no-sidebar'  => array(
                            'alt' => esc_html__( 'Full Width', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/full-width.png',
                        ),
                        'right-sidebar'  => array(
                            'alt' => esc_html__( 'Right Sidebar', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
                        ),
                        'left-sidebar'  => array(
                            'alt' => esc_html__( 'Left Sidebar', 'steelthemes-nest' ),
                            'img' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
                        ),
                       
                ),
                'default' => 'no-sidebar',
            ),  


            array(
                'id'       => 'layout_width_enable',
                'type'     => 'switch', 
                'title'    => __('Layout Width Enable / Disable', 'steelthemes-nest'),
                'default'  => false,
            ),
            array(
                'id'       => 'layout_width_control',
                'type'     => 'text', 
                'default'  =>  esc_html__( '1200px', 'steelthemes-nest' ),
                'desc'  => esc_html__( 'This is for deafult  container width for reduce and increase width. Use Like this eg(1500px , 1170px)', 'steelthemes-nest' ),
                'title'    => __('Layout Width', 'steelthemes-nest'),
                'required' => array( 'layout_width_enable', '=', true ),
            ),
            

        )
 ));

