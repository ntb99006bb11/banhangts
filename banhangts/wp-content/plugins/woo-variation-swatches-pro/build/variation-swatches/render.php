<?php
    defined( 'ABSPATH' ) || exit;
    
    /**
     * @var $attributes
     * @var $content
     * @var $block
     */
    
    $post_type = $block->context[ 'postType' ];
    $post_id   = $block->context[ 'postId' ];
    
    $align = sprintf( "swatches-align-%s", isset( $attributes[ 'textAlign' ] ) ? $attributes[ 'textAlign' ] : 'center' );
    
    $wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $align ) );
    
    echo '<div ' . $wrapper_attributes . '>';
    woo_variation_swatches_pro()->show_archive_page_swatches_by_id( $post_id );
    echo '</div>';
