<?php

namespace  Nestaddons\Core\Widgets\Shop;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Category_list_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-categort-list-v1';
    }

    public function get_title()
    {
        return __('Category List V1', 'nest-addons');
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
        $this->start_controls_section('cat_list_v1_settings',
        [ 
            'label' => __('Category Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
        $this->add_control(
            'category_type',
            [
            'label' => __('Categoty Types', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style_one' => __( 'Custom Category', 'nest-addons' ),
                'style_two' => __( 'Default Category', 'nest-addons' ),
            ],
            'default' => 'style_two' , 
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
        $this->add_control(
            'cat_repeater',
            [
                'label' => __('Category Repeater', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                    'cat_name' =>  __('Cake & Milk', 'nest-addons'),
                    ],
                    [
                    'cat_name' =>  __('Oganic Kiwi', 'nest-addons'),
                    ],
                     [
                    'cat_name' =>  __('Oganic Kiwi', 'nest-addons'),
                    ],
                     [
                    'cat_name' =>  __('Oganic Kiwi', 'nest-addons'),
                    ],
                     [
                    'cat_name' =>  __('Oganic Kiwi', 'nest-addons'),
                    ],
                     [
                    'cat_name' =>  __('Oganic Kiwi', 'nest-addons'),
                    ],
                     [
                    'cat_name' =>  __('Oganic Kiwi', 'nest-addons'),
                    ],
                     [
                    'cat_name' =>  __('Oganic Kiwi', 'nest-addons'),
                    ],
                     [
                    'cat_name' =>  __('Oganic Kiwi', 'nest-addons'),
                    ],
                     [
                    'cat_name' =>  __('Oganic Kiwi', 'nest-addons'),
                    ],
                ],
                'title_field' => '{{{ cat_name }}}',
                'condition' => [
                    'category_type' => 'style_one'
                ], 
            ]
        );
         
       
     
        $this->end_controls_section();


        $this->start_controls_section('cat_list_css',
        [ 
            'label' => __('Category List Css', 'nest-addons'),
            'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
        ]
        );

       
        $this->add_control(
            'cat_color',
             [
                'label' => __('Category Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .categories-dropdown-wrap.style-2 ul li a ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );
        $this->add_control(
            'cat_hover_color',
             [
                'label' => __('Category Hover Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .categories-dropdown-wrap.style-2 ul li a:hover ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );

        $this->add_control(
            'cat_box_bor_color',
             [
                'label' => __('Category Box Border Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .categories-dropdown-wrap.style-2  ' => 'border-color: {{VALUE}}!important;',
                ],
             ]
        );
        
        $this->add_control(
            'cat_box_background_color',
             [
                'label' => __('Category Box Background Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .categories-dropdown-wrap.style-2  ' => 'background: {{VALUE}}!important;',
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
    <?php if($settings['category_type'] == 'style_two'): ?>
		<div class="categories-dropdown-wrap style-2 font-heading">
            <div class="d-flex categori-dropdown-inner">
				<ul class="content_cat clearfix">
                    <?php  \Nestaddons\Woocom\Woocomfunctions::nest_woocommerce_category_image(); ?>
				</ul>
            </div>

		</div>
       <?php else: ?>
    <div class="categories-dropdown-wrap style-2 font-heading">
        <div class="d-flex categori-dropdown-inner">
            <ul>
            <?php foreach($settings['cat_repeater'] as  $key => $cat_repeater):   
            $target = $cat_repeater['cat_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $cat_repeater['cat_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                <li class="content_cat_list_sutom">
                <a href="<?php echo esc_url($cat_repeater['cat_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>  <?php if(!empty($cat_repeater['cat_image']['url'])): ?>
                         <img src="<?php echo esc_url($cat_repeater['cat_image']['url']); ?>" alt="category">          <?php endif; ?>
                         <?php echo esc_attr($cat_repeater['cat_name']); ?></a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
      
    </div>

    
    <?php endif; ?>


    <?php
    }
}
 