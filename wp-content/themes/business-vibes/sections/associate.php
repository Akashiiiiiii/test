<?php

if ( ! get_theme_mod( 'business_vibes_enable_associate_section', false ) ) {
	return;
}

$section_content = array();
$section_content = apply_filters( 'business_vibes_associate_section_content', $section_content );

business_vibes_render_associate_section( $section_content );

/**
 * Render Associate Section
 */
function business_vibes_render_associate_section( $section_content ) {
	?>
	<section id="business_vibes_associate_section" class="business-vibes-frontpage-section business-vibes-brands-slider">
		<?php
		if ( is_customize_preview() ) :
			business_vibes_section_link( 'business_vibes_associate_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="business-vibes-section-body">
				<div class="business-vibes-brands-slider-wrapper brand-slider">
					<?php
					for ( $i = 1; $i <= 5; $i++ ) {
						$logo     = get_theme_mod( 'business_vibes_associate_logo_' . $i );
						$logo_url = get_theme_mod( 'business_vibes_associate_logo_url_' . $i );
						$logo_url = ! empty( $logo_url ) ? $logo_url : '#';
						if ( ! empty( $logo ) ) {
							?>
							<div class="business-vibes-brand-single">
								<a href="<?php echo esc_url( $logo_url ); ?>" target="_blank"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr__( 'associate-logo', 'business-vibes' ); ?>"></a>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
