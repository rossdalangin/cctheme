<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

                get_template_part( 'template-parts/content/content-single', get_post_type() );

                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'closeclient' ) . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'closeclient' ) . '</span> <span class="nav-title">%title</span>',
                    )
                );

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
