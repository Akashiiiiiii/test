<?php
/**
 * Topbar Options
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_topbar_options',
	array(
		'panel' => 'business_vibes_theme_options',
		'title' => esc_html__( 'Topbar Options', 'business-vibes' ),
	)
);

// Topbar Section - Enable Section.
$wp_customize->add_setting(
	'business_vibes_enable_topbar_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_topbar_section',
		array(
			'label'    => esc_html__( 'Enable Topbar', 'business-vibes' ),
			'section'  => 'business_vibes_topbar_options',
			'settings' => 'business_vibes_enable_topbar_section',
		)
	)
);

// Topbar Options - Contact Number.
$wp_customize->add_setting(
	'business_vibes_contact_number',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_contact_number',
	array(
		'label'           => esc_html__( 'Contact Number', 'business-vibes' ),
		'section'         => 'business_vibes_topbar_options',
		'settings'        => 'business_vibes_contact_number',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_topbar_enabled',
	)
);

// Topbar Options - Email Address.
$wp_customize->add_setting(
	'business_vibes_email_address',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_email_address',
	array(
		'label'           => esc_html__( 'Email Address', 'business-vibes' ),
		'section'         => 'business_vibes_topbar_options',
		'settings'        => 'business_vibes_email_address',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_topbar_enabled',
	)
);
