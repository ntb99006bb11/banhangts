<?php
/*
** ===================
** Nest Ecommerce Mega Menu
** Post type : Mega Menu;
** version: 1.0;
** Authour : Steeltheme;
** ===================
*/
namespace Nestaddons\Plugins;
if (! defined('ABSPATH' )){
	die('-1');
}
class Megamenu{
  	 
	public function __construct() {
		add_action('init', array($this, 'mega_menu_custom_post_type'));  
	}
	function mega_menu_custom_post_type() {
		register_post_type( 'mega_menu',
		array(
			'labels' => array(
			'name' => esc_html_x('Mega Menus ', 'Post Type General Name', 'nest-addons') ,
			'singular_name' => esc_html_x('Mega Menu', 'Post Type General Name', 'nest-addons') , 
			'add_new' =>  esc_html__('Add New', 'nest-addons'),
			'add_new_item' =>   esc_html__('Add New Mega Menu', 'nest-addons'),
			'edit' => esc_html__('Edit', 'nest-addons'),
			'edit_item' =>   esc_html__('Edit Mega Menu', 'nest-addons'),
			'new_item' =>   esc_html__('New Mega Menu', 'nest-addons'),
			'view' =>  esc_html__('View', 'nest-addons'),
			'view_item' =>    esc_html__('View Mega Menu', 'nest-addons'),
			'search_items' =>   esc_html__('Search Mega Menu', 'nest-addons'),
			'not_found' =>   esc_html__('No Mega Menu found', 'nest-addons'),
			'not_found_in_trash' =>  esc_html__('No Mega Menu found in Trash', 'nest-addons'),
			'parent' =>  esc_html__('Parent Mega Menu', 'nest-addons')
		),
		'public' => true,
		'show_in_rest' => true,
		'supports' =>
		array( 'title', 
		'thumbnail' , 'editor' , 'page-attributes'),
		'taxonomies' => array( '' ),
		'show_in_menu'        => 'nest-panel',
		'show_in_nav_menus'   => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-admin-generic',
		'has_archive' => false,
		'hierarchical'          => true,
		'capability_type'    => 'post',
		)
		);
	}
}

?>