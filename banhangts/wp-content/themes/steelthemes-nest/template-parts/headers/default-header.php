<?php
/*
** ============================== 
**   Nest Ecommerce Header File
** ==============================
*/

if(is_page_template( 'template-empty.php' )):
    return false;
endif;
global $nest_theme_mod;
$header_id = '';
if(!empty($nest_theme_mod['header_custom_style'])):
    $header_id = $nest_theme_mod['header_custom_style'];
endif;
if(get_post_meta(get_the_ID() , 'custom_header', true)):
    $header_id = get_post_meta(get_the_ID() , 'header_settings_meta', true);
endif;
$header_content = nest_elementor_builder_content_for_display($header_id);
$header_custom_enables = '';
if(!empty($nest_theme_mod['header_custom_enables'])):
$header_custom_enables = $nest_theme_mod['header_custom_enables'];
endif;

function  nest_default_header(){
    $blog_title = get_bloginfo('name');
    ?>
<header class="header-area nest_header_default before_custom_header header-style-1 header-height-2">
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1">
                <div class="logo_box">
                    <a href="<?php  echo esc_url(home_url()); ?>" class="logo">
                    <?php echo esc_attr($blog_title); ?>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </a>
                </div>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'navbar_nav',
                                'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                                'walker' => new \WP_Bootstrap_Navwalker()
                            ));?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php  } ?>
<?php if($header_custom_enables == false): ?>
    <?php nest_default_header(); ?>
<?php else: ?>
<?php if(class_exists('Elementor\Plugin')): ?>
<div class="header_area" id="header_contents">
    <?php 
        if ($header_content !== null) {
          echo do_shortcode($header_content);
        } else {
            echo esc_html__('Sorry, no posts matched your criteria.' , 'ecom');
        }
    ?>
</div>
<?php endif; ?>
<?php
endif; ?>
 