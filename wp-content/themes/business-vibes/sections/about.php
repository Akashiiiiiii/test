<?php

if ( ! get_theme_mod( 'business_vibes_enable_about_section', false ) ) {
	return;
}

$content_id    = $section_content = array();
$content_count = 1;

$content_type = get_theme_mod( 'business_vibes_about_content_type', 'post' );
if ( in_array( $content_type, array( 'post', 'page' ) ) ) {

	if ( 'post' === $content_type ) {
		$content_id[] = get_theme_mod( 'business_vibes_about_content_post' );
	} else {
		$content_id[] = get_theme_mod( 'business_vibes_about_content_page' );
	}
	$args = array(
		'post_type'           => $content_type,
		'post__in'            => array_filter( $content_id ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( $content_count ),
		'ignore_sticky_posts' => true,
	);
	$args = apply_filters( 'business_vibes_about_section_content', $args );

	business_vibes_render_about_section( $args );
}

/**
 * Render About Section
 */
function business_vibes_render_about_section( $args ) {
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		$section_subtitle = get_theme_mod( 'business_vibes_about_subtitle', __( 'About Us', 'business-vibes' ) );
		$button_label     = get_theme_mod( 'business_vibes_about_button_label', __( 'Explore More', 'business-vibes' ) );
		while ( $query->have_posts() ) :
			$query->the_post();
			?>
			<section id="business_vibes_about_section" class="business-vibes-frontpage-section business-vibes-text-image-section business-vibes-grey-background business-vibes-image-left business-vibes-about-style-2">
				<?php
				if ( is_customize_preview() ) :
					business_vibes_section_link( 'business_vibes_about_section' );
				endif;
				?>
				<div class="ascendoor-wrapper">
					<div class="business-vibes-text-image-section-wrapper">
						<div class="business-vibes-text-image-section-image">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="business-vibes-text-image-section-text section-header-subtitle small-title">
							<h3 class="section-title"><?php echo esc_html( $section_subtitle ); ?></h3>
							<p class="section-subtitle"><?php the_title(); ?></p>
							<p class="description">
								<?php echo wp_kses_post( wp_trim_words( get_the_content(), 50 ) ); ?>
							</p>
							<?php if ( ! empty( $button_label ) ) { ?>
								<div class="ascendoor-button ascendoor-button-alternate">
									<a href="<?php the_permalink(); ?>"><?php echo esc_html( $button_label ); ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
			<?php
		endwhile;
		wp_reset_postdata();
	endif;
}
