<?php

namespace  Nestaddons\Core\Widgets\Slider;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Slider_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-slider-v1';
    }

    public function get_title()
    {
        return __('Slider V1', 'nest-addons');
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
      $this->start_controls_section('slider_v1_slect',
      [ 
          'label' => __('Slider V1', 'nest-addons')
      ]
      );
      $this->add_control(
        'slider_styles',
        [
          'label' => __('Slider Styles', 'nest-addons'),
          'type' => \Elementor\Controls_Manager::SELECT,
          'options' => [
            'style_one' => __( 'Slider Style One', 'nest-addons' ),
            'style_two' => __( 'Slider Style Two', 'nest-addons' ),
			    ],
          'default' => 'style_one' , 
        ]
      );
      $this->end_controls_section();
        // style one start
        $this->start_controls_section('slider_v1_settings',
        [ 
            'label' => __('Slider Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            
        ]
        );

      
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
          'content_alginment',
          [
            'label' => __( 'Content Alignment', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            
            'options' => [
              'content_left'  => __( 'Content Left', 'nest-addons' ),
              'content_center'  => __( 'Content Center', 'nest-addons' ),
              'content_right'  => __( 'Content Right', 'nest-addons' ),
            ],
            'default' => 'content_left' ,
          ]
        );
        $repeater->add_control(
          'heading',
          [
             'label' => __('Heading', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXTAREA,
             'default' => __('Inspired <br>  Performance', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),    
          ]
        );
 
        $repeater->add_control(
            'content',
            [
              'label' => __('Content', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'default' => __('Our Vision to Grow Better', 'nest-addons'),
              'placeholder' => __('Type your text here', 'nest-addons'),
            ]
        );

        $repeater->add_control(
            'button_enable',
            [
              'label' => __( 'Button Enable', 'nest-addons' ),
              'type' => \Elementor\Controls_Manager::SWITCHER,
              'label_on' => __( 'Show', 'nest-addons' ),
              'label_off' => __( 'Hide', 'nest-addons' ),
              'return_value' => 'yes',
              'default' => 'no',
            ]
          );
      
    
        $repeater->add_control(
            'button',
            [
                'label' => __('Btn Label', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Us', 'nest-addons'),
                'placeholder' => __('Btn Label Here', 'nest-addons'),
                'condition' => [
                    'button_enable' => 'yes'
                ],
            ]
        );
    $repeater->add_control(
        'button_link',
        [
            'label' => __('Btn Link One', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __('https://your-link.com', 'nest-addons'),
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => true,
                'nofollow' => true,
            ],
            'condition' => [
                'button_enable' => 'yes'
            ],
        ]
    );

    $repeater->add_control(
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
    $repeater->add_control(
        'short_code',
        [
          'label' => __('Shortcode', 'nest-addons'),
          'type' => \Elementor\Controls_Manager::TEXTAREA,
          'default' => __('', 'nest-addons'),
          'placeholder' => __('[mc4wp_form id="104"]', 'nest-addons'),
        ]
    );

       $repeater->add_control(
        'slider_background_image',
        [
          'label' => __( 'Background Image', 'nest-addons' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ] 
       );

       

       $this->add_control(
        'slider_repeater',
        [
            'label' => __('Slider Repeater', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                'heading' => __('Don’t miss amazing<br /> grocery deals', 'nest-addons'),
                'content' =>  __('Sign up for the daily newsletter', 'nest-addons'),
                'button_enable' =>  __('no', 'nest-addons'),
                'shortcode_enable' =>  __('yes', 'nest-addons'),
                'short_code' =>  __('', 'nest-addons'),
                ],
                [
                'heading' => __('Fresh Vegetables<br /> Big discount', 'nest-addons'),
                'content' =>  __('Sign up for the daily newsletter', 'nest-addons'),
                'button_enable' =>  __('yes', 'nest-addons'),
                'shortcode_enable' =>  __('no', 'nest-addons'),
                'short_code' =>  __('', 'nest-addons'),
                ],
            ],
            'title_field' => '{{{ heading }}}',

        ]
      );

      $this->add_responsive_control(
        'text_align',
        [
          'label' => esc_html__( 'Alignment', 'nest-addons' ),
          'type' => \Elementor\Controls_Manager::CHOOSE,
          'options' => [
            'left' => [
              'title' => esc_html__( 'Left', 'nest-addons' ),
              'icon' => 'fa fa-align-left',
            ],
            'center' => [
              'title' => esc_html__( 'Center', 'nest-addons' ),
              'icon' => 'fa fa-align-center',
            ],
            'right' => [
              'title' => esc_html__( 'Right', 'nest-addons' ),
              'icon' => 'fa fa-align-right',
            ],
          ],
          'default' => 'center',
          'toggle' => true,
                  'selectors' => [
                      '{{WRAPPER}} .section_title ' => 'text-align: {{VALUE}}!important;',
                  ],
        ]
      );


      $this->end_controls_section();

        // slider style one end ======================

        

      $this->start_controls_section('nav_dots_css',
      [ 
        'label' => __('Navigation / Pagination Css', 'nest-addons') ,
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
      ]);
        
         
      $this->add_control(
        'dot_position_style',
        [
          'label' => __( 'Pagination Position', 'nest-addons' ),
          'type' => \Elementor\Controls_Manager::SELECT,
       
          'options' => [
            'dot-style-1-position-1'  => __( 'Dot Position One', 'nest-addons' ),
            'dot-style-1-position-2'  => __( 'Dot position Two', 'nest-addons' ),
          ],
          'default' => 'pag_position_one' ,
        ]
      );
      $this->add_control(
        'dot_border_color',
         [
            'label' => __('Dot Border Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}   .owl-carousel .owl-dots button ' => 'border-color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
      'dot_active_color',
       [
          'label' => __('Dot Border Color', 'nest-addons'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
              '{{WRAPPER}}  .owl-carousel .owl-dots button.active ' => 'border-color: {{VALUE}}!important; background: {{VALUE}}!important;',
          ],
       ]
  );


    

      
    $this->add_control(
      'owl_nav_color',
       [
          'label' => __('Owl Nav Arrow Color', 'nest-addons'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
              '{{WRAPPER}} .home-slider   .owl-nav i ' => 'color: {{VALUE}}!important;',
          ],
       ]
  );
   
  $this->add_control(
      'owl_nav_bg_color',
       [
          'label' => __('Owl Nav Arrow Bg Color', 'nest-addons'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
              '{{WRAPPER}} .home-slider  .owl-carousel .owl-nav .owl-prev , {{WRAPPER}}  .home-slider  .owl-carousel .owl-nav .owl-next ' => 'background: {{VALUE}}!important;',
          ],
       ]
  );

  
  $this->add_control(
      'owl_nav_hover_color',
       [
          'label' => __('Owl Nav Hover Arrow Color', 'nest-addons'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
              '{{WRAPPER}} .home-slider .owl-carousel  .owl-nav .owl-prev:hover i , {{WRAPPER}} .home-slider  .owl-carousel .owl-nav .owl-next:hover i ' => 'color: {{VALUE}}!important;',
          ],
       ]
  );
   
  $this->add_control(
      'owl_nav_hover_bg_color',
       [
          'label' => __('Owl Nav Hover Arrow Bg Color', 'nest-addons'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
              '{{WRAPPER}} .home-slider  .owl-carousel .owl-nav .owl-prev:hover , {{WRAPPER}} .home-slider  .owl-carousel .owl-nav .owl-next:hover ' => 'background: {{VALUE}}!important;',
          ],
       ]
  );

      $this->end_controls_section();

      $this->start_controls_section('slider_css',
      [ 
          'label' => __('Slider Css', 'nest-addons'),
          'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
      ]
      );
  
      
      $this->add_control(
          'title_color',
           [
              'label' => __('Title Color', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}} .home-slider  h1 ' => 'color: {{VALUE}}!important;',
              ],
           ]
      );
   
      $this->add_control(
          'description_color',
           [
              'label' => __('Description Color', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}} .home-slider p ' => 'color: {{VALUE}}!important;',
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
   
      $this->add_control(
          'border_radius',
          [
              'label' => esc_html__( 'Border Radius', 'nest-addons' ),
              'type' => \Elementor\Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', '%', 'em' ],
              'selectors' => [
                  '{{WRAPPER}} .hero-slider-1 .home-slider ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
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
 
        <section class="home-slider position-relative">
					<div class="home-slide-cover">
						<div class="hero-slider-1 owl-carousel owl-theme style-4 dot-style-1 <?php echo esc_attr($settings['dot_position_style']); ?>">
            <?php if($settings['slider_repeater']) : foreach($settings['slider_repeater'] as  $key => $slider_repeater): 
              if($slider_repeater['button_enable'] == 'yes'): 
              $target = $slider_repeater['button_link']['is_external'] ? ' target="_blank"' : '';
              $nofollow = $slider_repeater['button_link']['nofollow'] ? ' rel="nofollow"' : '';
              endif;
              ?>
							<div class="single-hero-slider <?php echo esc_attr($slider_repeater['content_alginment']); ?> <?php if($settings['slider_styles'] == 'style_two'): ?> rectangle <?php endif; ?>   single-animation-wrap" <?php if(!empty($slider_repeater['slider_background_image'])): ?> style="background-image: url(<?php echo esc_attr($slider_repeater['slider_background_image']['url']); ?>)" <?php endif; ?>>
								<div class="slider-content">
									<h1 class="display-2 mb-40">
                      <?php echo wp_kses($slider_repeater['heading'] , $allowed_tags); ?>
									</h1>
									<p class="mb-65"><?php echo wp_kses($slider_repeater['content'] , $allowed_tags); ?></p>
                  <?php if($slider_repeater['button_enable'] == 'yes'): ?>
                    <div class="theme_btn_all">
                      <a href="<?php echo esc_url($slider_repeater['button_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="btn text-center">
                        <?php echo esc_html($slider_repeater['button']);?>
                      </a>
                  </div>
                    <?php endif; ?>
                    <?php if($slider_repeater['shortcode_enable'] == 'yes'): ?>
									<div class="form-subcriber d-flex">
                    <?php echo do_shortcode($slider_repeater['short_code']); ?>
                  </div>
                  <?php endif; ?>
								</div>
							</div>
            <?php endforeach; endif; ?>
					</div>
					
				</div>
		  </section>
  
     

        <?php
    }
}
 