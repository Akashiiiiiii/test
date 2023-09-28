<?php

/**
 * Render homepage sections.
 */
function business_vibes_homepage_sections() {
	$business_vibes_homepage_sections = business_vibes_get_homepage_sections();
	$business_vibes_sorted_sections   = array_keys( $business_vibes_homepage_sections );

	foreach ( $business_vibes_sorted_sections as $business_vibes_section ) {
		if ( in_array( $business_vibes_section, array_keys( $business_vibes_homepage_sections ) ) ) {
			require get_template_directory() . '/sections/' . $business_vibes_section . '.php';
		}
	}
}
