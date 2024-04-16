<?php
/*================================
-------Nest Demo Content----------
================================*/
 function  nest_main_demo_importers_mained() {
  return array(
    array(
      'import_file_name'           => 'Nest Demo (Home 1 , 2 , 3 & Innerpages)',
      'local_import_file'            => trailingslashit(get_template_directory()) . 'includes/Demo_content/demo-content-1/democontent.xml',  
      'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'includes/Demo_content/demo-content-1/widgets.wie',
      'local_import_redux'               => array(
        array(
        'file_path'   => trailingslashit(get_template_directory()) . 'includes/Demo_content/demo-content-1/redux.json',
        'option_name' => 'nest_theme_mod',
        ),
      ),
      'import_preview_image_url'     => get_template_directory_uri() . '/includes/Demo_content/demo-content-1/screenshot.jpg',
      'import_notice'              => __( 'Please keep patients while importing sample data.', 'steelthemes-nest' ),
      'preview_url'                => 'https://themepanthers.com/wp/nest/d1/',
    ),
    array(
      'import_file_name'           => 'Nest Demo (Home 4 , 5 , 6)',
      'local_import_file'            => trailingslashit(get_template_directory()) . 'includes/Demo_content/demo-content-2/demo-content-2.xml',
      'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'includes/Demo_content/demo-content-2/widget-2.wie',
      'local_import_redux'               => array(
        array(
        'file_path'   => trailingslashit(get_template_directory())  . 'includes/Demo_content/demo-content-2/redux-2.json',
        'option_name' => 'nest_theme_mod',
        ),
      ),
      'import_preview_image_url'     => get_template_directory_uri() . '/includes/Demo_content/demo-content-2/screenshot-2.jpg',
      'import_notice'              => __( 'Please keep patients while importing sample data.', 'steelthemes-nest' ),
      'preview_url'                => 'https://themepanthers.com/wp/nest/d2/',
    ),
    array(
      'import_file_name'           => 'Nest Demo (Home 7 , 8)',
      'local_import_file'            => trailingslashit(get_template_directory()) . 'includes/Demo_content/demo-content-3/demo-content-3.xml',
      'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'includes/Demo_content/demo-content-3/widget-3.wie',
      'local_import_redux'               => array(
        array(
        'file_path'   => trailingslashit(get_template_directory())  . 'includes/Demo_content/demo-content-3/redux-3.json',
        'option_name' => 'nest_theme_mod',
        ),
      ), 
      'import_preview_image_url'     => get_template_directory_uri() . '/includes/Demo_content/demo-content-3/screenshot.jpg',
      'import_notice'              => __( 'Please keep patients while importing sample data.', 'steelthemes-nest' ),
      'preview_url'                => 'https://themepanthers.com/wp/nest/d2/',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'nest_main_demo_importers_mained');
/*
** ============================== 
**   nest_after_imports
** ==============================
*/ 
  function  nest_after_imports_mained() {
  $top_menu = get_term_by('primary', 'primary', 'wp_nav_menu'); 
  set_theme_mod( 'nav_menu_locations' , array( 
        'primary' => $top_menu->term_id, 
      ) 
  );
  //Set Front page
  $page = get_page_by_title( 'Home');
  $blogpage = get_page_by_title( 'Blog');
  if ( isset( $page->ID ) ) {
    update_option( 'page_on_front', $page->ID );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_for_posts', $blogpage->ID );
  }
}
 
add_action( 'pt-ocdi/after_import', 'nest_after_imports_mained' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );




