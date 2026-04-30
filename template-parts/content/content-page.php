<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content-wrapper' ); ?>>
	<header class="entry-header mb-5">
		<?php the_title( '<h1 class="entry-title hero-headline gradient-text">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php closeclient_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'closeclient' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'closeclient' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
