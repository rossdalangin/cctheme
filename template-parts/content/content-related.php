<?php
/**
 * Related Posts Template Part
 *
 * @package CloseClient
 */

$related_posts = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post__not_in'   => array( get_the_ID() ),
    'orderby'        => 'rand',
) );

if ( $related_posts->have_posts() ) : ?>
	<section class="section section-related-posts bg-dark border-top border-secondary">
		<div class="container">
			<div class="section-header mb-5">
				<h3 class="h4"><?php echo esc_html( get_theme_mod( 'closeclient_label_related', 'More Engineering Insights' ) ); ?></h3>
			</div>

			<div class="related-posts-grid">
				<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
					<div class="related-post-card cc-card">
						<div class="post-meta section-tag small mb-3"><?php closeclient_posted_on(); ?></div>
						<h4 class="h5 mb-3"><a href="<?php the_permalink(); ?>" class="text-white text-decoration-none"><?php the_title(); ?></a></h4>
						<a href="<?php the_permalink(); ?>" class="small text-accent text-decoration-none fw-bold"><?php echo esc_html( get_theme_mod( 'closeclient_label_read_more', 'READ FULL ARTICLE →' ) ); ?></a>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
<?php endif; ?>
