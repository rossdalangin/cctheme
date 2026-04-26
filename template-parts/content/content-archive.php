<?php
/**
 * Template part for displaying posts in archive
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post cc-card reveal' ); ?> style="padding: 40px;">
	<header class="entry-header" style="margin-bottom: 24px;">
		<?php the_title( '<h2 class="entry-title" style="font-size: 1.5rem; line-height: 1.2; margin-bottom: 15px;"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" style="color: var(--c-white); text-decoration: none;">', '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta" style="font-size: 0.8rem; color: var(--c-text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">
			<?php closeclient_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="post-thumbnail-wrapper" style="margin-bottom: 24px; border-radius: 12px; overflow: hidden; background: var(--c-secondary);">
        <?php closeclient_post_thumbnail(); ?>
    </div>

	<div class="entry-summary" style="margin-bottom: 24px; color: var(--c-text-muted); font-size: 0.95rem; line-height: 1.6;">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="cc-button cc-button-secondary" style="padding: 12px 24px; font-size: 0.75rem;"><?php esc_html_e( 'Read Article', 'closeclient' ); ?></a>
	</footer>
</article>
