<?php

return array(
	'id'     => 'nest_product_video_settings',
	'title'  => esc_html__( "Product Video", "nest-addons" ),
	'fields' => array(

        array(
            'title' => esc_html__('Product Video Enable', 'nest-addons') ,
            'id' => 'product_video_enable',
            'type' => 'switch',
            'default'  => false,
        ),

        array(
			'id'    => 'product_video_styles',
			'type'  => 'select',
			'title' => esc_html__( 'Product Video Styles', 'nest-addons' ),
			'options' => array(
				'style_one' => esc_html('Style One' , 'nest-addons'),
                'style_two' => esc_html('Style Two' , 'nest-addons'),
			),
			'default'  => 'style_one',
			'required' => array( 'product_video_enable', '=', true ),
		),

        array(
            'title' => esc_html__('Video Text', 'nest-addons') ,
            'id' => 'porduct_video_texts',
            'type' => 'text',
            'default' => esc_html('<i class="fa fa-play"></i>Play Video' ,'nest-addons' ),
            'required' => array( 'product_video_styles', '=', 'style_one' ),
        ),  

        array(
			'id'    => 'product_video_types',
			'type'  => 'select',
			'title' => esc_html__( 'Product Video Type', 'nest-addons' ),
			'options' => array(
				'iframe' => esc_html('Iframe(Embed )' , 'nest-addons'),
                'video' => esc_html('Video Mp4' , 'nest-addons'),
			),
			'default'  => 'iframe',
			'required' => array( 'product_video_styles', '=', 'style_two' ),
		),

      
        array(
            'title'		=> esc_html__('Video Link','nest-addons'),
            'id'		=> 'product_video_link',
            'type'		=> 'textarea',
            'required' => array( 'product_video_enable', '=', true ),
            'default' => esc_html('https://youtu.be/embed/SjpAiw7CNzk' ,'nest-addons' ),
            'desc' =>  esc_html('Enter the Video link here' ,'nest-addons' ),
        ),
    
	),
);

