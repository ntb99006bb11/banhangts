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
$header_sticky_id = '';
if(!empty($nest_theme_mod['header_sticky_custom_style'])):
    $header_sticky_id = $nest_theme_mod['header_sticky_custom_style'];
endif;
if(get_post_meta(get_the_ID() , 'custom_sticky_header', true)):
  $header_sticky_id = get_post_meta(get_the_ID() , 'sticky_header_settings_meta', true);
endif;
$header_sticky_content = nest_elementor_builder_content_for_display($header_sticky_id);
?> 
<?php if(class_exists('Elementor\Plugin')): ?>
<div class="sticky_header_area sticky_header_content">
    <?php 
        if ($header_sticky_content !== null) {
          echo do_shortcode($header_sticky_content);
        } else {
            echo esc_html__('Sorry, no posts matched your criteria.' , 'ecom');
        }
    ?>
</div>
<?php endif; ?>
<?php
 
 