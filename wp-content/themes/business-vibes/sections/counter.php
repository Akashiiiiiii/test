<?php
if ( ! get_theme_mod( 'business_vibes_enable_counter_section', false ) ) {
	return;
}

$section_content = array();
$section_content = apply_filters( 'business_vibes_counter_section_content', $section_content );

business_vibes_render_counter_section( $section_content );

/**
 * Render Counter Section
 */
function business_vibes_render_counter_section( $section_content ) {
	$counter_bg_color         = get_theme_mod( 'business_vibes_primary_color_option', 'gradient-color' );
	$counter_bg_primary_color = get_theme_mod( 'primary_color', '#7462FB' );
	$style_attr               = '';
	if ( $counter_bg_color === 'primary-color' ) {
		if ( ! empty( $counter_bg_primary_color ) ) {
			$style_attr = 'background-color: ' . $counter_bg_primary_color . ';';
		}
	} elseif ( $counter_bg_color === 'gradient-color' ) {
		$style_attr = 'background-image: ' . 'var(--primary-gradient)' . ';';
	}
	?>
	<section id="business_vibes_counter_section" class="business-vibes-frontpage-section business-vibes-counter-section counter-style-two" style="<?php echo esc_attr( $style_attr ); ?>;">
		<?php
		if ( is_customize_preview() ) :
			business_vibes_section_link( 'business_vibes_counter_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="business-vibes-counter-details">
				<div class="business-vibes-section-body">
					<div class="business-vibes-counter-wrapper">
						<?php
						for ( $i = 1; $i <= 4; $i++ ) {

							$counter_icon = get_theme_mod( 'business_vibes_counter_fontawesome_icon_' . $i, 'fas fa-yen-sign' );
							$label        = get_theme_mod( 'business_vibes_counter_label_' . $i );
							$value        = get_theme_mod( 'business_vibes_counter_value_' . $i );
							$value_suffix = get_theme_mod( 'business_vibes_counter_value_suffix_' . $i );
							?>
							<div class="business-vibes-counter-single">
								<?php if ( ! empty( $counter_icon ) ) { ?>
									<div class="business-vibes-counter-img">
										<i class="<?php echo esc_attr( $counter_icon ); ?>"></i>
									</div>
								<?php } ?>
								<div class="business-vibes-counter-txt">
									<h3>
										<span class="count" data-count="<?php echo esc_attr( $value ); ?>"></span><?php echo esc_html( $value_suffix ); ?>
									</h3>
									<p><?php echo esc_html( $label ); ?></p>
								</div>
							</div>
							<?php
						}
						?>
					</div>      
				</div>
			</div>
		</div>
	</section>
	<?php
}
