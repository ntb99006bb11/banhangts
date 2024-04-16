<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Contact_box_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-contact-box-v1';
    }

    public function get_title()
    {
        return __('Contact Box V1', 'nest-addons');
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
        $this->start_controls_section('widget_contact_box_v1_settings',
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
          'button_title',
          [
             'label' => __('Button Text', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXT,
             'default' => __('View Map', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),   
             'condition' => [
                'button_enable' => 'yes'
            ], 
          ]
        );
        $this->add_control(
            'button_icon',
            [
                'label' => __('Button Icon', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => nest_get_icon(),
                'default' => 'fi-rs-user' , 
                'condition' => [
                    'button_enable' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'link',
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
                'condition' => [
                    'button_enable' => 'yes'
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

    $this->start_controls_section('contact_css',
    [ 
        'label' => __('Contact Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

    
    
    $this->add_control(
        'contact_title_color',
         [
            'label' => __('Contact Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .contact_box .mb-15.text-brand ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

        
    $this->add_control(
        'icon_color',
         [
            'label' => __('Icon Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .contact_box .contact-infor i' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'title_color',
         [
            'label' => __('Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .contact_box .contact-infor abbr' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'other_content_color',
         [
            'label' => __('Other Content Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .contact_box .contact-infor a , {{WRAPPER}} .contact_box .contact-infor span' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    $this->add_control(
        'button_text_color',
         [
            'label' => __('Button Text Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .contact_box .btn.btn-sm ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

    
    $this->add_control(
        'button_bg_color',
         [
            'label' => __('Button Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .contact_box  .btn.btn-sm  ' => 'background: {{VALUE}}!important; border-color: {{VALUE}}!important;',
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


    <div class="contact_box  font-md <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?>
        <?php endif; ?>">
        <?php if(!empty($settings['widget_title'])): ?>
            <h4 class="mb-15 text-brand">
                <?php echo wp_kses($settings['widget_title'] , $allowed_tags); ?>
            </h4>
        <?php endif; ?>

    <div class="box_content">

        <?php if($settings['address_enable'] == 'yes'): // Address ?>
            <div class="contact-infor">
            <?php if(!empty($settings['address_title'])): ?>
                <i class="fi-rs-marker mr-5 text-brand"></i> 
                <abbr  title="<?php echo esc_attr($settings['address_title']); ?>"><?php echo wp_kses($settings['address_title'] , $allowed_tags); ?></abbr> 
            <?php endif; ?>
            <?php if(!empty($settings['address'])): ?>
                <span><?php echo wp_kses($settings['address'] , $allowed_tags); ?></span>
            <?php endif; ?>
        </div>
        <?php endif; // Address ?>
        <?php if($settings['phone_enable'] == 'yes'): // phone ?>
            <div class="contact-infor">
            <?php if(!empty($settings['phone_title'])): ?>
                <i class="fi-rs-headphones mr-5 text-brand"></i>
                <abbr title="<?php echo esc_attr($settings['phone_title']); ?>"><?php echo wp_kses($settings['phone_title'] , $allowed_tags); ?></abbr>
            <?php endif; ?>
            <?php if(!empty($settings['phone'])): ?>
                <a href="tel:<?php echo esc_attr($settings['phone']); ?>"><?php echo esc_attr($settings['phone']); ?></a>
            <?php endif; ?>
        </div>
        <?php endif; // phone ?>
        <?php if($settings['email_enable'] == 'yes'): // mail ?>
            <div class="contact-infor">
            <?php if(!empty($settings['email_title'])): ?>
                <i class="fi-rs-envelope mr-5 text-brand"></i>
                <abbr  title="<?php echo esc_attr($settings['email_title']); ?>"><?php echo wp_kses($settings['email_title'] , $allowed_tags); ?></abbr>
                <?php endif; ?>
            <?php if(!empty($settings['email'])): ?>
                <a href="mailto:<?php echo esc_attr($settings['email']); ?>"><?php echo esc_attr($settings['email']); ?></a>
            <?php endif; ?>
        </div>
        <?php endif; // mail ?>
        <?php if($settings['timing_enable'] == 'yes'): // timing ?>
            <div class="contact-infor">
            <?php if(!empty($settings['timing_title'])): ?>
                <i class="fi-rs-time-oclock mr-5 text-brand"></i>
                <abbr  title="<?php echo esc_attr($settings['timing_title']); ?>"><?php echo wp_kses($settings['timing_title'] , $allowed_tags); ?></abbr>
            <?php endif; ?>
            <?php if(!empty($settings['timing'])): ?>
                <span><?php echo wp_kses($settings['timing'] , $allowed_tags); ?></span>
            <?php endif; ?>
        </div>
        <?php endif; // timing ?>
        </div>
        <?php if($settings['button_enable'] == 'yes'):
                    $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
            // timing ?>
        <a href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?> class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up">
        <i class="<?php echo esc_attr($settings['button_icon']); ?> mr-5"></i><?php echo wp_kses($settings['button_title'] , $allowed_tags); ?>
        <?php endif; // timing ?>
    </a>
    </div>

  



    <?php
    }
}
 

