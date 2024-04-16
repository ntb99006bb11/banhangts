<?php

return array(
	'id'     => 'nest_header_settings',
	'title'  => esc_html__( "General Settings", "nest-addons" ),
	'fields' => array(
		array(
			'id'       => 'body_css_enable',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Body Css', 'nest-addons' ),
			'default'  => false,
		),
		array(
			'id'       => 'padding_for_body',
			'type'     => 'text',
			'title'    =>  esc_html__('Padding For Body (Desktop)', 'nest-addons') ,
			'placeholder' => esc_html__('0px 0px 0px 0px', 'nest-addons') ,
            'desc' => esc_html__('Padding option for body  top right botton left  eg(10px 20px 10px 20px)', 'nest-addons') ,
			'required' => array( 'body_css_enable', '=', true ),
		),
		array(
			'id'       => 'padding_for_body_mb',
			'type'     => 'text',
			'title'    =>  esc_html__('Padding For Body (Mobile)', 'nest-addons') ,
			'placeholder' => esc_html__('0px 0px 0px 0px', 'nest-addons') ,
			'desc' => esc_html__('Padding option for body  top right botton left  eg(10px 20px 10px 20px)', 'nest-addons') ,
			'required' => array( 'body_css_enable', '=', true ),
		),

		array(
			'id'    => 'bg_image_or_color',
			'type'  => 'select',
			'title' => esc_html__( 'Choose Background Type', 'nest-addons' ),
			'options' => array(
				'background_image' => esc_html('Background Image' , 'nest-addons'),
                'background_color' => esc_html('Background Color' , 'nest-addons'),
			),
			'default'  => 'background_image',
			'required' => array( 'body_css_enable', '=', true ),
		),

		array(
			'id'       => 'body_bg_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'nest-addons' ),
			'desc'     => esc_html__( 'Insert Background Image for Body', 'nest-addons' ),
			'required' => array( 'bg_image_or_color', '=', 'background_image' ),
		),

		array(
			'title'          => 'Background  Color',
			'id'            => 'body_bg_color',
			'type'          => 'color',
			'required' => array( 'page_header_enable_disable', '=', false ),
			'required' => array( 'bg_image_or_color', '=', 'background_color' ),
		),
 
		
		array(
			'id'       => 'custom_header',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Style', 'nest-addons' ),
			'default'  => false,
		),
		array(
			'id'    => 'header_settings_meta',
			'type'  => 'select',
			'title' => esc_html__( 'Choose Header Style', 'nest-addons' ),
			'options' => nest_common_query('header'),
			'required' => array( 'custom_header', '=', true ),
		),
	 
    
		array(
			'id'       => 'custom_sticky_header',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Sticky Header Style', 'nest-addons' ),
			'default'  => false,
		),
		array(
			'id'    => 'sticky_header_settings_meta',
			'type'  => 'select',
			'title' => esc_html__( 'Choose Sticky Header Style', 'nest-addons' ),
			'options' => nest_common_query('sticky_header'),
			'required' => array( 'custom_sticky_header', '=', true ),
		),
		
		array(
			'id'       => 'custom_footer',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Footer Style', 'nest-addons' ),
			'default'  => false,
		),
		array(
			'id'    => 'footer_settings_meta',
			'type'  => 'select',
			'title' => esc_html__( 'Choose Footer Style', 'nest-addons' ),
			'options' => nest_common_query('footer'),
			'required' => array( 'custom_footer', '=', true ),
		),

		array(
			'id'       => 'custom_layout',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Custom Layout', 'nest-addons' ),
			'default'  => false,
		),
		array(
			'title' => esc_html__('Choose Layout', 'nest-addons') ,
			'id' => 'layout',
			'type' => 'image_select',
			'options' => array(
				'no-sidebar' => get_template_directory_uri() . '/assets/images/full-width.png',
				'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
				'left-sidebar' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
			) ,
			'required' => array( 'custom_layout', '=', true ),
		) ,
		array(
			'id'       => 'rtl_enable_for_indvidual',
			'type'     => 'switch',
			'title'    => esc_html__( 'Rtl Enable  / Disable', 'nest-addons' ),
			'default'  => false,
		),
	),
);