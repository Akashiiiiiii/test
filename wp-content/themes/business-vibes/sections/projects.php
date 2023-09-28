<?php

if ( ! get_theme_mod( 'business_vibes_enable_projects_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'business_vibes_projects_content_type', 'post' );

if ( $content_type == 'post' ) {

	for ( $i = 1; $i <= 3; $i++ ) {
		$content_ids[] = get_theme_mod( 'business_vibes_projects_content_post_' . $i );
	}

	$args = array(
		'post_type'           => $content_type,
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'business_vibes_projects_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}

$args = apply_filters( 'business_vibes_projects_section_args', $args );

business_vibes_render_projects_section( $args );

/**
 * Render Projects Section.
 */
function business_vibes_render_projects_section( $args ) {
	$section_title    = get_theme_mod( 'business_vibes_projects_title', __( 'Latest Projects', 'business-vibes' ) );
	$section_subtitle = get_theme_mod( 'business_vibes_projects_subtitle', '' );
	$button_label     = get_theme_mod( 'business_vibes_projects_button_label', __( 'View All', 'business-vibes' ) );
	$button_link      = get_theme_mod( 'business_vibes_projects_button_link' );
	$button_link      = ! empty( $button_link ) ? $button_link : '#';

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="business_vibes_projects_section" class="business-vibes-frontpage-section business-vibes-prom-section business-vibes-four-col-prom-section">
			<?php
			if ( is_customize_preview() ) :
				business_vibes_section_link( 'business_vibes_projects_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<?php if ( ! empty( $section_title || $section_subtitle ) ) : ?>
					<div class="section-header-subtitle small-title center-title">
						<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
						<p class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
					</div>
				<?php endif; ?>
				<div class="business-vibes-section-body">
					<div class="business-vibes-prom-section-wrapper">
						<?php
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							$location = get_theme_mod( 'business_vibes_projects_location_' . $i );
							?>
							<div class="business-vibes-prom-single">
								<div class="business-vibes-prom-img">
									<?php the_post_thumbnail( 'full' ); ?>
								</div>
								<div class="business-vibes-prom-detail">
									<div class="ascendoor-category-links">
										<?php echo get_the_category_list( ', ', '', get_the_ID() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									</div>
									<h3 class="business-vibes-prom-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="sub-location">
										<h4 class="business-vibes-prom-subtitle">
											<?php echo wp_kses_post( wp_trim_words( get_the_content(), 15 ) ); ?>
										</h4>
										<?php if ( ! empty( $location ) ) : ?>
											<div class="location">
												<span><i class="fas fa-map-marker-alt"></i>
													<?php echo esc_html( $location ); ?>
												</span>
											</div>											
										<?php endif; ?>
									</div>
								</div>
							</div>
							<?php
							$i++;
						endwhile;
						wp_reset_postdata();
						?>
					</div>  
					<?php if ( ! empty( $button_label ) ) : ?>
						<div class="business-vibes-latest-news-view-all bottom-viewall-button ascendoor-button">
							<a href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
						</div>
					<?php endif; ?>  
				</div>    
			</div>
		</section>
		<?php
	endif;
}
