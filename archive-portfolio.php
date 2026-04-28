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
            <div class="bento-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px;">
                <?php
                $i = 0;
                while ( have_posts() ) :
                    the_post();
                    $i++;
                    $span = ( $i % 3 == 1 ) ? 'span 8' : 'span 4';
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-item cc-card reveal' ); ?> style="grid-column: <?php echo esc_attr($span); ?>; padding: 0; overflow: hidden;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="portfolio-image" style="aspect-ratio: 16/9; overflow: hidden;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: 100%; object-fit: cover; transition: 0.5s;' ) ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="portfolio-content p-5">
                            <h3 class="h4 mb-3"><a href="<?php the_permalink(); ?>" style="text-decoration:none; color:inherit;"><?php the_title(); ?></a></h3>
                            <div class="text-muted small mb-4"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></div>
                            <a href="<?php the_permalink(); ?>" class="cc-button cc-button-secondary" style="padding: 12px 32px; font-size: 0.8rem;"><?php esc_html_e( 'View Case Study', 'closeclient' ); ?></a>
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

<style>
.portfolio-item:hover .portfolio-image img { transform: scale(1.05); }
@media (max-width: 992px) {
    .portfolio-item { grid-column: span 12 !important; }
}
</style>

<?php
get_footer();
