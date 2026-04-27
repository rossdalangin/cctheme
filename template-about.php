<?php
/**
 * Template Name: About Template
 *
 * @package CloseClient
 */

get_header();

$headline = get_theme_mod( 'closeclient_about_headline_tpl', 'Stop Chasing. Start Leading.' );
$text     = get_theme_mod( 'closeclient_about_text_tpl', "Most agencies focus on 'pretty.' We focus on Positioning & Profit. Founded on direct-response principles, CloseClient rescues experts from being the 'best-kept secret.'" );
?>

<main id="primary" class="site-main">
    <div class="container text-center section reveal">
        <span class="section-tag"><?php esc_html_e( 'OUR STORY', 'closeclient' ); ?></span>
        <h1 class="hero-headline"><?php echo esc_html( $headline ); ?></h1>

        <div class="container-narrow">
            <p style="font-size: 1.25rem; color: var(--c-text-muted); line-height: 1.8;"><?php echo nl2br( esc_html( $text ) ); ?></p>
        </div>
    </div>

    <?php
    // If the page content is empty, show the default modular sections
    $content = get_the_content();
    if ( empty( $content ) ) {
        get_template_part( 'template-parts/sections/section-team' );
        get_template_part( 'template-parts/sections/section-authority' );
    } else {
        the_content();
    }
    ?>
</main>

<?php
get_footer();
