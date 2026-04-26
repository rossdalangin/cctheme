<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CloseClient
 */

get_header();

$layout = closeclient_get_layout();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php if ( have_posts() ) : ?>

            <header class="page-header section text-center reveal">
                <span class="section-tag"><?php esc_html_e( 'ARCHIVE', 'closeclient' ); ?></span>
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header>

            <div class="blog-layout">
                <div class="blog-posts">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content/content', 'archive' );
                    endwhile;

                    the_posts_navigation();
                    ?>
                </div>

                <?php if ( 'full-width' !== $layout ) : ?>
                    <aside id="secondary" class="sidebar">
                        <?php get_sidebar(); ?>
                    </aside>
                <?php endif; ?>
            </div>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content/content', 'none' ); ?>

        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
