<?php

return array(
	'id'     => 'nest_product_singlestyle_settings',
	'title'  => esc_html__( "Product Single Style", "nest-addons" ),
	'fields' => array(

        array(
            'title' => esc_html__('Product Single Style Enable', 'nest-addons') ,
            'id' => 'product_signle_style_enable',
            'type' => 'switch',
            'default'  => false,
        ),

        array(
			'id'    => 'product_single_styles',
			'type'  => 'select',
			'title' => esc_html__( 'Product Single Styles', 'nest-addons' ),
			'options' => array(
				'style_one' => esc_html('Style One ( Default )' , 'nest-addons'),
                'style_two' => esc_html('Style Two' , 'nest-addons'),
                'style_three' => esc_html('Style Three' , 'nest-addons'),
                'style_four' => esc_html('Style Four' , 'nest-addons'),
			),
			'default'  => 'style_one',
			'required' => array( 'product_signle_style_enable', '=', true ),
		),
    
	),
);

