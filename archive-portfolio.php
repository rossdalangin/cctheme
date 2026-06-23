<?php
/**
 * The template for displaying portfolio archives
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <header class="archive-header section text-center bg-dark overflow-hidden">
        <div class="mesh-gradient"></div>
        <div class="container">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_portfolio_archive_tag', 'CASE STUDIES' ) ); ?></span>
            <h1 class="hero-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_label_portfolio_archive_title', 'Engineered Success Stories' ) ); ?></h1>
            <p class="lead text-muted mt-4"><?php echo esc_html( get_theme_mod( 'closeclient_label_portfolio_archive_desc', 'Deep dives into how we transform digital presence into high-performance authority machines.' ) ); ?></p>
        </div>
    </header>

    <div class="container section">
        <?php
        $terms = get_terms( array( 'taxonomy' => 'portfolio_cat', 'hide_empty' => true ) );
        if ( ! empty( $terms ) ) : ?>
            <div class="archive-filters mb-5 pb-5 d-flex justify-content-center gap-3 reveal">
                <a href="<?php echo esc_url( get_post_type_archive_link( 'portfolio' ) ); ?>" class="filter-link glass p-2 px-4 small fw-bold active"><?php echo esc_html__( 'All Stories', 'closeclient' ); ?></a>
                <?php foreach ( $terms as $term ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="filter-link glass p-2 px-4 small fw-bold"><?php echo esc_html( $term->name ); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
            <div class="portfolio-grid">
                <?php
                $i = 0;
                while ( have_posts() ) :
                    the_post();
                    $i++;
                    $span = ( $i % 5 == 1 || $i % 5 == 0 ) ? 'bento-span-8' : 'bento-span-4';
                    $reveal_class = ( $i <= 3 ) ? '' : 'reveal';
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( "portfolio-item cc-card $reveal_class $span d-flex flex-column h-100 p-0" ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="portfolio-image" style="height: 300px; overflow: hidden;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="portfolio-content p-5 flex-grow-1 d-flex flex-column">
                            <?php $metric = get_post_meta( get_the_ID(), '_portfolio_metric', true ); ?>
                            <?php if ( $metric ) : ?>
                                <div class="portfolio-metric badge bg-accent text-white mb-4 p-2 px-3 small fw-bold reveal-stagger"><?php echo esc_html__( 'RESULT:', 'closeclient' ); ?> <?php echo esc_html( $metric ); ?></div>
                            <?php endif; ?>
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
