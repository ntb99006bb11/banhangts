<?php

defined( 'ABSPATH' ) or die( 'Keep Silent' );

if ( ! class_exists( 'Woo_Variation_Swatches_Pro_Updater', false ) ):

	require_once dirname( __FILE__ ) . '/getwooplugins/class-getwooplugins-plugin-updater.php';

	class Woo_Variation_Swatches_Pro_Updater extends GetWooPlugins_Plugin_Updater {

		protected static $_instance = null;

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		public function __construct() {
			$license = sanitize_text_field( get_option( 'woo_variation_swatches_license' ) );

			$product_id = 113;

			if ( method_exists( woo_variation_swatches(), 'get_pro_product_id' ) ) {
				$product_id = absint( woo_variation_swatches()->get_pro_product_id() );
			}

			parent::__construct( WOO_VARIATION_SWATCHES_PRO_PLUGIN_FILE, $product_id, $license );
		}

		public function get_plugin_homepage() {
			return 'https://getwooplugins.com/plugins/woocommerce-variation-swatches/';
		}

		public function get_org_plugin_slug() {
			return woo_variation_swatches()->basename();
		}

		public function get_product_banners() {
			return array(
				'2x' => sprintf( 'https://ps.w.org/%s/assets/banner-1544x500.gif', $this->get_org_plugin_slug() ),
				'1x' => sprintf( 'https://ps.w.org/%s/assets/banner-772x250.gif', $this->get_org_plugin_slug() ),
			);
		}

		public function get_product_icons() {

			return array(
				'2x' => sprintf( 'https://ps.w.org/%s/assets/icon-256x256.gif', $this->get_org_plugin_slug() ),
				'1x' => sprintf( 'https://ps.w.org/%s/assets/icon-128x128.gif', $this->get_org_plugin_slug() ),
				// 'svg' => sprintf( 'https://ps.w.org/%s/assets/icon.svg', $this->get_org_plugin_slug() ),
			);
		}
	}
endif;