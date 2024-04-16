<?php 
/*
** ============================== 
**   Nest Ecommerce Theme Panel
** ==============================
*/ 
 
function nest_add_theme_admin_menu(){
    add_menu_page( 
        __( 'Nest Theme', 'nest-addons' ),
        'Nest',
        'manage_options',
        'nest-panel',
        null ,
        plugins_url( '/nest-addons/assets/imgs/nest-dash-icon.png'),
        3.1
    ); 
    add_submenu_page(
        'nest-panel',
        esc_html__( 'About Nest Theme', 'nest-addons' ),
        esc_html__( 'About Nest ', 'nest-addons' ),
        'manage_options',
        'nest-panel',
        'nest_panel_output',
        0
    );
}
add_action( 'admin_menu', 'nest_add_theme_admin_menu' );
 
/**
 * Display a custom menu page
 */
function nest_panel_output(){
    ?>
    <div class="nest_admin_boxed clearfix" id="nest_admin_boxed_id">
    <div class="nest_panel_top welcome-panel">
        <div class="bg_n_image">
            <img src="<?php echo esc_url(NEST_ADDONS_URL . '/assets/imgs/nest-admin-bg.jpg'); ?>" alt="nest-bg" />
        </div>
        <div class="about_nest_panel">
            <h1><?php echo esc_html_e('Nest' , 'nest-addons'); ?> <span><?php echo esc_html('V 1.5' , 'nest-addons'); ?> </span></h1>
            <p><?php echo esc_html_e('WooCommerce Marketplace WordPress Theme' , 'nest-addons'); ?></p>
     </div>
</div>
<div class="theme_nest_register">
    <h2><?php echo esc_html_e('Nest theme registered' , 'nest-addons'); ?></h2>
    <p><?php echo esc_html_e('Envato allows 1 license for 1 project located on 1 domain. It means that 1 
    purchase key can be used only for 1 site. Each additional site will require an additional purchase key.', 'nest-addons'); ?></p>

        
</div>
    <div class="d-flex clearfix">
        <div class="box_nest">
            <a href="https://themepanthers.com/wp/nest/documentation/change-logs" target="_blank">
                <div class="card">
                    <h6><?php echo esc_html_e('Change Logs' , 'nest-addons'); ?></h6>
                </div>
            </a>
        </div>
        <div class="box_nest">
            <a href="https://themepanthers.com/wp/nest/documentation/" target="_blank">
                <div class="card">
                    <h6><?php echo esc_html_e('Documentation' , 'nest-addons'); ?></h6>
                </div>
            </a>
        </div>
        <div class="box_nest">
            <a href="https://themepanthers.com/wp/nest/documentation/video-tutorials/" target="_blank">
                <div class="card">
                    <h6><?php echo esc_html_e('Video Tutorials' , 'nest-addons'); ?></h6>
                </div>
            </a>
        </div>
        <div class="box_nest">
            <a href="https://steelthemes.ticksy.com/submit/#100019994" target="_blank">
                <div class="card">
                    <h6><?php echo esc_html_e('Support' , 'nest-addons'); ?></h6>
                </div>
            </a>
        </div>
</div>
    
 
    <div class="theme_authour_panel  welcome-panel">
    <div class="bg_n_image">
            <img src="<?php echo esc_url(NEST_ADDONS_URL . '/assets/imgs/steelthemes.jpg'); ?>" alt="nest-bg" />
        </div>
        <div class="about_steelthemes">
            <h6><?php echo esc_html_e('Theme Authour' , 'nest-addons'); ?> </h6>
            <h1><?php echo esc_html_e('Steelthemes' , 'nest-addons'); ?> </h1>
            <p><?php echo esc_html_e('We build all our templates with care and love. all our templates are 100% responsive' , 'nest-addons'); ?></p>
            <a class="btn" href="https://themeforest.net/user/steelthemes" target="_blank">
               <?php echo esc_html_e('View Our Profile' , 'nest-addons'); ?>   
            </a>
    </div>  
 </div>
</div>
    <?php
}
add_action( 'admin_notices', 'nest_admin_notice__success' );
function nest_admin_notice__success() {
    ?>
 <div class="nest-leadin-banner notice notice-warning is-dismissible"> <p><strong class="red"> <?php echo esc_html_e('Nest Notice -> Soon We Are going to add Purchase Code Validator', 'nest-addons'); ?></strong></p></div>
 <div class="nest-leadin-banner notice notice-warning is-dismissible"> <p><strong class="red"> <?php echo esc_html_e('Nest Notice -> Make Sure If you Have backup before updating the theme and plugins.', 'nest-addons'); ?></strong></p></div>
    <?php
}
