<?php
/*
** ===================
** Nest Taxamony Brands
** version: 1.0;
** Authour : Steeltheme;
** ===================
*/
namespace Nestaddons;
if (! defined('ABSPATH' )){
	die('-1');
}
class Taxamony_brands{
   
	public function __construct() {
		add_action('init', array($this, 'nest_custom_taxonomy_brands') , 0);  
	}
    function nest_custom_taxonomy_brands()  {
    $labels = array(
        'name'                       => 'Brands',
        'singular_name'              => 'Brand',
        'menu_name'                  => 'Brands',
        'all_items'                  => 'All Brands',
        'parent_item'                => 'Parent Brand',
        'parent_item_colon'          => 'Parent Brand:',
        'new_item_name'              => 'New Brand Name',
        'add_new_item'               => 'Add New Brand',
        'edit_item'                  => 'Edit Brand',
        'update_item'                => 'Update Brand',
        'separate_items_with_commas' => 'Separate Brand with commas',
        'search_items'               => 'Search Brands',
        'add_or_remove_items'        => 'Add or remove Brands',
        'choose_from_most_used'      => 'Choose from the most used Brands',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite' => array( 'slug' => 'brands' )
    );
    register_taxonomy( 'brands', 'product', $args );
    }

}
    
?>