<?php

namespace  Nestaddons\Core\Widgets\Shop;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Shop_banner_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-shop-banner-v1';
    }

    public function get_title()
    {
        return __('Shop Banner V1', 'nest-addons');
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
        $this->start_controls_section('shop_banner_v1_settings',
        [ 
            'label' => __('Category Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
        $this->add_control(
            'banner_style',
            [
            'label' => __('Shop Banner Styles', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style-1' => __( 'Style 1', 'nest-addons' ),
                'style-2' => __( 'Style 2', 'nest-addons' ),
                'style-3' => __( 'Style 3', 'nest-addons' ),
                'style-4' => __( 'Style 4', 'nest-addons' ),
                'style-5' => __( 'Style 5', 'nest-addons' ),
                'style-6' => __( 'Style 6', 'nest-addons' ),
                'style-mega-menu' => __( 'Style 7', 'nest-addons' ),
            ],
            'default' => 'style-1',
            ]
        );

        
        $this->add_control(
          'image',
          [
            'label' => __( 'Image', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
          ] 
         );
         $this->add_control(
            'highlight_text',
            [
               'label' => __('Sub Title', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => __('Oganic', 'nest-addons'),
               'placeholder' => __('Type your text here', 'nest-addons'),   
               'condition' => [
                'banner_style' => ['style-1' , 'style-4' , 'style-5' , 'style-mega-menu' , 'style-6']
                ], 
            ]
          );
        $this->add_control(
          'titles',
          [
             'label' => __('Title', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXTAREA,
             'default' => __('  Everyday Fresh & <br>Clean with Our<br>  Products', 'nest-addons'),
             'placeholder' => __('  Everyday Fresh & <br>Clean with Our<br> Products', 'nest-addons'),   
             'description' => __('Use <br> Tag to show banner perfectly eg(   Everyday Fresh &amp; <br>Clean with Our<br>
             Products ) Like this Example', 'nest-addons'),    
             
          ]
        );
        $this->add_control(
            'offer_text',
            [
               'label' => __('Offer Text', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => __('Save to 50%', 'nest-addons'),
               'placeholder' => __('Save to 50%', 'nest-addons'),   
               'condition' => [
                    'banner_style' => ['style-mega-menu']
                ],   
            ]
          );
        $this->add_control(
            'button_text',
            [
              'label' => __('Button Text', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => __('Shop Now', 'nest-addons'),
              'placeholder' => __('Type your text here', 'nest-addons'),
              'condition' => [
                'banner_style' => ['style-1' , 'style-mega-menu' , 'style-2' , 'style-3' , 'style-4' , 'style-5' ,]
                ], 
            ]
        );
        $this->add_control(
          'button_link',
          [
              'label' => __('Button Link', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::URL,
              'placeholder' => __('https://your-link.com', 'nest-addons'),
              'show_external' => true,
              'default' => [
                  'url' => '#',
                  'is_external' => true,
                  'nofollow' => true,
              ],
              'condition' => [
                'banner_style' => ['style-1' , 'style-mega-menu' , 'style-2' , 'style-3' , 'style-4' , 'style-5' , 'style-6']
               ], 
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

    $this->start_controls_section('shop_banner_css',
    [ 
        'label' => __('Shop Banner  Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

   
    $this->add_control(
        'tag_color',
         [
            'label' => __('Tag Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .banner-img .banner-text span  , {{WRAPPER}} .banner-img.style-6 .banner-text p , {{WRAPPER}} .menu-banner-wrap .menu-banner-content h4  ' => 'color: {{VALUE}}!important;',
            ],
            'condition' => [
                'banner_style' => ['style-1' , 'style-4' , 'style-5' , 'style-6' , 'style-mega-menu']
            ], 
         ]
    );

    $this->add_control(
        'title_color',
         [
            'label' => __('Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .banner-img .banner-text h4  , {{WRAPPER}} .banner-img .banner-text h2    , {{WRAPPER}} .banner-img.style-6 .banner-text h6 , {{WRAPPER}} .menu-banner-wrap .menu-banner-content h3  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'offer_color',
         [
            'label' => __('Offer Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .menu-banner-wrap .menu-banner-content .menu-banner-price span.new-price ' => 'color: {{VALUE}}!important;',
            ],
            'condition' => [
                'banner_style' => ['style-mega-menu']
            ], 
         ]
    );

    $this->add_control(
        'offer_two_color',
         [
            'label' => __('Offer Color Two', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .menu-banner-wrap .menu-banner-discount h3 ' => 'color: {{VALUE}}!important;',
            ],
            'condition' => [
                'banner_style' => ['style-mega-menu']
            ], 
         ]
    );

    $this->add_control(
        'offer_two_bg_color',
         [
            'label' => __('Offer Color Two Bg', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .menu-banner-wrap .menu-banner-discount ' => 'background: {{VALUE}}!important;',
            ],
            'condition' => [
                'banner_style' => ['style-mega-menu']
            ], 
         ]
    );
    

    $this->add_control(
        'button_color',
         [
            'label' => __('Button Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .banner-img .banner-text a.btn , {{WRAPPER}} .menu-banner-wrap .menu-banner-content .menu-banner-btn a  ' => 'color: {{VALUE}}!important;',
            ],
            'condition' => [
                'banner_style' => ['style-1' , 'style-2' , 'style-3' , 'style-4' , 'style-5' , 'style-mega-menu']
            ], 
         ]
    );

    
    $this->add_control(
        'button_bg_color',
         [
            'label' => __('Button Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .banner-img .banner-text  a.btn , {{WRAPPER}} .menu-banner-wrap .menu-banner-content .menu-banner-btn a  ' => 'background: {{VALUE}}!important;',
            ],
            'condition' => [
                'banner_style' => ['style-1' , 'style-2' , 'style-3' , 'style-4' , 'style-5' , 'style-mega-menu']
            ], 
         ]
    );

   

    $this->end_controls_section();

    }
    protected function render()
    {
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
    $target = $settings['button_link']['is_external'] ? ' target=_blank' : '';
    $nofollow = $settings['button_link']['nofollow'] ? ' rel=nofollow' : ''; 
?>
    <?php // style ?>
    <?php if($settings['banner_style'] == 'style-1' || $settings['banner_style'] == 'style-4' || $settings['banner_style'] == 'style-5'):  ?>
    <?php // style ?>
   
    <section class="banner-img <?php echo esc_attr($settings['banner_style']); ?>
     <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?><?php endif; ?>">
        <?php if(!empty($settings['image']['url'])): ?>
		    <img src="<?php echo esc_attr($settings['image']['url']); ?>" alt="banner" />
        <?php endif; ?>
			<div class="banner-text">
            <?php if(!empty($settings['highlight_text'])): ?>
			<span class="mb-10 d-block">
                <?php echo wp_kses($settings['highlight_text'] , $allowed_tags);  ?>
			</span>
            <?php endif; ?>
            
            <?php if(!empty($settings['titles'])): ?>
          
                <h4>
                    <?php echo wp_kses($settings['titles'] , $allowed_tags);  ?>
			    </h4>
        
            <?php endif; ?>
            
            <?php if(!empty($settings['button_text'])): ?>
			    <a href="<?php echo esc_attr($settings['button_link']['url']); ?>" class="btn btn-xs">
                    <?php echo esc_attr($settings['button_text']);  ?><i class="fi-rs-arrow-small-right"></i>
                </a>
            <?php endif; ?>
		</div>
        <a href="<?php echo esc_attr($settings['button_link']['url']); ?>" class="ab_link" <?php echo esc_attr($target);  ?> <?php echo esc_attr($nofollow);  ?>></a>
	</section>
 
    <?php // style ?>
    <?php elseif($settings['banner_style'] == 'style-2' || $settings['banner_style'] == 'style-3'):  ?>
    <?php // style ?>
   
     <section class="banner-img  <?php echo esc_attr($settings['banner_style']); ?>
     <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?><?php endif; ?>"  <?php if(!empty($settings['image']['url'])): ?> style="background:url(<?php echo esc_attr($settings['image']['url']); ?>); background-size:cover; background-repeat:no-repeat;" <?php endif; ?>>
		<div class="banner-text">
        <?php if(!empty($settings['titles'])): ?>
	
            <h2 class="mb-100">   <?php echo wp_kses($settings['titles'] , $allowed_tags);  ?>
            </h2>
        
        <?php endif; ?>
        <?php if(!empty($settings['button_text'])): ?>
			    <a href="<?php echo esc_attr($settings['button_link']['url']); ?>"   class="btn btn-xs"> <?php echo esc_attr($settings['button_text']);  ?><i class="fi-rs-arrow-small-right"></i></a>
            <?php endif; ?>
		</div>
        <a href="<?php echo esc_attr($settings['button_link']['url']); ?>" class="ab_link" <?php echo esc_attr($target);  ?> <?php echo esc_attr($nofollow);  ?>></a>
	</section>
   
    <?php // style ?>
    <?php elseif($settings['banner_style'] == 'style-6'):  ?>
    <?php // style ?>
  
    <div class="banner-img <?php echo esc_attr($settings['banner_style']); ?>  
     <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?> <?php endif; ?>">
        <?php if(!empty($settings['image']['url'])): ?>
		    <img src="<?php echo esc_attr($settings['image']['url']); ?>" alt="banner" />
        <?php endif; ?>
        <div class="banner-text">
        <?php if(!empty($settings['titles'])): ?>
          
                <h6 class="mb-10 mt-30">
                    <?php echo wp_kses($settings['titles'] , $allowed_tags);  ?>
                </h6>
          
            <?php endif; ?>
            <?php if(!empty($settings['highlight_text'])): ?>
            <p> <?php echo wp_kses($settings['highlight_text'] , $allowed_tags);  ?></p>
            <?php endif; ?>
        </div>
        <a href="<?php echo esc_attr($settings['button_link']['url']); ?>" class="ab_link" <?php echo esc_attr($target);  ?> <?php echo esc_attr($nofollow);  ?>></a>
    </div>
     
    <?php // style ?>
    <?php elseif($settings['banner_style'] == 'style-mega-menu'):  ?>
    <?php // style ?>
   
    <div class="menu-banner-wrap">
    <a href="<?php echo esc_attr($settings['button_link']['url']); ?>" class="ab_link" <?php echo esc_attr($target);  ?> <?php echo esc_attr($nofollow);  ?>></a>
    <?php if(!empty($settings['image']['url'])): ?> 
        <img src="<?php echo esc_attr($settings['image']['url']); ?>"  alt="banner" />
    <?php endif; ?> 
        <div class="menu-banner-content">
            <?php if(!empty($settings['highlight_text'])): ?>
                <h4>
                    <?php echo wp_kses($settings['highlight_text'] , $allowed_tags);  ?>
                </h4>
            <?php endif; ?>
            <?php if(!empty($settings['titles'])): ?>
            <h3>
                <?php echo wp_kses($settings['titles'] , $allowed_tags);  ?>
            </h3>
            <?php endif; ?>
            <?php if(!empty($settings['offer_text'])): ?>
            <div class="menu-banner-price">
                <span class="new-price text-success">
                    <?php echo wp_kses($settings['offer_text'] , $allowed_tags);  ?>
                </span>
            </div>
            <?php endif; ?>
            <?php if(!empty($settings['button_text'])): ?>
            <div class="menu-banner-btn">
                <a>
                    <?php echo esc_attr($settings['button_text']);  ?>
                </a>
            </div>
            <?php endif; ?> 
        </div>
        <?php if(!empty($settings['offer_text'])): ?>
        <div class="menu-banner-discount">
            <h3>
            <?php echo wp_kses($settings['offer_text'] , $allowed_tags);  ?>
            </h3>
        </div>
        <?php endif; ?>
        
    </div>
    
    <?php // style ?>
    <?php endif; ?>
    <?php // style ?>


    <?php
    }
}