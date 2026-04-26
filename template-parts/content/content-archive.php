<?php
/**
 * Template part for displaying posts in archive
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post reveal' ); ?>>
	<header class="entry-header" style="margin-bottom: 32px;">
		<?php the_title( '<h2 class="entry-title" style="font-size: 1.8rem; line-height: 1.2; margin-bottom: 15px;"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta" style="font-size: 0.85rem; color: var(--c-text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">
			<?php closeclient_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="post-thumbnail-wrapper" style="margin-bottom: 32px; border-radius: 20px; overflow: hidden; background: var(--c-secondary);">
        <?php closeclient_post_thumbnail(); ?>
    </div>

	<div class="entry-summary" style="margin-bottom: 32px; color: var(--c-text-muted); font-size: 1.05rem; line-height: 1.7;">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="button button-secondary" style="padding: 12px 32px; font-size: 0.85rem;"><?php esc_html_e( 'Read Article', 'closeclient' ); ?></a>
	</footer>
</article>
