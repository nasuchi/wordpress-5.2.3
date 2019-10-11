<?php
/**
 * Appearance panel
 */
Kirki::add_panel( 'appearance', array(
	'title'          => esc_attr__( 'Appearance', 'boosted' ),
	'description'    => esc_attr__( 'Customize the design of the elements of the theme.', 'boosted' ),
	'priority'       => 135,
) );

/**
 * Global colors section
 */
Kirki::add_section( 'global_color', array(
	'title'          => esc_attr__( 'Global Colors', 'boosted' ),
	'priority'       => 1,
	'panel'          => 'appearance'
) );

/**
 * Primary color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'primary_color',
	'label'       => esc_attr__( 'Primary Color', 'boosted' ),
	'section'     => 'global_color',
	'default'     => '#ef8354',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => boosted_primary_colors( 'colors' ),
			'property' => 'color',
			'exclude'  => array( '#ef8354' )
		),
		array(
			'element'  => boosted_primary_colors( 'backgrounds' ),
			'property' => 'background-color',
			'exclude'  => array( '#ef8354' )
		),
		array(
			'element'  => boosted_primary_colors( 'borders' ),
			'property' => 'border-color',
			'exclude'  => array( '#ef8354' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => boosted_primary_colors( 'colors' ),
			'property' => 'color',
			'function' => 'css',
		),
		array(
			'element'  => boosted_primary_colors( 'backgrounds' ),
			'property' => 'background-color',
			'function' => 'css',
		),
		array(
			'element'  => boosted_primary_colors( 'borders' ),
			'property' => 'border-color',
			'function' => 'css',
		),
	),
) );

/**
 * Text color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'text_color',
	'label'       => esc_attr__( 'Text Color', 'boosted' ),
	'section'     => 'global_color',
	'default'     => '#2d3142',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => 'body',
			'property' => 'color',
			'exclude'  => array( '#2d3142' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => 'body',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Heading color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'heading_color',
	'label'       => esc_attr__( 'Heading Color', 'boosted' ),
	'section'     => 'global_color',
	'default'     => '#2d3142',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => boosted_heading_selector(),
			'property' => 'color',
			'exclude'  => array( '#2d3142' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => boosted_heading_selector(),
			'property' => 'color',
			'function' => 'css',
		),
	),
) );
