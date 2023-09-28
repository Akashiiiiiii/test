<?php
/**
 * Blog Section
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_blog_section',
	array(
		'panel'    => 'business_vibes_front_page_options',
		'title'    => esc_html__( 'Blog Section', 'business-vibes' ),
		'priority' => 80,
	)
);

// Blog Section - Enable Section.
$wp_customize->add_setting(
	'business_vibes_enable_blog_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_blog_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'business-vibes' ),
			'section'  => 'business_vibes_blog_section',
			'settings' => 'business_vibes_enable_blog_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'business_vibes_enable_blog_section',
		array(
			'selector' => '#business_vibes_blog_section .section-link',
			'settings' => 'business_vibes_enable_blog_section',
		)
	);
}

// Blog Section - Section Title.
$wp_customize->add_setting(
	'business_vibes_blog_title',
	array(
		'default'           => __( 'Recent News', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_blog_title',
	array(
		'label'           => esc_html__( 'Section Title', 'business-vibes' ),
		'section'         => 'business_vibes_blog_section',
		'settings'        => 'business_vibes_blog_title',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_blog_section_enabled',
	)
);

// Blog Section - Section Subtitle.
$wp_customize->add_setting(
	'business_vibes_blog_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_blog_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'business-vibes' ),
		'section'         => 'business_vibes_blog_section',
		'settings'        => 'business_vibes_blog_subtitle',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_blog_section_enabled',
	)
);

// Blog Section - Content Type.
$wp_customize->add_setting(
	'business_vibes_blog_content_type',
	array(
		'default'           => 'recent',
		'sanitize_callback' => 'business_vibes_sanitize_select',
	)
);

$wp_customize->add_control(
	'business_vibes_blog_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'business-vibes' ),
		'section'         => 'business_vibes_blog_section',
		'settings'        => 'business_vibes_blog_content_type',
		'type'            => 'select',
		'active_callback' => 'business_vibes_is_blog_section_enabled',
		'choices'         => array(
			'post'   => esc_html__( 'Post', 'business-vibes' ),
			'recent' => esc_html__( 'Recent', 'business-vibes' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// Blog Section - Select Post.
	$wp_customize->add_setting(
		'business_vibes_blog_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'business_vibes_blog_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_blog_section',
			'settings'        => 'business_vibes_blog_content_post_' . $i,
			'active_callback' => 'business_vibes_is_blog_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => business_vibes_get_post_choices(),
		)
	);

}

// Blog Section - Button Label.
$wp_customize->add_setting(
	'business_vibes_blog_button_label',
	array(
		'default'           => __( 'View All', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_blog_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'business-vibes' ),
		'section'         => 'business_vibes_blog_section',
		'settings'        => 'business_vibes_blog_button_label',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_blog_section_enabled',
	)
);

// Team Section - Button Link.
$wp_customize->add_setting(
	'business_vibes_blog_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'business_vibes_blog_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'business-vibes' ),
		'section'         => 'business_vibes_blog_section',
		'settings'        => 'business_vibes_blog_button_link',
		'type'            => 'url',
		'active_callback' => 'business_vibes_is_blog_section_enabled',
	)
);
