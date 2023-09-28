<?php
/**
 * Business Vibes Theme Customizer
 *
 * @package Business_Vibes
 */

// Sanitize callback.
require get_template_directory() . '/inc/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/inc/customizer/active-callback.php';

// Custom Controls.
require get_template_directory() . '/inc/customizer/custom-controls/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_vibes_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'business_vibes_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'business_vibes_customize_partial_blogdescription',
			)
		);
	}

	// Homepage Settings - Enable Homepage Content.
	$wp_customize->add_setting(
		'business_vibes_enable_frontpage_content',
		array(
			'default'           => false,
			'sanitize_callback' => 'business_vibes_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'business_vibes_enable_frontpage_content',
		array(
			'label'           => esc_html__( 'Enable Homepage Content', 'business-vibes' ),
			'description'     => esc_html__( 'Check to enable content on static homepage.', 'business-vibes' ),
			'section'         => 'static_front_page',
			'type'            => 'checkbox',
			'active_callback' => 'business_vibes_is_static_homepage_enabled',
		)
	);

	// Upsell Section.
	$wp_customize->add_section(
		new Business_Vibes_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Business Vibes Pro', 'business-vibes' ),
				'button_text'      => __( 'Buy Pro', 'business-vibes' ),
				'url'              => 'https://ascendoor.com/themes/business-vibes-pro/',
				'background_color' => '#7462FB',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Colors.
	require get_template_directory() . '/inc/customizer/colors.php';

	// Theme Options.
	require get_template_directory() . '/inc/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/inc/customizer/front-page-options.php';
}
add_action( 'customize_register', 'business_vibes_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function business_vibes_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function business_vibes_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_vibes_customize_preview_js() {
	wp_enqueue_script( 'business-vibes-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), BUSINESS_VIBES_VERSION, true );
}
add_action( 'customize_preview_init', 'business_vibes_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function business_vibes_custom_control_scripts() {

	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'business-vibes-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'business-vibes-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'business_vibes_custom_control_scripts' );
