<?php

return array(
	'id'     => 'nest_pageheader_settings',
	'title'  => esc_html__( "Page Header Settings", "nest-addons" ),
	'fields' => array(
		array(
			'id'       => 'page_header_enable_disable',
			'type'     => 'switch',
			'title'    => esc_html__( 'Page Header Disable  / Enable', 'nest-addons' ),
			'default'  => false,
			'desc' =>  esc_html__( 'Here  (Switch Off) is Enable and (Switch On) is Disable', 'nest-addons' ),
		),

		array(
			'id'       => 'page_header_style_enable_disable',
			'type'     => 'switch',
			'title'    => esc_html__( 'Page Header Style Enable / Disable', 'nest-addons' ),
			'default'  => false,
			'desc' =>  esc_html__( 'Here  (Switch On) is Enable and (Switch Off) is Disable', 'nest-addons' ),
			'required' => array( 'page_header_enable_disable', '=', false ),
		),

		array(
            'id'    => 'custom_pageheader_style',
            'type'  => 'select',
            'title' => esc_html__( 'Choose Header Position', 'nest-addons' ),
            'options'  => array(
                'style_one' => esc_html('Page Header Style One' , 'nest-addons'),
                'style_two' => esc_html('Page Header Style Two' , 'nest-addons'),
                'style_three' => esc_html('Page Header Style Three (Only Breadcrumb)' , 'nest-addons'),
            ),
            'default'  => 'style_one',
			'required' => array( 'page_header_style_enable_disable', '=', true ),
        ),

	
		array(
			'id'       => 'page_header_title',
			'type'     => 'textarea',
			'title'    =>  esc_html__('Page Header Title', 'nest-addons') ,
			'desc'     => esc_html__( 'Enter the title to show in Page Header section', 'nest-addons' ),
			'required' => array( 'page_header_enable_disable', '=', false ),
		),
	 
		 
		array(
			'id'       => 'page_header_bg_image_showss',
			'type'     => 'switch',
			'title'    => esc_html__( 'Page Header Image Enable / Disable', 'nest-addons' ),
			'default'  => false,
			'desc' =>  esc_html__( 'Here  (Switch Off) is Disable and (Switch On) is Enable', 'nest-addons' ),
			'required' => array( 'page_header_enable_disable', '=', false),
		),

		array(
			'id'       => 'page_header_bgimage',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Page Header Background Image', 'nest-addons' ),
			'desc'     => esc_html__( 'Insert Background Image for Page Header', 'nest-addons' ),
			'required' => array( 'page_header_bg_image_showss', '=', true),
		),
	 
 
	),
);