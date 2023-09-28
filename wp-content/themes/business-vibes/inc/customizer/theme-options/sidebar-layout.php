<?php
/**
 * Sidebar Option
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'business-vibes' ),
		'panel' => 'business_vibes_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'business_vibes_sidebar_position',
	array(
		'sanitize_callback' => 'business_vibes_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'business_vibes_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'business-vibes' ),
		'section' => 'business_vibes_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'business-vibes' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'business-vibes' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'business-vibes' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'business_vibes_post_sidebar_position',
	array(
		'sanitize_callback' => 'business_vibes_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'business_vibes_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'business-vibes' ),
		'section' => 'business_vibes_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'business-vibes' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'business-vibes' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'business-vibes' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'business_vibes_page_sidebar_position',
	array(
		'sanitize_callback' => 'business_vibes_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'business_vibes_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'business-vibes' ),
		'section' => 'business_vibes_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'business-vibes' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'business-vibes' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'business-vibes' ),
		),
	)
);
