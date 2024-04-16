<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Icon_box_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-icon-box-v1';
    }

    public function get_title()
    {
        return __('Icon Box V1', 'nest-addons');
    }

    public function get_icon()
    {
        return 'icon-letter-n';
    }

    public function get_categories()
    {
        return ['102'];
    }

    protected function register_controls(){
 
        // style one start
        $this->start_controls_section('icon_v1_settings',
        [ 
            'label' => __('Icon Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
        $this->add_control(
            'icon_box_style',
            [
            'label' => __('Icon Box Styles', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style_one' => __( 'Style One', 'nest-addons' ),
                'style_two' => __( 'Style Two', 'nest-addons' ),
            ],
            'default' => 'style_one' , 
            ]
        );


        $this->add_control(
            'icon_style',
            [
            'label' => __('Icon Styles', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'type_image' => __( 'Image Type', 'nest-addons' ),
                'type_icon' => __( 'Image Icon', 'nest-addons' ),
            ],
            'default' => 'type_image' , 
            ]
        );

        $this->add_control(
            'image_font',
            [
            'label' => __( 'Image', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => [
                'icon_style' => 'type_image'
            ],
            ] 
        );
        $this->add_control(
            'icon_fonts',
            [
                'label' => __('Icon', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => nest_get_icon(),
                'default' => 'fi-rs-user' , 
                'condition' => [
                    'icon_style' => 'type_icon'
                ],
            ]
        );


        $this->add_control(
          'title',
          [
             'label' => __('Title', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXTAREA,
             'default' => __('  Stay home & get your daily <br />  needs from our shop', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),    
          ]
        );
        
        $this->add_control(
            'description',
            [
              'label' => __('Decription', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'default' => __('Start Your Daily Shopping with <span class="text-brand">Nest Mart</span>', 'nest-addons'),
              'placeholder' => __('Type your text here', 'nest-addons'),
            ]
        );

        $this->add_control(
            'link_texts',
            [
               'label' => __('Title', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => __('Read More', 'nest-addons'),
               'placeholder' => __('Type your text here', 'nest-addons'),  
               'condition' => [
                    'icon_box_style' => 'style_two'
                ],  
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => __('Link', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'nest-addons'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
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

    $this->start_controls_section('icon_box_css',
    [ 
        'label' => __('Icon Box Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

    
    $this->add_control(
        'title_color',
         [
            'label' => __('Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .icon_box_custom h3 a , {{WRAPPER}} .icon_box_custom h4 a' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'description_color',
         [
            'label' => __('Description Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .icon_box_custom   p ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'icon_color',
         [
            'label' => __('Icon Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .icon_box_custom .banner-icon span ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'readmore_color',
         [
            'label' => __('Readmore Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .icon_box_custom  a.read_mores ' => 'color: {{VALUE}}!important;',
            ],
            'condition' => [
                'icon_box_style' => 'style_two'
            ],  
         ]
    );


    
    $this->add_control(
        'box_bg_color',
         [
            'label' => __('Box Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .icon_box_custom ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'box_border_color',
         [
            'label' => __('Box Border Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .featured-card ' => 'border-color: {{VALUE}}!important;',
            ],
            'condition' => [
                'icon_box_style' => 'style_two'
            ],  
         ]
    );
    

    $this->end_controls_section();

    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
     ?>
        
    <?php // style teo?>
    <?php if($settings['icon_box_style'] == 'style_two'):  ?>
    <?php // style teo?>
    <div class="featured-card icon_box_custom text-center wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?>">
        <?php if($settings['icon_style'] == 'type_image'): // icon style ?> 
            <?php if(!empty($settings['image_font'])): // icon image ?>
                <img src="<?php echo esc_attr($settings['image_font']['url']); ?>" alt="icon" />
            <?php endif; // icon image ?>
        <?php elseif($settings['icon_style'] == 'type_icon'): // icon style ?>
            <div class="banner-icon">
                <span class="<?php echo esc_attr($settings['icon_fonts']); ?>"></span>
            </div>
        <?php endif; // icon style ?>
        <h4>
            <a <?php if(!empty($settings['link']['url'])): ?> href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?><?php endif; ?>>
                <?php echo wp_kses($settings['title'] , $allowed_tags); ?>
            </a>
        </h4>
        <p><?php echo wp_kses($settings['description'] , $allowed_tags); ?></p>
         <a class="read_mores" <?php if(!empty($settings['link']['url'])): ?>  href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?><?php endif; ?>>
            <?php echo wp_kses($settings['link_texts'] , $allowed_tags); ?>
        </a>
        
     </div>
     <?php // style one ?>
    <?php else:  ?>
    <?php // style one?>

    <div class="banner-left-icon icon_box_custom d-flex align-items-center <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?><?php endif; ?>">
    <?php if($settings['icon_style'] == 'type_image'): // icon style ?>
        <div class="banner-icon">
        <?php if(!empty($settings['image_font'])): // icon image ?>
            <img src="<?php echo esc_attr($settings['image_font']['url']); ?>" alt="icon" />
        <?php endif; // icon image ?>
        </div>
    <?php elseif($settings['icon_style'] == 'type_icon'): // icon style ?>
        <div class="banner-icon">
            <span class="<?php echo esc_attr($settings['icon_fonts']); ?>"></span>
        </div>
    <?php endif; // icon style ?>
        <div class="banner-text">
            <h3>
                <a <?php if(!empty($settings['link']['url'])): ?>   href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?><?php endif; ?>>
                    <?php echo wp_kses($settings['title'] , $allowed_tags); ?>
                </a>
            </h3>
            <p><?php echo wp_kses($settings['description'] , $allowed_tags); ?></p>
        </div>
    </div>
   
 
    <?php // style ?>
    <?php endif; ?>
    <?php // style ?>


    <?php
    }
}
 