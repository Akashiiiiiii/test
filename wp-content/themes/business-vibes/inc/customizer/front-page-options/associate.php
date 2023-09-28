<?php
/**
 * Associate Section
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_associate_section',
	array(
		'panel'    => 'business_vibes_front_page_options',
		'title'    => esc_html__( 'Associate Section', 'business-vibes' ),
		'priority' => 90,
	)
);

// Associate Section - Enable Section.
$wp_customize->add_setting(
	'business_vibes_enable_associate_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_associate_section',
		array(
			'label'    => esc_html__( 'Enable Associate Section', 'business-vibes' ),
			'section'  => 'business_vibes_associate_section',
			'settings' => 'business_vibes_enable_associate_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'business_vibes_enable_associate_section',
		array(
			'selector' => '#business_vibes_associate_section .section-link',
			'settings' => 'business_vibes_enable_associate_section',
		)
	);
}

for ( $i = 1; $i <= 5; $i++ ) {

	// Associate Section - Logo.
	$wp_customize->add_setting(
		'business_vibes_associate_logo_' . $i,
		array(
			'sanitize_callback' => 'business_vibes_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'business_vibes_associate_logo_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Logo %d', 'business-vibes' ), $i ),
				'section'         => 'business_vibes_associate_section',
				'settings'        => 'business_vibes_associate_logo_' . $i,
				'active_callback' => 'business_vibes_is_associate_section_enabled',
			)
		)
	);

	// Associate Section - Logo URL.
	$wp_customize->add_setting(
		'business_vibes_associate_logo_url_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'business_vibes_associate_logo_url_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Logo URL %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_associate_section',
			'settings'        => 'business_vibes_associate_logo_url_' . $i,
			'type'            => 'url',
			'active_callback' => 'business_vibes_is_associate_section_enabled',
		)
	);

}
