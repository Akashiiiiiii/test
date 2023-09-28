<?php
/**
 * Footer Options
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_footer_options',
	array(
		'panel' => 'business_vibes_theme_options',
		'title' => esc_html__( 'Footer Options', 'business-vibes' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'business-vibes' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'business_vibes_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'business_vibes_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'business-vibes' ),
		'section'  => 'business_vibes_footer_options',
		'settings' => 'business_vibes_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'business_vibes_scroll_top',
	array(
		'sanitize_callback' => 'business_vibes_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'business-vibes' ),
			'section' => 'business_vibes_footer_options',
		)
	)
);
