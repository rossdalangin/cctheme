<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CloseClient
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found glass p-5 error-404-container text-center reveal">
			<header class="page-header mb-5">
                <span class="section-tag"><?php esc_html_e( '404 ERROR', 'closeclient' ); ?></span>
				<h1 class="page-title h2"><?php esc_html_e( 'That page can&rsquo;t be found.', 'closeclient' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p class="lead text-muted mb-5"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search or head back to the growth hub?', 'closeclient' ); ?></p>

				<?php get_search_form(); ?>

                <div class="cta-actions mt-5">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cc-button"><?php esc_html_e( 'Back to Growth Hub', 'closeclient' ); ?></a>
                </div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

        <?php get_template_part( 'template-parts/sections/section-lead-magnet' ); ?>

	</main><!-- #main -->

<?php
get_footer();
