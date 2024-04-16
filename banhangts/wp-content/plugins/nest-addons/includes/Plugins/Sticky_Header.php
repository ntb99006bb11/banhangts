<?php
/*
** ===================
** Nest Ecommerce Header
** Post type : Sticky Header;
** version: 1.0;
** Authour : Steeltheme;
** ===================
*/
namespace Nestaddons\Plugins;
if (! defined('ABSPATH' )){
	die('-1');
}
class Sticky_Header{
   
	public function __construct() {
		add_action('init', array($this, 'sticky_header_custom_post_type'));  
 
 
	}
	public function sticky_header_custom_post_type() {
		register_post_type( 'sticky_header',
		array(
			'labels' => array(
			'name' => esc_html_x('Sticky Headers ', 'Post Type General Name', 'nest-addons') ,
			'singular_name' => esc_html_x('Sticky Header', 'Post Type General Name', 'nest-addons') , 
			'add_new' =>  esc_html__('Add New', 'nest-addons'),
			'add_new_item' =>   esc_html__('Add New Sticky Header', 'nest-addons'),
			'edit' => esc_html__('Edit', 'nest-addons'),
			'edit_item' =>   esc_html__('Edit Sticky Header', 'nest-addons'),
			'new_item' =>   esc_html__('New Sticky Header', 'nest-addons'),
			'view' =>  esc_html__('View', 'nest-addons'),
			'view_item' =>    esc_html__('View Sticky Header', 'nest-addons'),
			'search_items' =>   esc_html__('Search Sticky Header', 'nest-addons'),
			'not_found' =>   esc_html__('No Sticky Header found', 'nest-addons'),
			'not_found_in_trash' =>  esc_html__('No Sticky Header found in Trash', 'nest-addons'),
			'parent' =>  esc_html__('Parent Sticky Header', 'nest-addons')
		),
		'public' => true,
		'show_in_rest' => true,
		'rewrite'  => array('slug' => 'sticky_header'),
		'supports' =>
		array( 'title', 
		'thumbnail' , 'editor', 'page-attributes' ),
		'taxonomies' => array( ''),
		'show_in_menu'        => 'nest-panel',
		'show_in_nav_menus'   => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-admin-generic',
		'has_archive' => false,
		'capability_type'    => 'post',
		'hierarchical'          => true,
		)
		);
	}

}
?>