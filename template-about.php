<?php
/**
 * Template Name: About
 *
 * @package CloseClient
 */

get_header();

$headline = get_theme_mod( 'closeclient_about_headline_tpl', 'The Origin Story' );
$text     = get_theme_mod( 'closeclient_about_text_tpl', 'Engineering the future of high-ticket authority.' );
?>

<main id="primary" class="site-main about-page">
    <section class="section section-lg template-about-story bg-dark">
        <div class="container">
            <div class="cc-grid-2 reveal">
                <div class="about-hero-content">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_about_hero_tag', 'OUR MISSION' ) ); ?></span>
                    <h1 class="hero-headline gradient-text"><?php echo esc_html( $headline ); ?></h1>
                    <p class="lead text-muted mb-5"><?php echo nl2br( esc_html( $text ) ); ?></p>
                </div>
                <div class="about-hero-image py-lg">
                    <?php if ( get_theme_mod( 'closeclient_about_image' ) ) : ?>
                        <img src="<?php echo esc_url( get_theme_mod( 'closeclient_about_image' ) ); ?>" alt="About Our Mission" class="cc-card">
                    <?php else : ?>
                        <div class="about-placeholder cc-card"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-lg bg-black">
        <div class="container reveal">
            <div class="section-header text-center mb-5">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_about_values_tag', 'THE CORE VALUES' ) ); ?></span>
                <h2 class="h1"><?php echo esc_html( get_theme_mod( 'closeclient_about_values_title', 'Engineering Elite Authority' ) ); ?></h2>
            </div>
            <div class="cc-grid-3 py-lg">
                <?php
                $values = get_theme_mod( 'closeclient_about_values', 'Precision: Data-driven systems, Authority: Strategic positioning, Profit: ROI focused engineering' );
                $items = explode( ',', $values );
                foreach ( $items as $item ) :
                    $parts = explode( ':', $item );
                    $title = isset($parts[0]) ? trim($parts[0]) : '';
                    $desc = isset($parts[1]) ? trim($parts[1]) : '';
                    ?>
                    <div class="value-item cc-card">
                        <div class="h3 mb-3 text-accent"><?php echo esc_html( $title ); ?></div>
                        <p class="text-muted"><?php echo esc_html( $desc ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-team' ); ?>

    <section class="section section-lg bg-dark">
        <div class="container reveal">
            <div class="section-header text-center mb-5">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_about_expertise_tag', 'THE EXPERTISE' ) ); ?></span>
                <h2 class="h1"><?php echo esc_html( get_theme_mod( 'closeclient_about_expertise_title', 'Architecting Global Authority' ) ); ?></h2>
            </div>
            <div class="cc-grid-2 py-lg">
                <div class="expertise-content">
                    <h3 class="h2 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_about_method_title', 'The $100M Methodology' ) ); ?></h3>
                    <p class="lead text-muted mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_about_method_text', 'We don\'t just build websites; we engineer authority. Our methodology is rooted in the psychological triggers of the high-ticket prospect.' ) ); ?></p>
                    <ul class="list-unstyled">
                        <?php
                        $methodology = get_theme_mod( 'closeclient_about_methodology', 'Direct-Response System Architecture, Vortex Lead Intake & Pre-qualification, Bento-style Social Proof Engineering' );
                        $m_items = explode( ',', $methodology );
                        foreach ( $m_items as $m_item ) : ?>
                            <li class="mb-3 d-flex align-items-center"><span class="text-accent me-3">✓</span> <?php echo esc_html( trim( $m_item ) ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="expertise-visual glass p-5">
                    <div class="h1 gradient-text mb-2"><?php echo esc_html( get_theme_mod( 'closeclient_about_stat_1_val', '94%' ) ); ?></div>
                    <p class="small text-muted uppercase letter-spacing-1"><?php echo esc_html( get_theme_mod( 'closeclient_about_stat_1_label', 'Client Retention Rate' ) ); ?></p>
                    <div class="h1 gradient-text mb-2 mt-5"><?php echo esc_html( get_theme_mod( 'closeclient_about_stat_2_val', '$250M+' ) ); ?></div>
                    <p class="small text-muted uppercase letter-spacing-1"><?php echo esc_html( get_theme_mod( 'closeclient_about_stat_2_label', 'Revenue Generated for Clients' ) ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-authority' ); ?>
    <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>
</main>

<?php
get_footer();
