<?php
/**
 * Top bar section
 */
Kirki::add_section( 'top_bar', array(
	'title'          => esc_attr__( 'Top Bar', 'boosted' ),
	'priority'       => 5,
	'panel'          => 'header'
) );

/**
 * Enable top bar
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'top_bar_enable',
	'label'       => esc_attr__( 'Top Bar', 'boosted' ),
	'description' => esc_attr__( 'Enable top bar', 'boosted' ),
	'section'     => 'top_bar',
	'default'     => '1'
) );

/**
 * Enable social icons
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'top_bar_social',
	'label'       => esc_attr__( 'Social Icons', 'boosted' ),
	'description' => esc_attr__( 'Enable social icons', 'boosted' ),
	'section'     => 'top_bar',
	'default'     => '1'
) );

/**
 * Top bar text
 */
Kirki::add_field( 'boosted_options', array(
	'type'     => 'textarea',
	'settings' => 'top_bar_text',
	'label'    => esc_attr__( 'Top Bar Text', 'boosted' ),
	'section'  => 'top_bar',
	'default'  => esc_attr__( 'Customize this text ...', 'boosted' ),
	'required'    => array(
		array(
			'setting'  => 'top_bar_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Top bar background color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'top_bar_bg',
	'label'       => esc_attr__( 'Background Color', 'boosted' ),
	'section'     => 'top_bar',
	'default'     => '#2d3142',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.top-bar',
			'property' => 'background-color',
			'exclude'  => array( '#2d3142' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.top-bar',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'top_bar_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Top bar color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'top_bar_color',
	'label'       => esc_attr__( 'Text Color', 'boosted' ),
	'section'     => 'top_bar',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.top-bar',
			'property' => 'color',
			'exclude'  => array( '#ffffff' ),
		),
		array(
			'element'  => '.top-bar a',
			'property' => 'color',
			'exclude'  => array( '#ffffff' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.top-bar',
			'property' => 'color',
			'function' => 'css',
		),
		array(
			'element'  => '.top-bar a',
			'property' => 'color',
			'exclude'  => array( '#ffffff' ),
		),
	),
	'required'    => array(
		array(
			'setting'  => 'top_bar_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Top bar height
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'top_bar_height',
	'label'       => esc_attr__( 'Height', 'boosted' ),
	'description' => esc_attr__( 'Control the height of the top bar area.', 'boosted' ),
	'section'     => 'top_bar',
	'default'     => '5',
	'choices'     => array(
		'min'  => '5',
		'max'  => '25',
		'step' => '1',
	),
	'output'      => array(
		array(
			'element'  => '.top-bar',
			'property' => 'padding-top',
			'units'    => 'px',
			'exclude'  => array( '5' )
		),
		array(
			'element'  => '.top-bar',
			'property' => 'padding-bottom',
			'units'    => 'px',
			'exclude'  => array( '5' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.top-bar',
			'property' => 'padding-top',
			'units'    => 'px',
			'function' => 'css',
		),
		array(
			'element'  => '.top-bar',
			'property' => 'padding-bottom',
			'units'    => 'px',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'top_bar_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );
