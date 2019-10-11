<?php
/**
 * Blog panel
 */
Kirki::add_panel( 'blog', array(
	'title'          => esc_attr__( 'Blog', 'boosted' ),
	'description'    => esc_attr__( 'Customize the blog area of the theme.', 'boosted' ),
	'priority'       => 145,
) );

/**
 * Blog index section
 */
Kirki::add_section( 'blog_index', array(
	'title'          => esc_attr__( 'Blog Index', 'boosted' ),
	'priority'       => 1,
	'panel'          => 'blog'
) );

/**
 * Blog & archive layout
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'radio-image',
	'settings'    => 'post_layout',
	'label'       => esc_attr__( 'Blog Layout', 'boosted' ),
	'description' => esc_attr__( 'Blog including category, archive, search and tag page layout.', 'boosted' ),
	'section'     => 'blog_index',
	'default'     => 'right-sidebar',
	'choices'     => array(
		'right-sidebar'     => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/rs.png',
		'left-sidebar'      => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/ls.png',
		'full-width'        => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/fw.png',
		'full-width-narrow' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/fwn.png',
	),
) );

/**
 * Blog & archive posts style
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'select',
	'settings'    => 'post_style',
	'label'       => esc_attr__( 'Posts Style', 'boosted' ),
	'section'     => 'blog_index',
	'default'     => 'list',
	'multiple'    => 1,
	'choices'     => array(
		'default'    => esc_attr__( 'Default', 'boosted' ),
		'list'       => esc_attr__( 'List', 'boosted' ),
		'alternate'  => esc_attr__( 'Alternate', 'boosted' ),
		'grid'       => esc_attr__( 'Grid', 'boosted' )
	),
) );

/**
 * Excerpt length
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'excerpt',
	'label'       => esc_attr__( 'Excerpt Length', 'boosted' ),
	'description' => esc_attr__( 'Control the blog excerpt length.', 'boosted' ),
	'section'     => 'blog_index',
	'default'     => '20',
	'choices'      => array(
		'min'  => 20,
		'max'  => 100,
		'step' => 1,
	),
) );

/**
 * Pagination
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'radio',
	'settings'    => 'posts_pagination',
	'label'       => esc_attr__( 'Pagination', 'boosted' ),
	'description' => esc_attr__( 'Pagination for blog & archives page.', 'boosted' ),
	'section'     => 'blog_index',
	'default'     => 'traditional',
	'choices'     => array(
		'number'      => esc_attr__( 'Number', 'boosted' ),
		'traditional' => esc_attr__( 'Next / Previous', 'boosted' ),
	),
) );
