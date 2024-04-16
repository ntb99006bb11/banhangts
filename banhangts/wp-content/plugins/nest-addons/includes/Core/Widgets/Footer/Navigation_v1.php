<?php

namespace  Nestaddons\Core\Widgets\Footer;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Navigation_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-foo-widget-navigation-v1';
    }

    public function get_title()
    {
        return __('Navigation V1', 'nest-addons');
    }

    public function get_icon()
    {
        return 'icon-letter-n';
    }

    public function get_categories()
    {
        return ['104'];
    }

    protected function register_controls(){
 
        // style one start
        $this->start_controls_section('widget_navigation_v1_settings',
        [ 
            'label' => __('Widget Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
        
      

        $this->add_control(
            'widget_title',
            [
               'label' => __('Widget Title', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => __('About Company', 'nest-addons'),
               'placeholder' => __('Type your text here', 'nest-addons'),   
            ]
        );

        $this->add_control(
            'menu_type',
            [
            'label' => __('Menu Type', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'custom_menu' => __( 'Custom Menu', 'nest-addons' ),
                'defaut_menu' => __( 'Menu', 'nest-addons' ),
            ],
            'default' => 'defaut_menu' , 
            ]
        );
        $this->add_control(
            'display_enable',
            [
                'label' => __('Display Inline Enable / Disbale', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        $this->add_control(
            'navigations',
            [
                'label' => __('Select Navigation', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => nest_navmenu(),
                'condition' => [
                    'menu_type' => 'defaut_menu'
                ],
            ]
        );
        $this->add_control(
            'transition_enable',
            [
                'label' => __('Transition Enable / Disbale', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'no',
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
        $this->start_controls_section('widget_navigation_custom_v1_settings',
        [ 
            'label' => __('Widget Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [
                'menu_type' => 'custom_menu'
            ]
        ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'menu_item',
            [
              'label' => __('Menu Item', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'default' => __('Delivery Information', 'nest-addons'),
              'placeholder' => __('Type your text here', 'nest-addons'),
            ]
        );

        $repeater->add_control(
            'menu_custom_link',
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
        'menu_custom_repeater',
        [
            'label' => __('Menu Repeater', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                    [
                        'menu_item' => __('About Us', 'nest-addons'),
                    ],
                    [
                        'menu_item' => __('Delivery Information', 'nest-addons'),
                    ],
                    [
                        'menu_item' => __('Privacy Policy', 'nest-addons'),
                    ],
                    [
                        'menu_item' => __('Terms & Conditions', 'nest-addons'),
                    ],
                    [
                        'menu_item' => __('Contact Us', 'nest-addons'),
                    ],
                    [
                        'menu_item' => __('Support Center', 'nest-addons'),
                    ],
                    [
                        'menu_item' => __('Careers', 'nest-addons'),
                    ],
                ],
            'title_field' => '{{{ menu_item }}}',
         ]
    );
    
       
    $this->end_controls_section();

    $this->start_controls_section('navigation_css',
    [ 
        'label' => __('Navigation Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );
  
    $this->add_control(
        'titlecolor',
         [
            'label' => __('Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .footer-link-widget  .foo_wid_title ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( 'Title Typography', 'nest-addons' ),
            'name' => 'title_typo',
            'selector' => '{{WRAPPER}} .footer-link-widget  .foo_wid_title ',
        ]
    );

    $this->add_responsive_control(
        'list_padding',
        [
            'label' => esc_html__( 'List Padding', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .footer-list li  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
            ],
        ]
    );
    
    $this->add_responsive_control(
        'list_margin',
        [
            'label' => esc_html__( 'List Padding', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .footer-list li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
            ],
        ]
    );
    
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => esc_html__( 'Menu Typography', 'nest-addons' ),
            'name' => 'list_typo',
            'selector' => '{{WRAPPER}} .footer-list li a ',
        ]
    );
    $this->add_control(
        'menu_color',
         [
            'label' => __('Menu Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .footer-list li a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
     
    $this->add_control(
        'menu_hover_color',
         [
            'label' => __('Menu Hover Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .footer-list li a:hover ' => 'color: {{VALUE}}!important;',
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


    <div class="footer-link-widget footer_widgets <?php if($settings['display_enable'] == 'yes'): ?> display_inline_enabled <?php endif; ?> col 
        <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?><?php endif; ?>">
        <?php if(!empty($settings['widget_title'])): ?>
            <div class="foo_wid_title">
                <?php echo wp_kses($settings['widget_title'] , $allowed_tags); ?>
            </div>
        <?php endif; ?>
        <div class="widget_content_box">
         <?php if($settings['menu_type'] == 'custom_menu'): // Address ?>
            <ul class="footer-list mb-sm-5 mb-md-0">
            <?php foreach($settings['menu_custom_repeater'] as  $key => $menu_repeater):
              $target = $menu_repeater['menu_custom_link']['is_external'] ? ' target="_blank"' : '';
              $nofollow = $menu_repeater['menu_custom_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                <li><a href="<?php echo esc_url($menu_repeater['menu_custom_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>><?php echo wp_kses($menu_repeater['menu_item'] , $allowed_tags); ?></a></li>
            <?php endforeach; ?>
            </ul>
        <?php elseif($settings['menu_type'] == 'defaut_menu'): // Address ?>
            <?php  if(!empty($settings['navigations'])):
					         	wp_nav_menu(array(
							    'menu' => $settings['navigations'],
                                'menu_class' => 'footer-list mb-sm-5 mb-md-0',
							)
						 ); endif;
					?>
            <?php endif; // Address ?>
        </div>
    </div>
  



    <?php
    }
}

 