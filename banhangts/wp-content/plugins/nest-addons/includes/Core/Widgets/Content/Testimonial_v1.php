<?php
  namespace  Nestaddons\Core\Widgets\Content;
   
   if (!defined('ABSPATH')) {
       exit;
   } // If this file is called directly, abort.
   
   class Testimonial_v1 extends  \Elementor\Widget_Base
   {
   
       public function get_name()
       {
           return 'nest-testimonial-v1';
       }
   
       public function get_title()
       {
           return __('Testimonial V2' , 'nest-addons');
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
   
           $this->start_controls_section(
               'textimonial_box_content',
               [
                   'label' => __('Testimonial Content', 'nest-addons')
               ]
           );
 
          

            $this->add_control(
                'carousel_items',
                [
                'label' => __('Carousel Items ( Desktop )', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [

                    '6' => __('6 Items', 'nest-addons'),
                    '5' => __('5 Items', 'nest-addons'),
                    '4' => __('4 Items', 'nest-addons'),
                    '3' => __('3 Items', 'nest-addons'),
                    '2' => __('2 Items', 'nest-addons'),
                    '1' => __('1 Items', 'nest-addons'),
                ],
                'default' => '4' , 
                ]
            );
            
            $this->add_control(
                'carousel_items_two',
                [
                'label' => __('Carousel Items ( Device 2 )', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [

                    '6' => __('6 Items', 'nest-addons'),
                    '5' => __('5 Items', 'nest-addons'),
                    '4' => __('4 Items', 'nest-addons'),
                    '3' => __('3 Items', 'nest-addons'),
                    '2' => __('2 Items', 'nest-addons'),
                    '1' => __('1 Items', 'nest-addons'),
                ],
                'default' => '4' , 
                ]
            );
            
            $this->add_control(
                'carousel_items_three',
                [
                'label' => __('Carousel Items ( Device 3 )', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [

                    '6' => __('6 Items', 'nest-addons'),
                    '5' => __('5 Items', 'nest-addons'),
                    '4' => __('4 Items', 'nest-addons'),
                    '3' => __('3 Items', 'nest-addons'),
                    '2' => __('2 Items', 'nest-addons'),
                    '1' => __('1 Items', 'nest-addons'),
                ],
                'default' => '4' , 
                ]
            );
            
            
            $repeater = new \Elementor\Repeater();
          
            
           $repeater->add_control(
               'client_image',
               [
                   'label' => __('Client Image', 'nest-addons'),
                   'type' => \Elementor\Controls_Manager::MEDIA,
                   'default' => [
                       'url' => \Elementor\Utils::get_placeholder_image_src(),
                   ],
               ]
           );
        $repeater->add_control(
   		'name',
   		[
   		'label'       => esc_html__( 'Name', 'nest-addons' ),
   		'type'        => \Elementor\Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Jacob Leonardo' , 'nest-addons'),
       ]);
       $repeater->add_control(
   		'designation',
   		[
   		'label'       => esc_html__( 'Designation', 'nest-addons' ),
   		'type'        => \Elementor\Controls_Manager::TEXT,
           'default' =>  esc_html__( 'Senior Manager of Excel Solution' , 'nest-addons'),
       ]);
       $repeater->add_control(
   		'comment',
   		[
   		'label'       => esc_html__( 'Comment', 'nest-addons' ),
   		'type'        => \Elementor\Controls_Manager::TEXTAREA,
           'default' =>  esc_html__( 'While running an early stage startup everything feels
           hard, that’s why it’s been so nice to have our accounting
           feel easy. We recommed Qetus.' , 'nest-addons'),
       ]);
   
      
       $repeater->add_control(
           'rating_one',
           [
               'label' => __( 'Rating', 'nest-addons' ),
               'type' => \Elementor\Controls_Manager::SELECT,
               'default' =>  'two' , 
               'options' => [
                   'one' => __('1', 'nest-addons'),
                   'two' => __('2', 'nest-addons'),
                   'three' => __('3', 'nest-addons'),
                   'four' => __('4', 'nest-addons'),
                   'five' => __('5', 'nest-addons'),
               ],
           ]
       );
     
     
   
       $this->add_control(
           'testimonial_repeater_c',
           [
               'label' => __('Testimonial Repeater', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),
               'default' => [
                   [
                   'name' => __('Jacob Leonardo', 'nest-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'nest-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'nest-addons'),
                   ],
                   [
                   'name' => __('Jacob Leonardo', 'nest-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'nest-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'nest-addons'),
                   ],
                   [
                   'name' => __('Jacob Leonardo', 'nest-addons'),
                   'designation' =>  __('Senior Manager of Excel Solution', 'nest-addons'),
                   'comment' =>  __('While running an early stage startup everything feels
                   hard, that’s why it’s been so nice to have our accounting
                   feel easy. We recommed Qetus.', 'nest-addons'),
                   ]
                   
               ],
               'title_field' => '{{{ name }}}',
   
           ]
         );
   
        
           $this->end_controls_section();

           $this->start_controls_section('test_css',
           [ 
               'label' => __('Testimonial Custom Css', 'nest-addons'),
               'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
           ]
           );
       
        
           $this->add_control(
               'authour_color',
                [
                   'label' => __('Authour Color', 'nest-addons'),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .testimonial_box .authour_details h5 ' => 'color: {{VALUE}}!important;',
                   ],
                ]
           );
          
           $this->add_control(
               'auth_desig_color',
                [
                   'label' => __('Authour Designation Color', 'nest-addons'),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .testimonial_box .authour_details span ' => 'color: {{VALUE}}!important;',
                   ],
                ]
           );
          
           $this->add_control(
               'rating_color',
                [
                   'label' => __('Rating Color', 'nest-addons'),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .testimonial_box .authour_details .rating span  ' => 'color: {{VALUE}}!important;',
                   ],
                ]
           );
       
       
           $this->add_control(
               'comment_color',
                [
                   'label' => __('Comment Color', 'nest-addons'),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .testimonial_box .comment  ' => 'color: {{VALUE}}!important;',
                   ],
                ]
           );
       
            
           $this->add_control(
               'box_bg_color',
                [
                   'label' => __('Box Bg Color', 'nest-addons'),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                       '{{WRAPPER}} .testimonial_box ' => 'background: {{VALUE}}!important;',
                   ],
                
                ]
           );
       
       
           $this->add_control(
               'box_border_color',
                [
                   'label' => __('Box Border Color', 'nest-addons'),
                   'type' => \Elementor\Controls_Manager::COLOR,
                   'selectors' => [
                    '{{WRAPPER}} .testimonial_box ' => 'border-color: {{VALUE}}!important;',
                   ],
                  
                ]
           );

    $this->end_controls_section();
        
    $this->start_controls_section('owl_nav_style',
    [ 
        'label' => __('Custom Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );
 

    $this->add_control(
        'nav_style_options',
        [
        'label' => __('Nav Move Position', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'none_nav' => __( 'Select Nav Position', 'nest-addons' ),
            'position_one' => __( 'Position One', 'nest-addons' ),
            'position_two' => __( 'Position Two', 'nest-addons' ),
            'position_three' => __( 'Position Three', 'nest-addons' ),
            'position_four' => __( 'Position Four', 'nest-addons' ),
        ],
        'default' => 'position_one' ,
        ]
    );

     
    $this->add_control(
        'nav_move_count',
        [
            'label' => __('Nav Move Top', 'nest-addons'),
            'type'    => \Elementor\Controls_Manager::NUMBER,
            'min'     => -100,
            'max'     => 1,
            'step'    => 1,
            'condition' => [
                'nav_style_options' => ['position_two' , 'position_three'],
            ],
            'selectors' => [
                '{{WRAPPER}}  .position_two .owl-carousel .owl-nav , {{WRAPPER}}  .position_two .owl-carousel .owl-nav ' => 'top: {{VALUE}}px!important;',
            ],
        ]
    );
   
 
 
    $this->add_control(
        'nav_display',
        [
        'label' => __('Naigation Enable / Disabel', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'true' => __( 'Block', 'nest-addons' ),
            'false' => __( 'none', 'nest-addons' ),
        ],
        'default' => 'true' ,
       
        ]
    );
    $this->add_control(
        'owl_nav_color',
         [
            'label' => __('Owl Nav Arrow Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .testimonial_sec .owl-nav i ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
     
    $this->add_control(
        'owl_nav_bg_color',
         [
            'label' => __('Owl Nav Arrow Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .testimonial_sec.owl-carousel .owl-nav .owl-prev, .testimonial_sec.owl-carousel .owl-nav .owl-next ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );

    
    $this->add_control(
        'owl_nav_hover_color',
         [
            'label' => __('Owl Nav Hover Arrow Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .testimonial_sec .owl-nav .owl-prev:hover i , {{WRAPPER}} .testimonial_sec .owl-nav .owl-next:hover i ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
     
    $this->add_control(
        'owl_nav_hover_bg_color',
         [
            'label' => __('Owl Nav Hover Arrow Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .testimonial_sec.owl-carousel .owl-nav .owl-prev:hover , {{WRAPPER}} .testimonial_sec.owl-carousel .owl-nav .owl-next:hover ' => 'background: {{VALUE}}!important;',
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
<div class="testimonial_sec position-relative <?php echo esc_attr($settings['nav_style_options']); ?>">

    <div class="theme_carousel owl-theme owl-carousel"
        data-options='{"loop": true, "margin": 20,  "autoheight":true, "lazyload":true, "nav": <?php echo esc_attr($settings['nav_display']); ?>, "dots": false, "autoplay": false, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }  , "550" :{ "items" : "1" } , "768" :{ "items" : "<?php echo esc_attr($settings['carousel_items_three']); ?>" } , "992":{ "items" : "<?php echo esc_attr($settings['carousel_items_two']); ?>" }, "1200":{ "items" : "<?php echo esc_attr($settings['carousel_items']); ?>" }}}'>
        <?php foreach($settings['testimonial_repeater_c'] as  $testimonial_repeater_c):?>

        <div class="testimonial_box clearfix">
        <?php if(!empty($testimonial_repeater_c['client_image'])): ?>
                <div class="c_image">
                    <img src="<?php echo esc_url($testimonial_repeater_c['client_image']['url']); ?>" alt="image" />
                </div>
                <?php endif; ?>
            <div class="comment">
                <?php echo wp_kses($testimonial_repeater_c['comment'] , $allowed_tags); ?>
            </div>
            <div class="authour_details">
              
      

                    <h5><?php echo esc_attr($testimonial_repeater_c['name']); ?></h5>
                    <span><?php echo esc_attr($testimonial_repeater_c['designation']); ?></span>

                    <div class="rating">
                        <ul>
                            <?php if($testimonial_repeater_c['rating_one'] == 'one'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span
                                    class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span
                                    class="fa fa-star empty"></span></li>
                            <?php elseif($testimonial_repeater_c['rating_one'] == 'two'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span
                                    class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span
                                    class="fa fa-star empty"></span></li>
                            <?php elseif($testimonial_repeater_c['rating_one'] == 'three'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span
                                    class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span
                                    class="fa fa-star empty"></span></li>
                            <?php elseif($testimonial_repeater_c['rating_one'] == 'four'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span
                                    class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span
                                    class="fa fa-star empty"></span></li>
                            <?php elseif($testimonial_repeater_c['rating_one'] == 'five'): ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span
                                    class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span
                                    class="fa fa-star fill"></span></li>
                            <?php else: ?>
                            <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span
                                    class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span
                                    class="fa fa-star fill"></span></li>
                            <?php endif; ?>
                        </ul>
                    </div>
           
            </div>
        </div>

        <?php endforeach;?>
    </div>
</div>
<?php
}
}
 