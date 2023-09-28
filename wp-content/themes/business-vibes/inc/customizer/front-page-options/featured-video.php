<?php
/**
 * Featured Video Section
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_featured_video_section',
	array(
		'panel'    => 'business_vibes_front_page_options',
		'title'    => esc_html__( 'Featured Video Section', 'business-vibes' ),
		'priority' => 50,
	)
);

// Featured Video Section - Enable Section.
$wp_customize->add_setting(
	'business_vibes_enable_featured_video_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_featured_video_section',
		array(
			'label'    => esc_html__( 'Enable Featured Video Section', 'business-vibes' ),
			'section'  => 'business_vibes_featured_video_section',
			'settings' => 'business_vibes_enable_featured_video_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'business_vibes_enable_featured_video_section',
		array(
			'selector' => '#business_vibes_featured_video_section .section-link',
			'settings' => 'business_vibes_enable_featured_video_section',
		)
	);
}

// Featured Video Section - Section Title.
$wp_customize->add_setting(
	'business_vibes_featured_video_title',
	array(
		'default'           => __( 'Watch the Video', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_featured_video_title',
	array(
		'label'           => esc_html__( 'Section Title', 'business-vibes' ),
		'section'         => 'business_vibes_featured_video_section',
		'settings'        => 'business_vibes_featured_video_title',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_featured_video_section_enabled',
	)
);

// Featured Video Section - Section Subtitle.
$wp_customize->add_setting(
	'business_vibes_featured_video_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_featured_video_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'business-vibes' ),
		'section'         => 'business_vibes_featured_video_section',
		'settings'        => 'business_vibes_featured_video_subtitle',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_featured_video_section_enabled',
	)
);

// Featured Video Section - Section Short Description.
$wp_customize->add_setting(
	'business_vibes_featured_video_short_description',
	array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'business_vibes_featured_video_short_description',
	array(
		'label'           => esc_html__( 'Section Short Description', 'business-vibes' ),
		'section'         => 'business_vibes_featured_video_section',
		'settings'        => 'business_vibes_featured_video_short_description',
		'type'            => 'textarea',
		'active_callback' => 'business_vibes_is_featured_video_section_enabled',
	)
);

// Featured Video Section - Image.
$wp_customize->add_setting(
	'business_vibes_featured_video_section_image',
	array(
		'sanitize_callback' => 'business_vibes_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'business_vibes_featured_video_section_image',
		array(
			'label'           => esc_html__( 'Section Image', 'business-vibes' ),
			'section'         => 'business_vibes_featured_video_section',
			'settings'        => 'business_vibes_featured_video_section_image',
			'active_callback' => 'business_vibes_is_featured_video_section_enabled',
		)
	)
);

// Featured Video Section - Video Link.
$wp_customize->add_setting(
	'business_vibes_featured_video_video_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'business_vibes_featured_video_video_link',
	array(
		'label'           => esc_html__( 'Video Link', 'business-vibes' ),
		'section'         => 'business_vibes_featured_video_section',
		'settings'        => 'business_vibes_featured_video_video_link',
		'type'            => 'url',
		'active_callback' => 'business_vibes_is_featured_video_section_enabled',
	)
);
