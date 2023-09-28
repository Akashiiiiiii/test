<?php
/**
 * About Section
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_about_section',
	array(
		'panel'    => 'business_vibes_front_page_options',
		'title'    => esc_html__( 'About Section', 'business-vibes' ),
		'priority' => 20,
	)
);

// About Section - Enable Section.
$wp_customize->add_setting(
	'business_vibes_enable_about_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_about_section',
		array(
			'label'    => esc_html__( 'Enable About Section', 'business-vibes' ),
			'section'  => 'business_vibes_about_section',
			'settings' => 'business_vibes_enable_about_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'business_vibes_enable_about_section',
		array(
			'selector' => '#business_vibes_about_section .section-link',
			'settings' => 'business_vibes_enable_about_section',
		)
	);
}

// About Section - Section Subtitle.
$wp_customize->add_setting(
	'business_vibes_about_subtitle',
	array(
		'default'           => __( 'About us', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_about_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'business-vibes' ),
		'section'         => 'business_vibes_about_section',
		'settings'        => 'business_vibes_about_subtitle',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_about_section_enabled',
	)
);

// About Section - Content Type.
$wp_customize->add_setting(
	'business_vibes_about_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'business_vibes_sanitize_select',
	)
);

$wp_customize->add_control(
	'business_vibes_about_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'business-vibes' ),
		'section'         => 'business_vibes_about_section',
		'settings'        => 'business_vibes_about_content_type',
		'type'            => 'select',
		'active_callback' => 'business_vibes_is_about_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'business-vibes' ),
			'post' => esc_html__( 'Post', 'business-vibes' ),
		),
	)
);

// About Section - Content Type Post.
$wp_customize->add_setting(
	'business_vibes_about_content_post',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'business_vibes_about_content_post',
	array(
		'section'         => 'business_vibes_about_section',
		'settings'        => 'business_vibes_about_content_post',
		'label'           => esc_html__( 'Select Post', 'business-vibes' ),
		'active_callback' => 'business_vibes_is_about_section_and_content_type_post_enabled',
		'type'            => 'select',
		'choices'         => business_vibes_get_post_choices(),
	)
);

// About Section - Content Type Page.
$wp_customize->add_setting(
	'business_vibes_about_content_page',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'business_vibes_about_content_page',
	array(
		'label'           => esc_html__( 'Select Page', 'business-vibes' ),
		'section'         => 'business_vibes_about_section',
		'settings'        => 'business_vibes_about_content_page',
		'active_callback' => 'business_vibes_is_about_section_and_content_type_page_enabled',
		'type'            => 'select',
		'choices'         => business_vibes_get_page_choices(),
	)
);

// About Section - Button Label.
$wp_customize->add_setting(
	'business_vibes_about_button_label',
	array(
		'default'           => __( 'Explore More', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_about_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'business-vibes' ),
		'section'         => 'business_vibes_about_section',
		'settings'        => 'business_vibes_about_button_label',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_about_section_enabled',
	)
);
