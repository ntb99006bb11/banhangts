<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Fun_facts_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-fun-facts-v1';
    }

    public function get_title()
    {
        return __('Funfacts V1', 'nest-addons');
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
        $this->start_controls_section('funfacts_content_v1_settings',
        [ 
            'label' => __('Funfacts Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
       
        $this->add_control(
            'funfacts_number',
            [
              'label' => __('Count', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => __('545', 'nest-addons'),
              'placeholder' => __('Type your text here', 'nest-addons'),
            ]
        );

        $this->add_control(
            'funfacts_symbol',
            [
              'label' => __('Symbol', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => __('+', 'nest-addons'),
              'placeholder' => __('Type your Symbols here', 'nest-addons'),
            ]
        );


        $this->add_control(
          'title',
          [
             'label' => __('Title', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXTAREA,
             'default' => __('  Stay home & get your daily <br />  needs from our shop', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),    
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

    $this->start_controls_section('funfact_css',
    [ 
        'label' => __('Fun Fact Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

  
    $this->add_control(
        'count_color',
         [
            'label' => __('Count Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .about-count.text-center .heading-1 span ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );

     
    $this->add_control(
        'symbol_color',
         [
            'label' => __('Symbols Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .about-count.text-center .heading-1 ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
     
    $this->add_control(
        'heading_color',
         [
            'label' => __('Heading Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .about-count.text-center h4 ' => 'color: {{VALUE}}!important;',
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
        
 

    <div class="about-count text-center <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?><?php endif; ?>">
            <h3 class="heading-1"><span class="counters"><?php echo esc_attr($settings['funfacts_number']) ?></span><?php echo esc_attr($settings['funfacts_symbol']) ?></h3>
            <?php if(!empty($settings['title'])): ?>
                <div class="ftitle"><?php echo wp_kses($settings['title'] , $allowed_tags); ?></div>
            <?php endif; ?>
    </div>

   



    <?php
    }
}

 

