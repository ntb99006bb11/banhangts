<?php

namespace  Nestaddons\Core\Widgets\Shop;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Product_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-product-shop-v1';
    }

    public function get_title()
    {
        return __('Product  V1', 'nest-addons');
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
        $this->start_controls_section('product_shop_v1_settings',
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
                    'style_four'   => esc_html__( 'Style Four [List]', 'nest-addons' ),
                    'style_five'   => esc_html__( 'Style Five', 'nest-addons' ),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'border_enable',
           [
              'label' => __('Border Enable', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'nest-addons'),
               'label_off' => __('No', 'nest-addons'),
               'return_value' => 'yes',
               'default' => 'no',
               'condition' => [
                'product_style' =>   'style_three'
            ]   , 
           ]
        );
    
  
        $this->add_control(
            'product_column',
            [
                'label' => __('Product Column', 'nest-addons'),
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
                'condition' => [
                    'product_style' => ['style_one' , 'style_two' , 'style_three' , 'style_five']
                ], 
            ]
        );

        $this->add_control(
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
       
        $this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'nest-addons' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
			
				'options' => array(
                          ''  => esc_html__( 'Default', 'nest-addons' ),
					'date'       => esc_html__( 'Date', 'nest-addons' ),
					'title'      => esc_html__( 'Title', 'nest-addons' ),
					'menu_order' => esc_html__( 'Menu Order', 'nest-addons' ),
					'rand'       => esc_html__( 'Random', 'nest-addons' ),
				),
                'default' => 'date',
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'nest-addons' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				
				'options' => array(
                    ''  => esc_html__( 'Default', 'nest-addons' ),
					'DESC' => esc_html__( 'DESC', 'nest-addons' ),
					'ASC'  => esc_html__( 'ASC', 'nest-addons' ),
				),
                'default' => 'DESC',
			]
        );
      
        $this->add_control(
            'query_category', 
				[
                'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__('Category', 'nest-addons'),
				'options' => nest_get_product_categories(),
				]
        );

        $this->add_control(
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
                    'rating'   => esc_html__( 'Top Rating', 'nest-addons' ),
                    'instock'   => esc_html__( 'In Stock', 'nest-addons' ),
                ],
                'default' => '',
                'toggle'  => false,
            ]
        );

        $this->add_control(
            'product_not_in',
            [
                'label'       => esc_html__( 'Product Not In', 'nest-addons' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' =>  esc_html__( '' , 'nest-addons'),
            ]
        );

        $this->add_control(
            'pagination_enables',
           [
              'label' => __('Pagination Enable', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'nest-addons'),
               'label_off' => __('No', 'nest-addons'),
               'return_value' => 'yes',
               'default' => 'no',
           ]
        );
    
        $this->add_responsive_control(
            'pagination_alignment',
            [
                'label' => __('Pagination alignments', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                  'left' => [
                    'title' => __( 'Pagination Left', 'nest-addons' ),
                    'icon' => 'fa fa-align-left',
                  ],
                  'center' => [
                    'title' => __( 'Pagination Center', 'nest-addons' ),
                    'icon' => 'fa fa-align-center',
                  ],
                  'right' => [
                    'title' => __( 'Pagination Right', 'nest-addons' ),
                    'icon' => 'fa fa-align-right',
                  ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                  '{{WRAPPER}} .pagination_blog ' => 'text-align: {{VALUE}}!important;',
                ],
                'condition' => [
                    'pagination_enables' => 'yes'
               ],
            ]
        );
    
 

    $this->end_controls_section();

    $this->start_controls_section('product_only_notab_css',
    [ 
        'label' => __('Product  Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
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
                '{{WRAPPER}} .product-cart-wrap .product-content-wrap h2 a  , {{WRAPPER}} .product-list-small h6 a , {{WRAPPER}}  .product_style_five .product-content-wrap h5 a ' => 'color: {{VALUE}}!important;',
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
                '{{WRAPPER}} .product_wrapper .product-content-wrap .font-small.text-muted ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'product_vendor_two_color',
         [
            'label' => __('Product Vendor Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product_wrapper .product-content-wrap .font-small.text-muted a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'product_price_color',
         [
            'label' => __('Product Price Offer Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-content-wrap .product-price ins span ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );


    
    $this->add_control(
        'product_price_og_color',
         [
            'label' => __('Product Price Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}   .product_wrapper .product-price del , {{WRAPPER}}   .product_wrapper .product-price del bdi , {{WRAPPER}}   .product_wrapper .product-price del  ' => 'color: {{VALUE}}!important;',
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
                {{WRAPPER}} .product-cart-wrap.style_two .add_to_cart_button  ' => 'color: {{VALUE}}!important;',
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
                {{WRAPPER}} .product-cart-wrap.style_two .add_to_cart_button ' => 'background: {{VALUE}}!important;',
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

    ?>
     <section class="product_shop position-relative <?php if($settings['border_enable'] == 'yes'): ?> enab_borfor_styheee <?php endif; ?>">
        <div class="row">
                <?php 
                  $product_not_inside = '';
                  if(!empty($settings['product_not_in'])){
                      $product_not_inside = explode(',', $settings['product_not_in']);
                  }
                  else{
                      $product_not_inside = '0';
                  }
                  if(get_query_var('paged')){ 
                    $paged = get_query_var( 'paged' ); 
                    } elseif ( get_query_var( 'page' ) ) { 
                    $paged = get_query_var( 'page' ); 
                    } else { 
                    $paged = 1; 
                }
                $query_args = array(
                        'post_type' => 'product',
                        'ignore_sticky_posts' => true,
                        'paged'             => $paged,
                        'posts_per_page' => $settings['post_count'],
                        'orderby'        => $settings['query_orderby'],
                        'order'          =>  $settings['query_order'],
                        'post__not_in'   => $product_not_inside ,
                    );
                    if($settings['query_category'] ) $query_args['product_cat'] = $settings['query_category'];
              
 
                        if($settings['product_options_showing'] == 'outofstock'):
                            $query_args['meta_key'] = '_stock_status';
                            $query_args['meta_compare'] = '=';
                            $query_args['meta_value'] = 'outofstock';
                        elseif($settings['product_options_showing'] == 'instock'):
                            $query_args['meta_key'] = '_stock_status';
                            $query_args['meta_compare'] = '=';
                            $query_args['meta_value'] = 'instock';

                        elseif($settings['product_options_showing'] == 'best_selling'):
                            $query_args['meta_key'] = 'total_sales';
                            $query_args['orderby'] = 'meta_value_num';
                            $query_args['order']    = 'DESC';
                        elseif($settings['product_options_showing'] == 'featured'):
                            $query_args['tax_query'] = array( array(
                                'taxonomy' => 'product_visibility',
                                'field'    => 'name',
                                'terms'    => array( 'featured' ),
                                'operator' => 'IN',
                            ) 
                        );
                        elseif($settings['product_options_showing'] == 'sale'):
                            $query_args['meta_key'] = '_sale_price';
                            $query_args['meta_value'] = '0';
                            $query_args['meta_compare'] = '>=';
                        elseif($settings['product_options_showing'] == 'rating'):
                            $query_args['meta_key'] = '_wc_average_rating';
                            $query_args['orderby']  = 'meta_value_num';
                        
                        endif;
                        $product_query = new \WP_Query( $query_args );
                    ?>
                    <?php 
                            while($product_query->have_posts()) : $product_query->the_post();
                            global $product;
			                global $post;
			                global $woocommerce;
                           
                            
                            // while loop start ?>
                            <?php // product style ?>
						        <?php if($settings['product_style'] == 'style_one'): ?>
                                    <div class="<?php echo esc_attr($settings['product_column']); ?>">
                                    <div <?php wc_product_class( '', $product ); ?>>
                                        <?php do_action('get_nest_product_card_one'); ?>
                                    </div>     
                                </div>
                                <?php elseif($settings['product_style'] == 'style_one_width_sold'): ?>
                                <?php // product style ?>
                                <div class="<?php echo esc_attr($settings['product_column']); ?> common_col">
                                    <div <?php wc_product_class( '', $product ); ?>>
                                        <?php do_action('get_nest_product_card_onesold'); ?>
                                    </div>
                                </div>
                                <?php elseif($settings['product_style'] == 'style_two'): ?>
                                    <div class="<?php echo esc_attr($settings['product_column']); ?>">
                                        <?php do_action('get_nest_product_card_two'); ?>
                                    </div>
                                <?php elseif($settings['product_style'] == 'style_three'): ?>
                                    <div class="<?php echo esc_attr($settings['product_column']); ?>">
                                            <?php do_action('get_nest_product_card_three'); ?>
                                    </div>
                                <?php elseif($settings['product_style'] == 'style_four'): ?>
                                    <?php do_action('get_nest_product_card_four'); ?>
                                <?php elseif($settings['product_style'] == 'style_five'): ?>
                                    <div class="<?php echo esc_attr($settings['product_column']); ?>">
                                    <?php do_action('get_nest_product_card_five'); ?>
                                    </div>
                                <?php endif; ?>
                            <?php // product style ?>                        
	
                    <?php endwhile; // while loop end ?>
                
   
            <?php wp_reset_postdata(); ?>
            </div>
    <!--End tab-content-->
            <?php if($settings['pagination_enables'] == 'yes'):?>
            <div class="row">
        <div class="col-lg-12">
        <div class="pagination_blog">
           
        <?php
     $pagination = 999999999;
     echo paginate_links( array(
          'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, $paged ),
          'total' => $product_query->max_num_pages,
          'prev_text' => '<i class="fa fa-angle-left"></i>',
          'next_text' => '<i class="fa fa-angle-right"></i>',
          'type'=>'list', 
          'add_args' => false
     ) );
?>          
            </div>
            </div>     
            </div> 
            <?php endif; ?>  
     
</section>
 
        <?php
    }
}

         