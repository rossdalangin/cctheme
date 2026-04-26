<?php
/**
 * The template for displaying all pages
 *
 * @package CloseClient
 */

get_header();

$layout = closeclient_get_layout();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="blog-layout">
            <div class="content-area">
                <?php
                while ( have_posts() ) :
                    the_post();
                    the_content();

                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                endwhile;
                ?>
            </div>

            <?php if ( 'full-width' !== $layout ) : ?>
                <aside id="secondary" class="sidebar">
                    <?php get_sidebar(); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer();
