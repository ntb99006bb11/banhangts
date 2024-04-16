<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Sidebar_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-sidebar-v1';
    }

    public function get_title()
    {
        return __('Sidebar  V1', 'nest-addons');
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
        $this->start_controls_section('sidebar_settings',
        [ 
            'label' => __('Blog Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );


        $this->add_control(
            'sidebar_style',
            [
                'label' => __('Choose Sidebar ', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'sidebar-blog'   => esc_html__( 'Blog Sidebar', 'nest-addons' ),
                    'page-sidebar'   => esc_html__( 'Page Sidebar', 'nest-addons' ),
                    'shop-sidebar'   => esc_html__( 'Shop Sidebar', 'nest-addons' ), 
                ],
                'default' => 'shop-sidebar',
            ]
        );
 
    $this->end_controls_section();

    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
 
        $side_class_inner = 'blog_siderbar side_bar';
        if($settings['sidebar_style'] == 'page-sidebar'):
            $sidebar = 'page-sidebar';
            $side_class_inner = 'page_siderbar side_bar';
       
        elseif($settings['sidebar_style'] == 'shop-sidebar'):
            $sidebar = 'shop-sidebar';
            $side_class_inner = 'shop_siderbar side_bar';
        endif;
     
  ?>
 
<?php if(is_active_sidebar($sidebar)): ?>
<aside  class="primary-sidebar sticky-sidebar">
	<div class="widget-area">
        <div class="<?php echo esc_attr($side_class_inner); ?>">
	        <?php dynamic_sidebar( $sidebar ) ?>
        </div>
    </div>
</aside>
<?php endif; ?>
 
        <?php
    }
}

         