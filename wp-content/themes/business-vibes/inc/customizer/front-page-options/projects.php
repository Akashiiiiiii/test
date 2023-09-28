<?php
/**
 * Projects Section
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_projects_section',
	array(
		'panel'    => 'business_vibes_front_page_options',
		'title'    => esc_html__( 'Projects Section', 'business-vibes' ),
		'priority' => 60,
	)
);

// Projects Section - Enable Section.
$wp_customize->add_setting(
	'business_vibes_enable_projects_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_projects_section',
		array(
			'label'    => esc_html__( 'Enable Projects Section', 'business-vibes' ),
			'section'  => 'business_vibes_projects_section',
			'settings' => 'business_vibes_enable_projects_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'business_vibes_enable_projects_section',
		array(
			'selector' => '#business_vibes_projects_section .section-link',
			'settings' => 'business_vibes_enable_projects_section',
		)
	);
}

// Projects Section - Section Title.
$wp_customize->add_setting(
	'business_vibes_projects_title',
	array(
		'default'           => __( 'Latest Projects', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_projects_title',
	array(
		'label'           => esc_html__( 'Section Title', 'business-vibes' ),
		'section'         => 'business_vibes_projects_section',
		'settings'        => 'business_vibes_projects_title',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_projects_section_enabled',
	)
);

// Projects Section - Section Subtitle.
$wp_customize->add_setting(
	'business_vibes_projects_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_projects_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'business-vibes' ),
		'section'         => 'business_vibes_projects_section',
		'settings'        => 'business_vibes_projects_subtitle',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_projects_section_enabled',
	)
);

// Projects Section - Content Type.
$wp_customize->add_setting(
	'business_vibes_projects_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'business_vibes_sanitize_select',
	)
);

$wp_customize->add_control(
	'business_vibes_projects_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'business-vibes' ),
		'section'         => 'business_vibes_projects_section',
		'settings'        => 'business_vibes_projects_content_type',
		'type'            => 'select',
		'active_callback' => 'business_vibes_is_projects_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'business-vibes' ),
			'category' => esc_html__( 'Category', 'business-vibes' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Projects Section - Select Post.
	$wp_customize->add_setting(
		'business_vibes_projects_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'business_vibes_projects_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_projects_section',
			'settings'        => 'business_vibes_projects_content_post_' . $i,
			'active_callback' => 'business_vibes_is_projects_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => business_vibes_get_post_choices(),
		)
	);

	// Projects Section - Location.
	$wp_customize->add_setting(
		'business_vibes_projects_location_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_projects_location_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Location %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_projects_section',
			'settings'        => 'business_vibes_projects_location_' . $i,
			'type'            => 'text',
			'active_callback' => 'business_vibes_is_projects_section_enabled',
		)
	);

}

// Projects Section - Select Category.
$wp_customize->add_setting(
	'business_vibes_projects_content_category',
	array(
		'sanitize_callback' => 'business_vibes_sanitize_select',
	)
);

$wp_customize->add_control(
	'business_vibes_projects_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'business-vibes' ),
		'section'         => 'business_vibes_projects_section',
		'settings'        => 'business_vibes_projects_content_category',
		'active_callback' => 'business_vibes_is_projects_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => business_vibes_get_post_cat_choices(),
	)
);

// Projects Section - Button Label.
$wp_customize->add_setting(
	'business_vibes_projects_button_label',
	array(
		'default'           => __( 'View All', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_projects_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'business-vibes' ),
		'section'         => 'business_vibes_projects_section',
		'settings'        => 'business_vibes_projects_button_label',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_projects_section_enabled',
	)
);

// Banner Section - Button Link.
$wp_customize->add_setting(
	'business_vibes_projects_button_link',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'business_vibes_projects_button_link',
	array(
		'label'           => esc_html__( 'Button Link ', 'business-vibes' ),
		'section'         => 'business_vibes_projects_section',
		'settings'        => 'business_vibes_projects_button_link',
		'type'            => 'url',
		'active_callback' => 'business_vibes_is_projects_section_enabled',
	)
);
