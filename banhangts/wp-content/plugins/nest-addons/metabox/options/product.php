<?php

return array(
	'id'     => 'nest_product_settings',
	'title'  => esc_html__( "Product Other Settings", "nest-addons" ),
	'fields' => array(
 
        array(
            'title' => esc_html__('Store Name', 'nest-addons') ,
            'id' => 'porduct_store_name',
            'type' => 'text',
            'desc' => 'Example ( Nest Food )',
        ), 
        array(
            'title' => esc_html__('Store Link', 'nest-addons') ,
            'id' => 'porduct_store_link',
            'type' => 'text',
        ),  
      
        array(
            'title' => esc_html__('Show Offer Percentage', 'nest-addons') ,
            'id' => 'product_percent_show',
            'type' => 'switch',
            'default'  => false,
        ),
      
        array(
            'title' => esc_html__('Badge if on sale', 'nest-addons') ,
            'id' => 'badges_onsale',
            'type' => 'text',
            'desc' => 'Example ( New , Hot )',
        ),   
        array(
            'title'          => 'Badge Background Color (One)',
            'id'            => 'product_badge_bg_color',
            'type'          => 'color',
        ), 
        array(
            'title'          => 'Badge  Color (One)',
            'id'            => 'product_badge_color',
            'type'          => 'color',
        ), 
        array(
            'title'          => 'Badge Background Color (Two)',
            'id'            => 'product_badge_bg_color_two',
            'type'          => 'color',
        ), 
        array(
            'title'          => 'Badge  Color (Two)',
            'id'            => 'product_badge_color_two',
            'type'          => 'color',
        ), 

 
	),
);

