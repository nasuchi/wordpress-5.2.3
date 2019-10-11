<?php
/**
 * Helper functions
 */

if ( ! function_exists( 'boosted_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 */
	function boosted_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
		}
	}

	add_action( 'wp_head', 'boosted_pingback_header' );

endif;

if ( ! function_exists( 'boosted_body_classes' ) ) :
	/**
	 * Adds classes to the body tag
	 */
	function boosted_body_classes( $classes ) {

		// Vars
		$post_layout  = boosted_post_layout();
		$container    = get_theme_mod( 'container_style', 'full-width' );
		$post_style   = get_theme_mod( 'post_style', 'grid' );
		$header_style = get_theme_mod( 'header_variation', 'variation-one' );

		// RTL
		if ( is_rtl() ) {
			$classes[] = 'rtl';
		}

		// Main class
		$classes[] = 'boosted-theme';

		// Container style
		$classes[] = $container . '-container';

		// Header style
		$classes[] = 'header-' . $header_style;

		// Sidebar enabled
		if ( 'left-sidebar' == $post_layout
			|| 'right-sidebar' == $post_layout ) {
			$classes[] = 'has-sidebar';
		}

		// Content layout
		if ( $post_layout ) {
			$classes[] = $post_layout;
		}

		// Has featured image.
		if ( is_singular() && has_post_thumbnail() ) {
			$classes[] = 'has-featured-image';
		}

		// Content style
		if ( is_home()
			|| is_category()
			|| is_tag()
			|| is_date()
			|| is_author() ) {
			$classes[] = 'post-style-' . $post_style;
		}

		// Return classes
		return $classes;

	}

	add_filter( 'body_class', 'boosted_body_classes' );

endif;

if ( ! function_exists( 'boosted_post_layout' ) ) :
	/**
	 * Returns correct post layout.
	 */
	function boosted_post_layout() {

		// Define variables
		$class  = 'right-sidebar';
		$meta   = get_post_meta( get_the_ID(), 'tj_extras_post_layout', true );

		// Check meta first to override and return (prevents filters from overriding meta)
		if ( is_singular() && $meta ) {
			return $meta;
		}

		// Singular Page
		if ( is_page() ) {

			// Attachment
			if ( is_attachment() && wp_attachment_is_image() ) {
				$class = 'full-width';
			}

			// All other pages
			else {
				$class = get_theme_mod( 'page_layout', 'right-sidebar' );
			}

		}

		// Home
		elseif ( is_home()
			|| is_category()
			|| is_tag()
			|| is_date()
			|| is_author() ) {
			$class = get_theme_mod( 'post_layout', 'right-sidebar' );
		}

		// Singular Post
		elseif ( is_singular( 'post' ) ) {
			$class = get_theme_mod( 'post_layout', 'right-sidebar' );
		}

		// Library and Elementor template
		elseif ( is_singular( 'tj_library' )
    			|| is_singular( 'elementor_library' ) ) {
			$class = 'full-width';
		}

		// 404 page
		elseif ( is_404() ) {
			$class = 'full-width-narrow';
		}

		// Event archive page
		elseif ( is_post_type_archive( 'tribe_events' ) ) {
			$class = 'full-width';
		}

		// All else
		else {
			$class = 'right-sidebar';
		}

		// Class should never be empty
		if ( empty( $class ) ) {
			$class = 'right-sidebar';
		}

		// Apply filters and return
		return apply_filters( 'boosted_post_layout_class', $class );

	}

endif;

if ( ! function_exists( 'boosted_get_sidebar' ) ) :
	/**
	 * Returns the correct sidebar region.
	 */
	function boosted_get_sidebar( $sidebar = 'primary' ) {

		// Return the correct sidebar name & add useful hook
		$sidebar = apply_filters( 'boosted_get_sidebar', $sidebar );

		// Check meta option after filter so it always overrides
		if ( $meta = get_post_meta( get_the_ID(), 'tj_extras_sidebar', true ) ) {
			$sidebar = $meta;
		}

		// WooCommerce
		if ( boosted_is_woocommerce_activated() ) {
			if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
				$sidebar = 'woo_sidebar';
			}
		}

		// Never show empty sidebar
		if ( ! is_active_sidebar( $sidebar ) ) {
			$sidebar = 'primary';
		}

		return $sidebar;
	}
endif;

