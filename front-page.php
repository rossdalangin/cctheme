<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CloseClient
 */

get_header();
?>

	<main id="primary" class="site-main">

        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>

	</main><!-- #main -->

<?php
get_footer();
