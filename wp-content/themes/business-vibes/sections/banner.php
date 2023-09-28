<?php

if ( ! get_theme_mod( 'business_vibes_enable_banner_section', false ) ) {
	return;
}

$content_ids  = $btn_label = $btn_link = $section_content = array();
$content_type = get_theme_mod( 'business_vibes_banner_content', 'post' );

if ( ! in_array( $content_type, array( 'post', 'page' ) ) ) {
	return;
}

for ( $i = 1; $i <= 3; $i++ ) {
	$item_id               = get_theme_mod( 'business_vibes_banner_content_' . $content_type . '_' . $i );
	$content_ids[]         = $item_id;
	$btn_label[ $item_id ] = get_theme_mod( 'business_vibes_banner_button_label' . $i, __( 'Read More', 'business-vibes' ) );
	$btn_link[ $item_id ]  = get_theme_mod( 'business_vibes_banner_button_link' . $i );
}

$args = array(
	'post_type'           => $content_type,
	'post__in'            => array_filter( $content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$section_content[] = array(
			'id'            => get_the_ID(),
			'title'         => get_the_title(),
			'excerpt'       => wp_trim_words( get_the_content(), 20 ),
			'permalink'     => get_the_permalink(),
			'thumbnail_url' => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
		);
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'business_vibes_banner_section_content', $section_content );

	business_vibes_render_banner_section( $section_content, $btn_label, $btn_link );
endif;

/**
 * Render Banner Section
 */
function business_vibes_render_banner_section( $section_content, $btn_label, $btn_link ) {
	if ( empty( $section_content ) ) {
		return;
	}
	?>
	<section id="business_vibes_banner_section" class="business-vibes-main-banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			business_vibes_section_link( 'business_vibes_banner_section' );
		endif;
		?>
		<div class="main-slider">
			<?php
			$i = 1;
			foreach ( $section_content as $content ) {
				$item_id              = $content['id'];
				$btn_link[ $item_id ] = ! empty( $btn_link[ $item_id ] ) ? $btn_link[ $item_id ] : $content['permalink'];
				$video_url            = get_theme_mod( 'business_vibes_banner_video_url' . $i, '#' );
				$video_text           = get_theme_mod( 'business_vibes_banner_video_text' . $i );
				$section_subtitle     = get_theme_mod( 'business_vibes_banner_subtitle_' . $i, __( 'We Area Here For You', 'business-vibes' ) );
				?>
				<div class="business-vibes-banner-slider-single">
					<div class="business-vibes-banner-slider-img">
						<img src="<?php echo esc_url( $content['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
					</div>
					<div class="business-vibes-banner-slider-detail">
						<div class="ascendoor-wrapper">
							<div class="business-vibes-banner-slider-detail-inside">
								<?php if ( ! empty( $section_subtitle ) ) : ?>
									<h3 class="shopup-banner-sub-head-title"><?php echo esc_html( $section_subtitle ); ?></h3>
								<?php endif; ?>
								<h3 class="business-vibes-banner-head-title"><?php echo esc_html( $content['title'] ); ?></h3>
								<p><?php echo esc_html( $content['excerpt'] ); ?></p>
								<div class="ascendoor-button banner-slider-btn ascendoor-button-secondary-alternate">
									<?php
									if ( ! empty( $btn_label[ $item_id ] ) ) {
										?>
										<a href="<?php echo esc_url( $btn_link[ $item_id ] ); ?>"><?php echo esc_html( $btn_label[ $item_id ] ); ?></a>
										<?php
									}
									if ( ! empty( $video_url || $video_text ) ) :
										?>
										<span class="video-btn">
											<a href="<?php echo esc_url( $video_url ); ?>" class="business-vibes-video-popup business-vibes-play-btn" tabindex="0">
												<i class="fas fa-play"></i>
												<span class="video-btn-txt"><?php echo esc_html( $video_text ); ?></span>
											</a>
										</span>
										<?php
									endif;
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$i++;
			}
			?>
		</div>
	</section>
	<?php
}