if ( ! function_exists( 'boosted_header' ) ) {
	/**
	 * Header template
	 */
	function boosted_header() {

		$header = get_theme_mod( 'header_style', 'default' );
		$meta   = get_post_meta( get_the_ID(), 'tj_extras_custom_header_template', true );

		// Check meta option first.
		if ( $meta && is_singular() ) {
			boosted_get_custom_header();
		} elseif ( 'default' != $header ) {
			boosted_get_custom_header();
		} else {
			get_template_part( 'partials/header/header' );
		}

	}

	add_action( 'boosted_header', 'boosted_header' );

}

if ( ! function_exists( 'boosted_get_custom_header' ) ) :
	/**
	 * Get custom header template
	 */
	function boosted_get_custom_header() {

		// Sets up empty variable
		$id = '';

		// Get the template ID
		$id = get_theme_mod( 'header_template', '0' );

		// Get the template ID from metabox
		if ( $meta = get_post_meta( get_the_ID(), 'tj_extras_custom_header_template', true ) ) {
			$id = $meta;
		}

		if ( $id ) {
			$args = array(
				'post_type' => 'tj_library',
				'p'         => $id
			);
			$loop = new WP_Query ($args );

			while ( $loop->have_posts() ) : $loop->the_post();
				global $post;
				the_content();
			endwhile;

			wp_reset_postdata();
		}

	}

endif;

if ( ! function_exists( 'boosted_footer' ) ) {
	/**
	 * Footer template
	 */
	function boosted_footer() {

		$footer = get_theme_mod( 'footer_style', 'default' );
		$meta   = get_post_meta( get_the_ID(), 'tj_extras_custom_footer_template', true );

		// Check meta option first.
		if ( $meta && is_singular() ) {
			boosted_get_custom_footer();
		} elseif ( 'default' != $footer ) {
			boosted_get_custom_footer();
		} else {
			get_template_part( 'sidebar', 'footer' );
		}

	}

	add_action( 'boosted_footer', 'boosted_footer' );

}

if ( ! function_exists( 'boosted_get_custom_footer' ) ) :
	/**
	 * Get custom footer template
	 */
	function boosted_get_custom_footer(){

		// Sets up empty variable
		$id = '';

		// Get the template ID
		$id = get_theme_mod( 'footer_template', '0' );

		// Get the template ID from metabox
		if ( $meta = get_post_meta( get_the_ID(), 'tj_extras_custom_footer_template', true ) ) {
			$id = $meta;
		}

		if ( $id ){
			$args = array(
				'post_type' => 'tj_library',
				'p'=> $id
			);
			$loop = new WP_Query ($args );

			while ( $loop->have_posts() ) : $loop->the_post();
				global $post;
				the_content();
			endwhile;

			wp_reset_postdata();
		}

	}

endif;

if ( ! function_exists( 'boosted_archive_header' ) ) :
	/**
	 * Archive header informations.
	 */
	function boosted_archive_header() {
		?>

		<?php if ( is_archive() && !is_search() ) : ?>
			<div class="archive-header">
				<div class="archive-content">
					<?php if ( is_author() ) echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
					<?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
				</div>
			</div><!-- .archive-header -->
		<?php endif; ?>

		<?php if ( is_search() ) : ?>
			<div class="archive-header">
				<div class="archive-content">
					<span class="browse"><?php esc_html_e( 'Search Results for', 'boosted' ); ?></span>
					<h1 class="archive-title"><?php echo get_search_query(); ?></h1>
				</div>
			</div><!-- .archive-header -->
		<?php endif; ?>

		<?php if ( boosted_is_woocommerce_activated() ) : ?>
			<?php if ( is_cart() ) : ?>
				<div class="archive-header">
					<h1 class="archive-title"><?php esc_html_e( 'Cart', 'boosted' ); ?></h1>
				</div><!-- .archive-header -->
			<?php endif; ?>

			<?php if ( is_wc_endpoint_url( 'order-received' ) ) : ?>
				<div class="archive-header">
					<h1 class="archive-title"><?php esc_html_e( 'Order Received', 'boosted' ); ?></h1>
				</div><!-- .archive-header -->
			<?php endif; ?>

			<?php if ( is_checkout() && ! is_wc_endpoint_url( 'order-received' ) ) : ?>
				<div class="archive-header">
					<h1 class="archive-title"><?php esc_html_e( 'Checkout', 'boosted' ); ?></h1>
				</div><!-- .archive-header -->
			<?php endif; ?>

			<?php if ( is_account_page() ) : ?>
				<div class="archive-header">
					<?php the_title( '<h1 class="archive-title">', '</h1>' ); ?>
				</div><!-- .archive-header -->
			<?php endif; ?>
		<?php endif; ?>

	<?php
	}

	add_action( 'boosted_header', 'boosted_archive_header', 10 );

