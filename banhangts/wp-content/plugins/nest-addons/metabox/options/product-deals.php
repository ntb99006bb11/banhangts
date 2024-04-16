<?php

return array(
	'id'     => 'nest_product_deals_settings',
	'title'  => esc_html__( "Product Deals", "nest-addons" ),
	'fields' => array(
        
        array(
            'title' => esc_html__('Product Deals Image', 'nest-addons') ,
            'id' => 'product_deals_image',
            'type' => 'media',
            'url'      => true,
        ) ,

        array(
            'title'		=> esc_html__('Product Deals Text','nest-addons'),
            'id'		=> 'product_deals_text',
            'type'		=> 'text',
            'placeholder' => __('Remains until the end of the offer' , 'nest-addons'),
        ),
        
        array(
            'title' => esc_html__('Products Deals Date', 'nest-addons') ,
            'id' => 'product_deals_date',
            'type' => 'text',
            'desc' => 'Example ( Enter Deals Date End Time Like this 2025/02/25)',
        ),

    
	),
);

