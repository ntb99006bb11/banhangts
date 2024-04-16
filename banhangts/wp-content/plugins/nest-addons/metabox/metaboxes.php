<?php
if ( ! function_exists( "nest_add_metaboxes" ) ) {
	function nest_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'product.php',
			'post.php'
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( NEST_ADDONS_DIR . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/nest_theme_mod/boxes", "nest_add_metaboxes" );
}

