<?php
/**
 * The template for displaying single portfolio items
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header text-center section bg-dark">
                <div class="container">
                    <span class="section-tag"><?php esc_html_e( 'CASE STUDY', 'closeclient' ); ?></span>
                    <?php the_title( '<h1 class="entry-title hero-headline reveal">', '</h1>' ); ?>
                    <div class="portfolio-meta text-muted mt-4 reveal">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                </div>
            </header>

            <div class="container section">
                <div class="portfolio-featured-image mb-5 reveal">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="aspect-hero" style="border-radius: var(--radius-xl); overflow: hidden;">
                            <?php the_post_thumbnail( 'full', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="entry-content container-narrow reveal">
                    <div class="glass p-5 mb-5">
                        <h2 class="h4 mb-4"><?php esc_html_e( 'The Challenge & Results', 'closeclient' ); ?></h2>
                        <?php the_content(); ?>
                    </div>

                    <div class="text-center mt-5">
                        <a href="<?php echo esc_url( get_theme_mod( 'closeclient_header_cta_link', '#' ) ); ?>" class="cc-button">
                            <?php esc_html_e( 'Get Results Like This →', 'closeclient' ); ?>
                        </a>
                    </div>
                </div>
            </article>

            <?php get_template_part( 'template-parts/sections/section-testimonials' ); ?>

        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
