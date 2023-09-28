<?php
/**
 * Excerpt
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_excerpt_options',
	array(
		'panel' => 'business_vibes_theme_options',
		'title' => esc_html__( 'Excerpt', 'business-vibes' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'business_vibes_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'business_vibes_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'business-vibes' ),
		'section'     => 'business_vibes_excerpt_options',
		'settings'    => 'business_vibes_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'step' => 1,
		),
	)
);

// Excerpt - Read More Text.
$wp_customize->add_setting(
	'business_vibes_excerpt_more_text',
	array(
		'default'           => esc_html__( 'Read More', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_excerpt_more_text',
	array(
		'label'    => esc_html__( 'Read More Text', 'business-vibes' ),
		'section'  => 'business_vibes_excerpt_options',
		'settings' => 'business_vibes_excerpt_more_text',
		'type'     => 'text',
	)
);
