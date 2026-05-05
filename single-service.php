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
            <header class="entry-header text-center section section-lg bg-dark overflow-hidden">
                <div class="mesh-gradient"></div>
                <div class="container container-narrow">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_service_single', 'SYSTEM DETAIL' ) ); ?></span>
                    <?php the_title( '<h1 class="entry-title hero-headline gradient-text reveal">', '</h1>' ); ?>
                    <p class="lead text-muted mt-4 reveal py-md"><?php echo get_the_excerpt(); ?></p>
                </div>
            </header>

            <div class="container section py-xl">
                <div class="entry-content container-narrow reveal py-md">
                    <?php
                    $blueprint = get_post_meta( get_the_ID(), '_service_blueprint', true );
                    if ( $blueprint ) : ?>
                        <div class="service-blueprint-checklist glass p-5 border-accent mb-5">
                            <h3 class="h5 mb-4 text-white"><?php echo esc_html__( 'System Architecture Blueprint', 'closeclient' ); ?></h3>
                            <div class="cc-grid-2">
                                <?php
                                $items = explode( ',', $blueprint );
                                foreach ( $items as $item ) : ?>
                                    <div class="blueprint-item d-flex align-items-center gap-3 mb-2">
                                        <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                                        <span class="small text-muted"><?php echo esc_html( trim($item) ); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="glass service-detail-glass p-5">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php get_template_part( 'template-parts/sections/section-process' ); ?>
                <?php get_template_part( 'template-parts/sections/section-pricing' ); ?>
                <?php get_template_part( 'template-parts/sections/section-faq' ); ?>
            </div>

            <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>
        </article>

        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
