<?php

namespace  Nestaddons\Core\Widgets\Footer;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class About_contact_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-foo-widget-about-contact-v1';
    }

    public function get_title()
    {
        return __('About & Contact V1', 'nest-addons');
    }

    public function get_icon()
    {
        return 'icon-letter-n';
    }

    public function get_categories()
    {
        return ['104'];
    }

    protected function register_controls(){
 
        // style one start
        $this->start_controls_section('widget_about_contact_v1_settings',
        [ 
            'label' => __('Widget  Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
     
      

        $this->add_control(
            'widget_title',
            [
               'label' => __('Widget Title', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::TEXT,
               'default' => __('About Company', 'nest-addons'),
               'placeholder' => __('Type your text here', 'nest-addons'),   
            ]
        );

       

        $this->add_control(
            'description_enable',
            [
                'label' => __('Description show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'description',
            [
              'label' => __('Decription', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'default' => __('Start Your Daily Shopping with <span class="text-brand">Nest Mart</span>', 'nest-addons'),
              'placeholder' => __('Type your text here', 'nest-addons'),
              'condition' => [
                'description_enable' => 'yes'
                ],
            ]
        );


        $this->add_control(
            'address_enable',
            [
                'label' => __('Address show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
          'address_title',
          [
             'label' => __('Address Title', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXT,
             'default' => __('Address', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),   
             'condition' => [
                'address_enable' => 'yes'
            ], 
          ]
        );
        $this->add_control(
            'address',
            [
               'label' => __('Address', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => __('5171 W Campbell Ave undefined Kent, Utah 53127 United States', 'nest-addons'),
               'placeholder' => __('Type your text here', 'nest-addons'),   
               'condition' => [
                  'address_enable' => 'yes'
              ], 
            ]
        );


        $this->add_control(
            'phone_enable',
            [
                'label' => __('Phone show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
          'phone_title',
          [
             'label' => __('Phone Title', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXT,
             'default' => __('Call Us', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),   
             'condition' => [
                'phone_enable' => 'yes'
            ], 
          ]
        );
        $this->add_control(
            'phone',
            [
               'label' => __('Phone', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => __('(+91)-540-025-124553', 'nest-addons'),
               'placeholder' => __('Type your text here', 'nest-addons'),   
               'condition' => [
                  'phone_enable' => 'yes'
              ], 
            ]
        );


        $this->add_control(
            'email_enable',
            [
                'label' => __('Mail show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
          'email_title',
          [
             'label' => __('Mail Title', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXT,
             'default' => __('Email', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),   
             'condition' => [
                'email_enable' => 'yes'
            ], 
          ]
        );
        $this->add_control(
            'email',
            [
               'label' => __('Mail', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => __('sale@Nest.com', 'nest-addons'),
               'placeholder' => __('Type your text here', 'nest-addons'),   
               'condition' => [
                  'email_enable' => 'yes'
              ], 
            ]
        );


        $this->add_control(
            'timing_enable',
            [
                'label' => __('Timing show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
          'timing_title',
          [
             'label' => __('Timing Title', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXT,
             'default' => __('Hours', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),   
             'condition' => [
                'timing_enable' => 'yes'
            ], 
          ]
        );
        $this->add_control(
            'timing',
            [
               'label' => __('Timing', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => __('10:00 - 18:00, Mon - Sat', 'nest-addons'),
               'placeholder' => __('Type your text here', 'nest-addons'),   
               'condition' => [
                  'timing_enable' => 'yes'
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

    $this->start_controls_section('aboutcompany_css',
    [ 
        'label' => __('About Company Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

    
  
    $this->add_control(
        'title_color',
         [
            'label' => __('Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .widget-about .foo_wid_title ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
    
  
    $this->add_control(
        'description_color',
         [
            'label' => __('Description Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .widget-about .font-lg.mb-30.text-heading , {{WRAPPER}} .widget-about .font-lg.mb-30.text-heading a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'icon_color',
         [
            'label' => __('Icon Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .widget-about .contact-infor i ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'content_title_color',
         [
            'label' => __('Content Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .widget-about strong  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'content_color',
         [
            'label' => __('Content Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .widget-about .contact-infor a , {{WRAPPER}} .widget-about .contact-infor span  ' => 'color: {{VALUE}}!important;',
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
  


    <div class="widget-about footer_widgets  font-md <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?><?php endif; ?>">
        <?php if(!empty($settings['widget_title'])): ?>
            <div class="foo_wid_title">
                <?php echo wp_kses($settings['widget_title'] , $allowed_tags); ?>
            </div>
        <?php endif; ?>

    <div class="widget_content_box">


        <?php if($settings['description_enable'] == 'yes'): // description ?>
            <p class="font-lg  mb-30 text-heading"><?php echo wp_kses($settings['description'] , $allowed_tags); ?></p>
        <?php endif; // description ?>
       
        <?php if($settings['address_enable'] == 'yes'): // Address ?>
            <div class="contact-infor">
            <?php if(!empty($settings['address_title'])): ?>
                <i class="fi-rs-marker"></i> 
                <strong><?php echo wp_kses($settings['address_title'] , $allowed_tags); ?></strong> 
            <?php endif; ?>
            <?php if(!empty($settings['address'])): ?>
                <span><?php echo wp_kses($settings['address'] , $allowed_tags); ?></span>
            <?php endif; ?>
        </div>
        <?php endif; // Address ?>
        <?php if($settings['phone_enable'] == 'yes'): // phone ?>
            <div class="contact-infor">
            <?php if(!empty($settings['phone_title'])): ?>
                <i class="fi-rs-headphones"></i>
                <strong><?php echo wp_kses($settings['phone_title'] , $allowed_tags); ?></strong>
            <?php endif; ?>
            <?php if(!empty($settings['phone'])): ?>
                <a href="tel:<?php echo esc_attr($settings['phone']); ?>"><?php echo esc_attr($settings['phone']); ?></a>
            <?php endif; ?>
        </div>
        <?php endif; // phone ?>
        <?php if($settings['email_enable'] == 'yes'): // mail ?>
            <div class="contact-infor">
            <?php if(!empty($settings['email_title'])): ?>
                <i class="fi-rs-envelope"></i>
                <strong><?php echo wp_kses($settings['email_title'] , $allowed_tags); ?></strong>
                <?php endif; ?>
            <?php if(!empty($settings['email'])): ?>
                <a href="mailto:<?php echo esc_attr($settings['email']); ?>"><?php echo esc_attr($settings['email']); ?></a>
            <?php endif; ?>
        </div>
        <?php endif; // mail ?>
        <?php if($settings['timing_enable'] == 'yes'): // timing ?>
            <div class="contact-infor">
            <?php if(!empty($settings['timing_title'])): ?>
                <i class="fi-rs-time-oclock"></i>
                <strong><?php echo wp_kses($settings['timing_title'] , $allowed_tags); ?></strong>
            <?php endif; ?>
            <?php if(!empty($settings['timing'])): ?>
                <span><?php echo wp_kses($settings['timing'] , $allowed_tags); ?></span>
            <?php endif; ?>
        </div>
        <?php endif; // timing ?>
        </div>
    </div>

   

    <?php
    }
}

 

