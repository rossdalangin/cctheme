<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CloseClient
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Article">
	<header class="entry-header mb-4">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title hero-headline gradient-text" itemprop="headline">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title h3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="text-white text-decoration-none">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				closeclient_posted_on();
				closeclient_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php closeclient_post_thumbnail(); ?>

	<div class="entry-content py-md" itemprop="articleBody">
		<?php
		the_content(
			sprintf(
				wp_kses(
					get_theme_mod( 'closeclient_label_continue_reading', 'Continue reading<span class="screen-reader-text"> "%s"</span>' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html( get_theme_mod( 'closeclient_label_page_links', 'Pages:' ) ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php closeclient_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
