<?php
/**
 * Color Option
 *
 * @package Business_Vibes
 */

// Primary Color Option.
$wp_customize->add_setting(
	'business_vibes_primary_color_option',
	array(
		'default'           => 'gradient-color',
		'sanitize_callback' => 'business_vibes_sanitize_select',
	)
);

$wp_customize->add_control(
	'business_vibes_primary_color_option',
	array(
		'label'    => esc_html__( 'Select Primary Color Option', 'business-vibes' ),
		'settings' => 'business_vibes_primary_color_option',
		'type'     => 'select',
		'section'  => 'colors',
		'priority' => 5,
		'choices'  => array(
			'gradient-color' => esc_html__( 'Gradient Color', 'business-vibes' ),
			'primary-color'  => esc_html__( 'Primary Color', 'business-vibes' ),
		),
	)
);

// Primary Solid Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => '#7462FB',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'           => __( 'Solid Color', 'business-vibes' ),
			'section'         => 'colors',
			'priority'        => 5,
			'active_callback' => 'business_vibes_is_color_option_and_primary_color_enabled',
		)
	)
);
