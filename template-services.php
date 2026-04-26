<?php
/**
 * Template Name: Services Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main services-template">
    <div class="container">
        <header class="page-header text-center section">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="section-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_services_subheadline_tpl', 'Premium solutions tailored for your stage of growth.' ) ); ?></p>
        </header>
    </div>

    <?php get_template_part( 'template-parts/sections/section', 'services' ); ?>

    <div class="container">
        <div class="services-extra-content section">
            <?php
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>

    <?php
    get_template_part( 'template-parts/sections/section', 'faq' );
    get_template_part( 'template-parts/sections/section', 'booking-cta' );
    ?>
</main>

<?php
get_footer();
