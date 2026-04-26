<?php
/**
 * The template for displaying search results pages
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php if ( have_posts() ) : ?>

            <header class="page-header section text-center">
                <h1 class="page-title">
                    <?php
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search Results for: %s', 'closeclient' ), '<span>' . get_search_query() . '</span>' );
                    ?>
                </h1>
            </header>

            <div class="blog-layout-wrapper section">
                <div class="blog-posts-grid">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content/content', 'search' );
                    endwhile;

                    the_posts_navigation();
                    ?>
                </div>

                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <?php get_sidebar(); ?>
                <?php endif; ?>
            </div>

        <?php else : ?>
            <div class="section">
                <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
