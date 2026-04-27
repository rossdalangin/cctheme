<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container section text-center reveal">
        <section class="error-404 not-found glass p-5" style="max-width: 800px; margin: 60px auto;">
            <header class="page-header mb-5">
                <span class="section-tag"><?php esc_html_e( 'ERROR 404', 'closeclient' ); ?></span>
                <h1 class="page-title h2"><?php esc_html_e( 'Lost in the Complexity Ceiling?', 'closeclient' ); ?></h1>
                <p class="lead text-muted"><?php esc_html_e( 'The page you are looking for has been moved or retired. Let\'s get you back to engineering your authority.', 'closeclient' ); ?></p>
            </header>

            <div class="page-content">
                <div class="mb-5">
                    <?php get_search_form(); ?>
                </div>

                <div class="404-ctas d-flex justify-content-center gap-4">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cc-button"><?php esc_html_e( 'Back to Home', 'closeclient' ); ?></a>
                    <a href="<?php echo esc_url( home_url( '/free-training' ) ); ?>" class="cc-button cc-button-secondary"><?php esc_html_e( 'Watch Free Training', 'closeclient' ); ?></a>
                </div>
            </div>
        </section>

        <?php get_template_part( 'template-parts/sections/section-lead-magnet' ); ?>
    </div>
</main>

<?php
get_footer();
