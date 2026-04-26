<?php
/**
 * The template for displaying all pages
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

                // If the content is empty, or the user wants the template specific layout,
                // we can handle it here. But usually, in a modern theme, we let the editor
                // drive the content.
                the_content();

                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile;
            ?>
        </div>

        <?php
        if ( 'full-width' !== $layout ) {
            get_sidebar();
        }
        ?>

	</main>

<?php
get_footer();
