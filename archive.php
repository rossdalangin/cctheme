<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CloseClient
 */

get_header();

$layout = closeclient_get_layout();
$container_class = ( 'full-width' === $layout ) ? 'container' : 'container site-main-grid layout-' . $layout;
?>

	<main id="primary" class="site-main <?php echo esc_attr( $container_class ); ?>">

		<div class="content-area">
		<?php if ( have_posts() ) : ?>

			<header class="page-header section text-center reveal">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="blog-posts-grid section">
                <?php
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content/content', 'archive' );
                endwhile;
                ?>
            </div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content/content', 'none' ); ?>

		<?php endif; ?>
		</div>

        <?php
        if ( 'full-width' !== $layout ) {
            get_sidebar();
        }
        ?>

	</main><!-- #main -->

<?php
get_footer();
