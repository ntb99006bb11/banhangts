<?php

return array(
	'id'     => 'nest_product_message_settings',
	'title'  => esc_html__( "Product Message", "nest-addons" ),
	'fields' => array(
        array(
            'title' => esc_html__('Product Message Enable', 'nest-addons') ,
            'id' => 'product_message_enable',
            'type' => 'switch',
            'default'  => false,
        ),
        array(
            'title'		=> esc_html__('Message Title','nest-addons'),
            'id'		=> 'product_message_titles',
            'type'		=> 'text',
            'required' => array( 'product_message_enable', '=', true ),
            'default' =>  esc_html('Free worldwide shipping for orders over $70' ,'nest-addons' ),
        ),
        
        array(
            'title'		=> esc_html__('Message Content','nest-addons'),
            'id'		=> 'product_message_content',
            'type'		=> 'textarea',
            'required' => array( 'product_message_enable', '=', true ),
            'default' => esc_html('1 Month easy returns
            Order will dispatch with in 2 Hours' ,'nest-addons' ),
            'desc' =>  esc_html('Free worldwide shipping for orders over $70' ,'nest-addons' ),
        ),

        array(
			'id'       => 'product_add_image_enable',
			'type'     => 'switch',
			'title'    => esc_html__( 'Advertisement Image  Enable / Disable', 'nest-addons' ),
			'default'  => false,
		),

		array(
			'id'       => 'product_add_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Advertisement Image', 'nest-addons' ),
			'required' => array( 'product_add_image_enable', '=', true),
		),

        array(
            'title'		=> esc_html__('Advertisement Link','nest-addons'),
            'id'		=> 'product_add_image_link',
            'type'		=> 'text',
            'required' => array( 'product_add_image_enable', '=', true ),
            'default' =>  esc_html('#' ,'nest-addons' ),
        ),

	),
);

