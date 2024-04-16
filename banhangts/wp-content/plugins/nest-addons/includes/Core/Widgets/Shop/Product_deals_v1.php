<?php

namespace  Nestaddons\Core\Widgets\Shop;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Product_deals_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-product-deals-v1';
    }

    public function get_title()
    {
        return __('Product Deals V1', 'nest-addons');
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
        $this->start_controls_section('product_deals_v1_settings',
        [ 
            'label' => __('Product Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'nest-addons' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
                    ''  => esc_html__( 'Default', 'nest-addons' ),
					'DESC' => esc_html__( 'DESC', 'nest-addons' ),
					'ASC'  => esc_html__( 'ASC', 'nest-addons' ),
				),
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
            'tab_title',
            [
                'label'       => esc_html__( 'Tab Title', 'nest-addons' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' =>  esc_html__( 'Planting' , 'nest-addons'),
            ]
        );
        $this->add_control(
            'tab_id',
            [
                'label'       => esc_html__( 'Tab ID', 'nest-addons' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' =>  esc_html__( 'tab_default' , 'nest-addons'),
                'description' =>  esc_html__( 'Please Enter the tab id like this example : (tab_milk , tab_coffee , tab_one)' , 'nest-addons'),
            ]
        );


        $this->add_control(
            'deals_second_remining',
           [
              'label' => __('Deals Seconds Remaining Disable', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'nest-addons'),
               'label_off' => __('No', 'nest-addons'),
               'return_value' => 'yes',
               'default' => 'no',
           ]
        );

        $this->add_control(
            'image_height',
            [
                'label' => __('Image Height', 'nest-addons'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 335,
				'min'     => 1,
				'max'     => 1000,
				'step'    => 1,
                'selectors' => [
                    '{{WRAPPER}} .product_deals  .product-img-action-wrap .product-img img ' => 'height: {{VALUE}}px!important;',
                ],
            ]
        );

        
        $this->add_control(
            'short_description_enable',
            [
                'label' => __('Product Short Description Enable', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'no',
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

    $this->start_controls_section('product_deal_css',
    [ 
        'label' => __('Product Deal Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

   
    $this->add_control(
        'deal_bg_color',
         [
            'label' => __('Deal Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .countdown-section ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'deal_content_color',
         [
            'label' => __('Deal Number Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .countdown-section .countdown-amount' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'deal_content_two_color',
         [
            'label' => __('Deal Text Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .countdown-section .countdown-period  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'product_title_color',
         [
            'label' => __('Product Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-content-wrap h2 a  ' => 'color: {{VALUE}}!important;',
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
                '{{WRAPPER}} .product-cart-wrap .product-content-wrap .product-price span ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );


    
    $this->add_control(
        'product_price_og_color',
         [
            'label' => __('Product Price Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}   .product_wrapper .product-price del , {{WRAPPER}}  .product_deals .product_wrapper .product-price del bdi , {{WRAPPER}}  .product_deals .product_wrapper .product-price del bdi  .woocommerce-Price-currencySymbol ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    
    
    $this->add_control(
        'button_colors',
         [
            'label' => __('Product Btn Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-card-bottom .add-cart .add , {{WRAPPER}} .product-cart-wrap .product-card-bottom .add-cart .add span , {{WRAPPER}} .product-cart-wrap .product-card-bottom .add-cart  a::before  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'button_bg_color',
         [
            'label' => __('Product Btn Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap .product-card-bottom .add-cart .add , {{WRAPPER}} .product-cart-wrap .product-card-bottom .add-cart .add span ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );


    
    $this->add_control(
        'box_color',
         [
            'label' => __('Box Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-cart-wrap.style-2 .product-content-wrap .deals-content ' => 'background: {{VALUE}}!important;',
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
<section
    class="product_deals position-relative <?php if(!empty($settings['deals_second_remining'] == 'yes')): ?> seconds_enable <?php endif; ?>">
    <div class="row">
        <?php     $product_not_inside = '';
                if(!empty($settings['product_not_in'])){
                    $product_not_inside = explode(',', $settings['product_not_in']);
                }
                else{
                    $product_not_inside = '0';
                }
                $query_args = array(
                        'post_type' => 'product',
                        'ignore_sticky_posts' => true,
                        'order'=> 'DESc',
                        'posts_per_page' => $settings['post_count'],
                        'orderby'        => $settings['query_orderby'],
                        'order'          =>  $settings['query_order'],
                        'post__not_in'   => $product_not_inside ,
                    );
                    if($settings['query_category'] ) $query_args['product_cat'] = $settings['query_category'];
                    if($settings['product_options_showing'] == 'outofstock'):
                        $query_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'outofstock',
                            'operator' => 'NOT IN',
                            ),
                        ); // WPCS: slow query ok.
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
                            $query_args['meta_value'] = array('');
                            $query_args['meta_compare'] = 'NOT IN';
                        endif;
                        $product_query = new \WP_Query( $query_args );
                    ?>
        <?php if($product_query->have_posts()):
                            while($product_query->have_posts()) : $product_query->the_post();
                            global $product;
			                global $post;
			                global $woocommerce;
                            $product_deals_images =   get_post_meta(get_the_ID() , 'product_deals_image', true);  
                           
                            $porduct_store_name = get_post_meta(get_the_ID() , 'porduct_store_name', true);
                            $porduct_store_link = get_post_meta(get_the_ID() , 'porduct_store_link', true);
                    // while loop start ?>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div <?php wc_product_class( '', $product ); ?>>
                <div class="product_wrapper product-cart-wrap deals_style_one style-2     <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp"
                    data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?><?php endif; ?>">
                    <div class="product-img-action-wrap">
                        <div class="product-img">
                            <?php if(!empty($product_deals_images['url'])): ?>
                            <?php if(is_array($product_deals_images) || is_object($product_deals_images)): ?>
                            <img src="<?php echo esc_url($product_deals_images['url']); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <?php else: ?>
                            <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>">
                                <?php echo woocommerce_get_product_thumbnail('default-img'); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="product-content-wrap">

                        <div class="deals-countdown-wrap">
                       
                                <?php do_action('get_nest_product_deals');?>
                        
                        </div>

                        <div class="deals-content">
                            <h2 class="pro_title"><a
                                    href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a>
                            </h2>
                            <?php    
                            if($settings['short_description_enable'] == 'yes'): 
                            $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
                            if(!empty($short_description)):
                            ?>
                                <div class="woocommerce-product-details__short-description">
                                    <?php echo $short_description; // WPCS: XSS ok. ?>
                                </div>
                            <?php endif; endif;  ?>
                            <?php nest_get_star_rating(); ?>

                            <?php if(!empty($porduct_store_name)): ?>
                            <div>
                                <span class="font-small text-muted"><?php echo esc_html('By' , 'nest-addons') ?>
                                    <a href="<?php if(!empty($porduct_store_link)): ?><?php echo esc_attr($porduct_store_link); else: echo esc_html('#','nest-addons'); endif;?>"
                                        target="_blank">
                                        <?php echo esc_attr($porduct_store_name); ?>
                                    </a></span>
                            </div>
                            <?php endif; ?>
                            <div>

                            </div>
                            <div class="product-card-bottom">

                                <div class="product-price clearfix">
                                    <?php woocommerce_template_loop_price(); ?>
                                </div>

                                <div class="add-cart">
                                    <?php woocommerce_template_loop_add_to_cart(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php endwhile; // while loop end ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; // Post Endif after loop end  ?>
    </div>
    <!--End tab-content-->
</section>

<?php
    }
}

 