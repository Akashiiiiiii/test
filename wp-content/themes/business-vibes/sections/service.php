<?php

if ( ! get_theme_mod( 'business_vibes_enable_service_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'business_vibes_service_content_type', 'post' );

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 6; $i++ ) {
		$content_ids[] = get_theme_mod( 'business_vibes_service_content_post_' . $i );
	}

	$args = array(
		'post_type'           => $content_type,
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 6 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'business_vibes_service_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 6 ),
	);
}

$args = apply_filters( 'business_vibes_service_section_args', $args );

business_vibes_render_service_section( $args );

/**
 * Render Service Section.
 */
function business_vibes_render_service_section( $args ) {
	$section_title        = get_theme_mod( 'business_vibes_service_title', __( 'Our Services', 'business-vibes' ) );
	$service_subtitle     = get_theme_mod( 'business_vibes_service_subtitle', '' );
	$post_button_label    = get_theme_mod( 'business_vibes_service_posts_button_label', __( 'View Detail', 'business-vibes' ) );
	$service_button_label = get_theme_mod( 'business_vibes_service_button_label', __( 'View All Services', 'business-vibes' ) );
	$service_button_link  = get_theme_mod( 'business_vibes_service_button_link' );
	$service_button_link  = ! empty( $service_button_link ) ? $service_button_link : '#';

	$query = new WP_Query( $args );
	?>
	<section id="business_vibes_service_section" class="business-vibes-frontpage-section business-vibes-our-services-section service-style-2">
		<?php
		if ( is_customize_preview() ) :
			business_vibes_section_link( 'business_vibes_service_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<?php if ( ! empty( $section_title || $service_subtitle ) ) : ?>
				<div class="section-header-subtitle small-title center-title">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $service_subtitle ); ?></p>
				</div>
			<?php endif; ?>
			<?php if ( $query->have_posts() ) : ?>
				<div class="business-vibes-section-body">
					<div class="business-vibes-our-services-section-wrapper">
						<?php
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							$service_icon = get_theme_mod( 'business_vibes_service_fontawesome_icon_' . $i, 'fas fa-yen-sign' );
							?>
							<div class="business-vibes-service-single">
								<?php if ( ! empty( $service_icon ) ) : ?>
									<div class="business-vibes-service-img">
										<i class="<?php echo esc_attr( $service_icon ); ?>"></i>
									</div>
								<?php endif; ?>
								<div class="business-vibes-service-detail">
									<h3 class="service-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p><?php echo wp_kses_post( wp_trim_words( get_the_content(), 20 ) ); ?></p>
									<?php if ( ! empty( $post_button_label ) ) : ?>
										<div class="ascendoor-button ascendoor-button-noborder-noalternate">
											<a href="<?php the_permalink(); ?>"><?php echo esc_html( $post_button_label ); ?></a>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<?php
							$i++;
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $service_button_label ) ) { ?>
				<div class="bottom-viewall-button ascendoor-button">
					<a href="<?php echo esc_url( $service_button_link ); ?>"><?php echo esc_html( $service_button_label ); ?></a>
				</div>
			<?php } ?>
		</div>
	</section>
	<?php
}
