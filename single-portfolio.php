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
        $challenge = get_post_meta( get_the_ID(), '_portfolio_challenge', true );
        $solution  = get_post_meta( get_the_ID(), '_portfolio_solution', true );
        $outcome   = get_post_meta( get_the_ID(), '_portfolio_outcome', true );
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header text-center section section-lg bg-dark overflow-hidden">
                <div class="mesh-gradient"></div>
                <div class="container">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_portfolio_single', 'SUCCESS STORY' ) ); ?></span>
                    <?php the_title( '<h1 class="entry-title hero-headline gradient-text reveal">', '</h1>' ); ?>
                    <div class="portfolio-meta text-muted mt-4 reveal py-md">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                </div>
            </header>

            <div class="container section py-xl">
                <div class="portfolio-featured-image mb-5 reveal py-md">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="aspect-hero">
                            <?php the_post_thumbnail( 'full' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="entry-content container-narrow reveal py-lg">
                    <?php if ( $challenge ) : ?>
                        <div class="case-study-block glass p-5 border-accent mb-4">
                            <h2 class="h4 mb-4 text-accent"><?php echo esc_html( get_theme_mod( 'closeclient_label_challenge', '01. The Challenge' ) ); ?></h2>
                            <div class="text-muted"><?php echo wp_kses_post( $challenge ); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $solution ) : ?>
                        <div class="case-study-block glass p-5">
                            <h2 class="h4 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_label_solution', '02. The Architecture' ) ); ?></h2>
                            <div class="text-muted"><?php echo wp_kses_post( $solution ); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $outcome ) : ?>
                        <div class="case-study-block glass p-5 outcome-block">
                            <h2 class="h4 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_label_outcome', '03. The Result' ) ); ?></h2>
                            <div class="h3 fw-bold mb-0"><?php echo wp_kses_post( $outcome ); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php $metric = get_post_meta( get_the_ID(), '_portfolio_metric', true ); ?>
                    <?php if ( $metric ) : ?>
                        <div class="case-study-metric glass p-5 border-accent mb-4 text-center">
                            <span class="section-tag small"><?php echo esc_html__( 'KEY PERFORMANCE METRIC', 'closeclient' ); ?></span>
                            <div class="h1 gradient-text mb-0 mt-2"><?php echo esc_html( $metric ); ?></div>
                        </div>
                    <?php endif; ?>

                    <div class="main-body mt-5">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    $next_post = get_next_post();
                    if ( $next_post ) : ?>
                        <div class="next-case-study mt-5 pt-5 border-top border-secondary">
                            <div class="glass p-5 reveal d-flex justify-content-between align-items-center flex-wrap gap-4">
                                <div>
                                    <span class="section-tag small mb-2"><?php echo esc_html__( 'NEXT SUCCESS STORY', 'closeclient' ); ?></span>
                                    <h4 class="h3 mb-0 text-white"><?php echo esc_html( $next_post->post_title ); ?></h4>
                                </div>
                                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="cc-button cc-button-secondary"><?php echo esc_html__( 'View Case Study →', 'closeclient' ); ?></a>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </article>

        <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>

        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
