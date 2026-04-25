<?php
/**
 * Booking CTA Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-booking-cta text-center bg-dark text-white">
    <div class="container">
        <h2 class="section-headline text-white"><?php esc_html_e( 'Ready to Scale Your Authority?', 'closeclient' ); ?></h2>
        <p class="lead"><?php esc_html_e( 'Book a 15-minute strategy audit to see if we are a fit to work together.', 'closeclient' ); ?></p>
        <div class="cta-actions">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#' ) ); ?>" class="button button-large button-accent"><?php esc_html_e( 'Book My Strategy Audit', 'closeclient' ); ?></a>
        </div>
        <p class="cta-note"><?php esc_html_e( 'Only 3 spots available for new clients this month.', 'closeclient' ); ?></p>
    </div>
</section>
