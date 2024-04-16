<?php
namespace  Nestaddons\Core\Widgets\Content;

   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Subscribe_v1 extends \Elementor\Widget_Base
   {
   
       public function get_name()
       {
           return 'creote-subscribe-v1';
       }
   
       public function get_title()
       {
           return __('Newsletter V1' , 'nest-addons');
       }
   
       public function get_icon()
       {
         return 'icon-letter-n';
       }
   
       public function get_categories()
       {
           return ['102'];
       }
       protected function register_controls()
       {
    
           $this->start_controls_section(
               'subscribe_content',
               [
                   'label' => __('Subscribe  Content', 'nest-addons')
               ]
           );

           $this->add_control(
            'sub_scribestyle',
            [
            'label' => __('Subscribe Style', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style_one' => __('Style One', 'nest-addons'),
                'style_two' => __('Style Two', 'nest-addons'),
            ],
            'default' => 'style_one' , 
            ]
        );
        
    
           $this->add_control(
               'subscribe_shortcode',
               [
               	'label'       => esc_html__( 'Shortcode', 'nest-addons' ),
   				   'type'        => \Elementor\Controls_Manager::TEXTAREA,
                  'default' =>  esc_html__( '[mc4wp_form id="1174"]' , 'nest-addons'),
                  'placeholder'  =>  esc_html__( '[mc4wp_form id="1174"]' , 'nest-addons'),
               ]
           );
           
           $this->end_controls_section();

           $this->start_controls_section('custom_css',
           [ 
               'label' => __('Custom Css', 'nest-addons'),
               'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
           ]
           );
           $this->add_control(
            'input_bg_color',
             [
                'label' => __('Input Bg Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item_scubscribe  input ' => 'background: {{VALUE}}!important;',
                ],
             ]
            );
       
        
           $this->add_control(
               'input_color',
                [
                   'label' => __('Input Border Color', 'nest-addons'),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .item_scubscribe  input ' => 'border-color: {{VALUE}}!important;',
                   ],
                ]
           );
           
           $this->add_control(
            'input_holder_color',
             [
                'label' => __('Input Placeholder Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item_scubscribe  input::placeholder ' => 'color: {{VALUE}}!important;',
                ],
             ]
           );


           $this->add_control(
            'input_btn_color',
             [
                'label' => __('Input Btn Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item_scubscribe  input[type="submit"] ' => 'color: {{VALUE}}!important;',
                ],
             ]
           );
           $this->add_control(
            'input_btn_bg_color',
             [
                'label' => __('Input Btn bg Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item_scubscribe  input[type="submit"] ' => 'background: {{VALUE}}!important;',
                ],
             ]
           );
          
           $this->add_control(
            'input_btn_border_color',
             [
                'label' => __('Input Btn Border Color', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item_scubscribe  input[type="submit"] ' => 'border-color: {{VALUE}}!important;',
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


         <div class="item_scubscribe <?php echo esc_attr($settings['sub_scribestyle']);  ?>">
            <div class="input_group">
               <?php echo do_shortcode( $settings['subscribe_shortcode'] );?>
               </div>
            </div>
   
<?php
}
}
 