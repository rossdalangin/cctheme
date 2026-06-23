<?php
/**
 * Booking CTA Section
 *
 * @package CloseClient
 */
?>

<section class="section section-lg section-booking-cta text-center">
    <div class="container container-narrow">
        <h2 class="section-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_booking_headline', 'Are You Ready to Scale Beyond Your Current Ceiling?' ) ); ?></h2>
        <p class="section-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_booking_subheadline', 'We only partner with 3 new brands per month to ensure elite-level execution and zero-latency communication.' ) ); ?></p>

        <?php if ( get_theme_mod( 'closeclient_booking_scarcity' ) ) : ?>
            <div class="booking-scarcity glass small py-2 px-4 d-inline-block mb-5">
                🔥 <?php echo esc_html( get_theme_mod( 'closeclient_booking_scarcity' ) ); ?>
            </div>
        <?php endif; ?>

        <div class="booking-button-wrapper">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#audit' ) ); ?>" class="button cc-button"><?php echo esc_html( get_theme_mod( 'closeclient_booking_text', 'Book Your Engineering Audit' ) ); ?></a>
        </div>

        <p class="booking-note mb-5"><?php echo esc_html( get_theme_mod( 'closeclient_booking_note', 'Current Strategy Queue: 14 Days' ) ); ?></p>

        <div class="booking-trust-badges d-flex justify-content-center gap-5 flex-wrap reveal opacity-80 mt-5 pt-5 border-top border-secondary">
            <div class="badge-item d-flex align-items-center gap-2">
                <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                <span class="small fw-bold uppercase letter-spacing-1">100% SECURE & PRIVATE</span>
            </div>
            <div class="badge-item d-flex align-items-center gap-2">
                <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                <span class="small fw-bold uppercase letter-spacing-1">STRATEGIC ROI GUARANTEE</span>
            </div>
            <div class="badge-item d-flex align-items-center gap-2">
                <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                <span class="small fw-bold uppercase letter-spacing-1">EXPERT-LED AUDIT</span>
            </div>
        </div>
    </div>
</section>
