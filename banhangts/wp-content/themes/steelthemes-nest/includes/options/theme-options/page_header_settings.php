<?php
/*
======================
 Page Header Settings
======================
*/
Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Page Header Settings', 'steelthemes-nest' ),
            'id'     => 'page_header_settings_option',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'icon'   => 'el el-cog',
            'subsection' => true,
            'fields' => array(
           
            array(
                'id' => 'page-header-sec-start',
                'type' => 'section',
                'title' => __('Page Header  Section', 'steelthemes-nest'),
                'indent' => true 
            ),    
            array(
                'id'       => 'page_header_enable',
                'type'     => 'switch', 
                'title'    => __('Page Header Enable / Disable', 'steelthemes-nest'),
                'default'  => true,
            ),
            array(
                'id'    => 'page_header_style',
                'type'  => 'select',
                'title' => esc_html__( 'Page Header Styles', 'steelthemes-nest' ),
                'default'  => 'style_one',
                'options'  => array(
                    'style_one' => esc_html('Page Header Style One' , 'steelthemes-nest'),
                    'style_two' => esc_html('Page Header Style Two' , 'steelthemes-nest'),
                    'style_three' => esc_html('Page Header Style Three (Only Breadcrumb)' , 'steelthemes-nest'),
                ),
    
                'required' => array( 'page_header_enable', '=', true ),
            ),

            array(
                'id'       => 'page_header_post_exclude',
                'type'     => 'text',
                'title'    => esc_html__( 'Post Category Exclude for Page Header', 'steelthemes-nest' ),
                'desc'    =>  esc_html__( 'Category Exclude eg( 1 ,2, 45) like this', 'steelthemes-nest' ),
                'default'  => '',
                'required' => array( 'page_header_style', '=', 'style_two' ),
            ),

            array(
                'id'       => 'breadcrumb_enable',
                'type'     => 'switch', 
                'title'    => __('Breadcrumb Enable / Disable', 'steelthemes-nest'),
                'default'  => true,
            ),
 
            array(
                'id' => 'page_header_style_sec',
                'type' => 'section',
                'title' => __('Page Header style', 'steelthemes-nest'),
                'indent' => true 
            ),    
            
 
            array(
                'id'    => 'page_header_alignment',
                'type'  => 'select',
                'title' => esc_html__( 'Page Header Alignment', 'steelthemes-nest' ),
                'options'  => array(
                    'page_header_left' => esc_html__( 'Left', 'steelthemes-nest' ),
                    'page_header_center' => esc_html__( 'Center', 'steelthemes-nest' ),
                    'page_header_right' => esc_html__( 'Right', 'steelthemes-nest' ),
                ),
                'default'  => 'page_header_center',
            ),
            
            array(
                'id'       => 'page_header_bg_image',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Page header Background Image', 'steelthemes-nest'),
             
            ),
            array(
                'id'       => 'blog_page_header_bg_image',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Blog Page header Background Image', 'steelthemes-nest'),
            ),
             
            array(
                'id'       => 'pageheader_bg_color',
                'type'     => 'color',
                'title'    => __('Page Header Background Color', 'steelthemes-nest'), 
                'validate' => 'color',
            ),
        

            array(
                'id'       => 'pageheader_title_color',
                'type'     => 'color',
                'title'    => __('Page Header Title Color', 'steelthemes-nest'), 
                'validate' => 'color',
            ),
            array(
                'id'       => 'pageheader_breadcrumb_color',
                'type'     => 'color',
                'title'    => __('Page Header Breadcrumb Color', 'steelthemes-nest'), 
                'validate' => 'color',
            ),
            array(
                'id'       => 'pageheader_breadcrumb_active_color',
                'type'     => 'color',
                'title'    => __('Page Header Breadcrumb Active Color', 'steelthemes-nest'), 
                'validate' => 'color',
            ),
          
            array(
                'id'       => 'pageheader_tag_color',
                'type'     => 'color',
                'title'    => __('Page Header Tag  Color', 'steelthemes-nest'), 
                'desc'       => esc_html__( 'This custom Color css for Tag', 'steelthemes-nest'),
                'validate' => 'color',
            ),
            array(
                'id'       => 'pageheader_tah_bg_color',
                'type'     => 'color',
                'title'    => __('Page Header Tag Background Color', 'steelthemes-nest'), 
                'desc'       => esc_html__( 'This custom Background color css for Tag', 'steelthemes-nest'),
                'validate' => 'color',
            ),
           
            array(
                'id'       => 'pageheader_tag_border_color',
                'type'     => 'color',
                'title'    => __('Page Header Tag Border Color', 'steelthemes-nest'), 
                'desc'       => esc_html__( 'This custom Border color css for Tag', 'steelthemes-nest'),
                'validate' => 'color',
            ),
           


        )
));

