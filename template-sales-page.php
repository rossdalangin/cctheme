<?php
/**
 * Template Name: Sales Page Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main sales-page">
    <section class="section sales-hero bg-dark text-white text-center">
        <div class="container container-narrow">
            <h1 class="hero-headline text-white"><?php echo esc_html( get_theme_mod( 'closeclient_sales_hero_headline', 'The Exact Blueprint to Scale Your Coaching Business' ) ); ?></h1>
            <p class="hero-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_sales_hero_subheadline', 'Stop trading time for money. Build a scalable authority system that works for you.' ) ); ?></p>
            <a href="#pricing" class="button button-accent button-large"><?php esc_html_e( 'View the Programs', 'closeclient' ); ?></a>
        </div>
    </section>

    <div class="sales-page-content">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </div>

    <?php
    get_template_part( 'template-parts/sections/section', 'process' );
    get_template_part( 'template-parts/sections/section', 'testimonials' );
    get_template_part( 'template-parts/sections/section', 'pricing' );
    get_template_part( 'template-parts/sections/section', 'faq' );
    get_template_part( 'template-parts/sections/section', 'booking-cta' );
    ?>
</main>

<?php
get_footer();
