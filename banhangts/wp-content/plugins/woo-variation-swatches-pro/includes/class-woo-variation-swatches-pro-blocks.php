<?php
    defined( 'ABSPATH' ) || exit;
    
    if ( ! class_exists( 'Woo_Variation_Swatches_Pro_Blocks' ) ) {
        class Woo_Variation_Swatches_Pro_Blocks extends Woo_Variation_Swatches_Blocks {
            
            protected static $_instance = null;
            
            protected function __construct() {
                parent::__construct();
            }
            
            public static function instance() {
                if ( is_null( self::$_instance ) ) {
                    self::$_instance = new self();
                }
                
                return self::$_instance;
            }
            
            public function get_cart_item_quantities_by_product_id( $product_id ) {
                if ( ! isset( WC()->cart ) ) {
                    return 0;
                }
                
                $cart = WC()->cart->get_cart_item_quantities();
                
                return isset( $cart[ $product_id ] ) ? $cart[ $product_id ] : 0;
            }
            
            protected function hooks() {
                parent::hooks();
                add_action( 'init', array( $this, 'register_blocks' ) );
                add_filter( 'post_class', array( $this, 'post_class_for_block' ), 20, 3 );
                add_filter( 'render_block', array( $this, 'add_class_to_price_block' ), 10, 3 );
                add_filter( 'render_block_woocommerce/product-button', array( $this, 'modify_woocommerce_product_button' ), 10, 3 );
                add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ) );
                add_filter( 'block_categories_all', array( $this, 'add_block_category' ), 10, 2 );
            }
            
            public function add_block_category( $block_categories, $block_editor_context ) {
                if ( empty( $block_editor_context->post ) ) {
                    //    return $block_categories;
                }
                
                $category = array(
                    'slug'  => 'getwooplugins',
                    'title' => esc_html__( 'GetWooPlugins', 'woo-variation-swatches-pro' ),
                    'icon'  => null,
                );
                
                array_push( $block_categories, $category );
                
                // array_unshift( $block_categories, $category );
                
                return $block_categories;
            }
            
            public function frontend_scripts() {
                
                $js_file_url = woo_variation_swatches_pro()->pro_build_url() . '/attribute-filter.js';
                $asset_file  = woo_variation_swatches_pro()->pro_build_path() . '/attribute-filter.asset.php';
                $asset       = include $asset_file;
                
                $filter_query_var_prefix     = defined( '\Automattic\WooCommerce\Blocks\BlockTypes\AttributeFilter::FILTER_QUERY_VAR_PREFIX' ) ? \Automattic\WooCommerce\Blocks\BlockTypes\AttributeFilter::FILTER_QUERY_VAR_PREFIX : 'filter_';
                $query_type_query_var_prefix = defined( '\Automattic\WooCommerce\Blocks\BlockTypes\AttributeFilter::FILTER_QUERY_VAR_PREFIX' ) ? \Automattic\WooCommerce\Blocks\BlockTypes\AttributeFilter::QUERY_TYPE_QUERY_VAR_PREFIX : 'query_type_';
                
                wp_register_script( 'woo-variation-swatches-attribute-filter', $js_file_url, $asset[ 'dependencies' ], $asset[ 'version' ], true );
                wp_localize_script( 'woo-variation-swatches-attribute-filter', 'attribute_filter_block_data', array(
                    'filter'     => $filter_query_var_prefix,
                    'query_type' => $query_type_query_var_prefix
                ) );
            }
            
            public function post_class_for_block( $classes, $class = '', $post_id = 0 ) {
                
                if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ), true ) ) {
                    return $classes;
                }
                
                $product = wc_get_product( $post_id );
                
                if ( ! $product ) {
                    return $classes;
                }
                
                // @TODO: Variable / Variation
                
                if ( $product->is_type( 'variable' ) ) {
                    $loop_name = wc_get_loop_prop( 'name' );
                    
                    //if ( is_archive() || ! empty( $loop_name ) ) {
                    $classes[] = 'wvs-archive-product-wrapper';
                    //}
                }
                
                return $classes;
            }
            
            public function register_blocks() {
                register_block_type( woo_variation_swatches_pro()->pro_build_path() . '/variation-swatches' );
                register_block_type( woo_variation_swatches_pro()->pro_build_path() . '/attribute-filter' );
            }
            
            public function add_class_to_price_block( $block_content, $block, $WP_Block ) {
                
                if ( $block[ 'blockName' ] === 'woocommerce/product-price' ) {
                    $processor = new WP_HTML_Tag_Processor( $block_content );
                    if ( $processor->next_tag( array( 'class_name' => 'wc-block-components-product-price' ) ) ) {
                        $processor->add_class( 'price' );
                        
                        return $processor->get_updated_html();
                    }
                }
                
                return $block_content;
                
            }
            
            public function modify_woocommerce_product_button( $content, $block, $WP_Block ) {
                
                $context = $WP_Block->context;
                //$attributes = $block[ 'attrs' ];
                // $post_type  = sanitize_text_field( $context[ 'postType' ] );
                $post_id = absint( $context[ 'postId' ] );
                
                $product = wc_get_product( $post_id );
                
                if ( ! $product ) {
                    return $content;
                }
                
                if ( ! $product->is_type( 'variable' ) ) {
                    return $content;
                }
                
                $content = new WP_HTML_Tag_Processor( $content );
                $content->next_tag();
                $content->remove_attribute( 'data-wc-interactive' );
                $content = $content->get_updated_html();
                
                return str_replace( '</a>', '</a>' . $this->get_view_cart_html(), $content );
            }
            
            /**
             * Get the view cart link html.
             *
             * @return string The view cart html.
             */
            public function get_view_cart_html() {
                return sprintf( '<span class="wvs-has-block-enabled wvs-hide-view-cart-link">
				<a
					href="%1$s"
					class="added_to_cart wc_forward"
					title="%2$s"
				>
					%2$s
				</a>
			</span>', wc_get_cart_url(), __( 'View cart', 'woocommerce' ) );
            }
        }
    }