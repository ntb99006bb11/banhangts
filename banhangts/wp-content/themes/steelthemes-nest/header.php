<?php
/*The Header for our theme.
**==============================   
** Nest Ecommerce Header File
**==============================
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class('srollbar'); ?>>
	<?php
if(!function_exists('wp_body_open')):
    function wp_body_open(){
        do_action('wp_body_open');
    }
endif;
global $nest_theme_mod;
?>
<div id="page" class="page_wapper hfeed site">
	<!----page_wapper----->
	<?php  if(!isMobile()): do_action('get_nest_side_menu_button');  endif; ?>
		<?php if(!isMobile()):  if(!empty($nest_theme_mod['side_menu_enable']) == true):  nest_menu_display_arear(); endif; endif;?>
	<?php  // preloader area ?>
		<?php  if(!empty($nest_theme_mod['preloader_enables']) == true): do_action('pre_loader'); endif; ?>
	<?php  // preloader area end ?>
	<?php  // quick view ?>
	<div class="quick_view_loading"></div>
	<?php  // quick view end ?>
	<?php  // header ?>
		<?php  get_template_part('template-parts/headers/default', 'header'); ?>
		<?php  get_template_part('template-parts/headers/mobile', 'header'); ?>
	<?php  // header end ?>
		<?php if(!empty($nest_theme_mod['header_sticky']) == true): get_template_part('template-parts/headers/sticky', 'header'); endif; ?>
	<?php  // sticky header end ?>
	<div id="wrapper_full" class="content_all_warpper">
	<?php // wrapper_full ?>
	<?php // page-header ?>
	<?php if(!class_exists('Nest_elementor_extension')): do_action('nest_dafalut_page_header_before_core'); endif; ?>
		<?php  do_action('nest_dafalut_page_header'); ?>
		<?php if(function_exists( 'dokan_is_store_page' )):  if(dokan_is_store_page()): ?>
			<div class="dokan_only_breadcrumb">
				<div class="container">
					<?php  do_action('nest_custom_breadcrumb'); ?>
				</div>
			</div>
		<?php endif; endif; ?>
		<?php // page-header end ?>
			<div id="content" class="site-content <?php echo get_post_meta(get_the_ID() , 'blog_single_page_header' , true); ?>">
				<?php $container = 'container';
	                if( is_page_template('template-homepage.php') || is_page_template('template-empty.php') || is_page_template('template-fullwidth.php')){
						$container = 'no-container';
					}
		        ?>
				<div class="<?php echo esc_attr($container); ?>">
					<?php
		                $layout_row = nest_get_layout();
		                $row = 'row';
		                if( is_page_template('template-homepage.php') || is_page_template('template-empty.php') || is_page_template('template-fullwidth.php') || $layout_row == 'no-sidebar'):
			                $row = 'no-row';
                        else:
			                $row = 'row default_row';
                        endif;
		            ?>
				<div class="<?php echo esc_attr( $row ) ?>">
 