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
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_portfolio_archive_tag', 'CASE STUDIES' ) ); ?></span>
            <h1 class="hero-headline"><?php echo esc_html( get_theme_mod( 'closeclient_label_portfolio_archive_title', 'Engineered Success Stories' ) ); ?></h1>
            <p class="lead text-muted mt-4"><?php echo esc_html( get_theme_mod( 'closeclient_label_portfolio_archive_desc', 'Deep dives into how we transform expert knowledge into high-performance authority machines.' ) ); ?></p>
        </div>
    </header>

    <div class="container section">
        <?php if ( have_posts() ) : ?>
            <div class="portfolio-grid">
                <?php
                $i = 0;
                while ( have_posts() ) :
                    the_post();
                    $i++;
                    $span = ( $i % 3 == 1 ) ? 'bento-span-8' : 'bento-span-4';
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( "portfolio-item cc-card reveal $span" ); ?>>
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
                            <a href="<?php the_permalink(); ?>" class="cc-button cc-button-secondary read-more-btn"><?php echo esc_html( get_theme_mod( 'closeclient_label_portfolio_btn', 'View Case Study' ) ); ?></a>
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
