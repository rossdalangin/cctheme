<?php
/**
 * Template Name: Sales Template
 *
 * @package CloseClient
 */

get_header();

$headline    = get_theme_mod( 'closeclient_sales_hero_headline_tpl', 'The Exact Blueprint to Scale Your Coaching Business' );
$subheadline = get_theme_mod( 'closeclient_sales_hero_subheadline_tpl', 'Stop trading time for money. Build a scalable authority system that works for you.' );
$value_stack = get_theme_mod( 'closeclient_sales_value_stack', "Authority Audit ($1,497 Value), Bento Ecosystem ($8,000 Value), Vortex Funnel ($3,500 Value)" );
?>

<main id="primary" class="site-main">
    <section class="section sales-hero bg-dark text-white text-center">
        <div class="container">
            <span class="section-tag"><?php esc_html_e( 'OFFER EXCLUSIVE', 'closeclient' ); ?></span>
            <h1 class="hero-headline text-white"><?php echo esc_html( $headline ); ?></h1>
            <p class="hero-subheadline"><?php echo esc_html( $subheadline ); ?></p>
            <div class="hero-ctas mt-5">
                <a href="#vsl" class="btn btn-primary btn-lg"><?php esc_html_e( 'Watch the Training', 'closeclient' ); ?></a>
            </div>
        </div>
    </section>

    <?php
    $content = get_the_content();
    if ( empty( $content ) ) {
        // VSL Section
        get_template_part( 'template-parts/sections/section-vsl' );

        // Value Stack Section (Direct implementation for Sales Template)
        if ( ! empty( $value_stack ) ) :
            $items = explode( ',', $value_stack );
            ?>
            <section class="section bg-secondary reveal">
                <div class="container-narrow">
                    <div class="glass p-5 border-accent text-center">
                        <h2 class="h3 mb-5"><?php esc_html_e( 'Everything You Get Today:', 'closeclient' ); ?></h2>
                        <ul class="list-unstyled text-start mb-5">
                            <?php foreach ( $items as $item ) : ?>
                                <li class="mb-3 d-flex align-items-center">
                                    <span class="text-accent me-3" style="font-size: 1.5rem;">✓</span>
                                    <span style="font-size: 1.1rem; font-weight: 500;"><?php echo esc_html( trim( $item ) ); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="total-value h4 text-muted mb-5">
                            <?php esc_html_e( 'Total Real World Value: $12,997+', 'closeclient' ); ?>
                        </div>
                        <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#' ) ); ?>" class="btn btn-primary btn-lg w-100">
                            <?php echo esc_html( get_theme_mod( 'closeclient_booking_text', 'Secure Your Spot' ) ); ?>
                        </a>
                    </div>
                </div>
            </section>
            <?php
        endif;

        get_template_part( 'template-parts/sections/section-testimonials' );
        get_template_part( 'template-parts/sections/section-faq' );
        get_template_part( 'template-parts/sections/section-booking-cta' );
    } else {
        echo '<div class="container section">' . apply_filters( 'the_content', $content ) . '</div>';
    }
    ?>
</main>

<?php
get_footer();
