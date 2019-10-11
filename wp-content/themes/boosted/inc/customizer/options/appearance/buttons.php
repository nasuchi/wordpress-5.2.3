<?php
/**
 * Buttons section
 */
Kirki::add_section( 'buttons', array(
	'title'          => esc_attr__( 'Buttons', 'boosted' ),
	'priority'       => 15,
	'panel'          => 'appearance'
) );

/**
 * Button text
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'typography',
	'settings'    => 'btn_text',
	'label'       => esc_attr__( 'Typography', 'boosted' ),
	'section'     => 'buttons',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '700',
		'font-size'      => '13px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'text-transform' => 'uppercase'
	),
	'output'       => array(
		array(
			'element'  => boosted_button_selector()
		),
	),
) );

/**
 * Button color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'btn_color',
	'label'       => esc_attr__( 'Color', 'boosted' ),
	'section'     => 'buttons',
	'default'     => '#2d3142',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'color',
			'exclude'  => array( '#2d3142' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Button color: Hover
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'btn_color_hover',
	'label'       => esc_attr__( 'Color: Hover', 'boosted' ),
	'section'     => 'buttons',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => implode( ':hover, ', boosted_button_selector() ),
			'property' => 'color',
			'exclude'  => array( '#ffffff' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => implode( ':hover, ', boosted_button_selector() ),
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Button background color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'btn_bg_color',
	'label'       => esc_attr__( 'Background Color', 'boosted' ),
	'section'     => 'buttons',
	'default'     => '',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'background-color'
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );

/**
 * Button background color: Hover
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'btn_bg_hover',
	'label'       => esc_attr__( 'Background Color: Hover', 'boosted' ),
	'section'     => 'buttons',
	'default'     => '#2d3142',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => implode( ':hover, ', boosted_button_selector() ),
			'property' => 'background-color',
			'exclude'  => array( '#2d3142' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => implode( ':hover, ', boosted_button_selector() ),
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );

/**
 * Button border color
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'btn_border_color',
	'label'       => esc_attr__( 'Border Color', 'boosted' ),
	'section'     => 'buttons',
	'default'     => '#2d3142',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'border-color',
			'exclude'  => array( '#2d3142' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'border-color',
			'function' => 'css',
		),
	),
) );

/**
 * Button border color: Hover
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'color',
	'settings'    => 'btn_border_color_hover',
	'label'       => esc_attr__( 'Border Color: Hover', 'boosted' ),
	'section'     => 'buttons',
	'default'     => '#2d3142',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => implode( ':hover, ', boosted_button_selector() ),
			'property' => 'border-color',
			'exclude'  => array( '#2d3142' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => implode( ':hover, ', boosted_button_selector() ),
			'property' => 'border-color',
			'function' => 'css',
		),
	),
) );

/**
 * Button border width
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'btn_border',
	'label'       => esc_attr__( 'Button Border', 'boosted' ),
	'description' => esc_attr__( 'Control the width of the border.', 'boosted' ),
	'section'     => 'buttons',
	'default'     => '2',
	'choices'      => array(
		'min'  => 0,
		'max'  => 5,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'border-width',
			'units'    => 'px',
			'exclude'  => array( '2' )
		),
		array(
			'element'       => boosted_button_selector(),
			'property'      => 'border-style',
			'value_pattern' => 'solid',
			'exclude'       => array( '2' )
		),
	),
	'transport'    => 'postMessage',
	'js_vars'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'border-width',
			'units'    => 'px',
			'function' => 'css',
		),
	),
) );

/**
 * Button height
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'btn_height',
	'label'       => esc_attr__( 'Button Height', 'boosted' ),
	'description' => esc_attr__( 'Control the padding in pixels above and below your button text.', 'boosted' ),
	'section'     => 'buttons',
	'default'     => '15',
	'choices'      => array(
		'min'  => 0,
		'max'  => 30,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'padding-top',
			'units'    => 'px',
			'exclude'  => array( '15' )
		),
		array(
			'element'  => boosted_button_selector(),
			'property' => 'padding-bottom',
			'units'    => 'px',
			'exclude'  => array( '15' )
		),
	),
	'transport'    => 'postMessage',
	'js_vars'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'padding-top',
			'units'    => 'px',
			'function' => 'css',
		),
		array(
			'element'  => boosted_button_selector(),
			'property' => 'padding-bottom',
			'units'    => 'px',
			'function' => 'css',
		),
	),
) );

/**
 * Button width
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'btn_width',
	'label'       => esc_attr__( 'Button Width', 'boosted' ),
	'description' => esc_attr__( 'Control the padding in pixels to the left and right of your button text.', 'boosted' ),
	'section'     => 'buttons',
	'default'     => '53',
	'choices'      => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'padding-left',
			'units'    => 'px',
			'exclude'  => array( '53' )
		),
		array(
			'element'  => boosted_button_selector(),
			'property' => 'padding-right',
			'units'    => 'px',
			'exclude'  => array( '53' )
		),
	),
	'transport'    => 'postMessage',
	'js_vars'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'padding-left',
			'units'    => 'px',
			'function' => 'css',
		),
		array(
			'element'  => boosted_button_selector(),
			'property' => 'padding-right',
			'units'    => 'px',
			'function' => 'css',
		),
	),
) );

/**
 * Button border radius
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'btn_radius',
	'label'       => esc_attr__( 'Button Shape', 'boosted' ),
	'description' => esc_attr__( 'Control the shape of the button.', 'boosted' ),
	'section'     => 'buttons',
	'default'     => '50',
	'choices'      => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'border-radius',
			'units'    => 'px',
			'exclude'  => array( '50' )
		),
	),
	'transport'    => 'postMessage',
	'js_vars'      => array(
		array(
			'element'  => boosted_button_selector(),
			'property' => 'border-radius',
			'units'    => 'px',
			'function' => 'css',
		),
	),
) );
