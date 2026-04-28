<?php
/**
 * The template for displaying portfolio archives
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <header class="archive-header section text-center bg-dark">
        <div class="container">
            <span class="section-tag"><?php esc_html_e( 'CASE STUDIES', 'closeclient' ); ?></span>
            <h1 class="hero-headline"><?php esc_html_e( 'Engineered Success Stories', 'closeclient' ); ?></h1>
            <p class="lead text-muted mt-4"><?php esc_html_e( 'Deep dives into how we transform expert knowledge into high-performance authority machines.', 'closeclient' ); ?></p>
        </div>
    </header>

    <div class="container section">
        <?php if ( have_posts() ) : ?>
            <div class="bento-grid">
                <?php
                $i = 0;
                while ( have_posts() ) :
                    the_post();
                    $i++;
                    $span = ( $i % 3 == 1 ) ? 'span 8' : 'span 4';
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-item cc-card reveal' ); ?> style="grid-column: <?php echo esc_attr($span); ?>;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="portfolio-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="portfolio-content">
                            <h3 class="h4 mb-3"><a href="<?php the_permalink(); ?>" class="text-white text-decoration-none"><?php the_title(); ?></a></h3>
                            <div class="text-muted small mb-4"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></div>
                            <a href="<?php the_permalink(); ?>" class="cc-button cc-button-secondary read-more-btn"><?php esc_html_e( 'View Case Study', 'closeclient' ); ?></a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination mt-5 text-center">
                <?php the_posts_navigation(); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>
</main>

<?php
get_footer();
