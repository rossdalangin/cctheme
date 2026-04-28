<?php
/**
 * The template for displaying service archives
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <header class="archive-header section text-center">
        <div class="container container-narrow">
            <span class="section-tag"><?php esc_html_e( 'CORE CAPABILITIES', 'closeclient' ); ?></span>
            <h1 class="hero-headline"><?php esc_html_e( 'The Architecture of Dominance', 'closeclient' ); ?></h1>
            <p class="lead text-muted mt-4"><?php esc_html_e( 'Strategic systems engineered to crush the complexity ceiling and scale your high-ticket impact.', 'closeclient' ); ?></p>
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
                    $span = ( $i == 1 || $i == 4 ) ? 'span 8' : 'span 4';
                    $icons = array('⚡', '💎', '🚀', '🎯', '🔥', '🛠️');
                    $icon = isset($icons[$i-1]) ? $icons[$i-1] : '⚡';
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'service-item cc-card reveal' ); ?> style="grid-column: <?php echo esc_attr($span); ?>;">
                        <div class="service-icon mb-4" style="font-size: 2.5rem;"><?php echo $icon; ?></div>
                        <h3 class="h4 mb-3"><a href="<?php the_permalink(); ?>" style="text-decoration:none; color:inherit;"><?php the_title(); ?></a></h3>
                        <div class="text-muted small mb-4"><?php echo wp_trim_words( get_the_excerpt(), 25 ); ?></div>
                        <a href="<?php the_permalink(); ?>" class="cc-button cc-button-secondary" style="padding: 10px 24px; font-size: 0.75rem;"><?php esc_html_e( 'System Details →', 'closeclient' ); ?></a>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php get_template_part( 'template-parts/sections/section-pricing' ); ?>
</main>

<style>
@media (max-width: 992px) {
    .service-item { grid-column: span 12 !important; }
}
</style>

<?php
get_footer();
