<?php
/**
 * Template Name: Lead Magnet Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main lead-magnet-page">
    <div class="container">
        <div class="lead-magnet-grid section">
            <div class="lead-magnet-image">
                <?php if ( get_theme_mod( 'closeclient_lm_image' ) ) : ?>
                    <img src="<?php echo esc_url( get_theme_mod( 'closeclient_lm_image' ) ); ?>" alt="Lead Magnet">
                <?php else : ?>
                    <div class="hero-image-placeholder"></div>
                <?php endif; ?>
            </div>
            <div class="lead-magnet-content">
                <h1 class="page-title"><?php echo esc_html( get_theme_mod( 'closeclient_lm_headline', 'Free Authority Blueprint' ) ); ?></h1>
                <p class="lead-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_lm_subheadline', 'Download the exact roadmap I use to help consultants land high-ticket clients without cold outreach.' ) ); ?></p>

                <div class="lead-magnet-form-area">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>

                <div class="lead-magnet-cta">
                    <button class="button button-accent button-large"><?php echo esc_html( get_theme_mod( 'closeclient_lm_button', 'Get the Blueprint' ) ); ?></button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
