<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CloseClient
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header section section-lg text-center reveal bg-dark overflow-hidden">
                <div class="mesh-gradient"></div>
                <div class="container">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_search', 'SEARCH RESULTS' ) ); ?></span>
				<h1 class="hero-headline gradient-text">
					<?php
					printf( esc_html( get_theme_mod( 'closeclient_label_search_query', 'Search Results for: %s' ) ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
                </div>
			</header>

            <div class="container section">
			<div class="search-results-wrapper container-narrow">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', 'search' );
				endwhile;
				?>
			</div>

                <div class="pagination-wrapper mt-5 text-center">
                    <?php the_posts_navigation(); ?>
                </div>
            </div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content/content-none' ); ?>

		<?php endif; ?>

        <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>

	</main><!-- #main -->

<?php
get_footer();
