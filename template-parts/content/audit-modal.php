<?php
/**
 * Authority Audit Modal
 *
 * @package CloseClient
 */
?>

<div id="audit-modal" class="cc-modal">
    <div class="cc-modal-overlay"></div>
    <div class="cc-modal-content glass border-accent shadow-premium">
        <button class="cc-modal-close">×</button>

        <div class="modal-grid">
            <!-- Left Column: Value Prop -->
            <div class="modal-value-prop pe-md-5 border-end border-secondary">
                <span class="section-tag mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_audit_modal_tag', 'STRATEGY FIRST' ) ); ?></span>
                <h2 class="h2 mb-4 gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_audit_modal_title', 'Request Your Authority Audit' ) ); ?></h2>
                <p class="text-muted lead small mb-5"><?php echo esc_html( get_theme_mod( 'closeclient_audit_modal_desc', 'Submit your details and we’ll tailor a comprehensive digital audit and growth proposal based on your exact objectives.' ) ); ?></p>

                <div class="modal-benefits mt-5">
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center gap-3">
                            <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                            <span class="small text-white-50 fw-bold">Deep Performance Diagnostic</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-3">
                            <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                            <span class="small text-white-50 fw-bold">Custom Growth Roadmap</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-3">
                            <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                            <span class="small text-white-50 fw-bold">Infrastructure Blueprint</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Column: Form -->
            <div class="modal-form-wrapper ps-md-5">
                <div class="form-header mb-4">
                    <h3 class="h5 mb-2 text-white">Direct Intake</h3>
                    <p class="small text-muted mb-0">Confidential & Strategic</p>
                </div>

                <?php
                $custom_action = get_theme_mod( 'closeclient_contact_form_action' );
                if ( $custom_action ) : ?>
                    <form action="<?php echo esc_url( $custom_action ); ?>" method="POST" class="custom-contact-form">
                        <div class="mb-4">
                            <input type="text" name="name" placeholder="<?php echo esc_attr( get_theme_mod( 'closeclient_audit_modal_name_placeholder', 'Full Name' ) ); ?>" required>
                        </div>
                        <div class="mb-4">
                            <input type="email" name="email" placeholder="<?php echo esc_attr( get_theme_mod( 'closeclient_audit_modal_email_placeholder', 'Business Email' ) ); ?>" required>
                        </div>
                        <button type="submit" class="cc-button w-100"><?php echo esc_html( get_theme_mod( 'closeclient_audit_modal_btn', 'Request Your Audit →' ) ); ?></button>
                    </form>
                <?php else :
                    $form_code = get_theme_mod( 'closeclient_contact_form_shortcode' );
                    if ( $form_code && $form_code !== '[contact-form-7 id="..."]' ) {
                        echo do_shortcode( $form_code );
                    } else {
                        echo '<p class="text-center small text-muted">' . esc_html( get_theme_mod( 'closeclient_form_not_configured_text', 'Contact form not configured in Customizer.' ) ) . '</p>';
                    }
                endif; ?>
            </div>
        </div>
    </div>
</div>
