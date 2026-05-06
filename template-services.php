<?php
/**
 * Template Name: Services Template
 *
 * @package CloseClient
 */

get_header();

$headline    = get_theme_mod( 'closeclient_services_hero_headline_tpl', 'Bespoke Systems for High-Ticket Experts.' );
$subheadline = get_theme_mod( 'closeclient_services_subheadline_tpl', 'We don\'t just build websites. We architect the infrastructure of omnipresent authority.' );
?>

<main id="primary" class="site-main services-template">
    <section class="section section-lg text-center reveal overflow-hidden bg-dark">
        <div class="mesh-gradient"></div>
        <div class="container">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_service_archive_tag', 'OUR CAPABILITIES' ) ); ?></span>
            <h1 class="hero-headline gradient-text"><?php echo esc_html( $headline ); ?></h1>
            <div class="container-narrow">
                <p class="hero-subheadline py-md text-muted lead"><?php echo esc_html( $subheadline ); ?></p>
            </div>
        </div>
    </section>

    <!-- Interactive System Breakdown -->
    <section class="section section-lg bg-black">
        <div class="container">
            <div class="bento-grid">
                <div class="bento-span-12 glass p-5 mb-4 reveal text-center">
                    <h2 class="h2 mb-4">The Infrastructure Stack</h2>
                    <p class="text-muted max-w-700 mx-auto">Our systems are not mere websites. They are high-fidelity digital machines built with a specific hierarchy of authority.</p>
                </div>

                <div class="bento-span-4 cc-card reveal">
                    <div class="h1 text-accent mb-4">01</div>
                    <h3 class="h4 text-white">Foundation</h3>
                    <p class="small text-muted">Core technical architecture, performance optimization, and mobile-first engineering.</p>
                </div>
                <div class="bento-span-4 cc-card reveal">
                    <div class="h1 text-accent mb-4">02</div>
                    <h3 class="h4 text-white">Psychology</h3>
                    <p class="small text-muted">Conversion-focused UX, authority positioning, and strategic copywriting triggers.</p>
                </div>
                <div class="bento-span-4 cc-card reveal">
                    <div class="h1 text-accent mb-4">03</div>
                    <h3 class="h4 text-white">Omnipresence</h3>
                    <p class="small text-muted">CRM integration, automated intake funnels, and multi-channel lead tracking.</p>
                </div>
            </div>
        </div>
    </section>

    <?php
    $content = get_the_content();
    if ( empty( $content ) ) {
        get_template_part( 'template-parts/sections/section-services' );
        get_template_part( 'template-parts/sections/section-process' );
        get_template_part( 'template-parts/sections/section-pricing' );
        get_template_part( 'template-parts/sections/section-booking-cta' );
    } else {
        echo '<div class="container section py-xl">' . apply_filters( 'the_content', $content ) . '</div>';
    }
    ?>
</main>

<style>
.services-template .cc-card { border-color: rgba(255,255,255,0.05); }
.max-w-700 { max-width: 700px; }
</style>

<?php
get_footer();
