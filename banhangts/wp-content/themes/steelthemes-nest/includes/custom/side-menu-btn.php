<?php
/*
**
nest side menu Button
**
*/
function  nest_side_menu_button(){
    global $nest_theme_mod;
?>
<?php if( (!empty($nest_theme_mod['side_menu_enable']) == true)  || (!empty($nest_theme_mod['content_one_enable']) == true)  || (!empty($nest_theme_mod['content_two_enable']) == true) ):  ?>
<ul class="sidemenu_content_bx">
    
<?php if(!empty($nest_theme_mod['side_menu_enable']) == true):  ?>
  <li>  <a href="#" id="side_menu_toggle_btn">
        <?php if(!empty($nest_theme_mod['side_menu_icon_image']['url'])): ?>
            <img src="<?php echo esc_attr($nest_theme_mod['side_menu_icon_image']['url']);  ?>" alt="img" class="img-fluid" />
        <?php  endif; ?>
        <?php if(!empty($nest_theme_mod['side_menu_button_texts'])):   ?>
            <small><?php echo esc_attr($nest_theme_mod['side_menu_button_texts']); ?> </small>
        <?php endif; ?>
    </a> </li>
    <?php endif; ?>
 
    <?php if(!empty($nest_theme_mod['content_one_enable']) == true):  ?>
   <li> <a href="<?php if(!empty($nest_theme_mod['content_one_text_link'])): echo esc_attr($nest_theme_mod['content_one_text_link']); endif; ?>">
        <?php if(!empty($nest_theme_mod['content_one_icon_image']['url'])): ?>
            <img src="<?php echo esc_attr($nest_theme_mod['content_one_icon_image']['url']);  ?>" alt="img" class="img-fluid" />
        <?php  endif; ?>
        <?php if(!empty($nest_theme_mod['content_one_text'])):   ?>
            <small><?php echo esc_attr($nest_theme_mod['content_one_text']); ?> </small>
        <?php endif; ?>
    </a></li>
    <?php endif; ?>
    <?php if(!empty($nest_theme_mod['content_two_enable']) == true):  ?>
        <li> <a href="<?php if(!empty($nest_theme_mod['content_two_link'])): echo esc_attr($nest_theme_mod['content_two_link']); endif; ?>">
        <?php if(!empty($nest_theme_mod['content_two_icon_image']['url'])): ?>
            <img src="<?php echo esc_attr($nest_theme_mod['content_two_icon_image']['url']);  ?>" alt="img" class="img-fluid" />
        <?php  endif; ?>
        <?php if(!empty($nest_theme_mod['content_two_text'])):   ?>
        <small><?php echo esc_attr($nest_theme_mod['content_two_text']); ?> </small>
        <?php endif; ?>
    </a></li>
    <?php endif; ?>
</ul>
<?php endif; ?>
<?php 

}

add_action('get_nest_side_menu_button' , 'nest_side_menu_button');