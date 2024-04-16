<?php
 namespace  Nestaddons\Core\Widgets\Content;

 if (!defined('ABSPATH')) {
     exit;
 } // If this file is called directly, abort.
 
 class Text_editor_v1 extends \Elementor\Widget_Base
 {
 
       public function get_name()
       {
           return 'nest-text-editor-v1';
       }
   
       public function get_title()
       {
           return __('Text Editor V1' , 'nest-addons');
       }
   
       public function get_icon()
       {
        return 'icon-letter-n';
       }
   
       public function get_categories()
       {
        return ['102'];
       }
   
       
   
       /**
 * Register text editor widget controls.
 *
 * Adds different input fields to allow the user to change and customize the widget settings.
 *
 * @since 3.1.0
 * @access protected
 */
protected function register_controls() {
    $this->start_controls_section(
        'section_editor',
        [
            'label' => esc_html__( 'Text Editor', 'nest-addons' ),
        ]
    );

    $this->add_control(
        'editor_nest',
        [
            'label' => esc_html__( 'Text Editor', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '<p>' . esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'nest-addons' ) . '</p>',
        ]
    );
 

    $text_columns = range( 1, 10 );
    $text_columns = array_combine( $text_columns, $text_columns );
    $text_columns[''] = esc_html__( 'Default', 'nest-addons' );

    $this->add_responsive_control(
        'text_columns',
        [
            'label' => esc_html__( 'Columns', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'separator' => 'before',
            'options' => $text_columns,
            'selectors' => [
                '{{WRAPPER}}' => 'columns: {{VALUE}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'column_gap',
        [
            'label' => esc_html__( 'Columns Gap', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'vw' ],
            'range' => [
                'px' => [
                    'max' => 100,
                ],
                '%' => [
                    'max' => 10,
                    'step' => 0.1,
                ],
                'vw' => [
                    'max' => 10,
                    'step' => 0.1,
                ],
                'em' => [
                    'max' => 10,
                    'step' => 0.1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'column-gap: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'section_style',
        [
            'label' => esc_html__( 'Text Editor', 'nest-addons' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_responsive_control(
        'align',
        [
            'label' => esc_html__( 'Alignment', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', 'nest-addons' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', 'nest-addons' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', 'nest-addons' ),
                    'icon' => 'eicon-text-align-right',
                ],
                'justify' => [
                    'title' => esc_html__( 'Justified', 'nest-addons' ),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .custom_text_editor ' => 'text-align: {{VALUE}}!important;',
            ],
        ]
    );

    $this->add_control(
        'text_color',
        [
            'label' => esc_html__( 'Text Color', 'nest-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} {{WRAPPER}} .custom_text_editor  , {{WRAPPER}} .custom_text_editor  p , {{WRAPPER}} .custom_text_editor h1 , {{WRAPPER}}
                .custom_text_editor h2 , {{WRAPPER}} .custom_text_editor h3 , {{WRAPPER}} .custom_text_editor h4 , {{WRAPPER}} .custom_text_editor h5 , {{WRAPPER}} .custom_text_editor h6 , {{WRAPPER}} .custom_text_editor a ,
                .custom_text_editor ul li , {{WRAPPER}} .custom_text_editor ul li a ' => 'color: {{VALUE}}!important;',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'typography_crs',
            'selector' =>  '{{WRAPPER}} .custom_text_editor  , {{WRAPPER}} .custom_text_editor  p , {{WRAPPER}} .custom_text_editor h1 , {{WRAPPER}}
            .custom_text_editor h2 , {{WRAPPER}} .custom_text_editor h3 , {{WRAPPER}} .custom_text_editor h4 , {{WRAPPER}} .custom_text_editor h5 , {{WRAPPER}} .custom_text_editor h6 , {{WRAPPER}} .custom_text_editor a ,
            .custom_text_editor ul li , {{WRAPPER}} .custom_text_editor ul li a ' 
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Text_Shadow::get_type(),
        [
            'name' => 'text_shadow_crs',
            'selector' =>  '{{WRAPPER}} .custom_text_editor  , {{WRAPPER}} .custom_text_editor  p , {{WRAPPER}} .custom_text_editor h1 , {{WRAPPER}}
            .custom_text_editor h2 , {{WRAPPER}} .custom_text_editor h3 , {{WRAPPER}} .custom_text_editor h4 , {{WRAPPER}} .custom_text_editor h5 , {{WRAPPER}} .custom_text_editor h6 , {{WRAPPER}} .custom_text_editor a ,
            .custom_text_editor ul li , {{WRAPPER}} .custom_text_editor ul li a ' 
        ]
    );

    $this->end_controls_section();
}

protected function render(){
    $settings = $this->get_settings_for_display();
    $allowed_tags = wp_kses_allowed_html('post');
?>
   <div class="custom_text_editor position-relative">
        <?php echo wp_kses($settings['editor_nest'] , $allowed_tags); ?>
    </div>
<?php
}
}
 