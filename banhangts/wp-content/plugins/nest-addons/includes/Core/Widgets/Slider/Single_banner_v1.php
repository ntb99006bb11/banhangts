<?php

namespace  Nestaddons\Core\Widgets\Slider;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Single_banner_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-single-banner-v1';
    }

    public function get_title()
    {
        return __('Single Banner V1', 'nest-addons');
    }

    public function get_icon()
    {
        return 'icon-letter-n';
    }

    public function get_categories()
    {
        return ['101'];
    }

    protected function register_controls(){
 
        // style one start
        $this->start_controls_section('signle_banner_v1_settings',
        [ 
            'label' => __('Newsteller Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
        $this->add_control(
            'single_banner_style',
            [
            'label' => __('Banner Styles', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style_one' => __( 'Style One', 'nest-addons' ),
                'style_two' => __( 'Style Two', 'nest-addons' ),
            ],
            'default' => 'style_one' , 
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
            'shortcode_enable',
            [
              'label' => __( 'Shortcode Enable', 'nest-addons' ),
              'type' => \Elementor\Controls_Manager::SWITCHER,
              'label_on' => __( 'Show', 'nest-addons' ),
              'label_off' => __( 'Hide', 'nest-addons' ),
              'return_value' => 'yes',
              'default' => 'yes',
            ]
        );
        $this->add_control(
            'short_code',
            [
              'label' => __('Shortcode', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'default' => __('', 'nest-addons'),
              'placeholder' => __('[mc4wp_form id="104"]', 'nest-addons'),
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
              'condition' => [
                'single_banner_style' => 'style_one'
              ], 
            ] 
        );

        $repeater = new \Elementor\Repeater();
         
        $repeater->add_control(
            'list_item',
            [
                'label' => __('Item Text', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Us', 'nest-addons'),
                'placeholder' => __('Btn Label Here', 'nest-addons'),
            ]
        );
        $repeater->add_control(
            'list_item_link',
            [
            'label' => __('Item Link', 'nest-addons'),
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
        'list_repeater',
        [
            'label' => __('List Repeater', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                'list_item' => __('Cake ', 'nest-addons'),
                ],
                [
                'list_item' => __('Coffes', 'nest-addons'),
                ],
                [
                'list_item' => __('Pet Foods', 'nest-addons'),
                ],
                [
                'list_item' => __('Vegetables', 'nest-addons'),
                ],
            ],
            'title_field' => '{{{ list_item }}}',
            'condition' => [
                'single_banner_style' => 'style_two'
            ], 
        ]
      );


    $this->end_controls_section();

    $this->start_controls_section('singlebanner_css',
    [ 
        'label' => __('Single Banner Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

    
    $this->add_control(
        'title_color',
         [
            'label' => __('Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .newsletter .newsletter-inner .newsletter-content h2 , {{WRAPPER}} .hero-3 h2' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
 
    $this->add_control(
        'description_color',
         [
            'label' => __('Description Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .newsletter .newsletter-inner .newsletter-content p , {{WRAPPER}} .hero-3 p , {{WRAPPER}} .newsletter  p .text-brand , {{WRAPPER}} .herp-3  p .text-brand ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'cat_color',
         [
            'label' => __('Category Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .hero-3 .list-inline li a ' => 'color: {{VALUE}}!important;',
            ],
            'condition' => [
                'single_banner_style' => 'style_two'
            ], 
         ]
    );

    $this->add_control(
        'cat_hover_color',
         [
            'label' => __('Category Hover Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .hero-3 .list-inline li a:hover ' => 'color: {{VALUE}}!important;',
            ],
            'condition' => [
                'single_banner_style' => 'style_two'
            ], 
         ]
    );

    $this->add_control(
        'form_input_place_color',
         [
            'label' => __('Form Input Placeholder Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .form-subcriber form input::placeholder ' => 'color: {{VALUE}}!important;',
            ],
           
         ]
    );
    $this->add_control(
        'form_input_bg_color',
         [
            'label' => __('Form Input Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .form-subcriber form input ' => 'background: {{VALUE}}!important;',
            ],
           
         ]
    );

    $this->add_control(
        'form_btn_color',
         [
            'label' => __('Form Button  Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .form-subcriber form input[type="submit"] ' => 'color: {{VALUE}}!important;',
            ],
           
         ]
    );

    $this->add_control(
        'form_btn_bg_color',
         [
            'label' => __('Form Button Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .form-subcriber form input[type="submit"] ' => 'background: {{VALUE}}!important;',
            ],
           
         ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background',
            'label' => esc_html__( 'Background', 'nest-addons' ),
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .newsletter .newsletter-inner , {{WRAPPER}} .hero-3',
        ]
    );
    $this->add_control(
        'border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .newsletter .newsletter-inner , {{WRAPPER}} .hero-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
            ],
        ]
    );
  

    $this->end_controls_section();

  


    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
       
    ?>
    <?php // style ?>
    <?php if($settings['single_banner_style'] == 'style_one'):  ?>
    <?php // style ?>
          <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
               
                <div class="position-relative newsletter-inner">
                    <div class="newsletter-content">
                    <?php if(!empty($settings['title'])): ?>
                        <h2 class="mb-20">
                        <?php echo wp_kses($settings['title'] , $allowed_tags); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if(!empty($settings['description'])): ?>
                        <p class="mb-45">  <?php echo wp_kses($settings['description'] , $allowed_tags); ?></p>
                    <?php endif; ?>
                        <?php if($settings['shortcode_enable'] == 'yes'): ?>
                        <div class="form-subcriber d-flex">
                            <?php echo do_shortcode($settings['short_code']); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($settings['image']['url'])): ?>
                         <img src="<?php echo esc_attr($settings['image']['url']); ?>" alt="newsletter" />
                    <?php endif; ?>
                    
                </div>

            </section>

    <?php elseif($settings['single_banner_style'] == 'style_two'):  ?>
            <section class="hero-3 position-relative align-items  text-center">
            <?php if(!empty($settings['title'])): ?>
                <h2 class="mb-30">  <?php echo wp_kses($settings['title'] , $allowed_tags); ?></h2>
            <?php endif; ?>
                <?php if(!empty($settings['description'])): ?>
                        <p class="mb-45">  <?php echo wp_kses($settings['description'] , $allowed_tags); ?></p>
                    <?php endif; ?>
                <?php if($settings['shortcode_enable'] == 'yes'): ?>
                    <div class="form-subcriber d-flex mb-30">
                        <?php echo do_shortcode($settings['short_code']); ?>
                    </div>
                <?php endif; ?>
                <ul class="list-inline nav nav-tabs links font-xs">
                <?php foreach($settings['list_repeater'] as  $key => $list_repeater): 
                     $target = $list_repeater['list_item_link']['is_external'] ? ' target="_blank"' : '';
                     $nofollow = $list_repeater['list_item_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                    ?>
                    <li class="list-inline-item nav-item">
                        <a class="nav-link font-xs" href="<?php echo esc_url($list_repeater['list_item_link']['url']) ?>" <?php echo esc_attr($target);  ?> <?php echo esc_attr($nofollow);  ?>><?php echo wp_kses($list_repeater['list_item'] , $allowed_tags); ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </section>

    <?php // style ?>
    <?php endif; ?>
    <?php // style ?>


    <?php
    }
}

 

