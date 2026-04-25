<?php
/**
 * Template Name: Sales Page Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main sales-page">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <div class="sales-page-content">
            <?php the_content(); ?>
        </div>
        <?php
    endwhile;

    get_template_part( 'template-parts/sections/section', 'testimonials' );
    get_template_part( 'template-parts/sections/section', 'faq' );
    get_template_part( 'template-parts/sections/section', 'booking-cta' );
    ?>
</main>

<?php
get_footer();
