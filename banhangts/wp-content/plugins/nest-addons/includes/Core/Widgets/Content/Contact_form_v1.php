<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Contact_form_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-contact-form-v1';
    }

    public function get_title()
    {
        return __('Contact Form V1' , 'nest-addons');
    }

    public function get_icon()
    {
        return 'icon-letter-n';
    }

    public function get_categories()
    {
        return ['102'];
    }

    

    protected function register_controls() {
		$this->start_controls_section(
			'contact_form',
			[
				'label' => esc_html__( 'Contact Form', 'nest-addons' ),
			]
        );
 
        $this->add_control(
            'contact_form_url',
            [
                'label'   => esc_html__( 'Choose Contact Form', 'nest-addons' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' =>  nest_contact_form_7_query('wpcf7_contact_form'),
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


        $this->start_controls_section('contact_form_css',
        [ 
            'label' => __('Contact Form Css', 'nest-addons'),
            'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
        ]
        );
    
        
        
        $this->add_control(
            'contact_title_color',
             [
                'label' => __('Input , Select , Textarea Placeholder Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_form_box_all input::placeholder , {{WRAPPER}} .contact_form_box_all textarea::placeholder ,  {{WRAPPER}} .select2-container--default .select2-selection--single .select2-selection__rendered  ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );

        $this->add_control(
            'contact_input_border_color',
             [
                'label' => __('Input , Select , Textarea Border Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_form_box_all input , {{WRAPPER}} .contact_form_box_all textarea  , {{WRAPPER}} .contact_form_box_all .select2-selection  ' => 'border-color: {{VALUE}}!important;',
                ],
             ]
        );

        $this->add_control(
            'contact_input_back_color',
             [
                'label' => __('Input , Select , Textarea Background Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_form_box_all input , {{WRAPPER}} .contact_form_box_all textarea  , {{WRAPPER}} .contact_form_box_all .select2-selection   ' => 'background: {{VALUE}}!important;',
                ],
             ]
        );
        $this->add_control(
            'select_arrow_color',
             [
                'label' => __(' Select Arrow Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_form_box_all .select2-container .select2-selection__arrow::before ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );


        $this->add_control(
            'button_color',
             [
                'label' => __('Button Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_form_box_all  .wpcf7-submit ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );

        $this->add_control(
            'button_border_color',
             [
                'label' => __('Button Border Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_form_box_all .wpcf7-submit ' => 'border-color: {{VALUE}}!important;',
                ],
             ]
        );

        $this->add_control(
            'button_background_color',
             [
                'label' => __('Button Background Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_form_box_all  .wpcf7-submit ' => 'background: {{VALUE}}!important;',
                ],
             ]
        );
 
        
     
        $this->end_controls_section();
  
       
	}
    protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
   ?>
 
<section class="contact_form_box_all <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?> <?php endif; ?>">
   <div class="contact_form_shortcode">
        <?php if(!empty($settings['contact_form_url'])): ?>
            <?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_form_url'] . '"]'); ?>
        <?php else: ?>
            <p><?php echo esc_html('There is no contact form please create it' , 'nest-addons'); ?></p>
        <?php endif; ?>
   </div>
</section>
 <?php 
	}
}
 