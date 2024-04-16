<?php
/*
** ===================
** Nest Ecommerce Footer
** Post type : Footer;
** version: 1.0;
** Authour : Steeltheme;
** ===================
*/
namespace Nestaddons\Plugins;
if (! defined('ABSPATH' )){
	die('-1');
}
class Footer{
   
	public function __construct() {
		add_action('init', array($this, 'footer_custom_post_type'));  
		add_action('init', array($this, 'Footer_custom_taxonomies')); 
 
	}
	public function footer_custom_post_type() {
		register_post_type( 'footer',
		array(
			'labels' => array(
				'name' => esc_html_x('Footers', 'Post Type General Name', 'nest-addons') ,
				'singular_name' => esc_html_x('Footers', 'Post Type General Name', 'nest-addons') , 
				'add_new' =>  esc_html__('Add New', 'nest-addons'),
				'add_new_item' =>   esc_html__('Add New Footer', 'nest-addons'),
				'edit' => esc_html__('Edit', 'nest-addons'),
				'edit_item' =>   esc_html__('Edit Footer', 'nest-addons'),
				'new_item' =>   esc_html__('New Footer', 'nest-addons'),
				'view' =>  esc_html__('View', 'nest-addons'),
				'view_item' =>    esc_html__('View Footer', 'nest-addons'),
				'search_items' =>   esc_html__('Search Footer', 'nest-addons'),
				'not_found' =>   esc_html__('No Footer found', 'nest-addons'),
				'not_found_in_trash' =>  esc_html__('No Footer found in Trash', 'nest-addons'),
				'parent' =>  esc_html__('Parent Footer', 'nest-addons')
			),
		
			'public' => true,
			'show_in_rest' => true,
			'menu_position' => 15,
			'supports' =>
			array( 'title', 
			'thumbnail' , 'editor' , 'page-attributes' ),
			'taxonomies' => array( '' ),
			'show_in_menu'        => 'nest-panel',
			'show_in_nav_menus'   => false,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-tagcloud',
			'has_archive' => false,
			'capability_type'    => 'post',
			'hierarchical'          => true,
		)
		 
		);
	}
	public function Footer_custom_taxonomies() {

		//add new taxonomy hierarchical
		$labels = array(
			'name' =>   esc_html__('Footer Categories', 'nest-addons'),
			'singular_name' =>  esc_html__('Category', 'nest-addons'),
			'search_items' =>  esc_html__('Search Category', 'nest-addons'),
			'all_items' =>  esc_html__('All Category', 'nest-addons'),
			'parent_item' =>  esc_html__('Parent Category', 'nest-addons'),
			'parent_item_colon' =>   esc_html__('Parent Category:', 'nest-addons'),
			'edit_item' =>   esc_html__('Edit Category', 'nest-addons'),
			'update_item' =>   esc_html__('Update Category', 'nest-addons'),
			'add_new_item' =>  esc_html__('Add New Footer Category', 'nest-addons'),
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
			'rewrite' => array( 'slug' => 'footer_category' )
		);
		register_taxonomy('footer_category', array('footer'), $args);
		//add new taxonomy NOT hierarchical
	}
}

?>