<?php
/*
** ============================== 
**   Nest Ecommerce Header File
** ==============================
*/ 
global $nest_theme_mod; 
$allowed_tags = wp_kses_allowed_html('post');
$blog_title = get_bloginfo('name');
?>
<header class="mobile_header style_one">
    <?php if(!empty($nest_theme_mod['notice_enable']) == true): ?>
    <div class="mobile_top_bar_content">
        <div class="notice_content" <?php if(!empty($nest_theme_mod['notice_bg_image']['url'])): ?>
            style="background-image:url(<?php echo esc_attr($nest_theme_mod['notice_bg_image']['url']); ?>);" <?php endif; ?>>
            <?php echo wp_kses($nest_theme_mod['notice_content'] , $allowed_tags); ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="mobile_midbar_content">
        <div class="d-flex align-tems-center">
            <?php if(!empty($nest_theme_mod['mobile_logo_enable']) == true): ?>
            <div class="logo same_mb_content">
                <?php 
                    $link_mob = '';
                    if(!empty($nest_theme_mod['mobile_custom_link_enable']) == true):
                        $link_mob = $nest_theme_mod['mobile_logo_link']['url'];
                        else:
                            $link_mob = home_url();
                        endif;
                    ?>
                <a href="<?php echo esc_url($link_mob); ?>"
                    <?php if(!empty($nest_theme_mod['mobile_custom_link_enable']) == true):  echo esc_attr($targe_mob_logo); echo esc_attr($nofollow_mob_logo);  endif; ?>
                    class="logo navbar_brand">
                    <img src="<?php echo esc_url($nest_theme_mod['mobile_logo_default']['url']); ?>"
                        alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" class="logo_default">
                </a>
            </div>
            <?php else: ?>
                <div class="logo same_mb_content">
                    <a href="<?php  echo esc_url(home_url()); ?>" class="logo_text">
                    <?php echo esc_attr($blog_title); ?>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </a>
                </div>
            <?php endif; ?>
            <div class="right_content same_mb_content">
                <?php if(!empty($nest_theme_mod['mob_cart_enable']) == true): if(class_exists('woocommerce')): ?>
                <div class="cart_mb mini_cart_togglers same">
                    <?php $items_counts = is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : ''; ?>
                    <a class="mini-cart-icon">
                        <img alt="Nest"
                            src="<?php echo get_template_directory_uri().'/assets/images/icon-cart.svg'; ?>" />
                        <span class="pro-count blue"> <?php if(!empty($items_counts)): ?>
                            <?php echo esc_attr($items_counts) ? esc_attr($items_counts) : '&nbsp;'; else: echo esc_html('0'); ?>
                            <?php endif; ?> </span>
                    </a>
                </div>
                <?php endif;  endif; ?>
                <div class="menu_bar same">
                    <div class="burger-icon">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(!empty($nest_theme_mod['header_search_enable']) == true): 
      
        $mbsheader_search_style =  '';
        if(!empty($nest_theme_mod['mbsheader_search_style'])):
        $mbsheader_search_style = $nest_theme_mod['mbsheader_search_style'];
        endif;
        ?>
    <div class="mobile_search_bar">
        <div class="search-style-2 custom_search">
                <?php if($mbsheader_search_style == 'default_search'): ?>
                    <?php do_action('nest_get_prosearch_form'); ?>
                <?php elseif($mbsheader_search_style == 'fibosearch'): ?>
                    <?php echo do_shortcode('[fibosearch]'); ?>
 
                <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</header>

