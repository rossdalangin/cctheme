<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
        </div>

        <?php
        if ( 'full-width' !== $layout ) {
            get_sidebar();
        }
        ?>

	</main><!-- #main -->

<?php
get_footer();
