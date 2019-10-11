<?php
/**
 * Forms section
 */
Kirki::add_section( 'forms', array(
	'title'          => esc_attr__( 'Forms', 'boosted' ),
	'priority'       => 20,
	'panel'          => 'appearance'
) );

/**
 * Forms background color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'forms_bg_color',
	'label'       => esc_attr__( 'Background Color', 'boosted' ),
	'section'     => 'forms',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => boosted_forms_selector(),
			'property' => 'background-color',
			'exclude'  => array( '#ffffff' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => boosted_forms_selector(),
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );

/**
 * Button border radius
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'forms_radius',
	'label'       => esc_attr__( 'Forms Shape', 'boosted' ),
	'description' => esc_attr__( 'Control the shape of the input.', 'boosted' ),
	'section'     => 'forms',
	'default'     => '5',
	'choices'      => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => boosted_forms_selector(),
			'property' => 'border-radius',
			'units'    => 'px',
			'exclude'  => array( '5' )
		),
	),
	'transport'    => 'postMessage',
	'js_vars'      => array(
		array(
			'element'  => boosted_forms_selector(),
			'property' => 'border-radius',
			'units'    => 'px',
			'function' => 'css',
		),
	),
) );
