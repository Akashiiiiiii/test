<?php

if ( ! get_theme_mod( 'business_vibes_enable_blog_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'business_vibes_blog_content_type', 'recent' );

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 5; $i++ ) {
		$content_ids[] = get_theme_mod( 'business_vibes_blog_content_post_' . $i );
	}

	$args = array(
		'post_type'           => $content_type,
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
}

$args = apply_filters( 'business_vibes_blog_section_args', $args );

business_vibes_render_blog_section( $args );

/**
 * Render Blog Section.
 */
function business_vibes_render_blog_section( $args ) {
	$section_title     = get_theme_mod( 'business_vibes_blog_title', __( 'Recent News', 'business-vibes' ) );
	$section_subtitle  = get_theme_mod( 'business_vibes_blog_subtitle', '' );
	$post_button_label = get_theme_mod( 'business_vibes_excerpt_more_text', __( 'Read More', 'business-vibes' ) );
	$button_label      = get_theme_mod( 'business_vibes_blog_button_label', __( 'View All', 'business-vibes' ) );
	$button_link       = get_theme_mod( 'business_vibes_blog_button_link' );
	$button_link       = ! empty( $button_link ) ? $button_link : '#';

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="business_vibes_blog_section" class="business-vibes-frontpage-section business-vibes-carousel business-vibes-blog-section blog-style-1">
			<?php
			if ( is_customize_preview() ) :
				business_vibes_section_link( 'business_vibes_blog_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<?php if ( ! empty( $section_title || $section_subtitle ) ) { ?>
					<div class="section-header-subtitle small-title center-title">
						<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
						<p class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
					</div>
				<?php } ?>
				<div class="business-vibes-section-body">
					<div class="business-vibes-blog-section-wrapper">
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="business-vibes-blog-single">
								<div class="business-vibes-blog-img">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
								</div>
								<div class="business-vibes-detail">
									<div class="business-vibes-meta">
										<?php echo esc_html( get_the_date() ); ?>
									</div>
									<h3 class="business-vibes-blog-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<div class="business-vibes-description">
										<?php echo wp_kses_post( wp_trim_words( get_the_content(), 30 ) ); ?>
									</div>
									<div class="ascendoor-button business-vibes-readmore ascendoor-button-noborder-noalternate">
										<a href="<?php the_permalink(); ?>"><?php echo esc_html( $post_button_label ); ?></a>
									</div>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
					<?php if ( ! empty( $button_label ) ) { ?>
						<div class="business-vibes-blog-view-all ascendoor-button">
							<a href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php
	endif;
}
