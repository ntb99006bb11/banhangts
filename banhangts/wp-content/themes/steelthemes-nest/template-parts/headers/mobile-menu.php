<?php
/*
** ============================== 
**   Nest Ecommerce Header Mobile Menu
** ==============================
*/
add_action('nest_custom_mobile_menu', 'nest_mobile_menu'); 
function nest_mobile_menu(){
    global $nest_theme_mod;
    $allowed_tags = wp_kses_allowed_html('post');
    ?>
<div class="mobile-header-active mobile_menu_default mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
            <?php if(is_user_logged_in()): ?>
            <div class="mb_logout">
                <?php  $logout = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );  ?>
                <a href="<?php echo esc_url(wp_logout_url($logout));?>"><i
                class="fi fi-rs-sign-out mr-10"></i>
                    <?php echo esc_html__('Sign Out' , 'steelthemes-nest'); ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
        <div class="mobile-header-content-area">
            <?php if(!empty($nest_theme_mod['header_search_enable']) == true): ?>
            <div class="mobile-search search-style-3 mobile-header-border">
                <?php do_action('nest_custom_search_setup'); ?>
            </div>
            <?php endif; ?>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="menu_cat_tab">
                    <ul class="nav nav-tabs" id="mobilemenu" role="tablist">
                        <?php if(has_nav_menu('mobile_menu')): ?>
                            <li class="nav-item cat_m_item" role="presentation">
                                <button class="nav-link cat_m_link active" id="menu-tab" data-bs-toggle="tab"
                                    data-bs-target="#menu-tab-pane" type="button" role="tab" aria-controls="menu-tab-pane"
                                    aria-selected="true"><?php echo esc_html__('Menu' , 'steelthemes-nest'); ?></button>
                            </li>
                        <?php endif; ?>
                        <?php if(has_nav_menu('mobile_cat_menu')): ?>
                            <li class="nav-item cat_m_item" role="presentation">
                                <button class="nav-link cat_m_link" id="mbcat-tab" data-bs-toggle="tab"
                                    data-bs-target="#mbcat-tab-pane" type="button" role="tab" aria-controls="mbcat-tab-pane"
                                    aria-selected="false"><?php echo esc_html__('Category' , 'steelthemes-nest'); ?></button>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="tab-content" id="mobilemenuContent">
                        <?php if(has_nav_menu('mobile_menu')): ?>
                            <div class="tab-pane fade show active" id="menu-tab-pane" role="tabpanel"
                                aria-labelledby="menu-tab" tabindex="0">
                                <nav>
                                    <?php wp_nav_menu(
                                        array(
                                            'theme_location' => 'mobile_menu',
                                            'container' => false,
                                            'menu_class' => 'mobile-menu font-heading',
                                            'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                                            'walker' => new \WP_Bootstrap_Navwalker()
                                            )
                                        );
                                    ?>
                                </nav>
                            </div>
                        <?php endif; ?>
                        <?php if(has_nav_menu('mobile_cat_menu')): ?>
                            <div class="tab-pane fade" id="mbcat-tab-pane" role="tabpanel" aria-labelledby="mbcat-tab"
                                tabindex="0">
                                <nav>
                                    <?php wp_nav_menu(
                                        array(
                                            'theme_location' => 'mobile_cat_menu',
                                            'container' => false,
                                            'menu_class' => 'mobile-menu font-heading',
                                            'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                                            'walker' => new \WP_Bootstrap_Navwalker()
                                            )
                                        );
                                    ?>
                                </nav>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <?php if(!empty($nest_theme_mod['contact_enable']) == true || !empty($nest_theme_mod['mobile_button_enable']) == true): ?>
            <div class="mobile-header-info-wrap">
                <?php if(!empty($nest_theme_mod['contact_enable']) == true): ?>
                <?php if(!empty($nest_theme_mod['mobile_phone_number'])): ?>
                <div class="single-mobile-header-info">
                    <a href="tel:<?php echo esc_attr($nest_theme_mod['mobile_phone_number']); ?>"><i
                            class="fi-rs-headphones"></i><?php echo esc_attr($nest_theme_mod['mobile_phone_number']); ?></a>
                </div>
                <?php endif; ?>

                <?php if(!empty($nest_theme_mod['mobile_mail_number'])): ?>
                <div class="single-mobile-header-info">
                    <a href="mailto:<?php echo esc_attr($nest_theme_mod['mobile_mail_number']); ?>"><i
                            class="fi-rs-envelope"></i><?php echo esc_attr($nest_theme_mod['mobile_mail_number']); ?></a>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                <?php if(!empty($nest_theme_mod['mobile_button_enable']) == true): ?>
                <?php if(!empty($nest_theme_mod['mobile_button_text'])): ?>
                <div class="single-mobile-header-info">
                    <a href="<?php echo esc_attr($nest_theme_mod['mobile_button_link']); ?>"
                        class="btn btn-sm one"><?php echo esc_attr($nest_theme_mod['mobile_button_text']); ?></a>
                </div>
                <?php endif; ?>
                <?php if(!empty($nest_theme_mod['mobile_button_text'])): ?>
                <div class="single-mobile-header-info">
                    <a href="<?php echo esc_attr($nest_theme_mod['mobile_button_link_two']); ?>"
                        class="btn btn-sm"><?php echo esc_attr($nest_theme_mod['mobile_button_text_two']); ?></a>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if(!empty($nest_theme_mod['mobile_social_media_enable']) == true): ?>
            <div class="mobile-social-icon d-flex align-items-center mb-50">
                <?php if(!empty($nest_theme_mod['social_media_text'])): ?>
                <a href="<?php echo esc_attr($nest_theme_mod['social_media_link']); ?>"><i
                        class="<?php echo esc_attr($nest_theme_mod['social_media_text']); ?>"></i></a>
                <?php endif; ?>
                <?php if(!empty($nest_theme_mod['social_media_text_two'])): ?>
                <a href="<?php echo esc_attr($nest_theme_mod['social_media_link_two']); ?>"><i
                        class="<?php echo esc_attr($nest_theme_mod['social_media_text_two']); ?>"></i></a>
                <?php endif; ?>
                <?php if(!empty($nest_theme_mod['social_media_text_three'])): ?>
                <a href="<?php echo esc_attr($nest_theme_mod['social_media_link_three']); ?>"><i
                        class="<?php echo esc_attr($nest_theme_mod['social_media_text_three']); ?>"></i></a>
                <?php endif; ?>
                <?php if(!empty($nest_theme_mod['social_media_text_four'])): ?>
                <a href="<?php echo esc_attr($nest_theme_mod['social_media_link_four']); ?>"><i
                        class="<?php echo esc_attr($nest_theme_mod['social_media_text_four']); ?>"></i></a>
                <?php endif; ?>
                <?php if(!empty($nest_theme_mod['social_media_text_five'])): ?>
                <a href="<?php echo esc_attr($nest_theme_mod['social_media_link_five']); ?>"><i
                        class="<?php echo esc_attr($nest_theme_mod['social_media_text_five']); ?>"></i></a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if(!empty($nest_theme_mod['mobile_copy_enable']) == true): ?>
            <div class="site-copyright">
                <?php echo wp_kses($nest_theme_mod['mobile_panel_copy_right'] , $allowed_tags); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php }