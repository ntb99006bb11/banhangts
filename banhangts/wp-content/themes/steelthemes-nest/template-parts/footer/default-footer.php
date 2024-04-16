<?php
/*
** ============================== 
**   Nest Ecommerce footer File
** ==============================
*/
if(is_page_template( 'template-empty.php' )):
  return false;
endif;
global $nest_theme_mod;
$footer_id = '';
if(!empty($nest_theme_mod['footer_custom_style'])):
  $footer_id = $nest_theme_mod['footer_custom_style'];
endif;
  if(get_post_meta(get_the_ID() , 'custom_footer', true)):
      $footer_id = get_post_meta(get_the_ID() , 'footer_settings_meta', true);
  endif;
$footer_content = nest_elementor_builder_content_for_display($footer_id);
$footer_custom_enables = '';
if(!empty($nest_theme_mod['footer_custom_enables'])):
$footer_custom_enables = $nest_theme_mod['footer_custom_enables'];
endif;

function  nest_default_footer(){
?>
<footer class="footer before_plugin_installation_footer footer_default  footer-bottom text-center">
  <div class="auto-container">
    <div class="row">
        <div class="col-lg-12">
          <div class="copyright">
            <?php echo esc_html__('© 2023 Steelthemes. All Right Reseved' , 'steelthemes-nest'); ?>
          </div>
        </div>
      </div>
    </div>
  </footer>
<?php } 
 if($footer_custom_enables == true): ?>
 <?php if(class_exists('Elementor\Plugin')): ?>
    <div class="footer_area" id="footer_contents">
        <?php 
        if ($footer_content !== null) {
          echo do_shortcode($footer_content);
        } else {
            echo esc_html__('Sorry, no posts matched your criteria.' , 'ecom');
        }
        ?>
    </div>
<?php endif; ?>
<?php  else:  
    nest_default_footer();
endif; ?>
 
    