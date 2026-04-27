<?php
/**
 * Related posts template part
 *
 * @package CloseClient
 */

$categories = get_the_category( get_the_ID() );

if ( $categories ) {
	$category_ids = array();
	foreach ( $categories as $category ) {
		$category_ids[] = $category->term_id;
	}

	$related_query = new WP_Query( array(
		'category__in'   => $category_ids,
		'post__not_in'   => array( get_the_ID() ),
		'posts_per_page' => 2,
		'orderby'        => 'rand',
	) );

	if ( $related_query->have_posts() ) : ?>
		<section class="related-posts reveal">
			<h3 class="h4"><?php esc_html_e( 'More Authority Insights', 'closeclient' ); ?></h3>
			<div class="related-posts-grid">
				<?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
					<div class="related-post-card cc-card" style="padding:30px;">
						<h4 class="h5 mb-3"><a href="<?php the_permalink(); ?>" style="color:var(--c-white); text-decoration:none;"><?php the_title(); ?></a></h4>
						<a href="<?php the_permalink(); ?>" class="small text-accent" style="text-decoration:none; font-weight:700;"><?php esc_html_e( 'READ ARTICLE →', 'closeclient' ); ?></a>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</section>
	<?php endif;
}
