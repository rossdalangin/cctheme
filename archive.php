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

			<header class="page-header section text-center reveal">
                <div class="container">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_archive', 'ARCHIVE' ) ); ?></span>
				<?php
				the_archive_title( '<h1 class="hero-headline">', '</h1>' );
				the_archive_description( '<div class="archive-description text-muted">', '</div>' );
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

	</main><!-- #main -->

<?php
get_footer();