endif;

if ( ! function_exists( 'boosted_post_classes' ) ) :
	/**
	 * Adds custom classes to the array of post classes.
	 */
	function boosted_post_classes( $classes ) {

		// Replace hentry class with entry.
		$classes[] = 'entry';

		return $classes;
	}

	add_filter( 'post_class', 'boosted_post_classes' );

endif;

if ( ! function_exists( 'boosted_remove_hentry' ) ) :
	/**
	 * Remove 'hentry' from post_class()
	 */
	function boosted_remove_hentry( $class ) {
		$class = array_diff( $class, array( 'hentry' ) );
		return $class;
	}

	add_filter( 'post_class', 'boosted_remove_hentry' );

endif;

if ( ! function_exists( 'boosted_excerpt_more' ) ) :
	/**
	 * Change the excerpt more string.
	 */
	function boosted_excerpt_more( $more ) {
		return '&hellip;';
	}

	add_filter( 'excerpt_more', 'boosted_excerpt_more' );

endif;

if ( ! function_exists( 'boosted_custom_excerpt_length' ) ) :
	/**
	 * Filter the excerpt length.
	 */
	function boosted_custom_excerpt_length( $length ) {

		// Sets default
		$length = 20;

		// Get the user settings
		$setting = get_theme_mod( 'excerpt', 20 );
		if ( 20 != $setting ) {
			$length = $setting;
		}

		return $length;
	}

	add_filter( 'excerpt_length', 'boosted_custom_excerpt_length', 999 );

endif;

if ( ! function_exists( 'boosted_extend_archive_title' ) ) :
	/**
	 * Extend archive title
	 */
	function boosted_extend_archive_title( $title ) {
		if ( is_post_type_archive( 'product' ) ) {
			$default = get_theme_mod( 'shop_title', esc_attr__( 'Products', 'boosted' ) );
			$title = $default;
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		}
		return $title;
	}

	add_filter( 'get_the_archive_title', 'boosted_extend_archive_title' );

endif;

if ( ! function_exists( 'boosted_customize_tag_cloud' ) ) :
	/**
	 * Customize tag cloud widget
	 */
	function boosted_customize_tag_cloud( $args ) {
		$args['largest']  = 13;
		$args['smallest'] = 13;
		$args['unit']     = 'px';
		$args['number']   = 20;
		return $args;
	}

	add_filter( 'widget_tag_cloud_args', 'boosted_customize_tag_cloud' );

endif;

if ( ! function_exists( 'boosted_coupon' ) ) :
	/**
	 * Coupon
	 */
	function boosted_coupon( $content ) {

		// Set up empty variable
		$coupon = '';

		// Get the metaboxes data
		$code     = get_post_meta( get_the_ID(), 'tj_extras_coupon_code', true );
		$url      = get_post_meta( get_the_ID(), 'tj_extras_coupon_url', true );
		$position = get_post_meta( get_the_ID(), 'tj_extras_coupon_position', true );

		// Coupon markup
		$coupon = '<div class="coupon-wrapper">';
			$coupon .= '<span class="coupon-title">' . esc_html__( 'Coupon Code', 'boosted' ) . '</span>';
			$coupon .= '<form action="' . esc_url( $url ) . '" method="post" target="_blank">';
				$coupon .= '<button data-clipboard-text="' . esc_attr( $code ) . '" class="coupon-code" type="submit"><i class="fa fa-scissors"></i> ' . esc_attr( $code ) . '</button>';
			$coupon .= '</form>';
			$coupon .= '<span class="click">' . esc_html__( '(Click to Copy & Open Site)', 'boosted' ) . '</span>';
		$coupon .= '</div>';

		// Display the coupon area
		if ( $position === 'bottom' ) {
			if ( is_single() && !empty( $code ) ) {
				$content = $content . $coupon;
			} else {
				$content;
			}
		} else {
			if ( is_single() && !empty( $code ) ) {
				$content = $coupon . $content;
			} else {
				$content;
			}
		}

		return $content;

	}
	add_filter( 'the_content', 'boosted_coupon', 20 );

endif;
