<?php
/**
 * Header section
 */
Kirki::add_section( 'mobile_menu', array(
	'title'          => esc_attr__( 'Mobile Menu', 'boosted' ),
	'priority'       => 20,
	'panel'          => 'header'
) );

/**
 * Typography
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'typography',
	'settings'    => 'mobile_menu_typography',
	'label'       => esc_attr__( 'Typography', 'boosted' ),
	'section'     => 'mobile_menu',
	'default'     => array(
		'font-family'    => 'Poppins',
		'variant'        => '600',
		'font-size'      => '16px',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output'       => array(
		array(
			'element' => '.menu-mobile-items a',
			'suffix'  => '!important'
		),
	),
) );

/**
 * Background color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_bg',
	'label'       => esc_attr__( 'Background Color', 'boosted' ),
	'section'     => 'mobile_menu',
	'default'     => '#f9f9f9',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.mobile-navigation',
			'property' => 'background-color',
			'exclude'  => array( '#f9f9f9' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.mobile-navigation',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );

/**
 * Color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_color',
	'label'       => esc_attr__( 'Color', 'boosted' ),
	'section'     => 'mobile_menu',
	'default'     => '#2d3142',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-mobile-items a',
			'property' => 'color',
			'exclude'  => array( '#2d3142' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-mobile-items a',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Color hover
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_color_hover',
	'label'       => esc_attr__( 'Color: Hover', 'boosted' ),
	'section'     => 'mobile_menu',
	'default'     => '#ef8354',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-mobile-items a:hover',
			'property' => 'color',
			'exclude'  => array( '#ef8354' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-mobile-items a:hover',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Border color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_border',
	'label'       => esc_attr__( 'Border Color', 'boosted' ),
	'section'     => 'mobile_menu',
	'default'     => '#eeeeee',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-mobile-items a',
			'property' => 'border-color',
			'exclude'  => array( '#eeeeee' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-mobile-items a',
			'property' => 'border-color',
			'function' => 'css',
		),
	),
) );

/**
 * Close toggle background color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_toggle_bg',
	'label'       => esc_attr__( 'Close Toggle Background Color', 'boosted' ),
	'section'     => 'mobile_menu',
	'default'     => '#ea6262',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.mobile-navigation .menu-mobile',
			'property' => 'background-color',
			'exclude'  => array( '#ea6262' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.mobile-navigation .menu-mobile',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );

/**
 * Close toggle color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_toggle',
	'label'       => esc_attr__( 'Close Toggle Color', 'boosted' ),
	'section'     => 'mobile_menu',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.mobile-navigation .menu-mobile',
			'property' => 'color',
			'exclude'  => array( '#ffffff' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.mobile-navigation .menu-mobile',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );
