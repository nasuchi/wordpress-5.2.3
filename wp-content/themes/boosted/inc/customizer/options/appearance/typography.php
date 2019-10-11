<?php
/**
 * Typography section
 */
Kirki::add_section( 'typography', array(
	'title'          => esc_attr__( 'Global Typography', 'boosted' ),
	'priority'       => 5,
	'panel'          => 'appearance'
) );

/**
 * Body text
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'typography',
	'settings'    => 'body_text',
	'label'       => esc_attr__( 'Body Text', 'boosted' ),
	'section'     => 'typography',
	'default'     => array(
		'font-family'    => 'Noto Sans',
		'variant'        => 'regular',
		'font-size'      => '17px',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output'       => array(
		array(
			'element'  => 'body'
		),
	),
) );

/**
 * Heading text
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'typography',
	'settings'    => 'heading_text',
	'label'       => esc_attr__( 'Heading Text', 'boosted' ),
	'section'     => 'typography',
	'default'     => array(
		'font-family'    => 'Poppins',
		'variant'        => '700',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output'       => array(
		array(
			'element'  => boosted_heading_selector()
		),
	),
) );
