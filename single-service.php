<?php
/**
 * The template for displaying single service items
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
            <header class="entry-header text-center section">
                <div class="container container-narrow">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_service_single', 'SERVICE DETAIL' ) ); ?></span>
                    <?php the_title( '<h1 class="entry-title hero-headline reveal">', '</h1>' ); ?>
                    <p class="lead text-muted mt-4 reveal"><?php echo get_the_excerpt(); ?></p>
                </div>
            </header>

            <div class="container section">
                <div class="entry-content container-narrow reveal">
                    <div class="glass border-accent service-detail-glass">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php get_template_part( 'template-parts/sections/section-process' ); ?>
                <?php get_template_part( 'template-parts/sections/section-pricing' ); ?>
                <?php get_template_part( 'template-parts/sections/section-faq' ); ?>
            </div>
        </article>

        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
