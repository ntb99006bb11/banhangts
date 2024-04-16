<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Simple_image_box_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-simple-image-box-v1';
    }

    public function get_title()
    {
        return __('Image V1' , 'nest-addons');
    }

    public function get_icon()
    {
        return 'icon-letter-n';
    }

    public function get_categories()
    {
        return ['102'];
    }

    

    protected function register_controls() {

		$this->start_controls_section(
			'simple_image_type',
			[
				'label' => esc_html__( 'Image Content', 'nest-addons' ),
			]
        );


        $this->add_control(
            'image_type',
            [
              'label' => __('Image Type', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'options' => [
                'image' => __( 'Image', 'nest-addons' ),
                'carousel' => __( 'Image Carousel', 'nest-addons' ),
                ],
              'default' => 'image' ,
            ]
        );

        $this->add_control(
            'image_carousel_type',
            [
              'label' => __('Carousel Items', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'options' => [
                'carausel-3-columns' => __( 'Three Items', 'nest-addons' ),
                'carausel-4-columns' => __( 'Four Items', 'nest-addons' ),
                ],
              'default' => 'carausel-3-columns' , 
              'condition' => [
                'image_type' => 'carousel',
               ],
            ]
        );

        $this->add_control(
            'category_caro_items',
            [
            'label' => __('Carousel Items to Display', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '10' => __('10 Items', 'nest-addons'),
                '9' => __('9 Items', 'nest-addons'),
                '8' => __('8 Items', 'nest-addons'),
                '7' => __('7 Items', 'nest-addons'),
                '6' => __('6 Items', 'nest-addons'),
                '5' => __('5 Items', 'nest-addons'),
                '4' => __('4 Items', 'nest-addons'),
                '3' => __('3 Items', 'nest-addons'),
                '2' => __('2 Items', 'nest-addons'),
                '1' => __('1 Items', 'nest-addons'),
            ],
            'default' => '10' , 
            ]
        );


        $this->add_control(
            'image_fit_enable',
            [
              'label' => __( 'Image Fit Enable', 'nest-addons' ),
              'type' => \Elementor\Controls_Manager::SWITCHER,
              'label_on' => __( 'Show', 'nest-addons' ),
              'label_off' => __( 'Hide', 'nest-addons' ),
              'return_value' => 'yes',
              'default' => 'no',
            ]
        );

        $this->add_control(
			'img_height',
			[
				'label' => __( 'Image Height', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10000,
				'step' => 1,
				'default' => 400,
                'selectors' => [
					'{{WRAPPER}} .simple_image_boxes , {{WRAPPER}} .simple_image_boxes img ' => 'height: {{VALUE}}px',
				],
			]
		);
        $this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],

				'selectors' => [
					'{{WRAPPER}} .simple_image_boxes , {{WRAPPER}} .simple_image_boxes img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
				],
			]
		);


        $this->end_controls_section();


        $this->start_controls_section(
			'simple_image_content',
			[
				'label' => esc_html__( 'Image Content', 'nest-addons' ),
                'condition' => [
                    'image_type' => 'image',
                ],
			]
        );
     

        $this->add_control(
			'image',
			[
				'label' => __( 'Image', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
              
			]
        );


        
        $this->add_control(
            'transition_enable',
            [
                'label' => __('Transition Enable', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
    
        $this->add_control(
            'wow_animation',
            [
                'label' => esc_html__( 'Transition Timing', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => [
                    '0'  => esc_html__( '0', 'nest-addons' ),
                    '.1s' => esc_html__( '.1s', 'nest-addons' ),
                    '.2s' => esc_html__( '.2s', 'nest-addons' ),
                    '.3s' => esc_html__( '.3s', 'nest-addons' ),
                    '.4s' => esc_html__( '.4s', 'nest-addons' ),
                    '.5s' => esc_html__( '.5s', 'nest-addons' ),
                    '.6s' => esc_html__( '.6s', 'nest-addons' ),
                    '.7s' => esc_html__( '.7s', 'nest-addons' ),
                    '.8s' => esc_html__( '.8s', 'nest-addons' ),
                    '.9s' => esc_html__( '.9s', 'nest-addons' ),
                    '1s' => esc_html__( '1s', 'nest-addons' ),
                    '1.1s' => esc_html__( '1.1s', 'nest-addons' ),
                    '1.2s' => esc_html__( '1.2s', 'nest-addons' ),
                    '1.3s' => esc_html__( '1.3s', 'nest-addons' ),
                    '1.4s' => esc_html__( '1.4s', 'nest-addons' ),
                    '1.5s' => esc_html__( '1.5s', 'nest-addons' ),
                    '1.6s' => esc_html__( '1.6s', 'nest-addons' ),
                    '1.7s' => esc_html__( '1.7s', 'nest-addons' ),
                    '1.8s' => esc_html__( '1.8s', 'nest-addons' ),
                    '1.9s' => esc_html__( '1.9s', 'nest-addons' ),
                    '2s' => esc_html__( '2s', 'nest-addons' ),
                ],
                'condition' => [
                    'transition_enable' => 'yes'
                ], 
            ]
        );  
        
        $this->end_controls_section();

        $this->start_controls_section(
			'simple_image_content_carousel',
			[
				'label' => esc_html__( 'Image Content', 'nest-addons' ),
                'condition' => [
                    'image_type' => 'carousel',
                ],
			]
        );
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'r_image',
			[
				'label' => __( 'Image', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
              
			]
        );

     

        $this->add_control(
            'image_repeater',
            [
                'label' => __('Image Repeater', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'r_image' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                    [
                        'r_image' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                    [
                        'r_image' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
  
                ],
                'title_field' => __( 'Image', 'nest-addons' ),
    
            ]
          );
        $this->end_controls_section();

        $this->start_controls_section('owl_nav_style',
    [ 
        'label' => __('Custom Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
            'image_type' => 'carousel',
        ],
    ]
    );
 

    $this->add_control(
        'nav_style_options',
        [
        'label' => __('Nav Move Position', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'none_nav' => __( 'Select Nav Position', 'nest-addons' ),
            'position_one' => __( 'Position One', 'nest-addons' ),
            'position_two' => __( 'Position Two', 'nest-addons' ),
            'position_three' => __( 'Position Three', 'nest-addons' ),
            'position_four' => __( 'Position Four', 'nest-addons' ),
        ],
        'default' => 'none_nav' , 
        ]
    );
 
    $this->add_control(
        'nav_display',
        [
        'label' => __('Naigation Enable / Disabel', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'true' => __( 'Block', 'nest-addons' ),
            'false' => __( 'none', 'nest-addons' ),
        ],
        'default' => 'true' , 
       
        ]
    );

 

    $this->end_controls_section();
	}
    protected function render() {
		$settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
?>
<?php if($settings['image_type'] == 'carousel'): ?>

 
    <div class="<?php echo esc_attr($settings['image_carousel_type']); ?>-cover <?php if($settings['image_fit_enable'] == 'yes'): ?> image_fit <?php endif; ?> position-relative image_custom_caro <?php echo esc_attr($settings['nav_style_options']); ?>">
         
        <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 20, "autoheight":true, "lazyload":true, "nav": <?php echo esc_attr($settings['nav_display']); ?>, "dots": false, "autoplay": false, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "<?php echo esc_attr($settings['category_caro_items']); ?>" }}}'>
        <?php foreach($settings['image_repeater'] as  $key => $image_repeater): ?>
        <img src="<?php echo esc_url($image_repeater['r_image']['url']); ?>" alt="image" />
        <?php endforeach; ?>
    </div>    
</div>
 
<?php else: ?>
<?php if(!empty($settings['image']['url'])): ?>
<div class="simple_image_boxes <?php if($settings['image_fit_enable'] == 'yes'): ?> image_fit <?php endif; ?> 
    <?php if($settings['transition_enable']  == 'yes'): ?>wow animate__animated animate__fadeInUp"
    data-wow-delay="<?php echo esc_html($settings['wow_animation']); ?><?php endif; ?>">
    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="image" />
</div>
<?php endif; ?>
  
<?php endif; ?>

<?php 
	}
}
 