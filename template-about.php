<?php
/**
 * Template Name: About Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main about-template">
    <section class="section about-hero bg-light">
        <div class="container about-grid">
            <div class="about-image">
                <?php if ( get_theme_mod( 'closeclient_about_image' ) ) : ?>
                    <img src="<?php echo esc_url( get_theme_mod( 'closeclient_about_image' ) ); ?>" alt="About">
                <?php else : ?>
                    <div class="hero-image-placeholder"></div>
                <?php endif; ?>
            </div>
            <div class="about-content">
                <span class="section-tag"><?php esc_html_e( 'MY STORY', 'closeclient' ); ?></span>
                <h1 class="page-title"><?php echo esc_html( get_theme_mod( 'closeclient_about_headline', 'Stop Chasing. Start Leading.' ) ); ?></h1>
                <div class="about-bio">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    get_template_part( 'template-parts/sections/section', 'authority' );
    get_template_part( 'template-parts/sections/section', 'testimonials' );
    get_template_part( 'template-parts/sections/section', 'booking-cta' );
    ?>
</main>

<?php
get_footer();
