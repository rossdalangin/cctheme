<?php
/**
 * Template Name: Sales Page Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main sales-page">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>

        <?php
        get_template_part( 'template-parts/sections/section', 'testimonials' );
        get_template_part( 'template-parts/sections/section', 'faq' );
        get_template_part( 'template-parts/sections/section', 'booking-cta' );
        ?>
    </div>
</main>

<?php
get_footer();
