<?php
/**
 * The template for displaying all single posts
 *
 * @package CloseClient
 */

get_header();
$layout = closeclient_get_layout();
?>

	<main id="primary" class="site-main">
        <div class="container <?php echo esc_attr( $layout ); ?>-container">
            <div class="content-area">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content/content', 'single' );

                    get_template_part( 'template-parts/content/blog-sticky-cta' );

                    // Related Posts
                    $categories = get_the_category();
                    if ( $categories ) :
                        $category_ids = array();
                        foreach( $categories as $category ) {
                            $category_ids[] = $category->term_id;
                        }
                        $related_query = new WP_Query( array(
                            'category__in'   => $category_ids,
                            'post__not_in'   => array( get_the_ID() ),
                            'posts_per_page' => 3,
                        ) );

                        if ( $related_query->have_posts() ) : ?>
                            <div class="related-posts">
                                <h2 class="related-title"><?php esc_html_e( 'Related Articles', 'closeclient' ); ?></h2>
                                <div class="related-grid">
                                    <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                                        <div class="related-post">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <div class="related-thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a></div>
                                            <?php endif; ?>
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>
                        <?php endif;
                    endif;

                    the_post_navigation();

                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile;
                ?>
            </div>

            <?php if ( 'full-width' !== $layout ) : ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>
        </div>
	</main><!-- #primary -->

<?php
get_footer();
