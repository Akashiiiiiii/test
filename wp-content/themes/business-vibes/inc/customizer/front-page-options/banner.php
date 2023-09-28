<?php
/**
 * Banner Section
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_banner_section',
	array(
		'panel'    => 'business_vibes_front_page_options',
		'title'    => esc_html__( 'Banner Slider Section', 'business-vibes' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'business_vibes_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'business-vibes' ),
			'section'  => 'business_vibes_banner_section',
			'settings' => 'business_vibes_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'business_vibes_enable_banner_section',
		array(
			'selector' => '#business_vibes_banner_section .section-link',
			'settings' => 'business_vibes_enable_banner_section',
		)
	);
}

// Banner Section - Content Type.
$wp_customize->add_setting(
	'business_vibes_banner_content',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'business_vibes_sanitize_select',
	)
);

$wp_customize->add_control(
	'business_vibes_banner_content',
	array(
		'label'           => esc_html__( 'Select Content Type', 'business-vibes' ),
		'section'         => 'business_vibes_banner_section',
		'settings'        => 'business_vibes_banner_content',
		'type'            => 'select',
		'active_callback' => 'business_vibes_is_banner_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'business-vibes' ),
			'post' => esc_html__( 'Post', 'business-vibes' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Banner Section - Section Subtitle.
	$wp_customize->add_setting(
		'business_vibes_banner_subtitle_' . $i,
		array(
			'default'           => __( 'We Area Here For You', 'business-vibes' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_banner_subtitle_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Section Subtitle %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_banner_section',
			'settings'        => 'business_vibes_banner_subtitle_' . $i,
			'type'            => 'text',
			'active_callback' => 'business_vibes_is_banner_section_enabled',
		)
	);

	// Banner Section - Content Type Post.
	$wp_customize->add_setting(
		'business_vibes_banner_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'business_vibes_banner_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_banner_section',
			'settings'        => 'business_vibes_banner_content_post_' . $i,
			'active_callback' => 'business_vibes_is_banner_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => business_vibes_get_post_choices(),
		)
	);

	// Banner Section - Content Type Page.
	$wp_customize->add_setting(
		'business_vibes_banner_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'business_vibes_banner_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_banner_section',
			'settings'        => 'business_vibes_banner_content_page_' . $i,
			'active_callback' => 'business_vibes_is_banner_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => business_vibes_get_page_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'business_vibes_banner_button_label' . $i,
		array(
			'default'           => __( 'Read More', 'business-vibes' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_banner_button_label' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Label %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_banner_section',
			'settings'        => 'business_vibes_banner_button_label' . $i,
			'type'            => 'text',
			'active_callback' => 'business_vibes_is_banner_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'business_vibes_banner_button_link' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'business_vibes_banner_button_link' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Link %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_banner_section',
			'settings'        => 'business_vibes_banner_button_link' . $i,
			'type'            => 'url',
			'active_callback' => 'business_vibes_is_banner_section_enabled',
		)
	);

	// Banner Section - Video Link.
	$wp_customize->add_setting(
		'business_vibes_banner_video_url' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'business_vibes_banner_video_url' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Video Link %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_banner_section',
			'settings'        => 'business_vibes_banner_video_url' . $i,
			'type'            => 'url',
			'active_callback' => 'business_vibes_is_banner_section_enabled',
		)
	);

	// Banner Section - Video Label.
	$wp_customize->add_setting(
		'business_vibes_banner_video_text' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_banner_video_text' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Video Text %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_banner_section',
			'settings'        => 'business_vibes_banner_video_text' . $i,
			'type'            => 'text',
			'active_callback' => 'business_vibes_is_banner_section_enabled',
		)
	);

}
