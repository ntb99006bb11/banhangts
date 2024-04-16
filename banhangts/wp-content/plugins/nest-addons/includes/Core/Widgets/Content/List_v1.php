<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class List_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-list-items-v1';
    }

    public function get_title()
    {
        return __('List Items V1', 'nest-addons');
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
        $this->start_controls_section('list_v1_settings',
        [ 
            'label' => __('List Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
        $this->add_control(
            'list_style',
            [
            'label' => __('List Style', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '' => __( 'Select', 'nest-addons' ),
                'style_one' => __( 'Style One', 'nest-addons' ),
                'style_two' => __( 'Style Two', 'nest-addons' ),
            ],
            'default' => 'style_one',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section('list_settings',
        [ 
            'label' => __('List Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [
                'list_style' => 'style_one'
            ],
        ]
        );
  
        $this->add_control(
          'list_type',
          [
          'label' => __('List Type', 'nest-addons'),
          'type' => \Elementor\Controls_Manager::SELECT,
          'options' => [
              'linline' => __( 'Inline View', 'nest-addons' ),
              'list' => __( 'List View', 'nest-addons' ),
          ],
          'default' => 'linline' , 
          ]
         
      );

    

        $repeater = new \Elementor\Repeater();
      
        $repeater->add_control(
          'list_item',
          [
             'label' => __('List item', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXTAREA,
             'default' => __('Cake & Milk', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),    
          ]
        );
        
        $repeater->add_control(
          'list_link',
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
        'list_repeater',
        [
            'label' => __('List Repeater', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                'list_item' =>  __('Cake & Milk ', 'nest-addons'),
                'list_link' =>  __('#', 'nest-addons'),
                ],
                 [
                'list_item' =>  __('Coffes & Teas', 'nest-addons'),
                'list_link' =>  __('#', 'nest-addons'),
                ],
                 [
                'list_item' =>  __('Pet Foods', 'nest-addons'),
                'list_link' =>  __('#', 'nest-addons'),
                ],
                 [
                'list_item' =>  __('Vegetables', 'nest-addons'),
                'list_link' =>  __('#', 'nest-addons'),
                ],
                 
            ],
            'title_field' => '{{{ list_item }}}',
        ]
    );


    $this->end_controls_section();


    // style one start
    $this->start_controls_section('list_v2_settings',
    [ 
        'label' => __('List Content', 'nest-addons'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        'condition' => [
            'list_style' => 'style_two'
        ],
    ]
    );
    

    $repeater = new \Elementor\Repeater();
  
    $repeater->add_control(
      'v2_list_item',
      [
         'label' => __('List item Heading', 'nest-addons'),
         'type' => \Elementor\Controls_Manager::TEXTAREA,
         'default' => __('Type Of Packing', 'nest-addons'),
         'placeholder' => __('Type your text here', 'nest-addons'),    
      ]
    );

    $repeater->add_control(
        'v2_list_item_two',
        [
           'label' => __('List item Content', 'nest-addons'),
           'type' => \Elementor\Controls_Manager::TEXTAREA,
           'default' => __('Bottle', 'nest-addons'),
           'placeholder' => __('Type your text here', 'nest-addons'),    
        ]
    );
   

   $this->add_control(
    'v2_list_repeater',
    [
        'label' => __('List Repeater', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
            [
            'v2_list_item' =>  __('Type Of Packing', 'nest-addons'),
            'v2_list_item_two' =>  __('Bottle', 'nest-addons'),
            ],
             [
            'v2_list_item' =>  __('Color', 'nest-addons'),
            'v2_list_item_two' =>  __('Green, Pink, Powder Blue, Purple', 'nest-addons'),
            ],
             [
            'v2_list_item' =>  __('Quantity Per Case', 'nest-addons'),
            'v2_list_item_two' =>  __('100ml', 'nest-addons'),
            ],
             [
            'v2_list_item' =>  __('Ethyl Alcohol', 'nest-addons'),
            'v2_list_item_two' =>  __('70%', 'nest-addons'),
            ],
            [
            'v2_list_item' =>  __('Piece In One', 'nest-addons'),
            'v2_list_item_two' =>  __('Carton', 'nest-addons'),
            ],
             
        ],
        'title_field' => '{{{ v2_list_item }}}',
    ]
);


$this->end_controls_section();


$this->start_controls_section('list_css',
[ 
    'label' => __('List Css', 'nest-addons'),
    'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
]
);

$this->add_responsive_control(
    'list_padding',
    [
        'label' => esc_html__( 'List Padding', 'nest-addons' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .nav-tabs.links li   ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
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
            '{{WRAPPER}} .nav-tabs.links li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
        ],
    ]
);


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__( 'List Typography', 'nest-addons' ),
        'name' => 'sm_typo',
        'selector' => '{{WRAPPER}} .style_list li a , {{WRAPPER}} .style_linline li a , {{WRAPPER}} .style_list_two li',
    ]
);

$this->add_control(
    'list_title_color',
     [
        'label' => __('List Title Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .product-more-infor li span  ' => 'color: {{VALUE}}!important;',
        ],
        'condition' => [
            'list_style' => 'style_two'
        ],
     ]
);

$this->add_control(
    'list_dot_color',
     [
        'label' => __('List Dot Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .product-more-infor li ::before  ' => 'background: {{VALUE}}!important;',
        ],
        'condition' => [
            'list_style' => 'style_two'
        ],
     ]
);


$this->add_control(
    'list_color',
     [
        'label' => __('List Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .nav-tabs.links .nav_link , {{WRAPPER}} .product-more-infor li ' => 'color: {{VALUE}}!important;',
        ],
      
     ]
);


$this->add_control(
    'list_hover_color',
     [
        'label' => __('List Hover Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .nav-tabs.links .nav_link:hover  ' => 'color: {{VALUE}}!important;',
        ],
        'condition' => [
            'list_style' => 'style_one'
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
 <?php if($settings['list_style'] == 'style_one'): ?>
    <div class="position-relative style_<?php echo esc_attr($settings['list_type']); ?>">
    <ul class="list-inline nav nav-tabs links">
    <?php if($settings['list_repeater']): foreach($settings['list_repeater'] as  $key => $list_repeater):   
        $target = $list_repeater['list_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $list_repeater['list_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
        <li class="list-inline-item nav-item">
            <a class="nav_link" href="<?php echo esc_url($list_repeater['list_link']['url']); ?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
            <?php echo wp_kses($list_repeater['list_item'] , $allowed_tags); ?>
            </a>
        </li>
        <?php endforeach; endif; ?>
    </ul>
    </div>
    <?php elseif($settings['list_style'] == 'style_two'): ?>
    
    <div class="style_list_two">
    <ul class="product-more-infor">
    <?php if($settings['v2_list_repeater']): foreach($settings['v2_list_repeater'] as  $key => $v2_list_repeater):  ?>
        <li>
        <span><?php echo wp_kses($v2_list_repeater['v2_list_item'] , $allowed_tags); ?></span> 
            <?php echo wp_kses($v2_list_repeater['v2_list_item_two'] , $allowed_tags); ?>
          
        </li>
        <?php endforeach; endif; ?>
    </ul>
    </div>
    <?php else: ?>
        
        <p><?php echo esc_attr('Please select Any option (Fixed Some Bugs if you find this text please select the option its now empty)' , 'nest-addons') ?></p>

        <?php endif; ?>
         <?php

    }
}

 