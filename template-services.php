<?php
/**
 * Template Name: Services Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();

        $content = get_the_content();
        if ( empty( $content ) ) {
            get_template_part( 'template-parts/sections/section-services' );
            get_template_part( 'template-parts/sections/section-pricing' );
        } else {
            the_content();
        }

    endwhile;
    ?>
</main>

<?php
get_footer();
