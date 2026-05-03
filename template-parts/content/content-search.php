<?php
/**
 * Template part for displaying results in search pages
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result-item' ); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php closeclient_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer mt-4">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="cc-button cc-button-secondary small"><?php echo esc_html( get_theme_mod( 'closeclient_label_search_btn', 'Strategic Search' ) ); ?></a>
	</footer>
</article>
