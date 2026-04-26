<?php
/**
 * Authority / Logo Bar Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-authority">
    <div class="container text-center">
        <p class="section-tag"><?php esc_html_e( 'AS SEEN IN', 'closeclient' ); ?></p>
        <div class="logo-bar">
            <?php
            $has_custom_logos = false;
            for ( $i = 1; $i <= 5; $i++ ) {
                $logo = get_theme_mod( "closeclient_authority_logo_$i" );
                if ( $logo ) {
                    $has_custom_logos = true;
                    echo '<div class="authority-logo"><img src="' . esc_url( $logo ) . '" alt="Authority Logo"></div>';
                }
            }

            if ( ! $has_custom_logos ) : ?>
                <div class="authority-logo">Forbes</div>
                <div class="authority-logo">Entrepreneur</div>
                <div class="authority-logo">Business Insider</div>
                <div class="authority-logo">Fast Company</div>
            <?php endif; ?>
        </div>
    </div>
</section>
