<?php
/**
 * Theme functions file
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom hooks and Theme settings.
 */

if ( ! function_exists( 'boosted_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function boosted_theme_setup() {

		// Make the theme available for translation.
		load_theme_textdomain( 'boosted', trailingslashit( get_template_directory() ) . 'languages' );

		// Add custom stylesheet file to the TinyMCE visual editor.
		add_theme_support( 'editor-styles' );
		add_editor_style( array( 'assets/css/editor-style.css' ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Declare image sizes.
		add_image_size( 'boosted-post', 846, 530, true );
		add_image_size( 'boosted-post-small', 524, 350, true );
		add_image_size( 'boosted-post-large', 1170, 600, true );
		add_image_size( 'boosted-featured', 772, 675, true );
		add_image_size( 'boosted-featured-two', 740, 620, true );
		add_image_size( 'boosted-slider', 1500, 750, true );

		// Register custom navigation menu.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Navigation', 'boosted' ),
				'mobile'  => esc_html__( 'Mobile Navigation', 'boosted' ),
				'account' => esc_html__( 'My Account Navigation', 'boosted' ),
				'footer'  => esc_html__( 'Footer Navigation', 'boosted' ),
				'social'  => esc_html__( 'Social Icons', 'boosted' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'boosted_custom_background_args', array(
			'default-color' => 'f9f9f9'
		) ) );

		// Enable support for Custom Logo
		add_theme_support( 'custom-logo', array(
			'height'      => 40,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add post formats
		add_theme_support( 'post-formats', array(
			'image'
		) );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Blue', 'boosted' ),
				'slug'  => 'blue',
				'color' => '#ef8354',
			),
			array(
				'name'  => esc_html__( 'Dark Gray', 'boosted' ),
				'slug'  => 'dark-gray',
				'color' => '#2d3142',
			),
			array(
				'name'  => esc_html__( 'Light Gray', 'boosted' ),
				'slug'  => 'light-gray',
				'color' => '#f9f9f9',
			),
		) );

		// Add support for custom font sizes.
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_html__( 'Small', 'boosted' ),
				'size' => 14,
				'slug' => 'small'
			),
			array(
				'name' => esc_html__( 'Normal', 'boosted' ),
				'size' => 17,
				'slug' => 'normal'
			),
			array(
				'name' => esc_html__( 'Medium', 'boosted' ),
				'size' => 24,
				'slug' => 'medium'
			),
			array(
				'name' => esc_html__( 'Large', 'boosted' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => esc_html__( 'Huge', 'boosted' ),
				'size' => 48,
				'slug' => 'huge'
			)
		) );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

	}
endif; // boosted_theme_setup
add_action( 'after_setup_theme', 'boosted_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function boosted_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'boosted_content_width', 820 );
}
add_action( 'after_setup_theme', 'boosted_content_width', 0 );

/**
 * Sets custom content width when current layout is full-width
 */
if ( ! function_exists( 'boosted_fullwidth_content_width' ) ) :

	function boosted_fullwidth_content_width() {
		global $content_width;

		if ( in_array( boosted_post_layout(), array( 'full-width' ) ) ) {
			$content_width = 1170;
		}
	}

endif;
add_action( 'template_redirect', 'boosted_fullwidth_content_width' );

/**
 * Registers widget areas and custom widgets.
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function boosted_sidebars_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Primary', 'boosted' ),
			'id'            => 'primary',
			'description'   => esc_html__( 'Main sidebar that appears on the right.', 'boosted' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title module-title">',
			'after_title'   => '</h3>',
		)
	);

	if ( boosted_is_woocommerce_activated() ) {
		register_sidebar(
			array(
				'name'          => __( 'WooCommerce Sidebar', 'boosted' ),
				'id'            => 'woo_sidebar',
				'description'   => __( 'Widgets in this area are used in your WooCommerce sidebar for shop pages and product posts.', 'boosted' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}

	// Get the footer widget column from Customizer.
	$widget_columns = get_theme_mod( 'footer_widgets_columns', '4' );
	for ( $i = 1; $i <= $widget_columns; $i++ ) {
		register_sidebar(
			array(
				'name'          => sprintf( esc_html__( 'Footer %s', 'boosted' ), $i ),
				'id'            => 'footer-' . $i,
				'description'   => esc_html__( 'Sidebar that appears on the bottom of your site.', 'boosted' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title module-title">',
				'after_title'   => '</h3>',
			)
		);
	}

}
add_action( 'widgets_init', 'boosted_sidebars_init' );

if ( ! function_exists( 'boosted_is_elementor_activated' ) ) :
	/**
	 * Check if Elementor is active
	 */
	function boosted_is_elementor_activated() {
		return defined( 'ELEMENTOR_VERSION' );
	}
