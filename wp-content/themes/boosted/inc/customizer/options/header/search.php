<?php
/**
 * Search section
 */
Kirki::add_section( 'search', array(
	'title'          => esc_attr__( 'Search', 'boosted' ),
	'priority'       => 25,
	'panel'          => 'header'
) );

/**
 * Search
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'search_icon',
	'label'       => esc_attr__( 'Search', 'boosted' ),
	'description' => esc_attr__( 'Enable search icon in header.', 'boosted' ),
	'section'     => 'search',
	'default'     => '1'
) );

/**
 * Search color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'search_color',
	'label'       => esc_attr__( 'Search Icon Color', 'boosted' ),
	'section'     => 'search',
	'default'     => '#2d3142',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.search-icon .search-toggle',
			'property' => 'color',
			'exclude'  => array( '#2d3142' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.search-icon .search-toggle',
			'property' => 'color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'search_icon',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );


/**
 * Custom text
 */
Kirki::add_field( 'boosted_options', array(
	'type'     => 'textarea',
	'settings' => 'custom_text_header',
	'label'    => esc_attr__( 'Custom Text', 'boosted' ),
	'section'  => 'search',
	'required' => array(
		array(
			'setting'  => 'search_icon',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

/**
 * Custom text color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'custom_text_header_color',
	'label'       => esc_attr__( 'Text Color', 'boosted' ),
	'section'     => 'search',
	'default'     => '#2d3142',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.custom-text',
			'property' => 'color',
			'exclude'  => array( '#2d3142' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.custom-text',
			'property' => 'color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'search_icon',
			'operator' => '==',
			'value'    => false,
		),
	),
) );
