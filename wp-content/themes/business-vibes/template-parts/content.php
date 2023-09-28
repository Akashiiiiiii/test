<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Business_Vibes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				business_vibes_posted_on();
				business_vibes_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php business_vibes_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php business_vibes_entry_footer(); ?>
		<div class="ascendoor-button ascendoor-button-noborder-noalternate">
			<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_theme_mod( 'business_vibes_excerpt_more_text', __( 'Read More', 'business-vibes' ) ) ); ?></a>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
