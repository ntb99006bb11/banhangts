<?php
/**
 * @global $attributes
 * @global $content
 * @global $block
 */

?>

<div <?php echo wp_kses_data( get_block_wrapper_attributes() ); ?>>
	<?php
	$taxonomy = wc_get_attribute( $attributes["attributeId"] );

	if ( !empty( $taxonomy ) ) {
		$terms               = get_terms( $taxonomy->slug );
		$attribute_type      = $taxonomy->type;
		$_chosen_attributes  = WC_Query::get_layered_nav_chosen_attributes();
		$selected_terms      = isset( $_chosen_attributes[ $taxonomy->slug ]['terms'] ) ? $_chosen_attributes[ $taxonomy->slug ]['terms'] : array ();
		$display_limit       = 10;
		$display_limit_class = ( count( $terms ) > $display_limit ) ? ' enabled-filter-display-limit-mode' : '';
		$more_text_string    = apply_filters( 'woo_variation_swatches_pro_filter_item_more_text', esc_html__( 'See More', 'woo-variation-swatches-pro' ) );

		echo '<ul class="filter-items' . $display_limit_class . '" data-attribute="' . wc_attribute_taxonomy_slug( $taxonomy->slug ) . '" data-query_type="' . esc_attr( $attributes["queryType"] ) . '"  data-select_type="' . esc_attr( $attributes["selectType"] ) . '">';

		foreach ( $terms as $term ) {
			$id                      = absint( $term->term_id );
			$name                    = esc_html( $term->name );
			$slug                    = esc_html( $term->slug );
			$count                   = absint( $term->count );
			$attribute               = woo_variation_swatches_pro()->get_frontend()->get_attribute_taxonomy_by_name( $term->taxonomy );
			$current_values          = isset( $_chosen_attributes[ $taxonomy->slug ]['terms'] ) ? $_chosen_attributes[ $taxonomy->slug ]['terms'] : array ();
			$option_is_set           = in_array( $slug, $current_values );
			$filter_item_class       = sprintf( 'filter-item item-type-%1$s style-%2$s %3$s', esc_attr( $attribute_type ), woo_variation_swatches_pro()->get_option( 'shape_style', 'squared' ), ( $option_is_set ) ? 'selected' : '' );
			$global_tooltip_type     = sanitize_text_field( woo_variation_swatches_pro()->get_frontend()->get_product_attribute_tooltip_type( $id ) );
			$global_tooltip_image_id = absint( woo_variation_swatches()->get_frontend()->get_product_attribute_tooltip_image_id( $id ) );
			$global_tooltip_text     = sanitize_text_field( woo_variation_swatches()->get_frontend()->get_product_attribute_tooltip_text( $id ) );
			$filter_contents_class   = sprintf( 'filter-item-contents %s', ( 'image' === $global_tooltip_type ) ? 'wvs-has-image-tooltip' : '' );

			$html_attributes = array (
				'aria-checked' => ( $option_is_set ? 'true' : 'false' ),
				'tabindex' => ( wp_is_mobile() ? '2' : '0' ),
				'data-title' => esc_html( $name ),
				'data-wvstooltip' => esc_html( empty( $global_tooltip_text ) ? $name : $global_tooltip_text )
			);

			if ( 'image' === $global_tooltip_type && $global_tooltip_image_id > 0 ) {
				$tooltip_image_size = sanitize_text_field( woo_variation_swatches()->get_option( 'tooltip_image_size', 'variation_swatches_tooltip_size' ) );
				$tooltip_image_src  = wp_get_attachment_image_src( $global_tooltip_image_id, $tooltip_image_size );

				if ( is_array( $tooltip_image_src ) ) {
					$html_attributes['style'] = sprintf( '--tooltip-background: url(\'%s\'); --tooltip-width: %spx; --tooltip-height: %spx;', $tooltip_image_src[0], $tooltip_image_src[1], $tooltip_image_src[2] );
				}
			}

			// Color
			if ( woo_variation_swatches_pro()->get_frontend()->is_color_attribute( $attribute ) ) {
				$is_dual_color = woo_variation_swatches_pro()->get_frontend()->get_product_attribute_is_dual_color( $term );
				$primary_color = sanitize_hex_color( woo_variation_swatches_pro()->get_frontend()->get_product_attribute_primary_color( $term ) );

				if ( $is_dual_color ) {
					$secondary_color = sanitize_hex_color( woo_variation_swatches_pro()->get_frontend()->get_product_attribute_secondary_color( $term ) );
					$angle           = woo_variation_swatches_pro()->get_frontend()->get_dual_color_gradient_angle();
					$item_html       = '<span class="item item-dual-color" style="background: linear-gradient(' . esc_attr( $angle ) . ', ' . esc_attr( $secondary_color ) . ' 0%, ' . esc_attr( $secondary_color ) . ' 50%, ' . esc_attr( $primary_color ) . ' 50%, ' . esc_attr( $primary_color ) . ' 100%);"></span>';
				} else {
					$item_html = '<span class="item item-color" style="background-color: ' . esc_attr( $primary_color ) . '"></span>';
				}
			}

			// Image
			if ( woo_variation_swatches_pro()->get_frontend()->is_image_attribute( $attribute ) ) {
				$variation_image_id   = absint( woo_variation_swatches_pro()->get_frontend()->get_product_attribute_image( $term ) );
				$variation_image_size = sanitize_text_field( woo_variation_swatches()->get_option( 'attribute_image_size', 'variation_swatches_image_size' ) );
				$variation_image_url  = wp_get_attachment_image_src( $variation_image_id, $variation_image_size );
				$item_html            = '<img decoding="async" class="item item-image" aria-hidden="true" alt="' . esc_attr( $name ) . '" src="' . esc_url( $variation_image_url[0] ) . '" width="' . esc_attr( $variation_image_url[1] ) . '" height="' . esc_attr( $variation_image_url[2] ) . '">';
			}
			?>

			<li class="<?php echo esc_attr( $filter_item_class ); ?>"
				data-term="<?php echo esc_attr( $slug ); ?>">
				<div class="filter-item-wrapper">
					<div
						class="<?php echo esc_attr( $filter_contents_class ); ?>" <?php echo wc_implode_html_attributes( $html_attributes ); ?>>
						<div class="filter-item-inner">
							<?php echo wp_kses_post( $item_html ); ?>
						</div>
					</div>

					<span class="text"><?php echo esc_html( $name ) ?></span>
				</div>

				<?php
				if ( $attributes["showCount"] ) {
					echo '<span class="count">' . absint( $count ) . '</span>';
				}
				?>
			</li>
			<?php
		}

		if ( count( $terms ) > $display_limit ) {
			echo sprintf( '<li class="filter-item-more"><a style="font-size: small" href="#">%s</a></li>', $more_text_string );
		}

//		var_dump(abs( count($selected_terms) - $display_limit));

		echo "</ul>";
	}
	?>
</div>
