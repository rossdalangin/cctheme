<?php
/**
 * Template Name: Sales Page
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main sales-page">
    <section class="section section-lg sales-hero">
        <div class="container text-center reveal">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_sales_hero_tag_tpl', 'EXCLUSIVE OFFER' ) ); ?></span>
            <h1 class="hero-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_sales_hero_headline_tpl', 'Scale to $100k/mo Without Spending 8 Hours a Day in the DMs.' ) ); ?></h1>
            <p class="lead text-muted mb-5"><?php echo esc_html( get_theme_mod( 'closeclient_sales_hero_subheadline_tpl', 'For the elite consultant who is ready to graduate from "hustling" to "owning a machine."' ) ); ?></p>

            <div class="hero-cta">
                <a href="#booking" class="cc-button"><?php echo esc_html( get_theme_mod( 'closeclient_sales_hero_cta_tpl', 'Yes! Build My Machine →' ) ); ?></a>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-vsl' ); ?>

    <section class="section section-lg section-value-stack bg-dark">
        <div class="container container-narrow reveal">
            <div class="section-header text-center mb-5 py-lg">
                <h2 class="h2 gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_sales_value_stack_title', 'The Authority Ecosystem' ) ); ?></h2>
                <p class="text-muted"><?php echo esc_html( get_theme_mod( 'closeclient_sales_value_stack_desc', 'Everything you need to command your market.' ) ); ?></p>
            </div>

            <div class="value-stack-list py-md">
                <?php
                $stack = get_theme_mod( 'closeclient_sales_value_stack', 'Authority Audit, Bento Ecosystem, Vortex Funnel' );
                $items = explode( ',', $stack );
                foreach ( $items as $item ) : ?>
                    <div class="value-stack-item p-4 mb-3 d-flex align-items-center">
                        <span class="text-accent me-3 value-stack-icon">✓</span>
                        <span class="value-stack-text"><?php echo esc_html( trim( $item ) ); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-testimonials' ); ?>
    <?php get_template_part( 'template-parts/sections/section-pricing' ); ?>
    <?php get_template_part( 'template-parts/sections/section-faq' ); ?>

    <div id="booking">
        <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>
    </div>
</main>

<?php
get_footer();
