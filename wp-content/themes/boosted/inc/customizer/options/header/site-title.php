<?php
/**
 * Site title section
 */
Kirki::add_section( 'site_title', array(
	'title'          => esc_attr__( 'Site Title', 'boosted' ),
	'priority'       => 5,
	'panel'          => 'header'
) );

/**
 * Site title
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'typography',
	'settings'    => 'site_title_typography',
	'label'       => esc_attr__( 'Site Title', 'boosted' ),
	'section'     => 'site_title',
	'default'     => array(
		'font-family'    => 'Poppins',
		'variant'        => '700',
		'font-size'      => '30px',
		'letter-spacing' => '0',
		'color'          => '#2d3142',
		'text-transform' => 'uppercase'
	),
	'output'       => array(
		array(
			'element'  => '.site-title a',
			'suffix'   => '!important'
		),
	),
) );
