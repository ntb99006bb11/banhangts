<?php

namespace  Nestaddons\Core\Widgets\Shop;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Popup_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-popup-v1';
    }

    public function get_title()
    {
        return __('Popup V1', 'nest-addons');
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
            'product_popup',
            [
                'label'			=> esc_html__('Select  Product', 'nest-addons'),
                'type'			=> 'Nest_select2_get_auto',
				'multiple'		=> false,
                'post_type' => 'product',
				'label_block'	=> true,
                'options'		=> 'nest_get_product_post_id',
            ]
        );
        
        $this->add_control(
            'popup_title',
            [
                'label'       => esc_html__( 'Popup Title', 'nest-addons' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' =>  esc_html__( 'Deal of the Day' , 'nest-addons'),
            ]
        );

        $this->add_control(
            'offer_title',
            [
                'label'       => esc_html__( 'Popup Title', 'nest-addons' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' =>  esc_html__( 'Hurry Up! Offer End In:' , 'nest-addons'),
            ]
        );

        $this->add_control(
            'offer_ends',
            [
                'label'       => esc_html__( 'Offer End (date)', 'nest-addons' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' =>  esc_html__( '2025/03/25' , 'nest-addons'),
            ]
        );
      
        $this->add_control(
			'bgimage',
			[
				'label' => __( 'Popup Image', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
                    'url' => NEST_ADDONS_URL . '/assets/imgs/popup-1.png',
				],
              
			]
        );
 
    $this->end_controls_section();

    $this->start_controls_section('popup_css',
    [ 
        'label' => __('Popup Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

   
    $this->add_control(
        'popup_bg_colors',
         [
            'label' => __('Popup Background Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .modal-dialog .modal-content , {{WRAPPER}} .modal-dialog  .deal , {{WRAPPER}}   .modal-dialog .countdown-section  ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'popup_border_colors',
         [
            'label' => __('Popup Border Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .modal-dialog .modal-content  ' => 'border: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'close_btn_color',
         [
            'label' => __('Close Button Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .modal-dialog .btn-close ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'deal_text_color',
         [
            'label' => __('Deal Text Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .deal .deal-top h6  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    
    $this->add_control(
        'deal_pro_title_color',
         [
            'label' => __('Deal Product Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .deal .product-title a  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );


    $this->add_control(
        'deal_pro_price_color',
         [
            'label' => __('Deal Product Price Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .modal-content .product-price-cover ins .woocommerce-Price-amount , {{WRAPPER}} .modal-content .product-price-cover del bdi  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'deal_descr_color',
         [
            'label' => __('Deal Description Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .modal-content  .deal-bottom p ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'dealcount_down_color',
         [
            'label' => __('Deal Countdown Border Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .deal .deal-bottom .deals-countdown ' => 'border-color: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'dealcount_content_color',
         [
            'label' => __('Deal Countdown Content Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .deal .deal-bottom .deals-countdown  span' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'pro_rating_color',
         [
            'label' => __('Product Rating Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product_wrapper .star-rating::before, .modal-content .star-rating::before ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'pro_rating_active_color',
         [
            'label' => __('Product Rating Active Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .star-rating span::before ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    
    $this->add_control(
        'button_color',
         [
            'label' => __('Button Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .deal  .add_to_cart_button  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'button_bg_color',
         [
            'label' => __('Button Background Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .deal  .add_to_cart_button  ' => 'background: {{VALUE}}!important;',
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

<div class="modal fade  custom-modal" id="onloadModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">

                    <?php
                    
                    if(!empty($settings['product_popup'])):
                    $query_args = array(
                        'post_type' => 'product',
                        'ignore_sticky_posts' => true,
                        'orderby' => 'date',
                        'posts_per_page' => '1',
                        'p'       => $settings['product_popup'],
                    ); 
                     
                    $product_query = new \WP_Query( $query_args );
                    ?>
                     <?php if($product_query->have_posts()):
                        while($product_query->have_posts()) : $product_query->the_post();
                        global $product;
			            global $post;
			            global $woocommerce;
                        if(empty($product) || !$product->is_visible()) {
                            return;
                        }
                    ?>

                        <div class="deal" <?php if(!empty($settings['bgimage']['url'])): ?> style="background-image: url('<?php echo esc_url($settings['bgimage']['url']); ?>')" <?php endif; ?>>
                            <?php if(!empty($settings['popup_title'])): ?>
                            <div class="deal-top">
                                <h6 class="mb-10 text-brand-2"> <?php echo wp_kses($settings['popup_title'] , $allowed_tags); ?></h6>
                            </div>
                            <?php endif; ?>
                            <div class="deal-content detail-info">
                                <h4 class="product-title">
                                <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="text-heading"><?php the_title(); ?></a></h4>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <?php woocommerce_template_loop_price(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="deal-bottom">
                                <p class="mb-20"><?php echo wp_kses($settings['offer_title'] , $allowed_tags); ?> </p>
                                <?php if(!empty($settings['offer_ends'])): ?>
                                <div class="deals-countdown" data-countdown="<?php echo esc_attr($settings['offer_ends']); ?>"></div>
                                <?php endif; ?>
                                <div class="product-detail-rating">
 
                                   
                                            <?php nest_get_star_rating(); ?> 
                                         
                                </div>
                                <div class="position-relative">
                                <?php woocommerce_template_loop_add_to_cart(); ?> 
                                </div>
                            </div>
                        </div>
                        <?php endwhile; // while loop end ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; // Post Endif after loop end  ?>
                    <?php endif; // Post Endif after loop end  ?>
                    </div>
                </div>
            </div>
        </div>
 
 
        <?php
    }
}
 