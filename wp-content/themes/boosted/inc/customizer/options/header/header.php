<?php
/**
 * Header panel
 */
Kirki::add_panel( 'header', array(
	'title'          => esc_attr__( 'Header', 'boosted' ),
	'description'    => esc_attr__( 'Customize the header area of the theme.', 'boosted' ),
	'priority'       => 140,
) );

/**
 * Header section
 */
Kirki::add_section( 'header_settings', array(
	'title'          => esc_attr__( 'General', 'boosted' ),
	'priority'       => 1,
	'panel'          => 'header'
) );

/**
 * Header style
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'select',
	'settings'    => 'header_style',
	'label'       => esc_attr__( 'Style', 'boosted' ),
	'section'     => 'header_settings',
	'default'     => 'default',
	'multiple'    => 1,
	'choices'     => array(
		'default' => esc_attr__( 'Default', 'boosted' ),
		'custom'  => esc_attr__( 'Custom Header', 'boosted' )
	),
) );

/**
 * Header variations
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'select',
	'settings'    => 'header_variation',
	'label'       => esc_attr__( 'Variation', 'boosted' ),
	'section'     => 'header_settings',
	'default'     => 'variation-one',
	'choices'     => array(
		'variation-one'   => esc_attr__( 'Variation 1', 'boosted' ),
		'variation-two'   => esc_attr__( 'Variation 2', 'boosted' )
	),
	'required'    => array(
		array(
			'setting'  => 'header_style',
			'operator' => '==',
			'value'    => 'default',
		),
	),
) );

/**
 * Header custom
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'select',
	'settings'    => 'header_template',
	'label'       => esc_attr__( 'Select Template', 'boosted' ),
	'description' => esc_attr__( 'Choose a template created in Appearance > My Library.', 'boosted' ),
	'section'     => 'header_settings',
	'default'     => '0',
	'multiple'    => 1,
	'choices'     => boosted_library( 'library' ),
	'required'    => array(
		array(
			'setting'  => 'header_style',
			'operator' => '==',
			'value'    => 'custom',
		),
	),
) );

/**
 * Shadow
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'header_shadow',
	'label'       => esc_attr__( 'Shadow', 'boosted' ),
	'description' => esc_attr__( 'Enable shadow for the header.', 'boosted' ),
	'section'     => 'header_settings',
	'default'     => '0',
	'output' => array(
		array(
			'element'       => '.site-header',
			'property'      => 'box-shadow',
			'value_pattern' => '0 3px 6px rgba(0, 0, 0, 0.05)',
			'exclude'       => array( false )
		),
	),
	'required'    => array(
		array(
			'setting'  => 'header_style',
			'operator' => '==',
			'value'    => 'default',
		),
		array(
			'setting'  => 'header_variation',
			'operator' => '==',
			'value'    => 'variation-one',
		),
	),
) );

/**
 * Height
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'header_height',
	'label'       => esc_attr__( 'Height', 'boosted' ),
	'description' => esc_attr__( 'Control the height of the header.', 'boosted' ),
	'section'     => 'header_settings',
	'default'     => '12',
	'choices'     => array(
		'min'  => '8',
		'max'  => '20',
		'step' => '1',
	),
	'output'      => array(
		array(
			'element'  => '.site-header .container',
			'property' => 'min-height',
			'units'    => 'rem',
			'exclude'  => array( '12' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.site-header .container',
			'property' => 'min-height',
			'function' => 'css',
			'units'    => 'rem',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'header_style',
			'operator' => '==',
			'value'    => 'default',
		),
		array(
			'setting'  => 'header_variation',
			'operator' => '==',
			'value'    => 'variation-one',
		),
	),
) );

/**
 * Background color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'header_bg',
	'label'       => esc_attr__( 'Background Color', 'boosted' ),
	'section'     => 'header_settings',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.site-header',
			'property' => 'background-color',
			'exclude'  => array( '#ffffff' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.site-header',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'header_style',
			'operator' => '==',
			'value'    => 'default',
		),
	),
) );

/**
 * Border color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'header_border',
	'label'       => esc_attr__( 'Border Color', 'boosted' ),
	'section'     => 'header_settings',
	'default'     => '#eeeeee',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.variation-two .main-navigation',
			'property' => 'border-color',
			'exclude'  => array( '#eeeeee' ),
		),
		array(
			'element'  => '.variation-three .main-navigation',
			'property' => 'border-color',
			'exclude'  => array( '#eeeeee' ),
		),
		array(
			'element'  => '.variation-three .top-navigation',
			'property' => 'border-color',
			'exclude'  => array( '#eeeeee' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.variation-two .main-navigation',
			'property' => 'border-color',
			'function' => 'css',
		),
		array(
			'element'  => '.variation-three .main-navigation',
			'property' => 'border-color',
			'function' => 'css',
		),
		array(
			'element'  => '.variation-three .top-navigation',
			'property' => 'border-color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'header_style',
			'operator' => '==',
			'value'    => 'default',
		),
		array(
			'setting'  => 'header_variation',
			'operator' => '!=',
			'value'    => 'variation-one',
		),
	),
) );
