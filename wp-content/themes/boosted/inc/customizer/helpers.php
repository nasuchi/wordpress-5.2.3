<?php
/**
 * Theme Customizer Helpers
 */

if ( ! function_exists( 'boosted_library' ) ) :
	/**
	 * Helper to load custom library
	 */
	function boosted_library( $return = NULL ) {

		// Return library templates array
		if ( 'library' == $return ) {
			$templates 		= array( '&mdash; '. esc_html__( 'Select', 'boosted' ) .' &mdash;' );
			$get_templates 	= get_posts( array( 'post_type' => 'tj_library', 'numberposts' => -1, 'post_status' => 'publish' ) );

		    if ( ! empty ( $get_templates ) ) {
		    	foreach ( $get_templates as $template ) {
					$templates[ $template->ID ] = $template->post_title;
			    }
			}

			return $templates;
		}

	}
endif;

if ( ! function_exists( 'boosted_primary_colors' ) ) :
	/**
	 * Selectors for primary color
	 */
	function boosted_primary_colors( $return ) {

		$colors = array(
			'a:hover',
			'a:visited:hover',
			'.menu a:hover',
			'.menu li:hover > a',
			'.menu .sub-menu a:hover',
			'.menu li.current-menu-item > a',
			'.more-link',
			'.more-link:visited',
			'.contact-info-widget.default i',
			'.entry-meta a:hover',
			'.entry-meta a:visited:hover',
			'.entry-content a',
			'.sidebar-footer a:hover',
			'.tag-links a',
			'.post-pagination .post-detail a',
			'.author-bio .description .name a:hover',
			'.author-bio .author-social-links a:hover',
			'.tj-custom-links li a:hover',
			'.tj-custom-links li a:hover:before',
			'.search-icon .search-toggle:hover',
			'.search-icon .search-toggle:visited:hover',
			'.post-slider .entry-title a:hover',
			'.post-featured .entry-title a:hover',
			'.post-featured-grid .entry-title a:hover',
			'.logged-in-as a'
		);

		$backgrounds = array(
			'.menu li.btn a',
			'.contact-info-widget li.skype a',
			'.author-badge',
			'.site-header-cart .cart-contents .count',
			'.cat-links.cat-bg a',
			'.review-score',
			'.review-heading',
			'.point-type .review-bar .bar',
			'.percentage-type .review-bar .bar',
			'button.mfp-close:hover'
		);

		$borders = array(
			'.menu .sub-menu li:hover',
			'.more-link'
		);

		// Return array
		if ( 'colors' == $return ) {
			return $colors;
		} elseif ( 'backgrounds' == $return ) {
			return $backgrounds;
		} elseif ( 'borders' == $return ) {
			return $borders;
		}

	}
endif;

if ( ! function_exists( 'boosted_heading_selector' ) ) :
	/**
	 * Heading selector
	 */
	function boosted_heading_selector() {

		$headings = array(
			'h1',
			'h1 a',
			'h1 a:visited',
			'h2',
			'h2 a',
			'h2 a:visited',
			'h3',
			'h3 a',
			'h3 a:visited',
			'h4',
			'h4 a',
			'h4 a:visited',
			'h5',
			'h5 a',
			'h5 a:visited',
			'h6',
			'h6 a',
			'h6 a:visited'
		);

		return $headings;
	}
endif;

if ( ! function_exists( 'boosted_button_selector' ) ) :
	/**
	 * Button selector
	 */
	function boosted_button_selector() {

		$buttons = array(
			'button',
			'input[type="button"]',
			'input[type="reset"]',
			'input[type="submit"]',
			'.button',
			'.contact-info-widget li.skype a'
		);

		return $buttons;
	}
endif;

if ( ! function_exists( 'boosted_forms_selector' ) ) :
	/**
	 * Form selector
	 */
	function boosted_forms_selector() {

		$forms = array(
			'form input[type="text"]',
			'form input[type="password"]',
			'form input[type="email"]',
			'form input[type="url"]',
			'form input[type="date"]',
			'form input[type="month"]',
			'form input[type="time"]',
			'form input[type="datetime"]',
			'form input[type="datetime-local"]',
			'form input[type="week"]',
			'form input[type="number"]',
			'form input[type="search"]',
			'form input[type="tel"]',
			'form input[type="color"]',
			'form select',
			'form textarea'
		);

		return $forms;
	}
endif;
