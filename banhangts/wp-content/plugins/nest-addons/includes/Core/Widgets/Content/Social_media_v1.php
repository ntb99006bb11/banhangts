<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Social_media_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-social-media-v1';
    }

    public function get_title()
    {
        return __('Social Media V1' , 'nest-addons');
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
			'media_content',
			[
				'label' => esc_html__( 'Media Content', 'nest-addons' ),
			]
        );
        $this->add_control(
            'title',
        [
            'label' => esc_html__('Title', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Follow Us' , 'nest-addons'),
        ]);
     
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'media_icon',
        [
            'label' => esc_html__('Media Icon', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('fab fa-facebook' , 'nest-addons'),
        ]);
       
        $repeater->add_control(
            'media_link',
        [
            'label' => esc_html__('Media Link', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('#' , 'nest-addons'),
        ]);
        
      
      $this->add_control(
        'media_repeater',
        [
            'label' => __('Media Repeater', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'media_icon' =>  __('fab fa-facebook','nest-addons'),
                ],
                [
                    'media_icon' =>  __('fab fa-twitter','nest-addons'),
                ],
                [
                    'media_icon' =>  __('fab fa-skype','nest-addons'),
                ],
                [
                    'media_icon' =>  __('fab fa-instagram','nest-addons'),
                ]
                
            ],
            'title_field' => '{{{ media_icon }}}',
        ]);


        
        $this->add_responsive_control(
            'media_alignments',
            [
                'label' => __('Media alignments', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                  'flex-start' => [
                    'title' => __( 'Text Left', 'nest-addons' ),
                    'icon' => 'eicon-text-align-left',
                  ],
                  'center' => [
                    'title' => __( 'Text Center', 'nest-addons' ),
                    'icon' => 'eicon-text-align-center',
                  ],
                  'flex-end' => [
                    'title' => __( 'Text Right', 'nest-addons' ),
                    'icon' => 'eicon-text-align-right',
                  ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                  '{{WRAPPER}} .mobile-social-icon ' => 'justify-content: {{VALUE}}!important;',
                ],
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section('css_changing',
        [ 
            'label' => __('Style', 'nest-addons'),
            'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
        ]);

        

        $this->add_control(
            'media_title_color',
            [
                'label' => __( 'Title Color', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mobile-social-icon h6 ' => 'color: {{VALUE}}',
                ],
            ]
        );
    
  
        $this->add_control(
          'media_icon_color',
          [
              'label' => __( 'Media Icon Color', 'nest-addons' ),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}} .mobile-social-icon a i ' => 'color: {{VALUE}}',
              ],
          ]
      );
  
      $this->add_control(
          'media_icon_bg',
          [
              'label' => __( 'Media Icon Background', 'nest-addons' ),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}} .mobile-social-icon a ' => 'background: {{VALUE}}',
              ],
          ]
      );

      $this->add_control(
        'media_font_weights',
        [
            'label' => __('Icon Font Weight', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '400'   => esc_html__( '400', 'nest-addons' ),
                '500'   => esc_html__( '500', 'nest-addons' ),
                '600'   => esc_html__( '600', 'nest-addons' ), 
                '700'   => esc_html__( '700', 'nest-addons' ), 
                '800'   => esc_html__( '800', 'nest-addons' ), 
                '900'   => esc_html__( '900', 'nest-addons' ), 
            ],
            'default' => '400',
            'selectors' => [
                '{{WRAPPER}} .mobile-social-icon  i' => 'font-weight: {{VALUE}}',
            ],
        ]
    );
  
    $this->add_control(
        'font_familyss',
        [
            'label' => __('Font Family', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'Font Awesome 5 Brands'   => esc_html__( 'Font Awesome 5 Brands', 'nest-addons' ),
                'Font Awesome 5 Free'   => esc_html__( 'Font Awesome 5 Free', 'nest-addons' ),
                'FontAwesome'   => esc_html__( 'FontAwesome', 'nest-addons' ),
                
            ],
            'default' => 'Font Awesome 5 Brands',
            'selectors' => [
                '{{WRAPPER}} .mobile-social-icon i' => 'font-family: {{VALUE}}',
            ],
        ]
    );
  
      
      $this->end_controls_section();
        
       
	}
    protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
  
		?>

<div class="mobile-social-icon">
    <?php if(!empty($settings['title'])): ?>
        <h6><?php echo esc_attr($settings['title']); ?></h6>
    <?php endif; ?>
        <?php foreach($settings['media_repeater'] as $media): ?>
            <a href="<?php echo esc_url($media['media_link']); ?>"> <i class="<?php echo esc_attr($media['media_icon']); ?>"></i>
              
            </a>
        <?php endforeach; ?>
</div>
 
	
		<?php 
	}
}

 