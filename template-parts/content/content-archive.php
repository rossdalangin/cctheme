<?php
/**
 * Template part for displaying posts in archive
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post reveal' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta" style="font-size: 0.85rem; color: var(--text-muted); margin-top: 8px;">
			<?php closeclient_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="post-thumbnail-wrapper" style="margin-top: 24px;">
        <?php closeclient_post_thumbnail(); ?>
    </div>

	<div class="entry-summary" style="margin: 24px 0;">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="button button-secondary" style="padding: 12px 24px; font-size: 0.85rem;"><?php esc_html_e( 'Read Article', 'closeclient' ); ?></a>
	</footer>
</article>
