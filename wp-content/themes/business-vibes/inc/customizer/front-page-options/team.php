<?php
/**
 * Team Section
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_team_section',
	array(
		'panel'    => 'business_vibes_front_page_options',
		'title'    => esc_html__( 'Team Section', 'business-vibes' ),
		'priority' => 70,
	)
);

// Team Section - Enable Section.
$wp_customize->add_setting(
	'business_vibes_enable_team_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_team_section',
		array(
			'label'    => esc_html__( 'Enable Team Section', 'business-vibes' ),
			'section'  => 'business_vibes_team_section',
			'settings' => 'business_vibes_enable_team_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'business_vibes_enable_team_section',
		array(
			'selector' => '#business_vibes_team_section .section-link',
			'settings' => 'business_vibes_enable_team_section',
		)
	);
}

// Team Section - Section Title.
$wp_customize->add_setting(
	'business_vibes_team_section_title',
	array(
		'default'           => __( 'Our Team', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_team_section_title',
	array(
		'label'           => esc_html__( 'Section Title', 'business-vibes' ),
		'section'         => 'business_vibes_team_section',
		'settings'        => 'business_vibes_team_section_title',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_team_section_enabled',
	)
);

// Team Section - Section Subtitle.
$wp_customize->add_setting(
	'business_vibes_team_section_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_team_section_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'business-vibes' ),
		'section'         => 'business_vibes_team_section',
		'settings'        => 'business_vibes_team_section_subtitle',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_team_section_enabled',
	)
);

// Team Section - Content Type.
$wp_customize->add_setting(
	'business_vibes_team_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'business_vibes_sanitize_select',
	)
);

$wp_customize->add_control(
	'business_vibes_team_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'business-vibes' ),
		'section'         => 'business_vibes_team_section',
		'settings'        => 'business_vibes_team_content_type',
		'type'            => 'select',
		'active_callback' => 'business_vibes_is_team_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'business-vibes' ),
			'post' => esc_html__( 'Post', 'business-vibes' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Team Section - Select Post.
	$wp_customize->add_setting(
		'business_vibes_team_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'business_vibes_team_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_team_section',
			'settings'        => 'business_vibes_team_content_post_' . $i,
			'active_callback' => 'business_vibes_is_team_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => business_vibes_get_post_choices(),
		)
	);

	// Team Section - Select Page.
	$wp_customize->add_setting(
		'business_vibes_team_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'business_vibes_team_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_team_section',
			'settings'        => 'business_vibes_team_content_page_' . $i,
			'active_callback' => 'business_vibes_is_team_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => business_vibes_get_page_choices(),
		)
	);

	// Team Section - Designation.
	$wp_customize->add_setting(
		'business_vibes_team_designation_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_team_designation_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Designation %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_team_section',
			'settings'        => 'business_vibes_team_designation_' . $i,
			'active_callback' => 'business_vibes_is_team_section_enabled',
		)
	);

	// Team Options - Contact Number.
	$wp_customize->add_setting(
		'business_vibes_team_contact_number_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_team_contact_number_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Contact Number %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_team_section',
			'settings'        => 'business_vibes_team_contact_number_' . $i,
			'type'            => 'text',
			'active_callback' => 'business_vibes_is_team_section_enabled',
		)
	);

	// Team Options - Email Address.
	$wp_customize->add_setting(
		'business_vibes_team_email_address_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_team_email_address_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Email Address %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_team_section',
			'settings'        => 'business_vibes_team_email_address_' . $i,
			'type'            => 'text',
			'active_callback' => 'business_vibes_is_team_section_enabled',
		)
	);

	// Team Section - Social Links.
	$wp_customize->add_setting(
		'business_vibes_team_social_links_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new Business_Vibes_Sortable_Repeater_Custom_Control(
			$wp_customize,
			'business_vibes_team_social_links_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Social Icons %d', 'business-vibes' ), $i ),
				'section'         => 'business_vibes_team_section',
				'button_labels'   => array(
					'add' => __( 'Add', 'business-vibes' ),
				),
				'active_callback' => 'business_vibes_is_team_section_enabled',
			)
		)
	);
}

// Team Section - Button Label.
$wp_customize->add_setting(
	'business_vibes_team_button_label',
	array(
		'default'           => __( 'View All', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_team_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'business-vibes' ),
		'section'         => 'business_vibes_team_section',
		'settings'        => 'business_vibes_team_button_label',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_team_section_enabled',
	)
);

// Team Section - Button Link.
$wp_customize->add_setting(
	'business_vibes_team_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'business_vibes_team_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'business-vibes' ),
		'section'         => 'business_vibes_team_section',
		'settings'        => 'business_vibes_team_button_link',
		'type'            => 'url',
		'active_callback' => 'business_vibes_is_team_section_enabled',
	)
);
