<?php
/**
 * Template Name: About Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();

        // If the page content is empty, show the default modular sections
        $content = get_the_content();
        if ( empty( $content ) ) {
            get_template_part( 'template-parts/sections/section-about' );
            get_template_part( 'template-parts/sections/section-team' );
        } else {
            the_content();
        }

    endwhile;
    ?>
</main>

<?php
get_footer();
