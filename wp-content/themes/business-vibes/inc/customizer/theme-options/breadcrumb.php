<?php
/**
 * Breadcrumb
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'business-vibes' ),
		'panel' => 'business_vibes_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'business_vibes_enable_breadcrumb',
	array(
		'sanitize_callback' => 'business_vibes_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'business-vibes' ),
			'section' => 'business_vibes_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'business_vibes_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'business_vibes_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'business-vibes' ),
		'active_callback' => 'business_vibes_is_breadcrumb_enabled',
		'section'         => 'business_vibes_breadcrumb',
	)
);
