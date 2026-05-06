<?php
/**
 * Template Name: About
 *
 * @package CloseClient
 */

get_header();

$headline = get_theme_mod( 'closeclient_about_headline_tpl', 'Digital Architects for Elite Brands' );
$text     = get_theme_mod( 'closeclient_about_text_tpl', 'Engineering digital experiences that command attention and drive exponential growth.' );
?>

<main id="primary" class="site-main about-page">
    <section class="section section-lg template-about-story bg-dark overflow-hidden">
        <div class="mesh-gradient"></div>
        <div class="container">
            <div class="bento-grid reveal">
                <div class="about-hero-content bento-span-7">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_about_hero_tag', 'OUR MISSION' ) ); ?></span>
                    <h1 class="hero-headline gradient-text"><?php echo esc_html( $headline ); ?></h1>
                    <p class="lead text-muted mb-5"><?php echo nl2br( esc_html( $text ) ); ?></p>
                </div>
                <div class="about-hero-image bento-span-5 py-md">
                    <?php if ( get_theme_mod( 'closeclient_about_image' ) ) : ?>
                        <img src="<?php echo esc_url( get_theme_mod( 'closeclient_about_image' ) ); ?>" alt="About Our Mission" class="cc-card">
                    <?php else : ?>
                        <div class="about-placeholder cc-card h-100 min-h-400"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-lg bg-black">
        <div class="container reveal">
            <div class="section-header text-center mb-5">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_about_values_tag', 'THE CORE VALUES' ) ); ?></span>
                <h2 class="h1"><?php echo esc_html( get_theme_mod( 'closeclient_about_values_title', 'Engineering Elite Excellence' ) ); ?></h2>
            </div>
            <div class="bento-grid py-lg">
                <?php
                $values = get_theme_mod( 'closeclient_about_values', 'Precision: Data-driven systems, Authority: Strategic positioning, Performance: ROI focused engineering' );
                $items = explode( ',', $values );
                $i = 0;
                foreach ( $items as $item ) :
                    $i++;
                    $parts = explode( ':', $item );
                    $title = isset($parts[0]) ? trim($parts[0]) : '';
                    $desc = isset($parts[1]) ? trim($parts[1]) : '';
                    $span = ($i % 3 == 1) ? 'bento-span-4' : (($i % 3 == 2) ? 'bento-span-4' : 'bento-span-4');
                    // Let's make it asymmetrical
                    if ($i == 1) $span = 'bento-span-8';
                    if ($i == 2) $span = 'bento-span-4';
                    ?>
                    <div class="value-item cc-card <?php echo esc_attr($span); ?>">
                        <div class="h3 mb-3 text-accent"><?php echo esc_html( $title ); ?></div>
                        <p class="text-muted mb-0"><?php echo esc_html( $desc ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-team' ); ?>

    <section class="section section-lg bg-dark">
        <div class="container reveal">
            <div class="bento-grid py-lg align-items-stretch">
                <div class="expertise-content bento-span-6 glass p-5">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_about_expertise_tag', 'THE EXPERTISE' ) ); ?></span>
                    <h2 class="h2 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_about_method_title', 'The High-Fidelity Methodology' ) ); ?></h2>
                    <p class="lead text-muted mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_about_method_text', 'We don\'t just build websites; we engineer authority. Our methodology is rooted in the psychological triggers of high-intent buyers and the technical requirements of modern scale.' ) ); ?></p>
                    <ul class="list-unstyled mb-0">
                        <?php
                        $methodology = get_theme_mod( 'closeclient_about_methodology', 'Performance-First Engineering, Psych-Driven UI/UX Design, Conversion-Focused Architecture' );
                        $m_items = explode( ',', $methodology );
                        foreach ( $m_items as $m_item ) : ?>
                            <li class="mb-3 d-flex align-items-center"><span class="text-accent me-3">✓</span> <?php echo esc_html( trim( $m_item ) ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="expertise-visual bento-span-6 d-grid gap-4">
                    <div class="glass p-5 d-flex flex-column justify-content-center border-accent-soft">
                        <div class="h1 gradient-text mb-2"><?php echo esc_html( get_theme_mod( 'closeclient_about_stat_1_val', '94%' ) ); ?></div>
                        <p class="small text-muted uppercase letter-spacing-2 fw-bold mb-0"><?php echo esc_html( get_theme_mod( 'closeclient_about_stat_1_label', 'Client Retention Rate' ) ); ?></p>
                    </div>
                    <div class="glass p-5 d-flex flex-column justify-content-center border-accent-soft">
                        <div class="h1 gradient-text mb-2"><?php echo esc_html( get_theme_mod( 'closeclient_about_stat_2_val', '$250M+' ) ); ?></div>
                        <p class="small text-muted uppercase letter-spacing-2 fw-bold mb-0"><?php echo esc_html( get_theme_mod( 'closeclient_about_stat_2_label', 'Revenue Engineered for Clients' ) ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-authority' ); ?>
    <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>
</main>

<?php
get_footer();
