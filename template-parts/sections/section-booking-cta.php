<?php
/**
 * Booking CTA Section
 *
 * @package CloseClient
 */
?>

<section class="section section-booking-cta text-center">
    <div class="container container-narrow">
        <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_booking_headline', 'Are You Ready to Scale Beyond Your Current Ceiling?' ) ); ?></h2>
        <p class="section-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_booking_subheadline', 'We only partner with 3 new experts per month to ensure elite-level execution. If you are ready to automate your authority, let\'s talk.' ) ); ?></p>

        <?php if ( get_theme_mod( 'closeclient_booking_scarcity' ) ) : ?>
            <div class="booking-scarcity glass small py-2 px-4 d-inline-block mb-5">
                🔥 <?php echo esc_html( get_theme_mod( 'closeclient_booking_scarcity' ) ); ?>
            </div>
        <?php endif; ?>

        <div class="booking-button-wrapper">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#' ) ); ?>" class="button cc-button"><?php echo esc_html( get_theme_mod( 'closeclient_booking_text', 'Book Your Scaling Audit' ) ); ?></a>
        </div>

        <p class="booking-note"><?php echo esc_html( get_theme_mod( 'closeclient_booking_note', 'Current Waiting List: 14 Days' ) ); ?></p>
    </div>
</section>
