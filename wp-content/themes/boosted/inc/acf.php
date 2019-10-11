<?php
/**
 * Advanced custom fields
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5c6d0a3b6b333',
	'title' => esc_html__( 'Review', 'boosted' ),
	'fields' => array(
		array(
			'key' => 'field_5c6d0a5ff3251',
			'label' => esc_html__( 'Enable Review', 'boosted' ),
			'name' => 'tj_review_enable',
			'type' => 'true_false',
			'instructions' => esc_html__( 'Enable review to this post.', 'boosted' ),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => esc_html__( 'Enable', 'boosted' ),
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5c6d0b59bb291',
			'label' => esc_html__( 'Review Heading', 'boosted' ),
			'name' => 'tj_review_heading',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6d0a5ff3251',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => esc_html__( 'Review Overview', 'boosted' ),
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5c6d0be5063b2',
			'label' => esc_html__( 'Review Type', 'boosted' ),
			'name' => 'tj_review_type',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6d0a5ff3251',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'point' => esc_html__( 'Point', 'boosted' ),
				'percentage' => esc_html__( 'Percentage', 'boosted' ),
				'star' => esc_html__( 'Stars', 'boosted' ),
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'point',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5c6d4186063b3',
			'label' => esc_html__( 'Review Position', 'boosted' ),
			'name' => 'tj_review_position',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6d0a5ff3251',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'top' => esc_html__( 'Top', 'boosted' ),
				'bottom' => esc_html__( 'Bottom', 'boosted' ),
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'bottom',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5c6d4222651d3',
			'label' => esc_html__( 'Review Feature', 'boosted' ),
			'name' => 'tj_review_feature',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6d0a5ff3251',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => esc_html__( 'Add Feature', 'boosted' ),
			'sub_fields' => array(
				array(
					'key' => 'field_5c6d4254651d4',
					'label' => esc_html__( 'Name', 'boosted' ),
					'name' => 'name',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5c6d428b651d5',
					'label' => esc_html__( 'Point (1 - 10)', 'boosted' ),
					'name' => 'point',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5c6d0be5063b2',
								'operator' => '==',
								'value' => 'point',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5c6d42cc651d6',
					'label' => esc_html__( 'Percentage (1 - 100)', 'boosted' ),
					'name' => 'percentage',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5c6d0be5063b2',
								'operator' => '==',
								'value' => 'percentage',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5c6d42ea651d7',
					'label' => esc_html__( 'Star (1 - 5)', 'boosted' ),
					'name' => 'star',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5c6d0be5063b2',
								'operator' => '==',
								'value' => 'star',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
			),
		),
		array(
			'key' => 'field_5c6d44032dd35',
			'label' => esc_html__( 'Review Description', 'boosted' ),
			'name' => 'tj_review_description',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6d0a5ff3251',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5c6d44162dd36',
			'label' => esc_html__( 'Review Button Text', 'boosted' ),
			'name' => 'tj_review_button_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6d0a5ff3251',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5c6d44312dd37',
			'label' => esc_html__( 'Review Button URL', 'boosted' ),
			'name' => 'tj_review_button_url',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6d0a5ff3251',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
