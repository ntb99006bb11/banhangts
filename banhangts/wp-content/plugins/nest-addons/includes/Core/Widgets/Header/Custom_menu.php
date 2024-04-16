<?php

namespace  Nestaddons\Core\Widgets\Header;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Custom_menu extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-custom-menu-v1';
    }

    public function get_title()
    {
        return __('Custom Menu V1', 'nest-addons');
    }

    public function get_icon()
    {
        return 'icon-letter-n';
    }

    public function get_categories()
    {
        return ['100'];
    }

    protected function register_controls(){
 
        // style one start
        $this->start_controls_section('list_v1_settings',
        [ 
            'label' => __('List Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
       
        $this->add_control(
            'menu_types',
            [
            'label' => __('Menu Type', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'from_menu' => __( 'From Menu', 'nest-addons' ),
                'custom_menu' => __( 'Custom Menu', 'nest-addons' ),
            ],
            'default' => 'from_menu' , 
            ]
        ); 

        $this->add_control(
            'list_type',
            [
            'label' => __('List Type', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'list_nlined' => __( 'Inline View', 'nest-addons' ),
                'list_blocked' => __( 'List View', 'nest-addons' ),
            ],
            'default' => 'list_nlined' , 
            'condition' => [
                'menu_types' => 'custom_menu',
               ],
            ]
          );

          $this->add_responsive_control(
			'menu_align',
			[
				'label' => esc_html__( 'menu Alignment', 'nest-addons' ), 
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
                    '{{WRAPPER}}  .cat_menu_box , {{WRAPPER}}  .main-menu nav .navbar_nav  ' => 'text-align: {{VALUE}}',
                ],
			]
		);
          
          $this->end_controls_section();

          $this->start_controls_section('menu_contet',
            [ 
              'label' => __('Menu', 'nest-addons'),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
              'condition' => [
                'menu_types' => 'from_menu',
               ],
            ]
          );

          $this->add_control(
            'navigations_main',
            [
                'label' => __('Select Navigation', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => nest_navmenu(),
            ]
        );

          $this->end_controls_section();

          $this->start_controls_section('custom_menu_contet',
          [ 
              'label' => __('Custom Menu', 'nest-addons'),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
              'condition' => [
                'menu_types' => 'custom_menu',
               ],
          ]
          );

          $this->add_control(
            'menu_styles',
            [
            'label' => __('Menu Styles', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style_one' => __( 'Style One', 'nest-addons' ),
                'style_two' => __( 'Style Two', 'nest-addons' ),
            ],
            'default' =>  'style_one' ,  
            ]
        );
  

          $this->add_control(
            'drop_down_alignment',
            [
            'label' => __('Dropdown Position', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'drop_left_side' => __( 'Left', 'nest-addons' ),
                'drop_right_side' => __( 'Right', 'nest-addons' ),
            ],
            'default' =>  'drop_right_side' , 
                'condition' => [
                    'list_type' => 'list_blocked',
                ],
            ]
          );
  

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'image',
			[
				'label' => __( 'Image', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
              
			]
        );
        $repeater->add_control(
          'menu_item',
          [
             'label' => __('Menu item', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXTAREA,
             'default' => __('Cake & Milk', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),    
          ]
        );
        
        $repeater->add_control(
            'menu_item_link',
            [
                'label' => __('Menu Link', 'nest-addons'),
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
            'drop_down_enable',
            [
                'label' => __('Dropdown Enable / Disable', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'drop_down_types',
            [
            'label' => __('Drop Down Type', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'drop_from_menu' => __( 'From Menu', 'nest-addons' ),
                'drop_from_mega' => __( 'From Megamenu Post', 'nest-addons' ),
            ],
            'default' =>  'drop_from_mega' , 
            'condition' => [
                'drop_down_enable' => 'yes',
            ],
            ]
        ); 
        $repeater->add_control(
            'navigations',
            [
                'label' => __('Select Navigation / Megamenu For Dropdown', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => nest_navmenu(),
                'condition' => [
                    'drop_down_enable' => 'yes',
                    'drop_down_types' => 'drop_from_menu',
                ],
            ]
        );

        $repeater->add_control(
            'megamenu_post',
            [
                'label' => __('Select Dropdown', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => nest_common_query('mega_menu'),
                'dynamic' => [
					'active' => true,
				],
                'condition' => [
                    'drop_down_enable' => 'yes',
                    'drop_down_types' => 'drop_from_mega',
                ],
            ]
        );

        $repeater->add_control(
            'c_drop_width',
            [
                'label' => __( 'Dropdown Width For( Mega Menu )', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 3000,
                'step' => 1,
                'condition' => [
                    'drop_down_enable' => 'yes',
                    'drop_down_types' => 'drop_from_mega',
                ],
            ]
        );
        
        $repeater->add_control(
            'c_drop_left',
            [
                'label' => __( 'Dropdown Move Left For ( Mega Menu )', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 3000,
                'step' => 1,
                'condition' => [
                    'drop_down_enable' => 'yes',
                    'drop_down_types' => 'drop_from_mega',
                ],
            ]
        );

       $this->add_control(
        'menu_repeater',
        [
            'label' => __('Menu Repeater', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                'menu_item' =>  __('Cake & Milk ', 'nest-addons'),
                'menu_item_link' =>  __('#', 'nest-addons'),
                ],
                 [
                'menu_item' =>  __('Coffes & Teas', 'nest-addons'),
                'menu_item_link' =>  __('#', 'nest-addons'),
                ],
                 [
                'menu_item' =>  __('Pet Foods', 'nest-addons'),
                'menu_item_link' =>  __('#', 'nest-addons'),
                ],
                 [
                'menu_item' =>  __('Vegetables', 'nest-addons'),
                'menu_item_link' =>  __('#', 'nest-addons'),
                ],
                 
            ],
            'title_field' => '{{{ menu_item }}}',
            
        ]
    );


    $this->end_controls_section();

 

$this->start_controls_section('menu_css',
[ 
    'label' => __('Menu Css', 'nest-addons'),
    'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'menu_types' => 'from_menu',
    ],
]
);
 
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__( 'Menu Typography', 'nest-addons' ),
        'name' => 'menu_typo',
        'selector' => '{{WRAPPER}} .main-menu > nav > ul > li > a ',
    ]
);
 
$this->add_control(
    'menu_color',
    [
        'label' => __('Menu Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li > a  ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'menu_bg_color',
    [
        'label' => __('Menu Background Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li > a ' => 'background: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'menu_ac_color',
    [
        'label' => __('Menu Hover/ Active Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li.current_page_item.active > a , {{WRAPPER}} .main-menu > nav > ul > li:hover > a' => 'color: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'menu_ac_bg_color',
    [
        'label' => __('Menu Hover / Active Bg Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li.current_page_item.active > a , {{WRAPPER}} .main-menu > nav > ul > li:hover > a' => 'background: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'drop_menu_color',
    [
        'label' => __('Dropdown Menu Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li ul.sub-menu li a  ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'drop_homenu_color',
    [
        'label' => __('Dropdown Menu Hover  Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li ul.sub-menu li:hover > a ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_responsive_control(
    'drop_width',
    [
        'label' => __( 'Dropdown Width For( Mega Menu )', 'nest-addons' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => 1,
        'max' => 300,
        'step' => 1,
        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li.mega_menu .sub-menu ' => 'width: {{VALUE}}%',
        ],
    ]
);

$this->add_responsive_control(
    'drop_left',
    [
        'label' => __( 'Dropdown Move Left For ( Mega Menu )', 'nest-addons' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => -3000,
        'max' => 3000,
        'step' => 1,
        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li.mega_menu .sub-menu ' => 'left: {{VALUE}}%',
        ],
    ]
);


$this->add_responsive_control(
    'menu_padding',
    [
        'label' => __( 'Menu Paddung', 'nest-addons' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],

        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li > a ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
        ],
    ]
);

$this->add_responsive_control(
    'mborder_radius',
    [
        'label' => __( 'Menu Border Radius', 'nest-addons' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],

        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li > a ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
        ],
    ]
);

$this->end_controls_section();



$this->start_controls_section('menu_custom_css',
[ 
    'label' => __('Custom Css', 'nest-addons'),
    'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'menu_types' => 'custom_menu',
    ],
]
);
 
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__( 'Menu Typography', 'nest-addons' ),
        'name' => 'c_menu_typo',
        'selector' => '{{WRAPPER}} .cat_menu_box .cat_listed > li.cat_menu_item .m_link ',
    ]
);
 
$this->add_control(
    'c_menu_color',
    [
        'label' => __('Menu Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cat_menu_box .cat_listed > li.cat_menu_item .m_link  ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'c_menu_bg_color',
    [
        'label' => __('Menu Background Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cat_menu_box .cat_listed > li.cat_menu_item .m_link ' => 'background: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'c_menu_ac_color',
    [
        'label' => __('Menu Hover Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}}  .cat_menu_box .cat_listed > li.cat_menu_item:hover > .m_link ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 
$this->add_control(
    'c_menu_b_hoverg_color',
    [ 
        'label' => __('Menu Hover Bg Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}}  .cat_menu_box .cat_listed > li.cat_menu_item:hover > .m_link ' => 'background: {{VALUE}}!important;',
        ],
    ]
); 

 
$this->add_control(
    'c_drop_menu_color',
    [
        'label' => __('Dropdown Menu Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cat_menu_box .cat_listed > li.cat_menu_item .dropdown_menu_vaigation li a  ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'c_drop_homenu_color',
    [
        'label' => __('Dropdown Menu Hover  Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cat_menu_box .cat_listed > li.cat_menu_item .dropdown_menu_vaigation li:hover > a ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 




$this->add_control(
    'c_menu_padding',
    [
        'label' => __( 'Menu Paddung', 'nest-addons' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],

        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li > a ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
        ],
    ]
);

$this->add_control(
    'c_mborder_radius',
    [
        'label' => __( 'Menu Border Radius', 'nest-addons' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],

        'selectors' => [
            '{{WRAPPER}} .main-menu > nav > ul > li > a ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
        ],
    ]
);

$this->end_controls_section();


}
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');  
    ?> 

<?php if($settings['menu_types'] == 'from_menu'): ?>
   <div class="main-menu custom_n_menu  main-menu-padding-1 main-menu-lh-2 font-heading cu">
            <nav>
                <?php  if(!empty($settings['navigations_main'])):
                wp_nav_menu(array(
                    'menu' => $settings['navigations_main'],
                    'container' => false,
                    'menu_class' => 'navbar_nav',
                    'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new \WP_Bootstrap_Navwalker()
                )); endif; ?>
            </nav>
        </div>
  <?php elseif($settings['menu_types'] == 'custom_menu'): ?>
    <div class="cat_menu_box <?php echo esc_attr($settings['menu_styles']); ?> <?php echo esc_attr($settings['list_type']); ?> <?php echo esc_attr($settings['drop_down_alignment']); ?>">
        <ul class="cat_listed">
        <?php foreach($settings['menu_repeater'] as  $key => $menu_repeater): 
            $target = $menu_repeater['menu_item_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $menu_repeater['menu_item_link']['nofollow'] ? ' rel="nofollow"' : ''; 
            $c_drop_width = $menu_repeater['c_drop_width'];
            $c_drop_width = ! empty( $c_drop_width ) ? " width: $c_drop_width%!important;" : ''; 
            $c_drop_left = $menu_repeater['c_drop_left'];
            $c_drop_left = ! empty( $c_drop_left ) ? "left: $c_drop_left%!important;" : ''; 
            $stylefordrop = "style= '$c_drop_width  $c_drop_left'";
            ?>
            <li class="cat_menu_item <?php if($menu_repeater['drop_down_enable'] == 'yes'): 
                 if($menu_repeater['drop_down_types'] == 'drop_from_mega'): ?>position-static dp_menu mega_menu_show<?php elseif($menu_repeater['drop_down_types'] == 'drop_from_menu'): ?> dp_menu normal_dp_menu<?php endif; endif; ?>"> 
                <a class="m_link" href="<?php echo esc_url($menu_repeater['menu_item_link']['url']); ?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                    <div class="align-items-center">
                    <?php if(!empty($menu_repeater['image']['url'])): ?>
                        <img class="active img-fluid" src="<?php echo esc_url($menu_repeater['image']['url']); ?>" alt="img" >
                    <?php endif; ?>
                    <?php echo wp_kses($menu_repeater['menu_item'] , $allowed_tags); ?>
                    </div>
                    <?php if($menu_repeater['drop_down_enable'] == 'yes'): ?> <i class="fi-rs-angle-down"></i> <?php endif; ?>
                </a>
                <?php
                    if($menu_repeater['drop_down_enable'] == 'yes'):
                if($menu_repeater['drop_down_types'] == 'drop_from_mega'): ?>
                    <?php if(!empty( $menu_repeater['megamenu_post'])): ?>
                        <div class="dropdown_menu" <?php echo $stylefordrop; ?>>
                            <?php   
                            $content =  \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $menu_repeater['megamenu_post'] , true );
                            echo $content;
                            ?>
                        </div>
                    <?php endif; ?>
                <?php elseif($menu_repeater['drop_down_types'] == 'drop_from_menu'): ?>
                    <?php if(!empty( $menu_repeater['navigations'])): ?>
                        <div class="dropdown_menu_vaigation">
                            <?php wp_nav_menu(array(
                                    'menu' => $menu_repeater['navigations']
                                )); 
                            ?>
                        </div>
                    <?php endif; ?>
                <?php endif;   endif;  ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
   

        <?php endif; ?>
         <?php

    }
}

 