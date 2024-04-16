<?php
/*
** ============================== 
**   Nest Ecommerce Header Mobile Menu
** ==============================
*/
add_action('get_custom_mobile_menu', 'nest_mobile_floating_menu'); 
function nest_mobile_floating_menu(){
    global $nest_theme_mod;?>
<div class="mobile_floating_menu">
<?php if(!empty($nest_theme_mod['home_enable']) == true): ?>
    <div class="mf_box">
        <a href="<?php echo esc_url($nest_theme_mod['home_btn_link']); ?>">
            <?php if(!empty($nest_theme_mod['home_button_img']['url'])): ?>
                <img src="<?php echo esc_url($nest_theme_mod['home_button_img']['url']) ?>" class="img-fluid" alt="img" />
            <?php endif; ?>
            <?php echo esc_attr($nest_theme_mod['home_btn_text']); ?>
        </a>
    </div>
<?php endif; ?>
<?php if(!empty($nest_theme_mod['button_one_enable']) == true): ?>
    <div class="mf_box">
        <a href="<?php echo esc_url($nest_theme_mod['btn_one_link']); ?>">
            <?php if(!empty($nest_theme_mod['btn_one_img']['url'])): ?>
                <img src="<?php echo esc_url($nest_theme_mod['btn_one_img']['url']) ?>" class="img-fluid" alt="img" />
            <?php endif; ?>
            <?php echo esc_attr($nest_theme_mod['btn_one_text']); ?>
        </a>
    </div>
<?php endif; ?>
<?php if(!empty($nest_theme_mod['button_two_enable']) == true): ?>
    <div class="mf_box">
        <a href="<?php echo esc_url($nest_theme_mod['btn_two_link']); ?>">
            <?php if(!empty($nest_theme_mod['btn_two_img']['url'])): ?>
                <img src="<?php echo esc_url($nest_theme_mod['btn_two_img']['url']) ?>" class="img-fluid" alt="img" />
            <?php endif; ?>
            <?php echo esc_attr($nest_theme_mod['btn_two_text']); ?>
        </a>
    </div>
<?php endif; ?>
<?php if(!empty($nest_theme_mod['button_three_enable']) == true): ?>
    <div class="mf_box">
        <a href="<?php echo esc_url($nest_theme_mod['btn_three_link']); ?>">
            <?php if(!empty($nest_theme_mod['btn_three_img']['url'])): ?>
                <img src="<?php echo esc_url($nest_theme_mod['btn_three_img']['url']) ?>" class="img-fluid" alt="img" />
            <?php endif; ?>
            <?php echo esc_attr($nest_theme_mod['btn_three_text']); ?>
        </a>
    </div>
<?php endif; ?>
<?php if(!empty($nest_theme_mod['button_four_enable']) == true): ?>
    <div class="mf_box">
        <a href="<?php echo esc_url($nest_theme_mod['btn_four_link']); ?>">
            <?php if(!empty($nest_theme_mod['btn_four_img']['url'])): ?>
                <img src="<?php echo esc_url($nest_theme_mod['btn_four_img']['url']) ?>" class="img-fluid" alt="img" />
            <?php endif; ?>
            <?php echo esc_attr($nest_theme_mod['btn_four_text']); ?>
        </a>
    </div>
<?php endif; ?>

                
</div>

<?php }