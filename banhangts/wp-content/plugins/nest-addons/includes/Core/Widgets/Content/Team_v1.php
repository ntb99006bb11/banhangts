<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Team_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-team-v1';
    }

    public function get_title()
    {
        return __('Team V1 ' , 'nest-addons');
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
            'team_content',
            [
                'label' => __('Team Content', 'nest-addons')
            ]
        );

     

      $this->add_control(
          'member_image',
          [
              'label' => __('Member Image', 'nest-addons'),
              'type' => \Elementor\Controls_Manager::MEDIA,
              'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
          ]
      );
      
    $this->add_control(
        'member_name',
        [
          'label'       => esc_html__( 'Member name', 'nest-addons' ),
          'type'        => \Elementor\Controls_Manager::TEXT,
          'default' =>  esc_html__( 'Amelia Margaret' , 'nest-addons'),
        ]
    );
    $this->add_control(
        'member_designation',
        [
        'label'       => esc_html__( 'Member Designation', 'nest-addons' ),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'default' =>  esc_html__( 'Director' , 'nest-addons'),
        ]
    );

   
   
    $this->add_control(
        'button_link',
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

    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'media_text',
        [
          'label'       => esc_html__( 'Media name', 'nest-addons' ),
          'type'        => \Elementor\Controls_Manager::TEXT,
          'default' =>  esc_html__( 'fa fa-facebook' , 'nest-addons'),
        ]
    );
    $repeater->add_control(
        'media_link',
        [
        'label'       => esc_html__( 'Media Link', 'nest-addons' ),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'default' =>  esc_html__( '#' , 'nest-addons'),
        ]
    );

    $this->add_control(
        'social_media_repeater',
        [
            'label' => __('Social media Repeater', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                  'media_text' => __('fa fa-facebook', 'nest-addons'),
                  'media_link' =>  __('#', 'nest-addons'),
          
                ],
                [
                  'media_text' => __('fa fa-twitter', 'nest-addons'),
                  'media_link' =>  __(' Employee Compensation', 'nest-addons'),
         
                 ],
                 [
                  'media_text' => __('fa fa-skype', 'nest-addons'),
                  'media_link' =>  __('#', 'nest-addons'),
                 ],
                 [
                    'media_text' => __('fa fa-instagram', 'nest-addons'),
                    'media_link' =>  __('#', 'nest-addons'),
                   ]
                
            ],
            'title_field' => '{{{ media_text }}}',

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


    $this->start_controls_section('Team_css',
[ 
    'label' => __('Team Css', 'nest-addons'),
    'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
]
);

 
$this->add_control(
    'title_color',
     [
        'label' => __('Title Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .team-card h4 a  ' => 'color: {{VALUE}}!important;',
        ],
     ]
);

$this->add_control(
    'content_color',
     [
        'label' => __('Content Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .team-card .content span  ' => 'color: {{VALUE}}!important;',
        ], 
     ]
);
 

$this->add_control(
    'media_icon_color',
    [
        'label' => __( 'Media Icon Color', 'nest-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .team-card .social-network a i ' => 'color: {{VALUE}}',
        ],
    ]
);

 
$this->add_control(
  'media_font_weights',
  [
      'label' => __('Icon Font Weight', 'nest-addons'),
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
          '400'   => esc_html__( '400', 'nest-addons' ),
          '500'   => esc_html__( '500', 'nest-addons' ),
          '600'   => esc_html__( '600', 'nest-addons' ), 
          '700'   => esc_html__( '700', 'nest-addons' ), 
          '800'   => esc_html__( '800', 'nest-addons' ), 
          '900'   => esc_html__( '900', 'nest-addons' ), 
      ],
      'default' => '400',
      'selectors' => [
          '{{WRAPPER}} .team-card .social-network a i ' => 'font-weight: {{VALUE}}',
      ],
  ]
);

$this->add_control(
  'font_familyss',
  [
      'label' => __('Font Family', 'nest-addons'),
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
          'Font Awesome 5 Brands'   => esc_html__( 'Font Awesome 5 Brands', 'nest-addons' ),
          'Font Awesome 5 Free'   => esc_html__( 'Font Awesome 5 Free', 'nest-addons' ),
          'FontAwesome'   => esc_html__( 'FontAwesome', 'nest-addons' ),
          
      ],
      'default' => 'Font Awesome 5 Brands',
      'selectors' => [
          '{{WRAPPER}} .team-card .social-network a i ' => 'font-family: {{VALUE}}',
      ],
  ]
);

$this->add_control(
    'box_color',
     [
        'label' => __('Box Color', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .team-card .content  ' => 'background: {{VALUE}}!important;',
        ], 
     ]
);

 
$this->end_controls_section();

      
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $allowed_tags = wp_kses_allowed_html('post');
        $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : ''; 
?>



        <div class="team_box style_one <?php if($settings['transition_enable'] == 'yes'): ?> wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo esc_attr($settings['wow_animation']); ?><?php endif; ?>">
 

            <div class="team-card">
                <?php if(!empty($settings['member_image']['url'])): ?>  
                    <img src="<?php echo esc_attr($settings['member_image']['url']); ?>" alt="team image" />
                <?php endif; ?>
                <div class="content text-center">
                    <?php if(!empty($settings['member_name'])): ?>
                    <h4 class="mb-5">
                        <a href="<?php echo esc_url($settings['button_link']['url']);?>"  <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                            <?php echo esc_attr($settings['member_name']); ?>
                        </a>
                    </h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['member_designation'])): ?>
                        <span><?php echo esc_attr($settings['member_designation']); ?></span>
                    <?php endif; ?>
                    <div class="social-network mt-20">
                        <?php foreach($settings['social_media_repeater'] as $social_media_repeater):   ?>
                            <a href="<?php echo esc_url($social_media_repeater['media_link']); ?>"> <i class="<?php echo esc_attr($social_media_repeater['media_text']); ?>"> </i> </a>
                        <?php endforeach; ?>                     
                    </div>
                </div>
            </div>

             
       
        </div>

<?php
    }
}

 