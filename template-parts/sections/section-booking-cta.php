<?php
/**
 * Booking CTA Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-booking-cta text-center bg-dark text-white">
    <div class="container">
        <h2 class="section-headline text-white"><?php echo esc_html( get_theme_mod( 'closeclient_booking_headline', 'Ready to Scale Your Authority?' ) ); ?></h2>
        <p class="lead"><?php echo esc_html( get_theme_mod( 'closeclient_booking_subheadline', 'Book a 15-minute strategy audit to see if we are a fit to work together.' ) ); ?></p>
        <div class="cta-actions">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#' ) ); ?>" class="button button-large button-accent"><?php echo esc_html( get_theme_mod( 'closeclient_booking_text', 'Book My Strategy Audit' ) ); ?></a>
        </div>
        <p class="cta-note"><?php echo esc_html( get_theme_mod( 'closeclient_booking_note', 'Only 3 spots available for new clients this month.' ) ); ?></p>
    </div>
</section>
