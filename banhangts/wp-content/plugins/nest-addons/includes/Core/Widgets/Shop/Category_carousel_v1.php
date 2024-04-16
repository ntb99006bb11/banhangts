<?php

namespace  Nestaddons\Core\Widgets\Shop;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Category_carousel_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-category-v1';
    }

    public function get_title()
    {
        return __('Category Carousel V1', 'nest-addons');
    }

    public function get_icon()
    {
        return 'icon-letter-n';
    }

    public function get_categories()
    {
        return ['103'];
    }

    protected function register_controls(){
 
        // style one start
        $this->start_controls_section('category_v1_settings',
        [ 
            'label' => __('Category Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );

        $this->add_control(
            'cat_carousel_styles',
            [
            'label' => __('Category Carousel Style', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'styleone' => __( 'Style One', 'nest-addons' ),
                'styletwo' => __( 'Style Two', 'nest-addons' ),
                'stylethree' => __( 'Style Three', 'nest-addons' ),
            ],
            'default' => 'styleone' , 
            ]
        );

        $this->add_control(
          'category_caro_items',
          [
          'label' => __('Category Carousel Items', 'nest-addons'),
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
          'default' => '' , 
          ]
      );
      
 
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
          'cat_image',
          [
            'label' => __( 'Image', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
          ] 
         );
        $repeater->add_control(
          'cat_name',
          [
             'label' => __('Category Name', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXTAREA,
             'default' => __('Inspired <br>  Performance', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),    
          ]
        );
        $repeater->add_control(
            'item_count',
            [
              'label' => __('Item Count', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'default' => __('Our Vision to Grow Better', 'nest-addons'),
              'placeholder' => __('Type your text here', 'nest-addons'),
            ]
        );
        $repeater->add_control(
          'cat_link',
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

      
    $repeater->add_control(
        'background_color',
         [
            'label' => __('background Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
         ]
    );
    $repeater->add_control(
        'border_color',
         [
            'label' => __('Border Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
         ]
    );
    $repeater->add_control(
        'heading_color',
         [
            'label' => __('Heading Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
         ]
    );
    $repeater->add_control(
        'count_color',
         [
            'label' => __('Count Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
         ]
    );
  

       $this->add_control(
        'cat_repeater',
        [
            'label' => __('Category Repeater', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                'cat_name' =>  __('Cake & Milk', 'nest-addons'),
                'item_count' =>  __('26 items', 'nest-addons'),
                ],
                [
                'cat_name' =>  __('Oganic Kiwi', 'nest-addons'),
                'item_count' =>  __('28 items', 'nest-addons'),
                ],
            ],
            'title_field' => '{{{ cat_name }}}',
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
    
    $this->start_controls_section('owl_nav_style',
    [ 
        'label' => __('Custom Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
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
        'default' => __('none_nav' , 'nest-addons'),
        ]
    );
    $this->add_control(
        'nav_move_count',
        [
            'label' => __('Nav Move Top', 'nest-addons'),
            'type'    => \Elementor\Controls_Manager::NUMBER,
            'min'     => -100,
            'max'     => 1,
            'step'    => 1,
            'condition' => [
                'nav_style_options' => ['position_two' , 'position_three'],
            ],
            'selectors' => [
                '{{WRAPPER}}  .position_two .owl-carousel .owl-nav , {{WRAPPER}}  .position_three .owl-carousel .owl-nav ' => 'top: {{VALUE}}px!important;',
            ],
        ]
    );
   
    $this->add_control(
        'nav_displays',
        [
        'label' => __('Naigation Enable / Disabel', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'true' => __( 'Block', 'nest-addons' ),
            'false' => __( 'none', 'nest-addons' ),
        ],
        'default' => 'true',
       
        ]
    );


    $this->add_control(
        'owl_nav_color',
         [
            'label' => __('Owl Nav Arrow Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sec_category_carousels  .owl-nav i ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
     
    $this->add_control(
        'owl_nav_bg_color',
         [
            'label' => __('Owl Nav Arrow Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sec_category_carousels .owl-carousel .owl-nav .owl-prev, .sec_category_carousels .owl-carousel .owl-nav .owl-next ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );

    
    $this->add_control(
        'owl_nav_hover_color',
         [
            'label' => __('Owl Nav Hover Arrow Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sec_category_carousels  .owl-nav .owl-prev:hover i , {{WRAPPER}} .sec_category_carousels  .owl-nav .owl-next:hover i ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
     
    $this->add_control(
        'owl_nav_hover_bg_color',
         [
            'label' => __('Owl Nav Hover Arrow Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sec_category_carousels .owl-carousel .owl-nav .owl-prev:hover , {{WRAPPER}} .sec_category_carousels .owl-carousel .owl-nav .owl-next:hover ' => 'background: {{VALUE}}!important;',
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

    <?php
    if($settings['cat_carousel_styles'] == 'styleone'):
        $class = esc_html('card-2 bg-9 ');
    elseif($settings['cat_carousel_styles'] == 'styletwo'):
        $class = esc_html('card-1');
    elseif($settings['cat_carousel_styles'] == 'stylethree'):
        $class = esc_html('card-1 card-3');
    else:
        $class = esc_html('card-2 bg-9 ');
    endif;
    ?>
    
   <section class="sec_category_carousels position-relative <?php echo esc_attr($settings['nav_style_options']); ?>
   <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?><?php endif; ?>">
       
        <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 20, "autoheight":true, "lazyload":true, "nav": <?php echo esc_attr($settings['nav_displays']); ?>, "dots": false, "autoplay": false, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "320" :{ "items" : "2" }, "500" :{ "items" : "3" }, "768" :{ "items" : "4" } , "992":{ "items" : "5" }, "1200":{ "items" : "<?php echo esc_attr($settings['category_caro_items']); ?>" }}}'>
            <?php if($settings['cat_repeater']):  foreach($settings['cat_repeater'] as  $key => $cat_repeater):   
        $target = $cat_repeater['cat_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $cat_repeater['cat_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>

            <div class="<?php echo esc_attr($class); ?>" <?php if(!empty($cat_repeater['background_color']) || !empty($cat_repeater['border_color'])): ?>style="<?php if(!empty($cat_repeater['background_color'])): ?>background:<?php echo esc_attr($cat_repeater['background_color']); ?>!important;<?php endif; ?>
                    <?php if(!empty($cat_repeater['border_color'])): ?>border-color:<?php echo esc_attr($cat_repeater['border_color']); ?>!important;<?php endif; ?>" <?php endif; ?>>
                <?php if(!empty($cat_repeater['cat_image']['url'])): ?>
                <figure class="img-hover-scale">
                    <a href="<?php echo esc_url($cat_repeater['cat_link']['url']); ?>" <?php echo esc_attr($target); ?>
                        <?php echo esc_attr($nofollow); ?> class="d-block">
                        <img src="<?php echo esc_url($cat_repeater['cat_image']['url']); ?>" alt="" />
                    </a>
                </figure>
                <?php endif; ?>
                <?php if(!empty($cat_repeater['cat_name'])): ?>
                <h6> <a href="<?php echo esc_url($cat_repeater['cat_link']['url']); ?>" <?php echo esc_attr($target); ?>
                        <?php echo esc_attr($nofollow); ?> <?php if(!empty($cat_repeater['heading_color'])): ?>style="color:<?php echo esc_attr($cat_repeater['heading_color']); ?>;" <?php endif; ?>><?php echo wp_kses($cat_repeater['cat_name'] , $allowed_tags); ?></a></h6>
                <?php endif; ?>
                <?php if(!empty($cat_repeater['item_count'])): ?>
                <span <?php if(!empty($cat_repeater['count_color'])): ?>style="color:<?php echo esc_attr($cat_repeater['count_color']); ?>;" <?php endif; ?>><?php echo esc_attr($cat_repeater['item_count']); ?></span>
                <?php endif; ?>
            </div>

            <?php endforeach; endif; ?>
         


        </div>
    </section>


 

    <?php
    }
}

 