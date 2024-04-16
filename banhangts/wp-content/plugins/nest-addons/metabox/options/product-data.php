<?php

return array(
	'id'     => 'nest_product_data_settings',
	'title'  => esc_html__( "Product Data", "nest-addons" ),
	'fields' => array(


        array(
            'title' => esc_html__('Product Data Enable', 'nest-addons') ,
            'id' => 'product_data_enable',
            'type' => 'switch',
            'default'  => true,
        ),
       
        array(
            'title'		=> esc_html__('Product Type','nest-addons'),
            'id'		=> 'product_type',
            'type'		=> 'text',
            'required' => array( 'product_data_enable', '=', true ),
        ),
        
        array(
            'title'		=> esc_html__('Product MFG','nest-addons'),
            'id'		=> 'product_mfg',
            'type'		=> 'text',
            'required' => array( 'product_data_enable', '=', true ),
        ),
        
        array(
            'title'		=> esc_html__('Product LIFE','nest-addons'),
            'id'		=> 'product_life',
            'type'		=> 'text',
            'required' => array( 'product_data_enable', '=', true ),
        ),

	),
);

