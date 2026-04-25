<?php
/**
 * Template part for displaying posts in single.php (Enhanced)
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Article">
	<header class="entry-header">
		<div class="entry-category">
			<?php the_category( ', ' ); ?>
		</div>
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php
			closeclient_posted_on();
			closeclient_posted_by();
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php closeclient_post_thumbnail(); ?>

	<div class="entry-content" itemprop="articleBody">
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

	<footer class="entry-footer">
		<div class="social-sharing">
			<span class="share-title"><?php esc_html_e( 'Share this post:', 'closeclient' ); ?></span>
			<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ); ?>&url=<?php echo urlencode( get_permalink() ); ?>" class="share-link">Twitter</a>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" class="share-link">Facebook</a>
			<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode( get_permalink() ); ?>" class="share-link">LinkedIn</a>
		</div>

		<div class="author-box" itemprop="author" itemscope itemtype="https://schema.org/Person">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
			</div>
			<div class="author-info">
				<h3 class="author-name" itemprop="name"><?php the_author(); ?></h3>
				<p class="author-bio"><?php the_author_meta( 'description' ); ?></p>
			</div>
		</div>

		<?php closeclient_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
