<?php
/**
 * Counter Section
 *
 * @package Business_Vibes
 */

$wp_customize->add_section(
	'business_vibes_counter_section',
	array(
		'panel'    => 'business_vibes_front_page_options',
		'title'    => esc_html__( 'Counter Section', 'business-vibes' ),
		'priority' => 30,
	)
);

// Counter Section - Enable Section.
$wp_customize->add_setting(
	'business_vibes_enable_counter_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'business_vibes_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Business_Vibes_Toggle_Switch_Custom_Control(
		$wp_customize,
		'business_vibes_enable_counter_section',
		array(
			'label'    => esc_html__( 'Enable Counter Section', 'business-vibes' ),
			'section'  => 'business_vibes_counter_section',
			'settings' => 'business_vibes_enable_counter_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'business_vibes_enable_counter_section',
		array(
			'selector' => '#business_vibes_counter_section .section-link',
			'settings' => 'business_vibes_enable_counter_section',
		)
	);
}

for ( $i = 1; $i <= 4; $i++ ) {

		// Counter Section - Fontawesome Icon.
	$wp_customize->add_setting(
		'business_vibes_counter_fontawesome_icon_' . $i,
		array(
			'default'           => 'fas fa-yen-sign',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_counter_fontawesome_icon_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Fontawesome Icon %d', 'business-vibes' ), $i ),
			'description'     => sprintf( '<a href=" ' . esc_url( 'https://www.fontawesomecheatsheet.com/font-awesome-cheatsheet-5x/' ) . ' " target="_blank"> %1$s </a> %2$s', esc_html__( 'Click Here ', 'business-vibes' ), esc_html__( ' for select fontawesome icon.', 'business-vibes' ) ),
			'section'         => 'business_vibes_counter_section',
			'settings'        => 'business_vibes_counter_fontawesome_icon_' . $i,
			'type'            => 'text',
			'active_callback' => 'business_vibes_is_counter_section_enabled',
		)
	);

	// Counter Section - Counter Label.
	$wp_customize->add_setting(
		'business_vibes_counter_label_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_counter_label_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Label %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_counter_section',
			'settings'        => 'business_vibes_counter_label_' . $i,
			'type'            => 'text',
			'active_callback' => 'business_vibes_is_counter_section_enabled',
		)
	);

	// Counter Section - Counter Value.
	$wp_customize->add_setting(
		'business_vibes_counter_value_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'business_vibes_counter_value_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Value %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_counter_section',
			'settings'        => 'business_vibes_counter_value_' . $i,
			'type'            => 'number',
			'input_attrs'     => array( 'min' => 1 ),
			'active_callback' => 'business_vibes_is_counter_section_enabled',
		)
	);

	// Counter Section - Counter Suffix.
	$wp_customize->add_setting(
		'business_vibes_counter_value_suffix_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_vibes_counter_value_suffix_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Value Suffix %d', 'business-vibes' ), $i ),
			'section'         => 'business_vibes_counter_section',
			'settings'        => 'business_vibes_counter_value_suffix_' . $i,
			'type'            => 'text',
			'active_callback' => 'business_vibes_is_counter_section_enabled',
		)
	);

}
