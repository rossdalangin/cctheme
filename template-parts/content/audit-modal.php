<?php
/**
 * Authority Audit Modal
 *
 * @package CloseClient
 */
?>

<div id="audit-modal" class="cc-modal">
    <div class="cc-modal-overlay"></div>
    <div class="cc-modal-content glass p-5 border-accent shadow-premium">
        <button class="cc-modal-close">×</button>
        <div class="text-center mb-5">
            <span class="section-tag"><?php esc_html_e( 'STRATEGY FIRST', 'closeclient' ); ?></span>
            <h2 class="h3 mb-3"><?php esc_html_e( 'Request Your Authority Audit', 'closeclient' ); ?></h2>
            <p class="text-muted small"><?php esc_html_e( 'Submit your details and we’ll tailor an audit and proposal based on your exact objectives.', 'closeclient' ); ?></p>
        </div>

        <div class="modal-form-wrapper">
            <?php
            $custom_action = get_theme_mod( 'closeclient_contact_form_action' );
            if ( $custom_action ) : ?>
                <form action="<?php echo esc_url( $custom_action ); ?>" method="POST" class="custom-contact-form">
                    <div class="mb-4">
                        <input type="text" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Business Email" required>
                    </div>
                    <button type="submit" class="cc-button w-100"><?php esc_html_e( 'Request Audit →', 'closeclient' ); ?></button>
                </form>
            <?php else :
                $form_code = get_theme_mod( 'closeclient_contact_form_shortcode' );
                if ( $form_code && $form_code !== '[contact-form-7 id="..."]' ) {
                    echo do_shortcode( $form_code );
                } else {
                    echo '<p class="text-center small text-muted">' . esc_html__( 'Contact form not configured in Customizer.', 'closeclient' ) . '</p>';
                }
            endif; ?>
        </div>
    </div>
</div>
