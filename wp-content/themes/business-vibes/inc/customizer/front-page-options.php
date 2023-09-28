<?php
/**
 * Front Page Options
 *
 * @package Business_Vibes
 */

$wp_customize->add_panel(
	'business_vibes_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'business-vibes' ),
		'priority' => 130,
	)
);

// Banner Section.
require get_template_directory() . '/inc/customizer/front-page-options/banner.php';

// About Section.
require get_template_directory() . '/inc/customizer/front-page-options/about.php';

// Counter Section.
require get_template_directory() . '/inc/customizer/front-page-options/counter.php';

// Service Section.
require get_template_directory() . '/inc/customizer/front-page-options/service.php';

// Featured Video Section.
require get_template_directory() . '/inc/customizer/front-page-options/featured-video.php';

// Projects Section.
require get_template_directory() . '/inc/customizer/front-page-options/projects.php';

// Team Section.
require get_template_directory() . '/inc/customizer/front-page-options/team.php';

// Blog Section.
require get_template_directory() . '/inc/customizer/front-page-options/blog.php';

// Associate Section.
require get_template_directory() . '/inc/customizer/front-page-options/associate.php';
