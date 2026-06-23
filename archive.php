<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_archive', 'INSIGHTS ARCHIVE' ) ); ?></span>
				<?php
				the_archive_title( '<h1 class="hero-headline gradient-text">', '</h1>' );
				the_archive_description( '<div class="archive-description text-muted py-md">', '</div>' );
				?>
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

        <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>

	</main><!-- #main -->

<?php
get_footer();
