<?php
/**
 * Template Name: Services Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </header>

        <?php
        get_template_part( 'template-parts/sections/section', 'services' );

        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;

        get_template_part( 'template-parts/sections/section', 'testimonials' );
        get_template_part( 'template-parts/sections/section', 'booking-cta' );
        ?>
    </div>
</main>

<?php
get_footer();
