<?php
/**
 * FAQ Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-faq">
    <div class="container narrow-container">
        <div class="section-header text-center">
            <h2 class="section-headline"><?php esc_html_e( 'Frequently Asked Questions', 'closeclient' ); ?></h2>
        </div>
        <div class="faq-list">
            <div class="faq-item">
                <h3 class="faq-question"><?php echo esc_html( get_theme_mod( 'closeclient_faq_q1', 'How long does it take to see results?' ) ); ?></h3>
                <div class="faq-answer">
                    <p><?php echo esc_textarea( get_theme_mod( 'closeclient_faq_a1', 'Most clients see significant authority shifts within the first 30 days of implementation.' ) ); ?></p>
                </div>
            </div>
            <div class="faq-item">
                <h3 class="faq-question"><?php esc_html_e( 'Is this for beginners?', 'closeclient' ); ?></h3>
                <div class="faq-answer">
                    <p><?php esc_html_e( 'While we help experts at all stages, our primary focus is on established coaches looking to scale their existing revenue.', 'closeclient' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
