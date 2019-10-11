<?php
/**
 * Demo importer custom function
 * We use https://wordpress.org/plugins/one-click-demo-import/ to import our demo content
 */

// Disable branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Define demo file
 */
function boosted_import_files() {
	return array(
		array(
			'import_file_name'             => 'Boosted',
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/dummy-data.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/customizer.dat',
			'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'screenshot.png',
			'preview_url'                  => 'https://demo.theme-junkie.com/boosted/',
		)
	);
}
add_filter( 'pt-ocdi/import_files', 'boosted_import_files' );

/**
 * After import function
 */
function boosted_after_import_setup() {

	// Assign menus to their locations.
	$primary = get_term_by( 'name', 'Main', 'nav_menu' );
	$social  = get_term_by( 'name', 'Social', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'primary' => $primary->term_id,
		'mobile'  => $primary->term_id,
		'social'  => $social->term_id
	) );

	// Assign front page.
	$front_page_id = get_page_by_title( 'Home' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'boosted_after_import_setup' );
