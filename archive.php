<?php
/**
 * The template for displaying archive pages
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container section">
        <header class="page-header text-center reveal" style="margin-bottom: 80px;">
            <span class="section-tag"><?php esc_html_e( 'INSIGHTS & STRATEGY', 'closeclient' ); ?></span>
            <?php
            the_archive_title( '<h1 class="page-title h2">', '</h1>' );
            the_archive_description( '<div class="archive-description text-muted mt-3">', '</div>' );
            ?>
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
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
