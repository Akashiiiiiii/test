<?php

if ( ! get_theme_mod( 'business_vibes_enable_team_section', false ) ) {
	return;
}

$content_id   = array();
$content_type = get_theme_mod( 'business_vibes_team_content_type', 'post' );

for ( $i = 1; $i <= 3; $i++ ) {
	$content_id[] = get_theme_mod( 'business_vibes_team_content_post_' . $i );
}

$args = array(
	'post_type'          => $content_type,
	'post__in'           => array_filter( $content_id ),
	'orderby'            => 'post__in',
	'posts_per_page'     => absint( 3 ),
	'ignore_sticky_post' => true,
);

$args = apply_filters( 'business_vibes_team_section_args', $args );

business_vibes_render_team_section( $args );

/**
 * Render Team Section
 */
function business_vibes_render_team_section( $args ) {
	$section_title       = get_theme_mod( 'business_vibes_team_section_title', __( 'Our Team', 'business-vibes' ) );
	$section_subtitle    = get_theme_mod( 'business_vibes_team_section_subtitle', '' );
	$view_all_button     = get_theme_mod( 'business_vibes_team_button_label', 'View All' );
	$view_all_button_url = get_theme_mod( 'business_vibes_team_button_link', '' );
	$query               = new WP_Query( $args );
	if ( $query->have_posts() ) {
		?>
		<section id="business_vibes_team_section" class="business-vibes-frontpage-section business-vibes-teams-section team-style-1">
			<?php
			if ( is_customize_preview() ) :
				business_vibes_section_link( 'business_vibes_team_section' );
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
					<div class="business-vibes-teams-section-wrapper">
						<?php
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							$designation      = get_theme_mod( 'business_vibes_team_designation_' . $i, '' );
							$contact_number   = get_theme_mod( 'business_vibes_team_contact_number_' . $i, '' );
							$email_address    = get_theme_mod( 'business_vibes_team_email_address_' . $i, '' );
							$social_links_str = get_theme_mod( 'business_vibes_team_social_links_' . $i );
							if ( ! empty( $social_links_str ) ) {
								$social_links[ get_the_ID() ] = explode( ',', $social_links_str );
							}
							?>
							<div class="teams-single">
								<div class="teams-img">
									<?php the_post_thumbnail(); ?>
									<?php if ( ! empty( $social_links[ get_the_ID() ] ) ) { ?>
										<div class="teams-social">
											<?php foreach ( $social_links[ get_the_ID() ] as $link ) { ?>
												<a href="<?php echo esc_url( $link ); ?>" target="_blank"></a>
											<?php } ?>
										</div>
									<?php } ?>
								</div>
								<div class="teams-detial">
									<div class="team-detail-inner">
										<h3 class="team-name">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<?php if ( ! empty( $designation ) ) : ?>
											<p class="team-designation"><?php echo esc_html( $designation ); ?></p>
										<?php endif ?>
									</div>
									<div class="contact-details">
										<?php if ( ! empty( $contact_number ) ) : ?>
											<a href="tel:<?php echo esc_attr( $contact_number ); ?>" class="contact-phone"><i class="fas fa-phone-alt"></i><?php echo esc_html( $contact_number ); ?></a>
										<?php endif; ?>
										<?php if ( ! empty( $email_address ) ) : ?>
											<a href="mailto:<?php echo esc_attr( $email_address ); ?>" class="contact-email"><i class="fas fa-envelope"></i><?php echo esc_html( $email_address ); ?></a>
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
					<?php if ( ! empty( $view_all_button ) ) { ?>
						<div class="business-vibes-teams-view-all ascendoor-button">
							<a href="<?php echo esc_url( $view_all_button_url ); ?>"><?php echo esc_html( $view_all_button ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php
	}
}
