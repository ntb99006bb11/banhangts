<?php

return array(
	'id'     => 'nest_addons_post_settings',
	'title'  => esc_html__( "Post Settings", "nest-addons" ),
	'fields' => array(
		array(
			'id'       => 'post_video_enable',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Video  Enable / Disable', 'nest-addons' ),
			'default'  => false,
			'desc' =>  esc_html__( 'Here  (Switch Off) is Disable and (Switch On) is Enable', 'nest-addons' ),
		),

		array(
			'title' => esc_html__('Post Video Link', 'steelthemes-nest') ,
			'id' => 'post_video_link',
			'type' => 'text',
			'required' => array( 'page_header_enable_disable', '=', false ),
		), 
		array(
			'title'          => 'Post Icon Background Color',
			'id'            => 'post_icon_bg',
			'type'          => 'color',
			'required' => array( 'page_header_enable_disable', '=', false ),
		),
		array(
			'title'          => 'Post Icon Color',
			'id'            => 'post_icon_color',
			'type'          => 'color',
			'required' => array( 'page_header_enable_disable', '=', false ),
		),

		array(
			'id'       => 'frature_img_enable',
			'type'     => 'switch', 
			'title' => esc_html__('Featured Image Enable / Disable', 'nest-addons') ,
			'default'  => true,
		), 

		array(
			'id'       => 'relatedpost_single_enable',
			'type'     => 'switch', 
			'title' => esc_html__('Related Post Enable / Disable', 'nest-addons') ,
			'default'  => true,
		),
 
	),
);

