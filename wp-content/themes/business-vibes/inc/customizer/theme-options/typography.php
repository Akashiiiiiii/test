<?php
/**
 * Typography
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_typography',
	array(
		'panel' => 'business_vibes_theme_options',
		'title' => esc_html__( 'Typography', 'business-vibes' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'business_vibes_site_title_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'business_vibes_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'business_vibes_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'business-vibes' ),
		'section'  => 'business_vibes_typography',
		'settings' => 'business_vibes_site_title_font',
		'type'     => 'select',
		'choices'  => business_vibes_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'business_vibes_site_description_font',
	array(
		'default'           => 'Roboto',
		'sanitize_callback' => 'business_vibes_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'business_vibes_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'business-vibes' ),
		'section'  => 'business_vibes_typography',
		'settings' => 'business_vibes_site_description_font',
		'type'     => 'select',
		'choices'  => business_vibes_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'business_vibes_header_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'business_vibes_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'business_vibes_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'business-vibes' ),
		'section'  => 'business_vibes_typography',
		'settings' => 'business_vibes_header_font',
		'type'     => 'select',
		'choices'  => business_vibes_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'business_vibes_body_font',
	array(
		'default'           => 'Roboto',
		'sanitize_callback' => 'business_vibes_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'business_vibes_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'business-vibes' ),
		'section'  => 'business_vibes_typography',
		'settings' => 'business_vibes_body_font',
		'type'     => 'select',
		'choices'  => business_vibes_get_all_google_font_families(),
	)
);
