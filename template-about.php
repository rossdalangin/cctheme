<?php
/**
 * Template Name: About Template
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

        <div class="page-content">
            <?php
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>

        <?php
        get_template_part( 'template-parts/sections/section', 'authority' );
        get_template_part( 'template-parts/sections/section', 'booking-cta' );
        ?>
    </div>
</main>

<?php
get_footer();
