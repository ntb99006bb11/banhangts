<?php

namespace  Nestaddons\Core\Widgets\Shop;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Product_tab_filter_carousel_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-product-tab-filter-carousel-v1';
    }

    public function get_title()
    {
        return __('Product Tab  Carousel V1', 'nest-addons');
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
        $this->start_controls_section('product_tab_carsousel_v1_settings',
        [ 
            'label' => __('Product Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );


        $this->add_control(
            'product_style',
            [
                'label' => __('Shop style', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__( 'Style One', 'nest-addons' ),
                    'style_one_width_sold'   => esc_html__( 'Style One (With Sold Items)', 'nest-addons' ),
                    'style_two'   => esc_html__( 'Style Two', 'nest-addons' ),
                    'style_three'   => esc_html__( 'Style Three', 'nest-addons' ),
                    'style_four'   => esc_html__( 'Style Four', 'nest-addons' ),
            
                ],
                'default' => 'style_one',
            ]
        );
        $this->add_control(
            'carousel_items',
            [
            'label' => __('Carousel Items', 'nest-addons'),
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
            'default' => '4',
            ]
        );
        
        $this->add_responsive_control(
			'tab_align',
			[
				'label' => esc_html__( 'Tab Alignment', 'nest-addons' ),
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
                    '{{WRAPPER}} .product-tabs_two .section_tab ' => 'text-align: {{VALUE}}!important;',
                ],
			]
		);

        $repeater = new \Elementor\Repeater();
     
     
        $repeater->add_control(
            'post_count',
            [
                'label' => __('Post Count', 'nest-addons'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
            ]
        );
       
        $repeater->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'nest-addons' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
                    ''  => esc_html__( 'Default', 'nest-addons' ),
					'date'       => esc_html__( 'Date', 'nest-addons' ),
					'title'      => esc_html__( 'Title', 'nest-addons' ),
					'menu_order' => esc_html__( 'Menu Order', 'nest-addons' ),
					'rand'       => esc_html__( 'Random', 'nest-addons' ),
				),
			]
		);
		$repeater->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'nest-addons' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'nest-addons' ),
					'ASC'  => esc_html__( 'ASC', 'nest-addons' ),
				),
			]
        );
      
        $repeater->add_control(
            'query_category', 
				[
                'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__('Category', 'nest-addons'),
				'options' => nest_get_product_categories(),
				]
        );

        $repeater->add_control(
            'product_options_showing',
            [
                'label'   => esc_html__( 'Products', 'nest-addons' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => esc_html__( 'Select Options', 'nest-addons' ),
                    'featured'     => esc_html__( 'Featured', 'nest-addons' ),
                    'best_selling' => esc_html__( 'Best Selling', 'nest-addons' ),
                    'sale'         => esc_html__( 'On Sale', 'nest-addons' ),
                    'outofstock'   => esc_html__( 'Out Of Stock', 'nest-addons' ),
                ],
                'default' => '',
                'toggle'  => false,
            ]
        );
        
        $repeater->add_control(
            'product_not_in',
            [
                'label'       => esc_html__( 'Product Not In', 'nest-addons' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' =>  esc_html__( '' , 'nest-addons'),
            ]
        );

        $repeater->add_control(
            'tab_title',
            [
                'label'       => esc_html__( 'Tab Title', 'nest-addons' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' =>  esc_html__( 'Planting' , 'nest-addons'),
            ]
        );
        $repeater->add_control(
            'tab_id',
            [
                'label'       => esc_html__( 'Tab ID', 'nest-addons' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' =>  esc_html__( 'tab_default' , 'nest-addons'),
                'description' =>  esc_html__( 'Please Enter the tab id like this example : (tab_milk , tab_coffee , tab_one)' , 'nest-addons'),
            ]
        );


        $this->add_control(
            'product_filter_repeater',
            [
                'label' => __( 'Product Repeater', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'post_count' => __( '10', 'nest-addons' ),
                        'query_orderby' => __( 'date', 'nest-addons' ),
                    ],
                   
                ],
                'title_field' => '{{{tab_title}}}',
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
        'default' => 'position_one' , 
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
                '{{WRAPPER}} .product-tabs_two  .owl-nav i ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
     
    $this->add_control(
        'owl_nav_bg_color',
         [
            'label' => __('Owl Nav Arrow Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-tabs_two .owl-carousel .owl-nav .owl-prev, .product-tabs_two .owl-carousel .owl-nav .owl-next ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );

    
    $this->add_control(
        'owl_nav_hover_color',
         [
            'label' => __('Owl Nav Hover Arrow Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-tabs_two  .owl-nav .owl-prev:hover i , {{WRAPPER}} .product-tabs_two  .owl-nav .owl-next:hover i ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
     
    $this->add_control(
        'owl_nav_hover_bg_color',
         [
            'label' => __('Owl Nav Hover Arrow Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-tabs_two .owl-carousel .owl-nav .owl-prev:hover , {{WRAPPER}} .product-tabs_two .owl-carousel .owl-nav .owl-next:hover ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );
 

    $this->end_controls_section();


    $this->start_controls_section('product_tab_css',
    [ 
        'label' => __('Product  Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

    $this->add_control(
        'tab_text_color',
         [
            'label' => __('Tab Text Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .section_tab  .nav.nav-tabs.links button  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );


    $this->add_control(
        'tab_text_ac_color',
         [
            'label' => __('Tab Text Active Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .section_tab  .nav.nav-tabs.links button.active  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );


    $this->add_control(
        'product_tag_color',
         [
            'label' => __('Product Category Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-content-wrap .product-category a  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

 
    $this->add_control(
        'product_title_color',
         [
            'label' => __('Product Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-content-wrap h2 a  , {{WRAPPER}} .product-list-small h6 a , {{WRAPPER}} .product_style_five .product-content-wrap h5 a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'product_rating_color',
         [
            'label' => __('Product Rating Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product_wrapper .star-rating::before  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    
    $this->add_control(
        'product_rating_active_color',
         [
            'label' => __('Product Rating Active Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product_wrapper .star-rating span::before  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'product_rating_count_color',
         [
            'label' => __('Product Rating Count Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product_wrapper .product-rate-cover .font-small ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'product_vendor_color',
         [
            'label' => __('Product Vendor Text Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product_wrapper .product-content-wrap .vendord .font-small.text-muted ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'product_vendor_two_color',
         [
            'label' => __('Product Vendor Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product_wrapper .product-content-wrap  .vendord .font-small.text-muted a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'product_price_color',
         [
            'label' => __('Product Price Offer Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product_wrapper  .product-content-wrap .product-price ins span ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );


    
    $this->add_control(
        'product_price_og_color',
         [
            'label' => __('Product Price Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}   .product_wrapper .product-price del  , {{WRAPPER}}   .product_wrapper .product-price del bdi  ' => 'color: {{VALUE}}!important; opacity:1!important;',
            ],
         ]
    );
    
    
    $this->add_control(
        'button_colors',
         [
            'label' => __('Product Btn Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-card-bottom .add-cart .add , {{WRAPPER}} .product-cart-wrap .product-card-bottom .add-cart .add span , {{WRAPPER}} .product-cart-wrap .product-card-bottom .add-cart  a::before  ,
                {{WRAPPER}} .product-cart-wrap.style_two .add_to_cart_button , {{WRAPPER}} .product_style_five .product-content-wrap .add_to_cart_button, .product_style_five .product-content-wrap .button  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'button_bg_color',
         [
            'label' => __('Product Btn Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-card-bottom .add-cart .add , {{WRAPPER}} .product-cart-wrap .product-card-bottom .add-cart .add span ,
                {{WRAPPER}} .product-cart-wrap.style_two .add_to_cart_button , {{WRAPPER}} .product_style_five .product-content-wrap .add_to_cart_button, .product_style_five .product-content-wrap .button ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );


    $this->add_control(
        'progress_text_color',
         [
            'label' => __('Progress Text Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-content-wrap .sold  span ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'progress_bg_color',
         [
            'label' => __('Progress Bar Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .progress ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );

 $this->add_control(
        'progress_ac_bg_color',
         [
            'label' => __('Progress Bar Active Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .progress-bar ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );

    
    $this->add_control(
        'box_color',
         [
            'label' => __('Box Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap , {{WRAPPER}} .product-cart-wrap .product-img-action-wrap ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'box_border_color',
         [
            'label' => __('Box Border Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap ' => 'border-color: {{VALUE}}!important;',
            ],
         ]
    );
    

    
    $this->add_control(
        'hover_components_color',
         [
            'label' => __('Hover Content Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-action-1 li button:before , {{WRAPPER}}  .product-cart-wrap .product-action-1 li i
                , {{WRAPPER}} .product-cart-wrap .product-action-1 li small ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'hover_components_bor_color',
         [
            'label' => __('Hover Content Border Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-action-1 li ' => 'border-color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'hover_components_tool_color',
         [
            'label' => __('Hover Content Tooltip Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-action-1 li small:before  ' => 'border-top-color: {{VALUE}}!important;',
                '{{WRAPPER}}  .product-cart-wrap .product-action-1 li small ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'hover_components_bg_color',
         [
            'label' => __('Hover Content Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .product-cart-wrap .product-img-action-wrap .product-action-1 ' => 'border-color: {{VALUE}}!important; background: {{VALUE}}!important;',
            ],
         ]
    );


   

    $this->end_controls_section();

    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
        $product_filter_repeater = $settings['product_filter_repeater'];
    ?>
<section
    class="product-tabs_two filter_carousel  position-relative <?php echo esc_attr($settings['nav_style_options']); ?>">
    <div class="section_tab mb-30">

    <ul class="nav nav-tabs links"  role="tablist">
            <?php if(!empty($product_filter_repeater)):
                    foreach($product_filter_repeater as $key => $product_value):?>
            <li class="nav-item">
             
                <button class="nav-link <?php if($key == 0) echo 'active';?>" id="<?php echo esc_attr($product_value['tab_id']);?>-cartab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr($product_value['tab_id']);?>" type="button" role="tab" aria-controls="<?php echo esc_attr($product_value['tab_id']);?>" aria-selected="false">
                    <?php echo esc_attr($product_value['tab_title']);?>
                </button>
            </li>
            <?php endforeach; endif; ?>
        </ul>
    </div>
    <!--End nav-tabs-->
  
    <div class="s_tabs_content tab-content">
            <?php if(!empty( $product_filter_repeater)):
                foreach($product_filter_repeater as $key => $product_value ):

                    $product_not_inside = '';
                    if(!empty($product_value['product_not_in'])){
                        $product_not_inside = explode(',', $product_value['product_not_in']);
                    }
                    else{
                        $product_not_inside = '0';
                    }

                    $query_args = array(
                        'post_type' => 'product',
                        'ignore_sticky_posts' => true,
                        'posts_per_page' => $product_value['post_count'],
                        'orderby'        => $product_value['query_orderby'],
                        'order'          =>  $product_value['query_order'],
                        'post__not_in'   => $product_not_inside ,
                    );
                    if($product_value['query_category'] ) $query_args['product_cat'] = $product_value['query_category'];
                    if($product_value['product_options_showing'] == 'outofstock'):
                        $query_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'outofstock',
                            'operator' => 'NOT IN',
                            ),
                        ); // WPCS: slow query ok.
                        elseif($product_value['product_options_showing'] == 'best_selling'):
                            $query_args['meta_key'] = 'total_sales';
                            $query_args['orderby'] = 'meta_value_num';
                        elseif($product_value['product_options_showing'] == 'featured'):
                            $query_args['tax_query'] = array( array(
                                'taxonomy' => 'product_visibility',
                                'field'    => 'name',
                                'terms'    => array( 'featured' ),
                                'operator' => 'IN',
                            ) 
                        );
                        elseif($product_value['product_options_showing'] == 'sale'):
                            $query_args['meta_key'] = '_sale_price';
                            $query_args['meta_value'] = array('');
                            $query_args['meta_compare'] = 'NOT IN';
                        endif;
                        $product_query = new \WP_Query( $query_args );
                    ?>

        
            <div class="tab-pane  <?php if($key == 0) echo 'active';?>" id="<?php echo esc_attr($product_value['tab_id']);?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($product_value['tab_id']);?>-cartab">
      
                <div class="theme_carousel <?php if($key == 0) echo ' show';?> owl-theme owl-carousel"
                    data-options='{"loop": false, "margin": 20,  "autoheight":true, "lazyload":true, "nav": <?php echo esc_attr($settings['nav_displays']); ?>, "dots": false, "autoplay": false, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "300" :{ "items" : "2" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "<?php echo esc_attr($settings['carousel_items']); ?>" }}}'>
                    <?php  if($product_query->have_posts()):
                                while($product_query->have_posts()) : $product_query->the_post();
                                global $product;
			                    global $post;
			                    global $woocommerce;    ?>

                    <?php // product style ?>
                    <?php if($settings['product_style'] == 'style_one'): ?>
                    <?php // product style ?>
                    <div <?php wc_product_class( '', $product ); ?>>
                        <?php do_action('get_nest_product_card_one'); ?>
                    </div>
                    <?php elseif($settings['product_style'] == 'style_one_width_sold'): ?>
                    <?php // product style ?>
                    <div <?php wc_product_class( '', $product ); ?>>
                        <?php do_action('get_nest_product_card_onesold'); ?>
                    </div>
                    <?php elseif($settings['product_style'] == 'style_two'): ?>
                    <?php // product style ?>
                    <div <?php wc_product_class( '', $product ); ?>>
                        <?php do_action('get_nest_product_card_two'); ?>
                    </div>
                    <?php // product style ?>
                    <?php elseif($settings['product_style'] == 'style_three'): ?>
                    <?php // product style ?>
                    <div <?php wc_product_class( '', $product ); ?>>
                    <?php do_action('get_nest_product_card_three'); ?>
                    </div>
 
                    <?php elseif($settings['product_style'] == 'style_four'): ?>
                    <?php // product style ?>
                    <div <?php wc_product_class( '', $product ); ?>>
                    <?php do_action('get_nest_product_card_five'); ?>
                    </div>
                    <?php // product style ?>
                    <?php endif; ?>
                    <?php // product style ?>


                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
   
    </div>
    <!--End tab-content-->
</section>

<?php
    }
}
 