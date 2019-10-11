<?php
/**
 * Elementor functions
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// The Metabox class
if ( ! class_exists( 'TJ_Extras_Elementor' ) ) {

	/**
	 * Elementor functions.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	final class TJ_Extras_Elementor {

		/**
		 * Sets up initial actions.
		 */
		private function setup_actions() {

			// Add new category for Elementor
			add_action( 'elementor/init', array( $this, 'elementor_init' ), 1 );

			// Add the action here so that the widgets are always visible
			add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );

			// Front-end Scripts
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'register_scripts' ) );
			add_action( 'elementor/frontend/after_register_styles', array( $this, 'register_styles' ) );

			// Preview Styles
			add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_styles' ) );

		}

		/**
		 * Add new category for Elementor.
		 */
		public function elementor_init() {

			$elementor = \Elementor\Plugin::$instance;

			// Add element category in panel
			$elementor->elements_manager->add_category(
				'tj_extras_elements',
				[
					'title' => esc_attr__( 'TJ Elements', 'tj-extras' ),
					'icon' => 'font',
				],
				1
			);
		}

		/**
		 * Register the custom Elementor widgets
		 */
		public function widgets_registered() {

			// We check if the Elementor plugin has been installed / activated.
			if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {

				// Define dir
				$dir = TE_PATH . 'inc/elementor-widgets/';

				// Array of new widgets
				$build_widgets = apply_filters( 'tj_extras_widgets', array(
					'logo'               => $dir . 'logo.php',
					'menu'               => $dir . 'menu.php',
					'search'             => $dir . 'search.php',
					'post'               => $dir . 'post.php',
					'post_list'          => $dir . 'post-list.php',
					'post_grid'          => $dir . 'post-grid.php',
					'post_alt'           => $dir . 'post-alt.php',
					'post_carousel'      => $dir . 'post-carousel.php',
					'post_slider'        => $dir . 'post-slider.php',
					'post_featured'      => $dir . 'post-featured.php',
					'post_featured_grid' => $dir . 'post-featured-grid.php',
					'events'             => $dir . 'events.php',
					'product'            => $dir . 'product.php',
				) );

				// Load files
				foreach ( $build_widgets as $widget_filename ) {
					include $widget_filename;
				}

			}

		}

		/**
		 * Register scripts
		 */
		public function register_scripts() {
			wp_register_script( 'owl-carousel', TE_URL . 'assets/js/owl.carousel.min.js', array( 'jquery' ), false, true );

			// Post carousel
			wp_register_script( 'post-carousel', TE_URL . 'assets/js/carousel.js', array( 'jquery' ), false, true );

			// Post slider
			wp_register_script( 'post-slider', TE_URL . 'assets/js/slider.js', array( 'jquery' ), false, true );
		}

		/**
		 * Register styles
		 */
		public function register_styles() {
			wp_register_style( 'owl-carousel', TE_URL . 'assets/css/owl.carousel.min.css' );
			wp_register_style( 'owl-carousel-theme', TE_URL . 'assets/css/owl.theme.default.css' );
		}

		/**
		 * Enqueue styles in the editor
		 */
		public function preview_styles() {
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel-theme' );
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public static function get_instance() {
			static $instance = null;
			if ( is_null( $instance ) ) {
				$instance = new self;
				$instance->setup_actions();
			}
			return $instance;
		}

		/**
		 * Constructor method.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function __construct() {}

	}

	TJ_Extras_Elementor::get_instance();

}
