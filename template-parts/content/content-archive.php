<?php
/**
 * Template part for displaying posts in archive
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post cc-card reveal' ); ?> style="padding: 50px;">
	<header class="entry-header" style="margin-bottom: 40px;">
        <div class="entry-meta" style="font-size: 0.85rem; color: var(--c-indigo); font-weight: 900; text-transform: uppercase; letter-spacing: 0.2em; margin-bottom: 20px;">
			<?php closeclient_posted_on(); ?>
		</div>
		<?php the_title( '<h2 class="entry-title" style="font-size: 2.2rem; line-height: 1; letter-spacing: -0.05em;"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" style="color: var(--c-white); text-decoration: none; transition: 0.3s;">', '</a></h2>' ); ?>
	</header>

	<div class="post-thumbnail-wrapper" style="margin-bottom: 40px; border-radius: 24px; overflow: hidden; background: var(--c-onyx-light);">
        <?php closeclient_post_thumbnail(); ?>
    </div>

	<div class="entry-summary" style="margin-bottom: 40px; color: var(--c-text-muted); font-size: 1.1rem; line-height: 1.7;">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="cc-button cc-button-secondary" style="padding: 16px 36px; font-size: 0.8rem;"><?php esc_html_e( 'Explore Article', 'closeclient' ); ?></a>
	</footer>
</article>
