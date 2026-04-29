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
            <header class="entry-header text-center section bg-dark">
                <div class="container">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_portfolio_single', 'CASE STUDY' ) ); ?></span>
                    <?php the_title( '<h1 class="entry-title hero-headline reveal">', '</h1>' ); ?>
                    <div class="portfolio-meta text-muted mt-4 reveal">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                </div>
            </header>

            <div class="container section">
                <div class="portfolio-featured-image mb-5 reveal">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="aspect-hero">
                            <?php the_post_thumbnail( 'full' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="entry-content container-narrow reveal">
                    <?php if ( $challenge ) : ?>
                        <div class="case-study-block glass p-5 border-accent">
                            <h2 class="h4 mb-4 text-accent"><?php echo esc_html( get_theme_mod( 'closeclient_label_challenge', '01. The Challenge' ) ); ?></h2>
                            <div class="text-muted"><?php echo wp_kses_post( $challenge ); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $solution ) : ?>
                        <div class="case-study-block glass p-5">
                            <h2 class="h4 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_label_solution', '02. The Authority Architecture' ) ); ?></h2>
                            <div class="text-muted"><?php echo wp_kses_post( $solution ); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $outcome ) : ?>
                        <div class="case-study-block glass p-5 outcome-block">
                            <h2 class="h4 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_label_outcome', '03. The Result' ) ); ?></h2>
                            <div class="h3 fw-bold mb-0"><?php echo wp_kses_post( $outcome ); ?></div>
                        </div>
                    <?php endif; ?>

                    <div class="main-body mt-5">
                        <?php the_content(); ?>
                    </div>

                    <div class="text-center mt-5">
                        <a href="<?php echo esc_url( get_theme_mod( 'closeclient_header_cta_link', '#audit' ) ); ?>" class="cc-button">
                            <?php echo esc_html( get_theme_mod( 'closeclient_label_cta_portfolio', 'Get Results Like This →' ) ); ?>
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
