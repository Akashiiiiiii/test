<?php
/**
 * Pagination
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_pagination',
	array(
		'panel' => 'business_vibes_theme_options',
		'title' => esc_html__( 'Pagination', 'business-vibes' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'business_vibes_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'business-vibes' ),
			'section'  => 'business_vibes_pagination',
			'settings' => 'business_vibes_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'business_vibes_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'business_vibes_sanitize_select',
	)
);

$wp_customize->add_control(
	'business_vibes_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'business-vibes' ),
		'section'         => 'business_vibes_pagination',
		'settings'        => 'business_vibes_pagination_type',
		'active_callback' => 'business_vibes_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'business-vibes' ),
			'numeric' => __( 'Numeric', 'business-vibes' ),
		),
	)
);
