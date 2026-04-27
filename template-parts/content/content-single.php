<?php
/**
 * Template part for displaying single posts
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center section">
        <div class="container container-narrow">
            <div class="entry-meta" style="font-size: 0.9rem; color: var(--c-accent); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 20px;">
                <?php closeclient_posted_on(); ?>
            </div>
            <?php the_title( '<h1 class="entry-title reveal">', '</h1>' ); ?>
        </div>
	</header>

	<div class="post-thumbnail-container container reveal" style="margin-bottom: 80px;">
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="aspect-hero" style="border-radius: var(--radius-xl); overflow: hidden;">
                <?php the_post_thumbnail( 'full', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
            </div>
        <?php endif; ?>
	</div>

	<div class="entry-content container container-narrow reveal">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'closeclient' ),
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
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'closeclient' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer container container-narrow">
		<?php closeclient_entry_footer(); ?>

        <div class="author-box reveal">
            <div class="author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
            </div>
            <div class="author-info">
                <h4><?php echo esc_html( get_the_author() ); ?></h4>
                <p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
            </div>
        </div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
