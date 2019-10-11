<?php
/**
 * Widgets section
 */
Kirki::add_section( 'widgets', array(
	'title'          => esc_attr__( 'Widgets', 'boosted' ),
	'priority'       => 25,
	'panel'          => 'appearance'
) );

/**
 * Widget title
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'typography',
	'settings'    => 'widgets_title',
	'label'       => esc_attr__( 'Widget Title', 'boosted' ),
	'section'     => 'widgets',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '500',
		'font-size'      => '16px',
		'letter-spacing' => '0',
		'color'          => '#2d3142',
		'text-transform' => 'uppercase'
	),
	'output'       => array(
		array(
			'element'  => '.widget-area .widget-title'
		),
	),
) );

/**
 * Widget title spacing
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'widgets_title_spacing',
	'label'       => esc_attr__( 'Title Spacing', 'boosted' ),
	'description' => esc_attr__( 'Widget title margin bottom.', 'boosted' ),
	'section'     => 'widgets',
	'default'     => '20',
	'choices'      => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.widget-area .widget-title',
			'property' => 'margin-bottom',
			'units'    => 'px',
			'exclude'  => array( '20' )
		),
	),
	'transport'    => 'postMessage',
	'js_vars'      => array(
		array(
			'element'  => '.widget-area .widget-title',
			'property' => 'margin-bottom',
			'units'    => 'px',
			'function' => 'css',
		),
	),
) );

/**
 * Widget spacing
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'widgets_spacing',
	'label'       => esc_attr__( 'Widget Spacing', 'boosted' ),
	'description' => esc_attr__( 'The space between widgets', 'boosted' ),
	'section'     => 'widgets',
	'default'     => '80',
	'choices'      => array(
		'min'  => 20,
		'max'  => 100,
		'step' => 5,
	),
	'output'      => array(
		array(
			'element'  => '.widget',
			'property' => 'margin-bottom',
			'units'    => 'px',
			'exclude'  => array( '80' )
		),
	),
	'transport'    => 'postMessage',
	'js_vars'      => array(
		array(
			'element'  => '.widget',
			'property' => 'margin-bottom',
			'units'    => 'px',
			'function' => 'css',
		),
	),
) );
