<?php
/**
 * Theme Options
 *
 * @package Business_Vibes
 */

$wp_customize->add_panel(
	'business_vibes_theme_options',
	array(
		'title'    => esc_html__( 'Theme Options', 'business-vibes' ),
		'priority' => 130,
	)
);

// Top Bar.
require get_template_directory() . '/inc/customizer/theme-options/topbar-options.php';

// Typography.
require get_template_directory() . '/inc/customizer/theme-options/typography.php';

// Excerpt.
require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

// Breadcrumb.
require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

// Layout.
require get_template_directory() . '/inc/customizer/theme-options/sidebar-layout.php';

// Post Options.
require get_template_directory() . '/inc/customizer/theme-options/post-options.php';

// Pagination.
require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

// Footer Options.
require get_template_directory() . '/inc/customizer/theme-options/footer-options.php';
