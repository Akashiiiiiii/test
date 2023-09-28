<?php
/**
 * Service Section
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_service_section',
	array(
		'panel'    => 'business_vibes_front_page_options',
		'title'    => esc_html__( 'Service Section', 'business-vibes' ),
		'priority' => 40,
	)
);

// Service Section - Enable Section.
$wp_customize->add_setting(
	'business_vibes_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Service Section', 'business-vibes' ),
			'section'  => 'business_vibes_service_section',
			'settings' => 'business_vibes_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'business_vibes_enable_service_section',
		array(
			'selector' => '#business_vibes_service_section .section-link',
			'settings' => 'business_vibes_enable_service_section',
		)
	);
}

// Service Section - Section Title.
$wp_customize->add_setting(
	'business_vibes_service_title',
	array(
		'default'           => __( 'Our Services', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_service_title',
	array(
		'label'           => esc_html__( 'Section Title', 'business-vibes' ),
		'section'         => 'business_vibes_service_section',
		'settings'        => 'business_vibes_service_title',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_service_section_enabled',
	)
);

// Service Section - Section Subtitle.
$wp_customize->add_setting(
	'business_vibes_service_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_service_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'business-vibes' ),
		'section'         => 'business_vibes_service_section',
		'settings'        => 'business_vibes_service_subtitle',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_service_section_enabled',
	)
);

// Service Section - Posts Button Label.
$wp_customize->add_setting(
	'business_vibes_service_posts_button_label',
	array(
		'default'           => __( 'View Detail', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_service_posts_button_label',
	array(
		'label'           => esc_html__( 'Posts Button Label', 'business-vibes' ),
		'section'         => 'business_vibes_service_section',
		'settings'        => 'business_vibes_service_posts_button_label',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_service_section_enabled',
	)
);

// Service Section - Content Type.
$wp_customize->add_setting(
	'business_vibes_service_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'business_vibes_sanitize_select',
	)
);

$wp_customize->add_control(
	'business_vibes_service_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'business-vibes' ),
		'section'         => 'business_vibes_service_section',
		'settings'        => 'business_vibes_service_content_type',
		'type'            => 'select',
		'active_callback' => 'business_vibes_is_service_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'business-vibes' ),
			'category' => esc_html__( 'Category', 'business-vibes' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {

	// Service Section - Fontawesome Icon.
	$wp_customize->add_setting(
		'business_vibes_service_fontawesome_icon_' . $i,
		array(
			'default'           => 'fas fa-yen-sign',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_service_fontawesome_icon_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Fontawesome Icon %d', 'business-vibes' ), $i ),
			'description'     => sprintf( '<a href=" ' . esc_url( 'https://www.fontawesomecheatsheet.com/font-awesome-cheatsheet-5x/' ) . ' " target="_blank"> %1$s </a> %2$s', esc_html__( 'Click Here ', 'business-vibes' ), esc_html__( ' for select fontawesome icon.', 'business-vibes' ) ),
			'section'         => 'business_vibes_service_section',
			'settings'        => 'business_vibes_service_fontawesome_icon_' . $i,
			'type'            => 'text',
			'active_callback' => 'business_vibes_is_service_section_enabled',
		)
	);

		// Service Section - Select Post.
	$wp_customize->add_setting(
		'business_vibes_service_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'business_vibes_service_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_service_section',
			'settings'        => 'business_vibes_service_content_post_' . $i,
			'active_callback' => 'business_vibes_is_service_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => business_vibes_get_post_choices(),
		)
	);

}

	// Service Section - Select Category.
$wp_customize->add_setting(
	'business_vibes_service_content_category',
	array(
		'sanitize_callback' => 'business_vibes_sanitize_select',
	)
);

$wp_customize->add_control(
	'business_vibes_service_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'business-vibes' ),
		'section'         => 'business_vibes_service_section',
		'settings'        => 'business_vibes_service_content_category',
		'active_callback' => 'business_vibes_is_service_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => business_vibes_get_post_cat_choices(),
	)
);

	// Service Section - Button Label.
$wp_customize->add_setting(
	'business_vibes_service_button_label',
	array(
		'default'           => __( 'View All Services', 'business-vibes' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'business_vibes_service_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'business-vibes' ),
		'section'         => 'business_vibes_service_section',
		'settings'        => 'business_vibes_service_button_label',
		'type'            => 'text',
		'active_callback' => 'business_vibes_is_service_section_enabled',
	)
);

	// Service Section - Button Link.
$wp_customize->add_setting(
	'business_vibes_service_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'business_vibes_service_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'business-vibes' ),
		'section'         => 'business_vibes_service_section',
		'settings'        => 'business_vibes_service_button_link',
		'type'            => 'url',
		'active_callback' => 'business_vibes_is_service_section_enabled',
	)
);
