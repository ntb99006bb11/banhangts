<?php

namespace  Nestaddons\Core\Widgets\Header;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class header_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-header-v1';
    }

    public function get_title()
    {
        return __('Header V1', 'nest-addons');
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
        $this->start_controls_section('headers_settings',
        [ 
            'label' => __('Header Settings', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );

         
        $this->add_control(
            'header_styles',
            [
              'label' => __('Header Styles', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'options' => [
                'style_one' => __( 'Style One', 'nest-addons' ),
                'style_two' => __( 'Style Two', 'nest-addons' ),
            ],
              'default' => 'style_one' ,
            ]
        );

        $this->add_control(
            'top_bar_enable',
            [
                'label' => __('Top Bar show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'mid_bar_enable',
            [
                'label' => __('Mid Bar show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'main_header_enable',
            [
                'label' => __('Main Header show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
			'hr_sear',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);


        $this->add_control(
            'logo_default',
        [
            'label' => __( 'Logo Default', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => NEST_ADDONS_URL . '/assets/imgs/logo.svg',
            ],
        ] 
       );
   

       $this->add_control(
        'logo_width',
        [
            'label' => __( 'Logo Width', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '170px', 'nest-addons' ),
            'placeholder' => __( 'Enter logo width here in (px , rem and em )', 'nest-addons' ),
            'selectors' => [
                '{{WRAPPER}} .logo a img ' => 'width: {{VALUE}}!important; min-width: {{VALUE}}!important;',
            ],
        ]
        );
        $this->add_control(
            'margin_logo',
            [
                'label' => __( 'Margin', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .logo a img ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'custom_link_enable',
            [
                'label' => __('Custom Link show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
    
    
        $this->add_control(
            'logo_link',
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
                'condition' => [
                    'custom_link_enable' => 'yes'
                ],
            ]
        );

     
    
        $this->end_controls_section();

        $this->start_controls_section('top_content',
        [ 
            'label' => __('Topbar Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [
                'top_bar_enable' => 'yes'
            ]
        ]
        );


        $this->add_control(
            'list_items_enable',
            [
                'label' => __('Link Item show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater_one = new \Elementor\Repeater();
        $repeater_one->add_control(
            'list_item',
            [
                'label' => __( 'Menu Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'About Us', 'nest-addons' ),
            ]
        );
  
        $repeater_one->add_control(
            'list_link',
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
            'link_repeater',
            [
                'label' => __('List Content', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_one->get_controls(),
                'default' => [
                    [
                       'list_item' =>  __('About Us', 'nest-addons'),
                       'list_link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'list_item' =>  __('My Account ', 'nest-addons'),
                        'list_link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'list_item' =>  __('Wishlist ', 'nest-addons'),
                        'list_link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'list_item' =>  __('Order Tracking', 'nest-addons'),
                        'list_link' =>  __('#', 'nest-addons'),
                    
                    ],
                ],
                'title_field' => '{{{ list_item }}}',
                'condition' => [
                    'list_items_enable' => 'yes'
                ],
            ]
        );

        $this->add_control(
			'hr_one',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
            'flash_news_enable',
            [
                'label' => __('News show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
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
                    'flash_news_enable' => 'yes'
                ],
            ]
        );

        $this->add_control(
			'hr_two',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'contact_enable',
            [
                'label' => __('Contact Us show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'contact_us_title',
            [
                'label' => __( 'Contact Title', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Need help? Call Us:', 'nest-addons' ),
                'condition' => [
                    'contact_enable' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'contact_us_number',
            [
                'label' => __( 'Phone Number', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '+1800900122', 'nest-addons' ),
                'condition' => [
                    'contact_enable' => 'yes'
                ],
            ]
        );



        $this->add_control(
			'hr_three',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);


        
        $this->add_control(
            'language_enable',
            [
                'label' => __('Language List show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'defaut_language_texts',
            [
                'label' => __( 'Default Language Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'English', 'nest-addons' ),
                'condition' => [
                    'language_enable' => 'yes'
                ],
            ]
        );
        $repeater_three = new \Elementor\Repeater();
        $repeater_three->add_control(
        'language_icon_image',
        [
            'label' => __( 'Image', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ] 
       );
        $repeater_three->add_control(
            'language_text',
            [
                'label' => __( 'Language Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'English', 'nest-addons' ),
            ]
        );
  
        $repeater_three->add_control(
            'language_link',
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
            'language_repeater',
            [
                'label' => __('Language Content', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_three->get_controls(),
                'default' => [
                    [
                       'language_text' =>  __('Français', 'nest-addons'),
                       'language_link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'language_text' =>  __('Deutsch', 'nest-addons'),
                        'language_link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'language_text' =>  __('Pусский ', 'nest-addons'),
                        'language_link' =>  __('#', 'nest-addons'),
                    ], 
                ],
                'title_field' => '{{{ language_text }}}',
                'condition' => [
                    'language_enable' => 'yes'
                ],
            ]
        );

         $this->add_control(
			'hr_four',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);


        
        $this->add_control(
            'currency_enable',
            [
                'label' => __('Currency show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'defaut_currency_texts',
            [
                'label' => __( 'Default currency Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'INR', 'nest-addons' ),
                'condition' => [
                    'currency_enable' => 'yes'
                ],
            ]
        );
        $repeater_four = new \Elementor\Repeater();
        $repeater_four->add_control(
            'currency_image',
            [
                'label' => __( 'Image', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ] 
        );
        $repeater_four->add_control(
            'currency_text',
            [
                'label' => __( 'Currency Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'USD', 'nest-addons' ),
            ]
        );
  
        $repeater_four->add_control(
            'currency_link',
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
            'currency_repeater',
            [
                'label' => __('currency Content', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_four->get_controls(),
                'default' => [
                    [
                       'currency_text' =>  __('USD', 'nest-addons'),
                       'currency_link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'currency_text' =>  __('MBP', 'nest-addons'),
                        'currency_link' =>  __('#', 'nest-addons'),
                    ],
                    [
                        'currency_text' =>  __('EU ', 'nest-addons'),
                        'currency_link' =>  __('#', 'nest-addons'),
                    ], 
                ],
                'title_field' => '{{{ currency_text }}}',
                'condition' => [
                    'currency_enable' => 'yes'
                ],
            ]
        );


        
        $this->end_controls_section();

        $this->start_controls_section('mid_content',
        [ 
            'label' => __('Midbar Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [
                'mid_bar_enable' => 'yes'
            ],
        ]
        );

       
        $this->add_control(
            'search_enable',
            [
                'label' => __('Search show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'search_styles',
            [
              'label' => __('Search Type', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'options' => [
                'style_one' => __( 'Fibo Search ( Comes to Plugin )', 'nest-addons' ),
                'style_two' => __( 'Default Search', 'nest-addons' ),
            ],
              'default' => 'style_one' ,
              'condition' => [
                'search_enable' => 'yes'
            ],
            ]
        );

        $this->add_control(
			'hr_five_f',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'button_enable',
            [
                'label' => __('Button show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Became Vendor', 'nest-addons' ),
                'placeholder' => __( 'Type your title here', 'nest-addons' ),
                'condition' => [
                    'button_enable' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label' => __( 'Button Link', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'nest-addons' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'button_enable' => 'yes'
                ],
            ]
        );

        $this->add_control(
			'hr_five',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
            'compare_enable',
            [
                'label' => __('Compare show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'compare_text',
            [
                'label' => __( 'Compare Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Compare', 'nest-addons' ),
                'condition' => [
                    'compare_enable' => 'yes'
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
                    'compare_enable' => 'yes'
                ],
            ]
        );
        $this->add_control(
			'hr_six',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
            'wishlist_enable',
            [
                'label' => __('Wishlist show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'wishlist_text',
            [
                'label' => __( 'Wishlist Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Wishlist', 'nest-addons' ),
                'condition' => [
                    'wishlist_enable' => 'yes'
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
                    'wishlist_enable' => 'yes'
                ],
            ]
        );

        $this->add_control(
			'hr_sevens',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
            'cart_enable',
            [
                'label' => __('Cart show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        
        $this->add_control(
            'cart_text',
            [
                'label' => __( 'Cart Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Cart', 'nest-addons' ),
                'condition' => [
                    'cart_enable' => 'yes'
                ],
            ]
        );

        $this->add_control(
			'hr_eight',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
            'user_enable',
            [
                'label' => __('User show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'user_text',
            [
                'label' => __( 'User Text', 'nest-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Account', 'nest-addons' ),
                'condition' => [
                    'user_enable' => 'yes'
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
                    'user_enable' => 'yes'
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
                    'user_enable' => 'yes'
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
                    'user_enable' => 'yes'
                ],
            ]
        );
        
        $this->add_control(
			'hr_nine',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $repeater_five = new \Elementor\Repeater();
        $repeater_five->add_control(
            'icon_fonts',
            [
                'label' => __('Icon', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => nest_get_icon(),
                'default' => 'fi-rs-user' ,
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
                    'user_enable' => 'yes'
                ],
            ]
        );

      
      

    $this->end_controls_section();


    $this->start_controls_section('headers_content',
    [ 
        'label' => __('Header Content', 'nest-addons'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
    );

    $this->add_control(
        'navigations',
        [
            'label' => __('Select Navigation', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => nest_navmenu(),
        ]
    );
        
    $this->add_control(
        'hr_seven',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER, 
        ]
    );

    $this->add_control(
        'category_enable',
        [
            'label' => __('Category Show / hide', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'nest-addons'),
            'label_off' => __('No', 'nest-addons'),
            'return_value' => 'yes',
            'default' => 'yes',
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
        'default' =>  'style_two' ,  
        'condition' => [
            'category_enable' => 'yes'
         ],
        ]
    );
    $this->add_control(
        'category_texts',
        [
            'label' => __( 'Category Text One', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Browse All Categories', 'nest-addons' ),
            'condition' => [
                'category_enable' => 'yes'
            ],
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

   
  
    $this->add_control(
        'hr_ten',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
    $this->add_control(
        'hot_deals_enable',
        [
            'label' => __('Hotdeals Show / hide', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'nest-addons'),
            'label_off' => __('No', 'nest-addons'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'hot_deal_text',
        [
            'label' => __( 'Button Text', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Hot Deals', 'nest-addons' ),
            'condition' => [
                'hot_deals_enable' => 'yes'
            ],
        ]
    );
    $this->add_control(
        'hot_link',
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
            'condition' => [
                'hot_deals_enable' => 'yes'
            ],
        ]
    );

    $this->add_control(
        'hr_eleven',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
    $this->add_control(
        'toll_free_enable',
        [
            'label' => __('TollFree Show / hide', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'nest-addons'),
            'label_off' => __('No', 'nest-addons'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
    $this->add_control(
        'toll_free_image',
        [
            'label' => __( 'Image', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'condition' => [
                'toll_free_enable' => 'yes'
            ],
        ] 
    );

    $this->add_control(
        'toll_free_text',
        [
            'label' => __( 'Tollfree Text', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '24/7 Support Center', 'nest-addons' ),
            'condition' => [
                'toll_free_enable' => 'yes'
            ],
        ]
    );

    $this->add_control(
        'toll_free_number',
        [
            'label' => __( 'Tollfree Text', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '1900 - 888', 'nest-addons' ),
            'condition' => [
                'toll_free_enable' => 'yes'
            ],
        ]
    );

    $this->end_controls_section();

 

$this->start_controls_section('header_css',
[ 
    'label' => __('Topbar Css', 'nest-addons'),
    'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
]);

$this->add_control(
    'topbar_bg_color',
     [
        'label' => __('Topbar Bg Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-style-1 .header-top-ptb-1 ' => 'background: {{VALUE}}!important;',
        ],
     ]
);
$this->add_control(
    'topbar_bor_color',
     [
        'label' => __('Topbar Border Bottom Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-style-1 .header-top-ptb-1' => 'border-bottom-color: {{VALUE}}!important;',
            '{{WRAPPER}} .header-info > ul > li:before ' => 'background: {{VALUE}}!important;',
        ],
     ]
);
$this->add_control(
    'css_hr_zero',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);
    $this->add_control(
        'topbar_list_color',
         [
            'label' => __('List Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header-info.top_left ul li a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    
    $this->add_control(
        'topbar_list_ho_color',
         [
            'label' => __('List Hover Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header-info.top_left ul li a:hover ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    
    $this->add_control(
        'css_hr_one',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
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
        'css_hr_two',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
    $this->add_control(
        'topbar_help_color',
         [
            'label' => __('Helpus Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header-info-right li.number  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'topbar_help_nu_color',
         [
            'label' => __('Helpus Number Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header-info-right li.number a.text-brand ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'css_hr_three',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
    $this->add_control(
        'topbar_lan_pr_color',
         [
            'label' => __('Language and Price Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .language-dropdown-active ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    $this->add_control(
        'topbar_lan_pr_drop_color',
         [
            'label' => __('Language and Price Dropdown text Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .language-dropdown a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
 
$this->end_controls_section();

$this->start_controls_section('midbar_css',
[ 
    'label' => __('Midbar Css', 'nest-addons'),
    'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
]);
$this->add_control(
    'mid_bar_bg',
    [
        'label' => __('Midbar Background Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-style-1 .header-middle-ptb-1 ' => 'background: {{VALUE}}!important;',
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
                '{{WRAPPER}} .header-style-1 .search-style-2 form ' => 'border-color: {{VALUE}}!important;',
            ],
         ]
    ); 
    $this->add_control(
        'search_background_color',
         [
            'label' => __('Search Background Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header-style-1 .search-style-2 form ' => 'background: {{VALUE}}!important;',
            ],
         ]
    ); 
    $this->add_control(
        'search_icon_color',
         [
            'label' => __('Search Icon Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .dgwt-wcas-no-submit .dgwt-wcas-ico-magnifier ' => ' fill: {{VALUE}}!important;  opacity:1!important;',
            ],
         ]
    ); 
    $this->add_control(
        'search_placeholder_color',
         [
            'label' => __('Search Placeholder Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .dgwt-wcas-search-form .dgwt-wcas-sf-wrapp input[type=search].dgwt-wcas-search-input::placeholder ' => ' color: {{VALUE}}!important;',
            ],
         ]
    ); 
    $this->add_control(
        'search_button_bg_color',
         [
            'label' => __('Search Button Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .dgwt-wcas-search-form .dgwt-wcas-sf-wrapp button.dgwt-wcas-search-submit ' => ' background: {{VALUE}}!important;',
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
        'css_hr_four',
        [
            'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
    );
    $this->add_control(
        'button_bor_color',
         [
            'label' => __('Button Border Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header-action-2 .button_text a ' => ' border-color: {{VALUE}}!important;',
            ],
         ]
    ); 
    $this->add_control(
        'button_bg_color',
         [
            'label' => __('Button Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header-action-2 .button_text a ' => ' background: {{VALUE}}!important;',
            ],
         ]
    ); 
    $this->add_control(
        'button_color',
         [
            'label' => __('Button Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header-action-2 .button_text a ' => ' color: {{VALUE}}!important;',
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

 
$this->end_controls_section();

$this->start_controls_section('header_m_css',
[ 
    'label' => __('Header Css', 'nest-addons'),
    'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
]);
$this->add_control(
    'main_header_bg',
    [
        'label' => __('Header Background Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-style-1 .header-bottom-bg-color ' => 'background: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'main_header_borderc',
    [
        'label' => __('Header Border Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-style-1 .header-bottom-bg-color ' => 'border-top-color: {{VALUE}}!important; border-bottom-color: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'css_hr_six',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);


$this->add_control(
    'cate_drop_text_color',
    [
        'label' => __('Category Btn Text Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-style-1 .main-categori-wrap > a.categories-button-active , 
            {{WRAPPER}} .header-style-1 .main-categori-wrap > a.categories-button-active span ,
            {{WRAPPER}} .header-style-1 .main-categori-wrap > a.categories-button-active  i ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 
$this->add_control(
    'cate_drop_color',
    [
        'label' => __('Category Btn Bg Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-style-1 .main-categori-wrap > a.categories-button-active ' => 'background: {{VALUE}}!important;',
        ],
    ]
); 
$this->add_control(
    'cate_h_dropt_color',
    [
        'label' => __('Category Btn Hover Text Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-style-1 .main-categori-wrap > a.categories-button-active:hover , 
            {{WRAPPER}} .header-style-1 .main-categori-wrap > a.categories-button-active:hover span ,
            {{WRAPPER}} .header-style-1 .main-categori-wrap > a.categories-button-active:hover  i ' => 'color: {{VALUE}}!important;',
        ],
    ]
);  
$this->add_control(
    'cate_h_drop_color',
    [
        'label' => __('Category Btn Hover Bg Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-style-1 .main-categori-wrap > a.categories-button-active:hover ' => 'background: {{VALUE}}!important;',
        ],
    ]
);  
$this->add_control(
    'css_hr_seven',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);
$this->add_control(
    'hot_deal_icon_color',
    [
        'label' => __('Hotdeal Icon Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-area .hot-deals svg path ' => 'fill: {{VALUE}}!important;',
        ],
    ]
); 
$this->add_control(
    'hot_deal_text_color',
    [
        'label' => __('Hotdeal Text Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .header-area .hot-deals a ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 
$this->add_control(
    'css_hr_eight',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
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
$this->add_control(
    'css_hr_nine',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->add_control(
    'hot_line_icon_color',
    [
        'label' => __('Hotlie Icon Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .hotline svg path' => 'fill: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'hot_line_no_color',
    [
        'label' => __('Hotlie Number Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .hotline p a ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'hot_line_noh_color',
    [
        'label' => __('Hotlie Number Hover Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .hotline p a:hover ' => 'color: {{VALUE}}!important;',
        ],
    ]
); 

$this->add_control(
    'hot_line_text_color',
    [
        'label' => __('Hotlie Text  Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .hotline p span ' => 'color: {{VALUE}}!important;',
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

<header class="header-area header-style-1 <?php if($settings['header_styles'] == 'style_two'): ?> header-style-5 <?php endif; ?> header-height-2">

    <?php if($settings['top_bar_enable'] == 'yes'): ?>
    <div class="header-top header-top-ptb-1">
    <div class="auto-container">
            <div class="row align-items-center">
                <?php if($settings['list_items_enable'] == 'yes'): ?>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="header-info top_left">
                        <ul>
                            <?php foreach($settings['link_repeater'] as  $link_repeater): 
                                $targe_one = $link_repeater['list_link']['is_external'] ? ' target="_blank"' : '';
                                $nofollow_one = $link_repeater['list_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                            <li><a href="<?php echo esc_url($link_repeater['list_link']['url']); ?>"
                                    <?php echo esc_attr($targe_one); ?>
                                    <?php echo esc_attr($nofollow_one); ?>><?php echo esc_attr($link_repeater['list_item']); ?></a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($settings['flash_news_enable'] == 'yes'): ?>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="text-center">
                        <div class="swiper  news-flash">
                            <div class="swiper-wrapper">
                                <?php foreach($settings['flash_news_repeater'] as  $flash_news_repeater): 
                                        $target_two = $flash_news_repeater['news_link']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow_two = $flash_news_repeater['news_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                                <div class="swiper-slide"><a href="<?php echo esc_url($flash_news_repeater['news_link']['url']); ?>"
                                        <?php echo esc_attr($target_two); ?>
                                        <?php echo esc_attr($nofollow_two); ?>><?php echo esc_attr($flash_news_repeater['flash_news_content']); ?></a>
                                </div>
                                <?php endforeach;?>
                                </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="header-info header-info-right">
                        <ul>
                            <?php if($settings['contact_enable'] == 'yes'): ?>
                            <li class="number"><?php echo esc_attr($settings['contact_us_title']); ?> <a
                                    href="tel:<?php echo esc_attr($settings['contact_us_number']); ?>"
                                    class="text-brand"><?php echo esc_attr($settings['contact_us_number']); ?></a></li>
                            <?php endif; ?>
                            <?php if($settings['language_enable'] == 'yes'): ?>
                            <li>
                                <a class="language-dropdown-active">
                                    <?php echo esc_html($settings['defaut_language_texts']); ?>
                                    <i class="fi-rs-angle-small-down"></i>
                                </a>
                                <ul class="language-dropdown">
                                    <?php foreach($settings['language_repeater'] as  $language_repeater): 
                                        $target_three = $language_repeater['language_link']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow_three= $language_repeater['language_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                                    <li>
                                        <a href="<?php echo esc_url($language_repeater['language_link']['url']); ?>"
                                            <?php echo esc_attr($target_three); ?>
                                            <?php echo esc_attr($nofollow_three); ?>>
                                            <?php if(!empty($language_repeater['language_icon_image']['url'])): ?>
                                            <img src="<?php echo esc_url($language_repeater['language_icon_image']['url']); ?>"
                                                alt="img" />
                                            <?php endif; ?>
                                            <?php echo esc_attr($language_repeater['language_text']); ?>
                                        </a>
                                    </li>
                                    <?php endforeach ;?>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if($settings['currency_enable'] == 'yes'): ?>
                            <li>
                                <a class="language-dropdown-active">
                                    <?php echo esc_html($settings['defaut_currency_texts']); ?>
                                    <i class="fi-rs-angle-small-down"></i>
                                </a>
                                <ul class="language-dropdown">
                                    <?php foreach($settings['currency_repeater'] as  $currency_repeater): 
                                        $target_four = $currency_repeater['currency_link']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow_four = $currency_repeater['currency_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                                    <li>
                                        <a href="<?php echo esc_url($currency_repeater['currency_link']['url']); ?>"
                                            <?php echo esc_attr($target_four); ?>
                                            <?php echo esc_attr($nofollow_four); ?>>
                                            <?php if(!empty($currency_repeater['currency_image']['url'])): ?>
                                            <img src="<?php echo esc_url($currency_repeater['currency_image']['url']); ?>"
                                                alt="img" />
                                            <?php endif; ?>
                                            <?php echo esc_attr($currency_repeater['currency_text']); ?>
                                        </a>
                                    </li>
                                    <?php endforeach ;?>

                                </ul>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($settings['mid_bar_enable'] == 'yes'): ?>
    <div class="header-middle header-middle-ptb-1">
    <div class="auto-container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                        <?php  
                            $link = '';
                            if($settings['custom_link_enable'] == 'yes'):
                                $link = $settings['logo_link']['url'];
                                $targe_logo = $settings['logo_link']['is_external'] ? ' target="_blank"' : '';
                                $nofollow_logo = $settings['logo_link']['nofollow'] ? ' rel="nofollow"' : '';
                            else:
                                $link = home_url();
                            endif;
                        ?>
                    <a href="<?php echo esc_url($link); ?>"
                        <?php if($settings['custom_link_enable'] == 'yes'):  echo esc_attr($targe_logo); echo esc_attr($nofollow_logo);  endif; ?>
                        class="logo navbar_brand">
                        <img src="<?php echo esc_url($settings['logo_default']['url']); ?>"
                            alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default">
                    </a>
                </div>
                <div class="header-right">
                    <?php if($settings['search_enable'] == 'yes'): ?>
                    <div class="search-style-2">
                        <?php if($settings['search_styles'] == 'style_one'): ?>
                            <?php echo do_shortcode('[fibosearch]'); ?>
                        <?php elseif($settings['search_styles'] == 'style_two'): ?>
                        <div class="custom_search">
                         
                            <?php do_action('nest_get_prosearch_form'); ?>
                        </div>
                        <?php else: ?>   
                            <?php echo do_shortcode('[fibosearch]'); ?>
                        <?php endif; ?>
                    </div>
                 
                    <?php endif; ?>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <?php if($settings['button_enable'] == 'yes'): ?>
                            <div class="button_text">
                                <?php  $targe_set = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow_set = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                                <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="btn btn-sm"
                                    <?php echo esc_attr($targe_set); ?>
                                    <?php echo esc_attr($nofollow_set); ?>><?php echo esc_attr($settings['button_text']); ?>
                                    <i class="fi-rs-arrow-right"></i>
                                </a>
                            </div>
                            <?php endif; ?>
                            <?php if($settings['compare_enable'] == 'yes'): 
                                 ?>
                            <div class="header-action-icon-2">
                                <?php 
                                 $targe_compare = $settings['compare_link']['is_external'] ? ' target="_blank"' : '';
                                 $nofollow_compare = $settings['compare_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                                ?>
                                <a  href="<?php echo esc_url($settings['compare_link']['url']); ?>"  <?php echo esc_attr($targe_compare); ?>
                                    <?php echo esc_attr($nofollow_compare); ?>>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                        <g>
                                            <path d="M20.298 8.38686L21.7149 7.56033C18.6493 2.2939 12.0415 0.282014 6.56113 2.94644V0.930145H4.9212V5.84994H9.84099V4.21001H7.74598C12.3848 2.24224 17.7631 4.03197 20.298 8.38686Z" fill="#253D4E"/>
                                            <path d="M5.33116 21.1635C1.52924 18.0758 0.528575 12.686 2.96884 8.43938L1.54702 7.61942C-1.2363 12.4662 -0.183154 18.6069 4.05611 22.2492H2.0513V23.8892H6.97109V18.9694H5.33116V21.1635V21.1635Z" fill="#253D4E"/>
                                            <path d="M22.5209 11.2355L19.0426 14.7146L20.202 15.874L21.5959 14.4801C21.0492 19.5603 16.7683 23.4158 11.6588 23.43V25.0699C17.7465 25.0539 22.7967 20.3557 23.2514 14.2849L24.8405 15.874L26 14.7146L22.5209 11.2355Z" fill="#253D4E"/>
                                        </g>
                                        <defs>
                                            <clipPath>
                                            <rect width="26" height="26" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <span id="mini-compare-counter" class="mini-item-counter lable ml-0">
                                        <?php echo esc_attr($settings['compare_text']); ?>
                                    </span>
                                </a>
                            </div>
                            <?php endif; ?>
                            <?php if($settings['wishlist_enable'] == 'yes'): ?>
                            <div class="header-action-icon-2 wish_one">
                                <?php 
                                 $targe_wishlist = $settings['wishlist_link']['is_external'] ? ' target="_blank"' : '';
                                 $nofollow_wishlist = $settings['wishlist_link']['nofollow'] ? ' rel="nofollow"' : ''; 
                                ?>
                                <a  href="<?php echo esc_url($settings['wishlist_link']['url']); ?>"  <?php echo esc_attr($targe_wishlist); ?>
                                    <?php echo esc_attr($nofollow_wishlist); ?>>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <g>
                                        <path d="M18.2753 1.28351C17.1493 1.30102 16.0478 1.61536 15.0821 2.19478C14.1164 2.7742 13.3207 3.59818 12.7753 4.58351C12.23 3.59818 11.4343 2.7742 10.4686 2.19478C9.50289 1.61536 8.4014 1.30102 7.27535 1.28351C5.48029 1.3615 3.78905 2.14676 2.57113 3.46774C1.35321 4.78872 0.707598 6.53803 0.775349 8.33351C0.775349 15.1085 11.7313 22.9335 12.1973 23.2655L12.7753 23.6745L13.3533 23.2655C13.8193 22.9355 24.7753 15.1085 24.7753 8.33351C24.8431 6.53803 24.1975 4.78872 22.9796 3.46774C21.7616 2.14676 20.0704 1.3615 18.2753 1.28351ZM12.7753 21.2125C9.52235 18.7825 2.77535 12.8125 2.77535 8.33351C2.70699 7.06822 3.14172 5.82724 3.98471 4.88121C4.82771 3.93518 6.01058 3.36086 7.27535 3.28351C8.54012 3.36086 9.72299 3.93518 10.566 4.88121C11.409 5.82724 11.8437 7.06822 11.7753 8.33351H13.7753C13.707 7.06822 14.1417 5.82724 14.9847 4.88121C15.8277 3.93518 17.0106 3.36086 18.2753 3.28351C19.5401 3.36086 20.723 3.93518 21.566 4.88121C22.409 5.82724 22.8437 7.06822 22.7753 8.33351C22.7753 12.8145 16.0283 18.7825 12.7753 21.2125Z" fill="#253D4E"></path>
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
                            <?php endif; ?>
                            <?php if($settings['cart_enable'] == 'yes'): ?>
                            <div class="header-action-icon-2 cart">
                                
                                <?php 
                                if(class_exists('woocommerce')):
                                $items_counts = is_object(WC()->cart ) ? WC()->cart->get_cart_contents_count() : ''; ?>
                                <a class="mini-cart-icon mini_cart_togglers sm_icon">

                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g >
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
                                                <rect width="24" height="24" fill="white"
                                                    transform="translate(0.494141 0.366516)" />
                                            </clipPath>
                                        </defs>
                                    </svg>

                                    <span class="pro-count blue"> <?php if(!empty($items_counts)): ?>
                                        <?php echo $items_counts ? $items_counts : '&nbsp;'; else: echo esc_html('0'); ?>
                                        <?php endif; ?> </span>
                                </a>
                    
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
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <?php if($settings['user_enable'] == 'yes'): ?>
                            <div class="header-action-icon-2">
                                <a class="sm_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                                        fill="none">
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
                                                <rect width="24" height="24" fill="white"
                                                    transform="translate(0.444336 0.366516)" />
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
                                            <a href="<?php echo esc_url($user_repeater['link']['url']); ?>"
                                                <?php echo esc_attr($target_five); ?>
                                                <?php echo esc_attr($nofollow_five); ?>>
                                                <i
                                                    class="<?php echo esc_attr($user_repeater['icon_fonts']); ?> mr-10"></i>
                                                <?php echo esc_attr($user_repeater['user_list_text']); ?>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                        <?php if(!empty($settings['signout_text'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url(wp_logout_url($account));?>"><i
                                                    class="fi fi-rs-sign-out mr-10"></i>
                                                <?php echo esc_attr($settings['signout_text']); ?>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                    <?php else: ?>
                                    <ul>
                                        <?php if(!empty($settings['login_text'])): ?>
                                        <li>
                                            <a
                                                href="<?php echo esc_url( get_permalink(get_option('woocommerce_myaccount_page_id' ))); ?>">
                                                <?php echo esc_attr($settings['login_text']); ?>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if(get_option('woocommerce_enable_myaccount_registration') === 'yes'): ?>
                                        <?php if(!empty($settings['register_text'])): ?>
                                        <li>
                                            <a
                                                href="<?php echo esc_url( get_permalink(get_option('woocommerce_myaccount_page_id' ))); ?>">
                                                <?php echo esc_attr($settings['register_text']); ?>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php endif; ?>

                                    </ul>

                                    <?php  endif;  ?>


                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($settings['main_header_enable'] == 'yes'): ?>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="auto-container">
            <div class="header-wrap header-space-between position-relative">

                <div class="header-nav d-none d-lg-flex clearfix">
                    <?php if($settings['category_enable'] == 'yes'): ?>
                    <div class="main-categori-wrap">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <?php echo esc_attr($settings['category_texts']); ?>

                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div
                            class="categories-dropdown-wrap header_dropdown srollbar categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul class="content_cat clearfix">
                                    <?php if($settings['category_type'] == 'style_one'): ?>
                                        <?php foreach($settings['cat_repeater'] as  $key => $cat_repeater):   
                                    $target = $cat_repeater['cat_link']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow = $cat_repeater['cat_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                                    <li class="content_cat_list <?php if(!empty($cat_repeater['cat_image']['url'])): ?>cat_image_in <?php endif; ?>">
                                        <a href="<?php echo esc_url($cat_repeater['cat_link']['url']); ?>"
                                            <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                                            <?php if(!empty($cat_repeater['cat_image']['url'])): ?>
                                            <img src="<?php echo esc_url($cat_repeater['cat_image']['url']); ?>"
                                                alt="category"> <?php endif; ?>
                                            <?php echo esc_attr($cat_repeater['cat_name']); ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                    <?php elseif($settings['category_type'] == 'style_two'): ?>
                                        <?php  \Nestaddons\Woocom\Woocomfunctions::nest_woocommerce_category_image(); ?>
                                    <?php endif; ?>
                                   
                                </ul>

                            </div>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($settings['hot_deals_enable'] == 'yes'):  
                             $target_six = $settings['hot_link']['is_external'] ? ' target="_blank"' : '';
                             $nofollow_six = $settings['hot_link']['nofollow'] ? ' rel="nofollow"' : ''; ?>
                    <div class="hot-deals">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                            <g>
                                <path
                                    d="M13.6667 3.91049C12.6667 3.06299 11.6367 2.18382 10.5942 1.14466L10 0.554657L9.41667 1.14549C7.54 3.02716 6.65333 5.91632 6.26833 7.64966C5.97364 7.19291 5.75497 6.6914 5.62083 6.16466L5.26833 4.80382L4.24333 5.76716C2.4475 7.45299 1.25 9.12549 1.25 11.8038C1.23323 13.7357 1.86243 15.6178 3.03768 17.1512C4.21292 18.6845 5.86681 19.7813 7.73667 20.2672C8.30006 20.4042 8.87509 20.4879 9.45417 20.5172C9.63522 20.5401 9.8175 20.552 10 20.553C10.0958 20.553 10.1892 20.5447 10.2825 20.5388C12.5526 20.4705 14.7068 19.5203 16.2877 17.8897C17.8686 16.2591 18.7519 14.0766 18.75 11.8055C18.75 8.22716 16.3942 6.22716 13.6667 3.91049ZM10.1667 18.8722C10.0833 18.8722 10 18.8805 9.91166 18.8797C9.1616 18.8567 8.44982 18.5431 7.92671 18.0051C7.40361 17.4671 7.11014 16.7467 7.10833 15.9963C7.10833 14.9397 7.675 14.413 8.9575 13.3213C9.28083 13.0463 9.6325 12.7472 10.0025 12.4047C10.3267 12.6988 10.6417 12.9655 10.9325 13.213C12.2208 14.3063 12.8933 14.9272 12.8933 15.9938C12.8919 16.7309 12.6088 17.4396 12.1019 17.9747C11.5949 18.5098 10.9026 18.8309 10.1667 18.8722ZM14.35 17.3963L14.3333 17.408C14.4829 16.9523 14.5594 16.4759 14.56 15.9963C14.56 14.1088 13.3217 13.0572 12.0117 11.9447C11.5475 11.5513 11.0683 11.1447 10.59 10.6663L10 10.0772L9.41083 10.6663C8.87083 11.2055 8.3425 11.6555 7.87666 12.0522C6.57 13.1638 5.44083 14.1247 5.44083 15.9963C5.44261 16.4965 5.52708 16.9929 5.69083 17.4655C4.82338 16.7994 4.12164 15.9418 3.64041 14.9597C3.15918 13.9776 2.91148 12.8975 2.91667 11.8038C2.90296 10.3415 3.46895 8.93326 4.49083 7.88716C4.66685 8.24426 4.87552 8.58432 5.11417 8.90299C5.28847 9.13819 5.52778 9.31725 5.80261 9.41809C6.07744 9.51893 6.37577 9.53714 6.66083 9.47049C6.95082 9.40593 7.21608 9.25921 7.42489 9.04789C7.63371 8.83656 7.77724 8.56956 7.83833 8.27882C8.18726 6.36353 8.94193 4.54505 10.0517 2.94549C10.9308 3.77882 11.8017 4.51632 12.5875 5.18382C15.1975 7.40049 17.0875 9.00216 17.0875 11.8088C17.0895 12.8877 16.8437 13.9526 16.3689 14.9214C15.8941 15.8902 15.2031 16.7369 14.3492 17.3963H14.35Z"
                                    fill="#3BB77E" />
                            </g>
                            <defs>
                                <clipPath>
                                    <rect width="20" height="20" fill="white" transform="translate(0 0.517151)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <a href="<?php echo esc_url($settings['hot_link']['url']); ?>"
                            <?php echo esc_attr($target_six); ?>
                            <?php echo esc_attr($nofollow_six); ?>><?php echo esc_attr($settings['hot_deal_text']); ?></a>
                    </div>
                    <?php endif; ?>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 font-heading">
                        <nav>
                            <?php  if(!empty($settings['navigations'])):
                              wp_nav_menu(array(
                                'menu' => $settings['navigations'],
                                'container' => false,
                                'menu_class' => 'navbar_nav',
                                'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                                'walker' => new \WP_Bootstrap_Navwalker()
                            )); endif; ?>
                        </nav>
                    </div>
                </div>
                <?php if($settings['toll_free_enable'] == 'yes'):  ?>
                <div class="hotline  d-flex">
                    <?php if(!empty($settings['toll_free_image']['url'])): ?>
                    <img src="<?php echo esc_url($settings['toll_free_image']['url']); ?>" alt="img" />
                    <?php else: ?>

                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M31.5 18.636V16.5C31.5 12.9196 30.0777 9.4858 27.546 6.95406C25.0142 4.42232 21.5805 3 18 3C14.4196 3 10.9858 4.42232 8.45411 6.95406C5.92236 9.4858 4.50005 12.9196 4.50005 16.5V18.636C2.92679 19.3287 1.63925 20.5409 0.85298 22.0696C0.0667119 23.5983 -0.170561 25.3506 0.180884 27.0334C0.532329 28.7161 1.45116 30.227 2.78355 31.3132C4.11595 32.3994 5.78103 32.9949 7.50005 33H10.5V18H7.50005V16.5C7.50005 13.7152 8.60629 11.0445 10.5754 9.07538C12.5446 7.10625 15.2153 6 18 6C20.7848 6 23.4555 7.10625 25.4247 9.07538C27.3938 11.0445 28.5 13.7152 28.5 16.5V18H25.5V30H19.5V33H28.5C30.2191 32.9949 31.8841 32.3994 33.2165 31.3132C34.5489 30.227 35.4678 28.7161 35.8192 27.0334C36.1707 25.3506 35.9334 23.5983 35.1471 22.0696C34.3608 20.5409 33.0733 19.3287 31.5 18.636ZM7.50005 30C6.30657 30 5.16198 29.5259 4.31807 28.682C3.47415 27.8381 3.00005 26.6935 3.00005 25.5C3.00005 24.3065 3.47415 23.1619 4.31807 22.318C5.16198 21.4741 6.30657 21 7.50005 21V30ZM28.5 30V21C29.6935 21 30.8381 21.4741 31.682 22.318C32.5259 23.1619 33 24.3065 33 25.5C33 26.6935 32.5259 27.8381 31.682 28.682C30.8381 29.5259 29.6935 30 28.5 30Z"
                            fill="#253D4E" />
                    </svg>

                    <?php endif; ?>
                    <p><a
                            href="tel:<?php echo esc_attr($settings['toll_free_number']); ?>"><?php echo esc_attr($settings['toll_free_number']); ?></a><span><?php echo esc_attr($settings['toll_free_text']); ?></span>
                    </p>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php endif; ?>
</header>
 

<?php
    }
}