<?php

return array(
	'id'     => 'nest_product_img_settings',
	'title'  => esc_html__( "Product Hover Image", "nest-addons" ),
	'fields' => array(

        array(
            'title' => esc_html__('Hover Product Image', 'nest-addons') ,
            'id' => 'hover_product_image',
            'type' => 'image_advanced',
            'type' => 'media',
            'url'      => true,
           
        ) ,
    
	),
);

