<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Title_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-title-v1';
    }

    public function get_title()
    {
        return __('Title V1', 'nest-addons');
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
        $this->start_controls_section('title_v1_settings',
        [ 
            'label' => __('Title Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );
        $this->add_control(
            'title_style',
            [
            'label' => __('Title Styles', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style_one' => __( 'Style One', 'nest-addons' ),
            ],
            'default' => 'style_one' ,
            ]
        );

        $this->add_control(
            'sm_title',
            [
               'label' => __('Sub Title', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::TEXTAREA,
               'default' => __('Our performance', 'nest-addons'),
               'placeholder' => __('Type your text here', 'nest-addons'),    
            ]
        );
         
        $this->add_control(
          'title',
          [
             'label' => __('Title', 'nest-addons'),
             'type' => \Elementor\Controls_Manager::TEXTAREA,
             'default' => __('Your Partner for e-commerce grocery solution', 'nest-addons'),
             'placeholder' => __('Type your text here', 'nest-addons'),    
          ]
        );
        $this->add_control(
            'description',
            [
              'label' => __('Description', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'default' => __('Pitatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia', 'nest-addons'),
              'placeholder' => __('Type your text here', 'nest-addons'),
            ]
        );

        $this->add_control(
            'enable_border',
            [
                'label' => __('Border Show / hide', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'nest-addons'),
                'label_off' => __('No', 'nest-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
     
        $this->end_controls_section();


        $this->start_controls_section('title_css',
        [ 
            'label' => __('Title Css', 'nest-addons'),
            'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
        ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Sub Title Typography', 'nest-addons' ),
				'name' => 'sm_typo',
				'selector' => '{{WRAPPER}} .section_title h4',
			]
		);
        $this->add_control(
            'sm_title_color',
             [
                'label' => __('Sub Title Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section_title h4 ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );
        $this->add_control(
			'sm_margin',
			[
				'label' => esc_html__( 'Sub Title Margin', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .section_title h4 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Title Typography', 'nest-addons' ),
				'name' => 'title_typo',
				'selector' => '{{WRAPPER}} .section_title .title',
			]
		);
        $this->add_control(
            'title_color',
             [
                'label' => __('Title Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section_title .title ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );
        $this->add_control(
			'title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .section_title .title_whole .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
				],
			]
		);
        $this->add_control(
			'title_padding',
			[
				'label' => esc_html__( 'Title Padding', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .section_title .title_whole .title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( ' Description Typography', 'nest-addons' ),
				'name' => 'desc_typo',
				'selector' => '{{WRAPPER}} .section_title p',
			]
		);
        $this->add_control(
            'description_color',
             [
                'label' => __('Description Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section_title p ' => 'color: {{VALUE}}!important;',
                ],
             ]
        );
        $this->add_control(
			'description_margin',
			[
				'label' => esc_html__( 'Description Margin', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .section_title p ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
				],
			]
		);
      


        $this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'nest-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'nest-addons' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'nest-addons' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'nest-addons' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .section_title ' => 'text-align: {{VALUE}}!important;',
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
   
        <div class="section_title type_one">
            <?php if(!empty($settings['sm_title'])): ?>
                <h4 class="mb-20 text-brand"> <?php echo wp_kses($settings['sm_title'] , $allowed_tags);  ?></h4>
            <?php endif; ?>
            <?php if(!empty($settings['title'])): ?>
                <div class="title_whole">
                    <div class="title"> <?php echo wp_kses($settings['title'] , $allowed_tags);  ?>  </div>
                    <?php if($settings['enable_border'] == 'yes'): ?>
                        <i class="icon-waves"></i>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($settings['description'])): ?>
                <p class="mb-20"> <?php echo wp_kses($settings['description'] , $allowed_tags);  ?></p>
            <?php endif; ?>
        </div>
    


    <?php
    }
}

 

