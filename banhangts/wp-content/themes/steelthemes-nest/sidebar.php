<?php
/*
**==============================   
**Nest Ecommerce sidebar File
**==============================
*/
if('no-sidebar' == nest_get_layout()):
	return;
endif;
global  $nest_theme_mod;
$sticky_enable = '';
if(!empty($nest_theme_mod['sidebar_sticky_enables'])):
$sticky_enable = $nest_theme_mod['sidebar_sticky_enables'];
endif;
$sidebar = 'sidebar-blog' ;
$side_class_inner = 'blog_siderbar side_bar';
if( is_page()) {
	$sidebar = 'page-sidebar';
	$side_class_inner = 'page_siderbar side_bar';
} 
elseif (is_post_type_archive('product')  || is_singular('product') || is_tax('product_cat')) {
	$sidebar = 'shop-sidebar';
	$side_class_inner = 'shop_siderbar side_bar';
} 
$fixSide_scroll = '';
if($sticky_enable == true){
	$fixSide_scroll  = ' sticky-sidebar';   
}

?>
<?php if(is_active_sidebar($sidebar)): ?>
<aside  class="col-lg-3 primary-sidebar<?php echo esc_attr($fixSide_scroll); ?>">
	<div class="widget-area">
		<div class="<?php echo esc_attr($side_class_inner); ?> ">
	<?php dynamic_sidebar( $sidebar ) ?>
</div>
</div>
</aside>
<?php endif; ?>