<?php
if (!function_exists('nest_get_product_post_id')){
	add_action( 'wp_ajax_nest_get_product_post_id', 'nest_get_product_post_id' );
	add_action( 'wp_ajax_nopriv_nest_get_product_post_id', 'nest_get_product_post_id' );
	function nest_get_product_post_id() {
		$nest_search_get = isset( $_POST['q'] ) ? sanitize_text_field( wp_unslash( $_POST['q'] ) ) : ''; 
		$post_type     = isset( $_POST['post_type'] ) ? $_POST['post_type'] : 'post'; 
		$options       = array();

		$query = new WP_Query(
			array(
				's'              => $nest_search_get,
				'post_type'      => $post_type,
				'posts_per_page' => - 1,
			)
		);

		if ( ! isset( $query->posts ) ) {
			return;
		}

		foreach ( $query->posts as $post ) {
			$options[] = array(
				'id'   => $post->ID,
				'text' => $post->post_title,
			);
		}

		wp_send_json( $options );
	}
}
