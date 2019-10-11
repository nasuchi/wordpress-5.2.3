<?php
/**
 * Post section
 */
Kirki::add_section( 'post', array(
	'title'          => esc_attr__( 'Single Post', 'boosted' ),
	'priority'       => 5,
	'panel'          => 'blog'
) );

/**
 * Post layout
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'radio-image',
	'settings'    => 'post_layout',
	'label'       => esc_html__( 'Post Layout', 'boosted' ),
	'description' => esc_html__( 'Single post layout.', 'boosted' ),
	'section'     => 'post',
	'default'     => 'right-sidebar',
	'choices'     => array(
		'right-sidebar'     => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/rs.png',
		'left-sidebar'      => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/ls.png',
		'full-width'        => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/fw.png',
		'full-width-narrow' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/fwn.png',
	),
) );

/**
 * Featured image
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'post_featured_image',
	'label'       => esc_attr__( 'Featured Image', 'boosted' ),
	'description' => esc_attr__( 'Enable featured image', 'boosted' ),
	'section'     => 'post',
	'default'     => '1'
) );

/**
 * Meta
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'post_meta',
	'label'       => esc_attr__( 'Post Meta', 'boosted' ),
	'description' => esc_attr__( 'Enable post meta', 'boosted' ),
	'section'     => 'post',
	'default'     => '1'
) );

/**
 * Tags
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'post_tags',
	'label'       => esc_attr__( 'Post Tags', 'boosted' ),
	'description' => esc_attr__( 'Enable post tags', 'boosted' ),
	'section'     => 'post',
	'default'     => '1'
) );

/**
 * Tags title
 */
Kirki::add_field( 'boosted_options', array(
	'type'     => 'text',
	'settings' => 'post_tags_title',
	'label'    => esc_attr__( 'Tags Title', 'boosted' ),
	'section'  => 'post',
	'default'  => esc_attr__( 'Topics', 'boosted' ),
	'required'    => array(
		array(
			'setting'  => 'post_tags',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Post navigation
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'post_navigation',
	'label'       => esc_attr__( 'Post Navigation', 'boosted' ),
	'description' => esc_attr__( 'Enable next & prev post', 'boosted' ),
	'section'     => 'post',
	'default'     => '1'
) );

/**
 * Post author box
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'post_author_box',
	'label'       => esc_attr__( 'Post Author', 'boosted' ),
	'description' => esc_attr__( 'Enable post author box', 'boosted' ),
	'section'     => 'post',
	'default'     => '1'
) );

/**
 * Post related
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'post_related',
	'label'       => esc_attr__( 'Related Posts', 'boosted' ),
	'description' => esc_attr__( 'Enable related posts', 'boosted' ),
	'section'     => 'post',
	'default'     => '1'
) );

/**
 * Post related title
 */
Kirki::add_field( 'boosted_options', array(
	'type'     => 'text',
	'settings' => 'post_related_title',
	'label'    => esc_attr__( 'Related Title', 'boosted' ),
	'section'  => 'post',
	'default'  => esc_attr__( 'You Might Also Like:', 'boosted' ),
	'required'    => array(
		array(
			'setting'  => 'post_related',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Post related number
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'slider',
	'settings'    => 'post_related_number',
	'label'       => esc_attr__( 'Related Number', 'boosted' ),
	'description' => esc_attr__( 'The number of related posts', 'boosted' ),
	'section'     => 'post',
	'default'     => '3',
	'choices'      => array(
		'min'  => 3,
		'max'  => 9,
		'step' => 1,
	),
	'required'    => array(
		array(
			'setting'  => 'post_related',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Post comment
 */
Kirki::add_field( 'boosted_options', array(
	'type'        => 'toggle',
	'settings'    => 'post_comment',
	'label'       => esc_attr__( 'Post Comment', 'boosted' ),
	'description' => esc_attr__( 'Enable post comment', 'boosted' ),
	'section'     => 'post',
	'default'     => '1'
) );
