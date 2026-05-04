<?php
/**
 * Template part for displaying search results
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result-card cc-card glass mb-4 reveal' ); ?>>
	<header class="entry-header mb-3">
        <div class="entry-meta section-tag small mb-2">
            <?php
            $post_type = get_post_type_object( get_post_type() );
            echo esc_html( $post_type->labels->singular_name );
            ?>
        </div>
		<?php the_title( sprintf( '<h2 class="entry-title h4 mb-0"><a href="%s" class="text-white text-decoration-none">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>

	<div class="entry-summary text-muted small lead">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer mt-4">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="cc-button cc-button-secondary small" style="padding: 10px 20px; font-size: 0.65rem;"><?php echo esc_html( get_theme_mod( 'closeclient_label_search_btn', 'Strategic Search' ) ); ?></a>
	</footer>
</article>
