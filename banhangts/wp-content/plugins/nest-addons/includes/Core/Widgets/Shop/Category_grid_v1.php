<?php

namespace  Nestaddons\Core\Widgets\Shop;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Category_grid_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-grid-v1';
    }

    public function get_title()
    {
        return __('Category Grid V1', 'nest-addons');
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
            'cat_column',
            [
                'label' => __('Category Column', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'col-xl-2 col-lg-6 col-md-6 col-sm-6'   => esc_html__( 'Six Column', 'nest-addons' ),
                    'col-lg-1-5  col-md-4 col-sm-6'   => esc_html__( 'Five Column', 'nest-addons' ),
                    'col-xl-3 col-lg-4 col-md-6 col-sm-6'   => esc_html__( 'Four Column', 'nest-addons' ),
                    'col-xl-4 col-lg-4 col-md-6 col-sm-6'   => esc_html__( 'Three Column', 'nest-addons' ),
                    'col-xl-6 col-lg-6 col-md-6 col-sm-6'   => esc_html__( 'Two Column', 'nest-addons' ),
                    'col-xl-12'   => esc_html__( 'One Column', 'nest-addons' ),
                ],
                'default' => 'col-xl-3 col-lg-4 col-md-6 col-sm-6',
               
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
    
    

    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
       
    ?>

   <section class="sec_category_grid position-relative   <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?><?php endif; ?>">
       
        <div class="row">
            <?php foreach($settings['cat_repeater'] as  $key => $cat_repeater):   
        $target = $cat_repeater['cat_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $cat_repeater['cat_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>

            <div class="<?php echo esc_attr($settings['cat_column']); ?> cat_box" <?php if(!empty($cat_repeater['background_color']) || !empty($cat_repeater['border_color'])): ?>style="<?php if(!empty($cat_repeater['background_color'])): ?>background:<?php echo esc_attr($cat_repeater['background_color']); ?>!important;<?php endif; ?>
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

            <?php endforeach; ?>
   
        </div>
    </section>


 

    <?php
    }
}

 