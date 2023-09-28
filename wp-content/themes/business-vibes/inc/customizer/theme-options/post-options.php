<?php
/**
 * Post Options
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'business-vibes' ),
		'panel' => 'business_vibes_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'business_vibes_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'business-vibes' ),
			'section' => 'business_vibes_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'business_vibes_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'business-vibes' ),
			'section' => 'business_vibes_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'business_vibes_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'business-vibes' ),
			'section' => 'business_vibes_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'business_vibes_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'business-vibes' ),
			'section' => 'business_vibes_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'business_vibes_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'business-vibes' ),
		'section'  => 'business_vibes_post_options',
		'settings' => 'business_vibes_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'business_vibes_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'business-vibes' ),
			'section' => 'business_vibes_post_options',
		)
	)
);
