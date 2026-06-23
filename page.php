<?php
/**
 * The template for displaying all pages
 *
 * @package CloseClient
 */

get_header();

// We default to full-width for all pages to maintain a clean, conversion-focused look.
// Coaches and consultants usually don't need sidebars on static pages.
$layout = 'full-width';
?>

<main id="primary" class="site-main">
    <div class="container section section-lg">
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'reveal' ); ?>>
            <header class="entry-header text-center mb-5">
                <?php the_title( '<h1 class="entry-title hero-headline gradient-text">', '</h1>' ); ?>
            </header>

            <div class="entry-content py-lg">
                <?php
                the_content();

                wp_link_pages(
                    array(
                                'before' => '<div class="page-links">' . esc_html( get_theme_mod( 'closeclient_label_page_links', 'Pages:' ) ),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div>
        </article>
    </div>

    <?php
    // Always add a global CTA at the bottom of standard pages
    get_template_part( 'template-parts/sections/section-booking-cta' );
    ?>
</main>

<?php
get_footer();
