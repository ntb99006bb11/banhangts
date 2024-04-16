<?php
/*
** ===================
** Nest Ecommerce Header
** Post type : Header;
** version: 1.0;
** Authour : Steeltheme;
** ===================
*/
namespace Nestaddons\Plugins;
if (! defined('ABSPATH' )){
	die('-1');
}
class Header{
   
	public function __construct() {
		add_action('init', array($this, 'header_custom_post_type'));  
		add_action('init', array($this, 'header_custom_taxonomies')); 
 
	}
	public function header_custom_post_type() {
		register_post_type( 'header',
		array(
			'labels' => array(
			'name' => esc_html_x('Headers', 'Post Type General Name', 'nest-addons') ,
			'singular_name' => esc_html_x('Headers', 'Post Type General Name', 'nest-addons') , 
			'add_new' =>  esc_html__('Add New', 'nest-addons'),
			'add_new_item' =>   esc_html__('Add New Header', 'nest-addons'),
			'edit' => esc_html__('Edit', 'nest-addons'),
			'edit_item' =>   esc_html__('Edit Header', 'nest-addons'),
			'new_item' =>   esc_html__('New Header', 'nest-addons'),
			'view' =>  esc_html__('View', 'nest-addons'),
			'view_item' =>    esc_html__('View Header', 'nest-addons'),
			'search_items' =>   esc_html__('Search Header', 'nest-addons'),
			'not_found' =>   esc_html__('No Header found', 'nest-addons'),
			'not_found_in_trash' =>  esc_html__('No Header found in Trash', 'nest-addons'),
			'parent' =>  esc_html__('Parent Header', 'nest-addons')
			),
		
			'public' => true,
			'show_in_rest' => true,
			'menu_position' => 15,
			'rewrite'               => array('slug' => 'header'),
			'supports' =>
			array( 'title', 
			'thumbnail' , 'editor', 'page-attributes' ),
			'taxonomies' => array( '' ),
			'show_in_menu'        => 'nest-panel',
			'show_in_nav_menus'   => false,
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-heading',
			'has_archive' => false,
			'capability_type'    => 'post',
			'hierarchical'          => true,
			)
		);
	}
 
	public function header_custom_taxonomies() {

	//add new taxonomy hierarchical
	$labels = array(
		'name' =>   esc_html__('Header Categories', 'nest-addons'),
		'singular_name' =>  esc_html__('Category', 'nest-addons'),
		'search_items' =>  esc_html__('Search Category', 'nest-addons'),
		'all_items' =>  esc_html__('All Category', 'nest-addons'),
		'parent_item' =>  esc_html__('Parent Category', 'nest-addons'),
		'parent_item_colon' =>   esc_html__('Parent Category:', 'nest-addons'),
		'edit_item' =>   esc_html__('Edit Category', 'nest-addons'),
		'update_item' =>   esc_html__('Update Category', 'nest-addons'),
		'add_new_item' =>  esc_html__('Add New Header Category', 'nest-addons'),
		'new_item_name' =>   esc_html__('New Category Name', 'nest-addons'),
		'menu_name' => esc_html__('Categories', 'nest-addons')
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'public'             => true,
		'publicly_queryable' => true,
		'show_in_rest' => true,
		'rewrite' => array( 'slug' => 'header_category' )
	);
	register_taxonomy('header_category', array('header'), $args);
	//add new taxonomy NOT hierarchical
}

}
?>