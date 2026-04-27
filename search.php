<?php
/**
 * The template for displaying search results pages
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container section">
        <header class="page-header text-center reveal" style="margin-bottom: 80px;">
            <span class="section-tag"><?php esc_html_e( 'SEARCH RESULTS', 'closeclient' ); ?></span>
            <h1 class="page-title h2">
                <?php printf( esc_html__( 'Query: %s', 'closeclient' ), '<span class="text-accent">' . get_search_query() . '</span>' ); ?>
            </h1>
            <div class="search-form-wrapper d-flex justify-content-center mt-5">
                <?php get_search_form(); ?>
            </div>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="blog-posts-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px;">
                <?php
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content/content-archive' );
                endwhile;
                ?>
            </div>

            <div class="pagination mt-5 text-center reveal">
                <?php the_posts_navigation(); ?>
            </div>

        <?php else : ?>
            <div class="no-results text-center py-5 reveal">
                <p class="lead text-muted"><?php esc_html_e( 'Nothing found. Try a different search?', 'closeclient' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
