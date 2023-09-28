<?php
if ( ! get_theme_mod( 'business_vibes_enable_featured_video_section', false ) ) {
	return;
}

$section_content                  = array();
$section_content['subtitle']      = get_theme_mod( 'business_vibes_featured_video_subtitle', '' );
$section_content['title']         = get_theme_mod( 'business_vibes_featured_video_title', __( 'Watch the Video', 'business-vibes' ) );
$section_content['description']   = get_theme_mod( 'business_vibes_featured_video_short_description' );
$section_content['section_image'] = get_theme_mod( 'business_vibes_featured_video_section_image' );
$section_content['video_url']     = get_theme_mod( 'business_vibes_featured_video_video_link' );

$section_content = apply_filters( 'business_vibes_featured_video_section_content', $section_content );
business_vibes_render_featured_video_section( $section_content );

/**
 * Render Featured Video Section.
 */
function business_vibes_render_featured_video_section( $section_content ) {
	if ( empty( $section_content ) ) {
		return;
	}
	?>
	<section id="business_vibes_featured_video_section" class="business-vibes-frontpage-section business-vibes-product-video-section video-style-2 video-left">
		<?php
		if ( is_customize_preview() ) :
			business_vibes_section_link( 'business_vibes_featured_video_section' );
		endif;
		if ( ! empty( $section_content['section_image'] ) ) {
			?>
			<div class="business-vibes-product-video-background-img">
				<img src="<?php echo esc_url( $section_content['section_image'] ); ?>">
			</div>
			<?php
		}
		?>
		<div class="ascendoor-wrapper">
			<div class="video-details-wrapper">
				<div class="business-vibes-product-video-details">
					<div class="section-header-subtitle small-title">
						<h3 class="section-title video-detail-title"><?php echo esc_html( $section_content['title'] ); ?></h3>
						<p class="section-subtitle video-detail-subtitle"><?php echo esc_html( $section_content['subtitle'] ); ?></p>
					</div>
					<div class="video-detail">
						<p><?php echo wp_kses_post( $section_content['description'] ); ?></p>
					</div>
					<?php if ( ! empty( $section_content['video_url'] ) ) { ?>
						<a href="<?php echo esc_url( $section_content['video_url'] ); ?>" class="business-vibes-video-popup business-vibes-video-play-btn"><i class="fas fa-play"></i></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
