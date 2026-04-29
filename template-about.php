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
    <section class="section template-about-story bg-dark">
        <div class="container">
            <div class="section-header text-center reveal">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_about_tag_tpl', 'OUR MISSION' ) ); ?></span>
                <h1 class="hero-headline"><?php echo esc_html( $headline ); ?></h1>
            </div>

            <div class="container-narrow text-center reveal">
                <p class="template-about-text"><?php echo nl2br( esc_html( $text ) ); ?></p>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-team' ); ?>
    <?php get_template_part( 'template-parts/sections/section-authority' ); ?>
    <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>
</main>

<?php
get_footer();
