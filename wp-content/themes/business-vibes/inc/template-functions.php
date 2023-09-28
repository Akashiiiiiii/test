<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Business_Vibes
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function business_vibes_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = business_vibes_sidebar_layout();

	$primary_color = get_theme_mod( 'business_vibes_primary_color_option', 'gradient-color' ) === 'gradient-color' ? 'primary-gradient' : '';
	$classes[]     = $primary_color;

	return $classes;
}
add_filter( 'body_class', 'business_vibes_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function business_vibes_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'business_vibes_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function business_vibes_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'business-vibes' ) );
	$args    = array( 'numberposts' => -1 );
	$posts   = get_posts( $args );

	foreach ( $posts as $post ) {
		$id             = $post->ID;
		$title          = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function business_vibes_get_page_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'business-vibes' ) );
	$pages   = get_pages();

	foreach ( $pages as $page ) {
		$choices[ $page->ID ] = $page->post_title;
	}

	return $choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function business_vibes_get_post_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'business-vibes' ) );
	$cats    = get_categories();

	foreach ( $cats as $cat ) {
		$choices[ $cat->term_id ] = $cat->name;
	}

	return $choices;
}

if ( ! function_exists( 'business_vibes_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function business_vibes_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return get_theme_mod( 'business_vibes_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'business_vibes_excerpt_length', 999 );

if ( ! function_exists( 'business_vibes_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function business_vibes_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'business_vibes_excerpt_more' );

if ( ! function_exists( 'business_vibes_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function business_vibes_sidebar_layout() {
		$sidebar_position      = get_theme_mod( 'business_vibes_sidebar_position', 'right-sidebar' );
		$sidebar_position_post = get_theme_mod( 'business_vibes_post_sidebar_position', 'right-sidebar' );
		$sidebar_position_page = get_theme_mod( 'business_vibes_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$sidebar_position = $sidebar_position_post;
		} elseif ( is_page() ) {
			$sidebar_position = $sidebar_position_page;
		}

		return $sidebar_position;
	}
}

if ( ! function_exists( 'business_vibes_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function business_vibes_is_sidebar_enabled() {
		$sidebar_position      = get_theme_mod( 'business_vibes_sidebar_position', 'right-sidebar' );
		$sidebar_position_post = get_theme_mod( 'business_vibes_post_sidebar_position', 'right-sidebar' );
		$sidebar_position_page = get_theme_mod( 'business_vibes_page_sidebar_position', 'right-sidebar' );

		$sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $sidebar_position ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $sidebar_position || 'no-sidebar' === $sidebar_position_post ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $sidebar_position || 'no-sidebar' === $sidebar_position_page ) {
				$sidebar_enabled = false;
			}
		}
		return $sidebar_enabled;
	}
}

if ( ! function_exists( 'business_vibes_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function business_vibes_get_homepage_sections() {
		$sections = array(
			'banner'         => esc_html__( 'Banner Section', 'business-vibes' ),
			'about'          => esc_html__( 'About Section', 'business-vibes' ),
			'counter'        => esc_html__( 'Counter Section', 'business-vibes' ),
			'service'        => esc_html__( 'Service Section', 'business-vibes' ),
			'featured-video' => esc_html__( 'Featured Video Section', 'business-vibes' ),
			'projects'       => esc_html__( 'Projects Section', 'business-vibes' ),
			'team'           => esc_html__( 'Team Section', 'business-vibes' ),
			'blog'           => esc_html__( 'Blog Section', 'business-vibes' ),
			'associate'      => esc_html__( 'Associate Section', 'business-vibes' ),
		);
		return $sections;
	}
}

function business_vibes_section_link( $section_id ) {
	$section_name      = str_replace( 'business_vibes_', ' ', $section_id );
	$section_name      = str_replace( '_', ' ', $section_name );
	$starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $starting_notation . $section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

function business_vibes_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}
			.section-link-title {
				padding: 0 10px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'business_vibes_section_link_css' );

/**
 * Breadcrumb.
 */
function business_vibes_breadcrumb( $args = array() ) {
	if ( ! get_theme_mod( 'business_vibes_enable_breadcrumb', true ) ) {
		return;
	}

	$args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $args );
}
add_action( 'business_vibes_breadcrumb', 'business_vibes_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function business_vibes_breadcrumb_trail_print_styles() {
	$breadcrumb_separator = get_theme_mod( 'business_vibes_breadcrumb_separator', '/' );

	$style = '
		.trail-items li::after {
			content: "' . $breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$style = apply_filters( 'business_vibes_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $style ) ) );

	if ( $style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'business_vibes_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function business_vibes_render_posts_pagination() {
	$is_pagination_enabled = get_theme_mod( 'business_vibes_enable_pagination', true );
	if ( $is_pagination_enabled ) {
		$pagination_type = get_theme_mod( 'business_vibes_pagination_type', 'default' );
		if ( 'default' === $pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'business_vibes_posts_pagination', 'business_vibes_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function business_vibes_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'business_vibes_post_navigation', 'business_vibes_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function business_vibes_output_footer_copyright_content() {
	$theme_data = wp_get_theme();
	$search     = array( '[the-year]', '[site-link]' );
	$replace    = array( date( 'Y' ), '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );
	/* translators: 1: Year, 2: Site Title with home URL. */
	$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'business-vibes' ), '[the-year]', '[site-link]' );
	$copyright_text    = get_theme_mod( 'business_vibes_footer_copyright_text', $copyright_default );
	$copyright_text    = str_replace( $search, $replace, $copyright_text );
	$copyright_text   .= esc_html( ' | ' . $theme_data->get( 'Name' ) ) . '&nbsp;' . esc_html__( 'by', 'business-vibes' ) . '&nbsp;<a target="_blank" href="' . esc_url( $theme_data->get( 'AuthorURI' ) ) . '">' . esc_html( ucwords( $theme_data->get( 'Author' ) ) ) . '</a>';
	/* translators: %s: WordPress.org URL */
	$copyright_text .= sprintf( esc_html__( ' | Powered by %s', 'business-vibes' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'business-vibes' ) ) . '" target="_blank">WordPress</a>. ' );
	?>
	<div class="copyright">
		<span><?php echo wp_kses_post( $copyright_text ); ?></span>					
	</div>
	<?php
}
add_action( 'business_vibes_footer_copyright', 'business_vibes_output_footer_copyright_content' );
