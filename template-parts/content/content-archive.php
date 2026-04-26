<?php
/**
 * Template part for displaying posts in archive
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post card reveal' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title" style="font-size: 1.5rem; line-height: 1.2;"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" style="color: inherit; text-decoration: none;">', '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta" style="font-size: 0.85rem; color: var(--c-text-muted); margin-top: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">
			<?php closeclient_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="post-thumbnail-wrapper" style="margin-top: 32px; border-radius: 16px; overflow: hidden;">
        <?php closeclient_post_thumbnail(); ?>
    </div>

	<div class="entry-summary" style="margin: 24px 0; color: var(--c-text-muted); font-size: 1rem; line-height: 1.7;">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="button button-secondary" style="padding: 12px 28px; font-size: 0.85rem;"><?php esc_html_e( 'Read Article', 'closeclient' ); ?></a>
	</footer>
</article>
