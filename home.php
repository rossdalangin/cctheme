<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CloseClient
 */

get_header();
?>

	<main id="primary" class="site-main">

        <header class="page-header section text-center reveal">
            <div class="container">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_blog_title', 'Insights & Authority' ) ); ?></span>
                <h1 class="hero-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_blog_description', 'Expert strategies to scale your coaching business.' ) ); ?></h1>
            </div>
        </header>

		<div class="container section-sm">
            <?php if ( have_posts() ) : ?>
                <?php
                $show_sidebar = get_theme_mod( 'closeclient_blog_sidebar', true );
                $layout_class = $show_sidebar ? 'blog-layout-wrapper' : '';
                ?>
                <div class="featured-post-wrapper mb-5">
                    <?php
                    // Display the latest post as featured
                    $featured_query = new WP_Query( array( 'posts_per_page' => 1 ) );
                    if ( $featured_query->have_posts() ) :
                        while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
                            <div class="featured-post-item reveal">
                                <div class="featured-image">
                                    <?php closeclient_post_thumbnail(); ?>
                                </div>
                                <div class="featured-content">
                                    <div class="post-meta section-tag mb-3"><?php closeclient_posted_on(); ?></div>
                                    <h2 class="h2 mb-4"><a href="<?php the_permalink(); ?>" class="text-white text-decoration-none"><?php the_title(); ?></a></h2>
                                    <div class="post-excerpt text-muted mb-5"><?php the_excerpt(); ?></div>
                                    <a href="<?php the_permalink(); ?>" class="cc-button"><?php esc_html_e( 'Read Deep Dive →', 'closeclient' ); ?></a>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>

                <div class="<?php echo esc_attr( $layout_class ); ?>">
                <div class="blog-posts-grid">
                    <?php
                    // Display posts excluding the featured one
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $posts_per_page = 6;

                    // Correcting pagination with offset
                    $offset = 1;
                    $actual_offset = ( ( $paged - 1 ) * $posts_per_page ) + $offset;

                    $grid_query = new WP_Query( array(
                        'post_type'      => 'post',
                        'posts_per_page' => $posts_per_page,
                        'offset'         => $actual_offset,
                        'paged'          => $paged
                    ) );

                    if ( $grid_query->have_posts() ) :
                        while ( $grid_query->have_posts() ) : $grid_query->the_post();
                            get_template_part( 'template-parts/content/content', 'archive' );
                        endwhile;
                    ?>
                </div>

                <div class="pagination-wrapper mt-5 text-center">
                    <?php
                    echo paginate_links( array(
                        'total'   => ceil( ( $grid_query->found_posts - $offset ) / $posts_per_page ),
                        'current' => $paged,
                    ) );
                    ?>
                </div>
                <?php
                    wp_reset_postdata();
                    endif;
                ?>
                </div>

                <?php if ( $show_sidebar ) : ?>
                    <aside class="post-sidebar px-lg">
                        <?php get_template_part( 'template-parts/content/blog-sticky-cta' ); ?>
                        <div class="sidebar-widgets glass p-4 mt-4">
                            <?php get_sidebar(); ?>
                        </div>
                    </aside>
                <?php endif; ?>
                </div>

            <?php else : ?>
                <?php get_template_part( 'template-parts/content/content-none' ); ?>
            <?php endif; ?>
        </div>

        <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>

	</main><!-- #main -->

<?php
get_footer();
