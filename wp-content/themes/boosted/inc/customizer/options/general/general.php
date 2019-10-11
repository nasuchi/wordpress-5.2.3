<?php
/**
 * General panel
 */
Kirki::add_panel( 'general', array(
	'title'          => esc_attr__( 'General', 'boosted' ),
	'description'    => esc_attr__( 'Customize general elements of the theme.', 'boosted' ),
	'priority'       => 130,
) );

/**
 * General section
 */
Kirki::add_section( 'general_settings', array(
	'title'          => esc_attr__( 'General Settings', 'boosted' ),
	'priority'       => 1,
	'panel'          => 'general'
) );

/**
 * Loading
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'loading',
	'label'       => esc_attr__( 'Page Loading', 'boosted' ),
	'description' => esc_attr__( 'Enable page loading animation.', 'boosted' ),
	'section'     => 'general_settings',
	'default'     => '1',
) );