endif;

if ( ! function_exists( 'boosted_is_tj_extras_activated' ) ) :
	/**
	 * TJ Extras plugin activation checker.
	 */
	function boosted_is_tj_extras_activated() {
		return class_exists( 'TJ_Extras' ) ? true : false;
	}
endif;

if ( ! function_exists( 'boosted_is_woocommerce_activated' ) ) :
	/**
	 * Check if WooCommerce is active
	 */
	function boosted_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
endif;

if ( ! function_exists( 'boosted_is_yww_activated' ) ) {
	/**
	 * Check if YITH WooCommerce Wishlist is activated.
	 */
	function boosted_is_yww_activated() {
		return class_exists( 'YITH_WCWL' ) ? true : false;
	}
}

if ( ! function_exists( 'boosted_is_quick_view_activated' ) ) {
	/**
	 * Check if Woo Smart Quick View is activated.
	 */
	function boosted_is_quick_view_activated() {
		return class_exists( 'WPcleverWoosq' ) ? true : false;
	}
}

if ( ! function_exists( 'boosted_is_smart_compare_activated' ) ) {
	/**
	 * Check if Woo Smart Smart Compare is activated.
	 */
	function boosted_is_smart_compare_activated() {
		return class_exists( 'WPcleverWooscp' ) ? true : false;
	}
}

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Helpers functions.
 */
require trailingslashit( get_template_directory() ) . 'inc/helpers.php';

/**
 * Enqueue scripts and styles.
 */
require trailingslashit( get_template_directory() ) . 'inc/scripts.php';

/**
 * Require and recommended plugins list.
 */
require trailingslashit( get_template_directory() ) . 'inc/plugins.php';

/**
 * Demo importer
 */
require trailingslashit( get_template_directory() ) . 'inc/demo/demo-importer.php';

/**
 * Updater
 */
require trailingslashit( get_template_directory() ) . 'inc/updater.php';

/**
 * Custom review / Advanced custom fields
 */
require trailingslashit( get_template_directory() ) . 'inc/acf.php';
require trailingslashit( get_template_directory() ) . 'inc/review.php';

/**
 * Extras
 */
if ( boosted_is_tj_extras_activated() ) {
	require trailingslashit( get_template_directory() ) . 'inc/customizer/helpers.php';
	require trailingslashit( get_template_directory() ) . 'inc/customizer/customizer.php';
}

/**
 * WooCommerce integration
 */
if ( boosted_is_woocommerce_activated() ) {
	require trailingslashit( get_template_directory() ) . 'inc/woocommerce.php';
}

// Create form register
function create_user_from_registration($cfdata) {
    if (!isset($cfdata->posted_data) && class_exists('WPCF7_Submission')) {
        // Contact Form 7 version 3.9 removed $cfdata->posted_data and now
        // we have to retrieve it from an API
        $submission = WPCF7_Submission::get_instance();
        if ($submission) {
            $formdata = $submission->get_posted_data();
        }
    } elseif (isset($cfdata->posted_data)) {
        // For pre-3.9 versions of Contact Form 7
        $formdata = $cfdata->posted_data;
    } else {
        // We can't retrieve the form data
        return $cfdata;
    }
    // Check this is the user registration form
    if ( $cfdata->title() == 'Your Registration Form Title') {
        $password = wp_generate_password( 12, false );
        $email = $formdata['user_email'];
        $name = $formdata['user_login'];
        // Construct a username from the user's name
        $username = strtolower(str_replace(' ', '', $name));
        $name_parts = explode(' ',$name);
        if ( !email_exists( $email ) ) {
            // Find an unused username
            $username_tocheck = $username;
            $i = 1;
            while ( username_exists( $username_tocheck ) ) {
                $username_tocheck = $username . $i++;
            }
            $username = $username_tocheck;
            // Create the user
            $userdata = array(
                'user_login' => $username,
                'user_pass' => $password,
                'user_email' => $email,
                'nickname' => reset($name_parts),
                'display_name' => $name,
                'first_name' => reset($name_parts),
                'last_name' => end($name_parts),
                'role' => 'subscriber'
            );
            $user_id = wp_insert_user( $userdata );
            if ( !is_wp_error($user_id) ) {
                // Email login details to user
                $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
                $message = "Welcome! Your login details are as follows:" . "\r\n";
                $message .= sprintf(__('Username: %s'), $username) . "\r\n";
                $message .= sprintf(__('Password: %s'), $password) . "\r\n";
                $message .= wp_login_url() . "\r\n";
                wp_mail($email, sprintf(__('[%s] Your username and password'), $blogname), $message);
            }
        }
    }
    return $cfdata;
}
add_action('wpcf7_before_send_mail', 'create_user_from_registration', 1);