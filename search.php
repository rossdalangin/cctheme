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

			<header class="page-header section text-center reveal">
                <div class="container">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_search', 'SEARCH RESULTS' ) ); ?></span>
				<h1 class="hero-headline">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'closeclient' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
                </div>
			</header>

            <div class="container section">
			<div class="blog-posts-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', 'archive' );
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

	</main><!-- #main -->

<?php
get_footer();
