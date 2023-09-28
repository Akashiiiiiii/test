<?php

/**
 * Dynamic CSS
 */
function business_vibes_dynamic_css() {

	$primary_color         = get_theme_mod( 'primary_color', '#7462FB' );
	$header_font           = get_theme_mod( 'business_vibes_header_font', 'Raleway' );
	$body_font             = get_theme_mod( 'business_vibes_body_font', 'Roboto' );
	$site_title_font       = get_theme_mod( 'business_vibes_site_title_font', 'Raleway' );
	$site_description_font = get_theme_mod( 'business_vibes_site_description_font', 'Roboto' );

	$custom_css  = '';
	$custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $primary_color ) . ';
    }
    ';

	$custom_css .= '
    /* Typograhpy */
    :root {
        --font-heading: "' . esc_attr( $header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont,"' . esc_attr( $body_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea {
        font-family: "' . esc_attr( $body_font ) . '", serif;
	}

	.site-title a {
        font-family: "' . esc_attr( $site_title_font ) . '", serif;
	}
    
	.site-description {
        font-family: "' . esc_attr( $site_description_font ) . '", serif;
	}
    ';

	wp_add_inline_style( 'business-vibes-style', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'business_vibes_dynamic_css', 99 );
