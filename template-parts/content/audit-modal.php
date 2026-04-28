<?php
/**
 * Authority Audit Modal
 *
 * @package CloseClient
 */
?>

<div id="audit-modal" class="cc-modal">
    <div class="cc-modal-overlay"></div>
    <div class="cc-modal-content glass p-5">
        <button class="cc-modal-close">×</button>
        <div class="text-center mb-5">
            <span class="section-tag"><?php esc_html_e( 'STRATEGY FIRST', 'closeclient' ); ?></span>
            <h2 class="h3 mb-3"><?php esc_html_e( 'Request Your Authority Audit', 'closeclient' ); ?></h2>
            <p class="text-muted small"><?php esc_html_e( 'Submit your details and we’ll tailor an audit and proposal based on your exact objectives.', 'closeclient' ); ?></p>
        </div>

        <div class="modal-form-wrapper">
            <?php
            $form_code = get_theme_mod( 'closeclient_contact_form_shortcode' );
            if ( $form_code && $form_code !== '[contact-form-7 id="..."]' ) {
                echo do_shortcode( $form_code );
            } else {
                echo '<p class="text-center small text-muted">' . esc_html__( 'Contact form not configured in Customizer.', 'closeclient' ) . '</p>';
            }
            ?>
        </div>
    </div>
</div>

<style>
.cc-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
}

.cc-modal.active { display: flex; }

.cc-modal-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(2, 2, 3, 0.9);
    backdrop-filter: blur(10px);
}

.cc-modal-content {
    position: relative;
    max-width: 600px;
    width: 90%;
    z-index: 10000;
    animation: modalIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}

.cc-modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: none;
    border: none;
    color: white;
    font-size: 2rem;
    cursor: pointer;
    opacity: 0.5;
    transition: 0.3s;
}

.cc-modal-close:hover { opacity: 1; }

@keyframes modalIn {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
