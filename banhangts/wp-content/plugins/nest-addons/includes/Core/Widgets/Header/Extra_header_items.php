<?php

namespace  Nestaddons\Core\Widgets\Header;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Extra_header_items extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-extra-header-items-v1';
    }

    public function get_title()
    {
        return __('Extra Header Items', 'nest-addons');
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
        $this->start_controls_section('extra_header_settings',
        [ 
            'label' => __('Extra Header Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
       
        $this->add_control(
            'menu_types',
            [
            'label' => __('Choose Items', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '' => __( 'Select', 'nest-addons' ),
                'search' => __( 'Search', 'nest-addons' ),
                'cart' => __( 'Cart', 'nest-addons' ),
                'wishlist' => __( 'Wishlist', 'nest-addons' ),
                'compare' => __( 'Compare', 'nest-addons' ),
                'account' => __( 'User', 'nest-addons' ),
                'news' => __( 'Flash News', 'nest-addons' ),
            ],
            'default' => 'cart' ,
            ]
        );
 
        $this->add_control(
            'search_types',
            [
            'label' => __('Search Types', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'fibosearch' => __( 'Fibo Search', 'nest-addons' ),
                'customsearch' => __( 'Custom Search (Use once in a page)', 'nest-addons' ),
            ],
            'default' =>  'fibosearch' ,  
            'condition' => [
                'menu_types' => 'search' ,
            ],
            ]
        );

        
        $this->add_control(
            'compare_text',
            [
                'label' => __( 'Compare Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Compare', 'nest-addons' ),
                'condition' => [
                    'menu_types' => 'compare'
                ],
            ]
        );
        $this->add_control(
            'compare_link',
            [
                'label' => __( 'Compare Link', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'nest-addons' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'menu_types' => 'compare'
                ],
            ]
        );
     
        $this->add_control(
            'wishlist_text',
            [
                'label' => __( 'Wishlist Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Wishlist', 'nest-addons' ),
                'condition' => [
                    'menu_types' => 'wishlist'
                ],
            ]
        );
        $this->add_control(
            'wishlist_link',
            [
                'label' => __( 'Wishlist Link', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'nest-addons' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'menu_types' => 'wishlist'
                ],
            ]
        );

        
        $this->add_control(
            'cart_text',
            [
                'label' => __( 'Cart Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Cart', 'nest-addons' ),
                'condition' => [
                    'menu_types' => 'cart'
                ],
            ]
        );
 
  
        $this->add_control(
            'user_text',
            [
                'label' => __( 'User Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Account', 'nest-addons' ),
                'condition' => [
                    'menu_types' => 'account'
                ],
            ]
        );

        $this->add_control(
            'login_text',
            [
                'label' => __( 'Login Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Login', 'nest-addons' ),
                'condition' => [
                    'menu_types' => 'account'
                ],
            ]
        );
        $this->add_control(
            'register_text',
            [
                'label' => __( 'Register Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Register', 'nest-addons' ),
                'condition' => [
                    'menu_types' => 'account'
                ],
            ]
        );
        $this->add_control(
            'signout_text',
            [
                'label' => __( 'Logout Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Sign out', 'nest-addons' ),
                'condition' => [
                    'menu_types' => 'account'
                ],
            ]
        );
        
        $this->add_control(
			'hr_nine',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'menu_types' => 'account'
                ],
			]
		);

        $repeater_five = new \Elementor\Repeater();
        $repeater_five->add_control(
            'icon_fonts',
            [
                'label' => __('Icon', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => nest_get_icon(),
                'default' => __('fi-rs-user' , 'nest-addons'),
            ]
        );
        $repeater_five->add_control(
            'user_list_text',
            [
                'label' => __( 'List Content', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Trendy 25silver jewelry, save up 35% off today', 'nest-addons' ),
            ]
        );
  
        $repeater_five->add_control(
            'link',
            [
                'label' => __( 'Link', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'nest-addons' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'user_repeater',
            [
                'label' => __('User List Content', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_five->get_controls(),
                'default' => [
                    [
                       'icon_fonts' =>  __('fi fi-rs-user', 'nest-addons'),
                       'user_list_text' =>  __('Account', 'nest-addons'),
                       'link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'icon_fonts' =>  __('fi fi-rs-location-alt', 'nest-addons'),
                        'user_list_text' =>  __('Order Tracking', 'nest-addons'),
                        'link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'icon_fonts' =>  __('fi fi-rs-label', 'nest-addons'),
                        'user_list_text' =>  __('My Voucher', 'nest-addons'),
                        'link' =>  __('#', 'nest-addons'),
                    ], 
                    [
                        'icon_fonts' =>  __('fi fi-rs-heart', 'nest-addons'),
                        'user_list_text' =>  __('My Wishlist', 'nest-addons'),
                        'link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'icon_fonts' =>  __('fi fi-rs-settings-sliders', 'nest-addons'),
                        'user_list_text' =>  __('Setting', 'nest-addons'),
                        'link' =>  __('#', 'nest-addons'),
                    ], 
                    
                ],
                'title_field' => '{{{ user_list_text }}}',
                'condition' => [
                    'menu_types' => 'account'
                ],
            ]
        );


        
        $repeater_two = new \Elementor\Repeater();
        $repeater_two->add_control(
            'flash_news_content',
            [
                'label' => __( 'Flash News Content', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Trendy 25silver jewelry, save up 35% off today', 'nest-addons' ),
            ]
        );
  
        $repeater_two->add_control(
            'news_link',
            [
                'label' => __( 'News Link', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'nest-addons' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'flash_news_repeater',
            [
                'label' => __('News Content', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_two->get_controls(),
                'default' => [
                    [
                       'flash_news_content' =>  __('100% Secure delivery without contacting the courier', 'nest-addons'),
                       'news_link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'flash_news_content' =>  __('Supper Value Deals - Save more with coupons', 'nest-addons'),
                        'news_link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'flash_news_content' =>  __('Trendy 25silver jewelry, save up 35% off today ', 'nest-addons'),
                        'news_link' =>  __('#', 'nest-addons'),
                    ], 
                ],
                'title_field' => '{{{ flash_news_content }}}',
                'condition' => [
                    'menu_types' => 'news'
                ],
            ]
        );


      
      

        
    $this->end_controls_section();

 

    $this->start_controls_section('extra_css',
    [ 
        'label' => __('Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]);
    $this->add_control(
        'topbar_flash_color',
         [
            'label' => __('Flash New Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} #news-flash a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    
    $this->add_control(
        'css_hr_msix',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
    
        $this->add_control(
            'search_borader_color',
             [
                'label' => __('Search Border Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .extra_n_items .search-style-2 form , {{WRAPPER}} .custom_search .select2-container--default .select2-selection--single:after ' => 'border-color: {{VALUE}}!important;',
                ],
             ]
        ); 
        $this->add_control(
            'search_background_color',
             [
                'label' => __('Search Background Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .extra_n_items .search-style-2 form ' => 'background: {{VALUE}}!important;',
                ],
             ]
        ); 
        $this->add_control(
            'search_icon_color',
             [
                'label' => __('Search Icon Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dgwt-wcas-no-submit .dgwt-wcas-ico-magnifier , {{WRAPPER}}  .custom_search .submit i ' => ' fill: {{VALUE}}!important; color: {{VALUE}}!important;  opacity:1!important;',
                ],
             ]
        ); 
        $this->add_control(
            'search_placeholder_color',
             [
                'label' => __('Search Placeholder Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dgwt-wcas-search-form .dgwt-wcas-sf-wrapp input[type=search].dgwt-wcas-search-input::placeholder , {{WRAPPER}} .custom_search form input::placeholder  ,
                    {{WRAPPER}} .custom_search .select2-container--default .select2-selection--single .select2-selection__rendered , {{WRAPPER}} .custom_search  .select2-container .select2-selection__arrow::before' => ' color: {{VALUE}}!important;',
                ],
             ]
        ); 
        $this->add_control(
            'search_button_bg_color',
             [
                'label' => __('Search Button Bg Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dgwt-wcas-search-form .dgwt-wcas-sf-wrapp button.dgwt-wcas-search-submit , {{WRAPPER}} .custom_search .submit:hover ' => ' background: {{VALUE}}!important;',
                ],
             ]
        ); 
        $this->add_control(
            'search_button_color',
             [
                'label' => __('Search Button Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dgwt-wcas-search-form .dgwt-wcas-sf-wrapp button.dgwt-wcas-search-submit ' => ' color: {{VALUE}}!important;',
                ],
             ]
        ); 
      
        $this->add_control(
            'css_hr_five',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'content_cbg_color',
             [
                'label' => __('Content Count Bg Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .header-action-2 .header-action-icon-2 > a span.pro-count.blue ' => ' background: {{VALUE}}!important;',
                ],
             ]
        );
        $this->add_control(
            'content_cou_color',
             [
                'label' => __('Content Count  Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .header-action-2 .header-action-icon-2 > a span.pro-count.blue ' => ' color: {{VALUE}}!important;',
                ],
             ]
        );
        $this->add_control(
            'content_icon_color',
             [
                'label' => __('Content Icon Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-action-icon-2 a svg path ' => ' fill: {{VALUE}}!important;',
                ],
             ]
        ); 
     
        $this->add_control(
            'content_text_color',
             [
                'label' => __('Content Text Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-action-2 .header-action-icon-2 span.lable  ' => ' color: {{VALUE}}!important;',
                ],
             ]
        ); 
    
        $this->add_control(
            'content_dropte_color',
             [
                'label' => __('Content Dropdown Text Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-action-2 .account-dropdown li a  ' => ' color: {{VALUE}}!important;',
                ],
             ]
        ); 
        $this->add_control(
            'content_droptei_color',
             [
                'label' => __('Content Dropdown Icon Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-action-2 .account-dropdown li a i ' => ' color: {{VALUE}}!important;',
                ],
             ]
        ); 

        $this->add_control(
            'cart_text_color',
             [
                'label' => __('Cart Text Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contnet_cart_box .woocommerce-mini-cart .woocommerce-mini-cart-item .content_right_car_box_items h2 a  ' => ' color: {{VALUE}}!important;',
                ],
             ]
        ); 
        $this->add_control(
            'cart_price_color',
             [
                'label' => __('Cart Price Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contnet_cart_box .woocommerce-mini-cart .woocommerce-mini-cart-item .content_right_car_box_items .quantity  ' => ' color: {{VALUE}}!important;',
                ],
             ]
        ); 

       
    
     
    $this->end_controls_section();
    


}
protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');  
?>
<?php if($settings['menu_types'] == 'search'):?>
    <div class="header-action-2 extra_n_items">
        <?php  if($settings['search_types'] == 'customsearch'): ?>
        <div class="search-style-2 custom_search">
            <?php do_action('nest_get_prosearch_form'); ?>
        </div>
    </div>
    <?php else: ?>
    <div class="search-style-2">
        <?php echo do_shortcode('[fibosearch]'); ?>
    </div>
<?php endif; ?>
<?php elseif($settings['menu_types'] == 'compare'): 
                                 ?>
                                   <div class="header-action-2">
<div class="header-action-icon-2">
    <?php  $targe_compare = $settings['compare_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow_compare = $settings['compare_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                                ?>
    <a href="<?php echo esc_url($settings['compare_link']['url']); ?>" <?php echo esc_attr($targe_compare); ?>
        <?php echo esc_attr($nofollow_compare); ?>>
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
            <g>
                <path
                    d="M20.298 8.38686L21.7149 7.56033C18.6493 2.2939 12.0415 0.282014 6.56113 2.94644V0.930145H4.9212V5.84994H9.84099V4.21001H7.74598C12.3848 2.24224 17.7631 4.03197 20.298 8.38686Z"
                    fill="#253D4E" />
                <path
                    d="M5.33116 21.1635C1.52924 18.0758 0.528575 12.686 2.96884 8.43938L1.54702 7.61942C-1.2363 12.4662 -0.183154 18.6069 4.05611 22.2492H2.0513V23.8892H6.97109V18.9694H5.33116V21.1635V21.1635Z"
                    fill="#253D4E" />
                <path
                    d="M22.5209 11.2355L19.0426 14.7146L20.202 15.874L21.5959 14.4801C21.0492 19.5603 16.7683 23.4158 11.6588 23.43V25.0699C17.7465 25.0539 22.7967 20.3557 23.2514 14.2849L24.8405 15.874L26 14.7146L22.5209 11.2355Z"
                    fill="#253D4E" />
            </g>
            <defs>
                <clipPath>
                    <rect width="26" height="26" fill="white" />
                </clipPath>
            </defs>
        </svg>
        <span id="mini-compare-counter" class="mini-item-counter lable ml-0">
            <?php echo esc_attr($settings['compare_text']); ?>
        </span>
    </a>
</div>
</div>


<?php elseif($settings['menu_types'] == 'cart'): ?>
    <div class="header-action-2 extra_n_items">
<div class="header-action-icon-2 cart">

    <?php 
                                if(class_exists('woocommerce')):
                                $items_counts = is_object(WC()->cart ) ? WC()->cart->get_cart_contents_count() : ''; ?>
    <a class="mini-cart-icon mini_cart_togglers sm_icon">

        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g>
                <path
                    d="M24.4941 3.36652H4.73614L4.69414 3.01552C4.60819 2.28593 4.25753 1.61325 3.70863 1.12499C3.15974 0.636739 2.45077 0.366858 1.71614 0.366516L0.494141 0.366516V2.36652H1.71614C1.96107 2.36655 2.19748 2.45647 2.38051 2.61923C2.56355 2.78199 2.68048 3.00626 2.70914 3.24952L4.29414 16.7175C4.38009 17.4471 4.73076 18.1198 5.27965 18.608C5.82855 19.0963 6.53751 19.3662 7.27214 19.3665H20.4941V17.3665H7.27214C7.02705 17.3665 6.79052 17.2764 6.60747 17.1134C6.42441 16.9505 6.30757 16.7259 6.27914 16.4825L6.14814 15.3665H22.3301L24.4941 3.36652ZM20.6581 13.3665H5.91314L4.97214 5.36652H22.1011L20.6581 13.3665Z"
                    fill="#253D4E" />
                <path
                    d="M7.49414 24.3665C8.59871 24.3665 9.49414 23.4711 9.49414 22.3665C9.49414 21.2619 8.59871 20.3665 7.49414 20.3665C6.38957 20.3665 5.49414 21.2619 5.49414 22.3665C5.49414 23.4711 6.38957 24.3665 7.49414 24.3665Z"
                    fill="#253D4E" />
                <path
                    d="M17.4941 24.3665C18.5987 24.3665 19.4941 23.4711 19.4941 22.3665C19.4941 21.2619 18.5987 20.3665 17.4941 20.3665C16.3896 20.3665 15.4941 21.2619 15.4941 22.3665C15.4941 23.4711 16.3896 24.3665 17.4941 24.3665Z"
                    fill="#253D4E" />
            </g>
            <defs>
                <clipPath>
                    <rect width="24" height="24" fill="white" transform="translate(0.494141 0.366516)" />
                </clipPath>
            </defs>
        </svg>

        <span class="pro-count blue"> <?php if(!empty($items_counts)): ?>
            <?php echo $items_counts ? $items_counts : '&nbsp;'; else: echo esc_html('0'); ?>
            <?php endif; ?> </span>
    </a>
    <?php endif; ?>
    <a>
        <span class="lable">
            <?php echo esc_attr($settings['cart_text']); ?>
        </span>
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
    <?php global  $woocommerce;  $cart = WC()->cart;
    // If cart is NOT empty
    if(!empty($cart)) {
   ?>
   <div class="contnet_cart_box">
   <div class="widget_shopping_cart_content">
     <?php woocommerce_mini_cart() ?>
     </div>
     </div>
     <?php
    }?>
    </div>
</div>
</div>


<?php elseif($settings['menu_types'] == 'wishlist'): ?>
    <div class="header-action-2 extra_n_items">
<div class="header-action-icon-2 wish_one">
    <?php   $targe_wishlist = $settings['wishlist_link']['is_external'] ? ' target="_blank"' : '';
                                 $nofollow_wishlist = $settings['wishlist_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                                ?>
    <a href="<?php echo esc_url($settings['wishlist_link']['url']); ?>" <?php echo esc_attr($targe_wishlist); ?>
        <?php echo esc_attr($nofollow_wishlist); ?>>
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
            <g>
                <path
                    d="M18.2753 1.28351C17.1493 1.30102 16.0478 1.61536 15.0821 2.19478C14.1164 2.7742 13.3207 3.59818 12.7753 4.58351C12.23 3.59818 11.4343 2.7742 10.4686 2.19478C9.50289 1.61536 8.4014 1.30102 7.27535 1.28351C5.48029 1.3615 3.78905 2.14676 2.57113 3.46774C1.35321 4.78872 0.707598 6.53803 0.775349 8.33351C0.775349 15.1085 11.7313 22.9335 12.1973 23.2655L12.7753 23.6745L13.3533 23.2655C13.8193 22.9355 24.7753 15.1085 24.7753 8.33351C24.8431 6.53803 24.1975 4.78872 22.9796 3.46774C21.7616 2.14676 20.0704 1.3615 18.2753 1.28351ZM12.7753 21.2125C9.52235 18.7825 2.77535 12.8125 2.77535 8.33351C2.70699 7.06822 3.14172 5.82724 3.98471 4.88121C4.82771 3.93518 6.01058 3.36086 7.27535 3.28351C8.54012 3.36086 9.72299 3.93518 10.566 4.88121C11.409 5.82724 11.8437 7.06822 11.7753 8.33351H13.7753C13.707 7.06822 14.1417 5.82724 14.9847 4.88121C15.8277 3.93518 17.0106 3.36086 18.2753 3.28351C19.5401 3.36086 20.723 3.93518 21.566 4.88121C22.409 5.82724 22.8437 7.06822 22.7753 8.33351C22.7753 12.8145 16.0283 18.7825 12.7753 21.2125Z"
                    fill="#253D4E"></path>
            </g>
            <defs>
                <clipPath>
                    <rect width="24" height="24" fill="white" transform="translate(0.775391 0.366516)"></rect>
                </clipPath>
            </defs>
        </svg>
        <span class="lable">
            <?php echo esc_attr($settings['wishlist_text']); ?>
        </span>
    </a>
</div>
 
</div>
<?php elseif($settings['menu_types'] == 'account'): ?>
    <div class="header-action-2 extra_n_items">
<div class="header-action-icon-2">
    <a class="sm_icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
            <g>
                <path
                    d="M21.4443 24.3665H19.4443V19.3235C19.4435 18.5395 19.1317 17.7879 18.5774 17.2335C18.023 16.6791 17.2713 16.3673 16.4873 16.3665H8.40134C7.61733 16.3673 6.86567 16.6791 6.3113 17.2335C5.75693 17.7879 5.44513 18.5395 5.44434 19.3235V24.3665H3.44434V19.3235C3.44592 18.0093 3.96869 16.7494 4.89796 15.8201C5.82723 14.8909 7.08714 14.3681 8.40134 14.3665H16.4873C17.8015 14.3681 19.0614 14.8909 19.9907 15.8201C20.92 16.7494 21.4427 18.0093 21.4443 19.3235V24.3665Z"
                    fill="#253D4E" />
                <path
                    d="M12.4443 12.3665C11.2577 12.3665 10.0976 12.0146 9.11092 11.3553C8.12422 10.696 7.35519 9.75898 6.90106 8.66262C6.44694 7.56626 6.32812 6.35986 6.55963 5.19598C6.79114 4.03209 7.36258 2.96299 8.2017 2.12388C9.04081 1.28476 10.1099 0.713318 11.2738 0.481807C12.4377 0.250296 13.6441 0.369116 14.7404 0.823242C15.8368 1.27737 16.7739 2.0464 17.4332 3.0331C18.0924 4.01979 18.4443 5.17983 18.4443 6.36652C18.4427 7.95733 17.8101 9.48253 16.6852 10.6074C15.5604 11.7323 14.0352 12.3649 12.4443 12.3665ZM12.4443 2.36652C11.6532 2.36652 10.8799 2.60111 10.2221 3.04064C9.56426 3.48017 9.05157 4.10488 8.74882 4.83579C8.44607 5.56669 8.36686 6.37096 8.5212 7.14688C8.67554 7.9228 9.0565 8.63554 9.61591 9.19495C10.1753 9.75436 10.8881 10.1353 11.664 10.2897C12.4399 10.444 13.2442 10.3648 13.9751 10.062C14.706 9.75929 15.3307 9.2466 15.7702 8.5888C16.2097 7.931 16.4443 7.15764 16.4443 6.36652C16.4443 5.30565 16.0229 4.28824 15.2728 3.53809C14.5226 2.78795 13.5052 2.36652 12.4443 2.36652Z"
                    fill="#253D4E" />
            </g>
            <defs>
                <clipPath>
                    <rect width="24" height="24" fill="white" transform="translate(0.444336 0.366516)" />
                </clipPath>
            </defs>
        </svg>
    </a>
    <a>
        <span class="lable ml-0">
            <?php echo esc_attr($settings['user_text']); ?>
        </span>
    </a>
    <div class="cart-dropdown-wrap  account-dropdown">
        <?php if(is_user_logged_in()):
                                                $account = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
                                            ?>
        <ul>
            <?php foreach($settings['user_repeater'] as  $user_repeater): 
                                            $target_five = $user_repeater['link']['is_external'] ? ' target="_blank"' : '';
                                            $nofollow_five = $user_repeater['link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
            <li>
                <a href="<?php echo esc_url($user_repeater['link']['url']); ?>" <?php echo esc_attr($target_five); ?>
                    <?php echo esc_attr($nofollow_five); ?>>
                    <i class="<?php echo esc_attr($user_repeater['icon_fonts']); ?> mr-10"></i>
                    <?php echo esc_attr($user_repeater['user_list_text']); ?>
                </a>
            </li>
            <?php endforeach; ?>
            <?php if(!empty($settings['signout_text'])): ?>
            <li>
                <a href="<?php echo esc_url(wp_logout_url($account));?>"><i class="fi fi-rs-sign-out mr-10"></i>
                    <?php echo esc_attr($settings['signout_text']); ?>
                </a>
            </li>
            <?php endif; ?>
        </ul>
        <?php else: ?>
        <ul>
            <?php if(!empty($settings['login_text'])): ?>
            <li>
                <a href="<?php echo esc_url( get_permalink(get_option('woocommerce_myaccount_page_id' ))); ?>">
                    <?php echo esc_attr($settings['login_text']); ?>
                </a>
            </li>
            <?php endif; ?>
            <?php if(get_option('woocommerce_enable_myaccount_registration') === 'yes'): ?>
            <?php if(!empty($settings['register_text'])): ?>
            <li>
                <a href="<?php echo esc_url( get_permalink(get_option('woocommerce_myaccount_page_id' ))); ?>">
                    <?php echo esc_attr($settings['register_text']); ?>
                </a>
            </li>
            <?php endif; ?>
            <?php endif; ?>

        </ul>

        <?php  endif;  ?>


    </div></div>
</div>

        <?php elseif($settings['menu_types'] == 'news'): ?>
                    <div class="text-center">
                        <div id="news-flash" class="news-flash d-inline-block">
                            <ul>
                                <?php foreach($settings['flash_news_repeater'] as  $flash_news_repeater): 
                                        $target_two = $flash_news_repeater['news_link']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow_two = $flash_news_repeater['news_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                                <li><a href="<?php echo esc_url($flash_news_repeater['news_link']['url']); ?>"
                                        <?php echo esc_attr($target_two); ?>
                                        <?php echo esc_attr($nofollow_two); ?>><?php echo esc_attr($flash_news_repeater['flash_news_content']); ?></a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
    

        <?php endif; ?>

 


<?php

    }
}

 