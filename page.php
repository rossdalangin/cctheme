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
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'reveal' ); ?>>
                        <header class="entry-header section text-center">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                    <?php

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

    <?php
    // Always add a global CTA at the bottom of standard pages
    get_template_part( 'template-parts/sections/section-booking-cta' );
    ?>
</main>

<?php
get_footer();
