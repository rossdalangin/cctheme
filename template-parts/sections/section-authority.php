<?php
/**
 * Authority / Logo Bar Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-authority">
    <div class="container text-center reveal">
        <p class="section-tag" style="margin-bottom: 40px;"><?php esc_html_e( 'AS SEEN IN', 'closeclient' ); ?></p>
        <div class="logo-bar">
            <?php
            $has_custom_logos = false;
            for ( $i = 1; $i <= 5; $i++ ) {
                $logo = get_theme_mod( "closeclient_authority_logo_$i" );
                if ( $logo ) {
                    $has_custom_logos = true;
                    echo '<div class="authority-logo"><img src="' . esc_url( $logo ) . '" alt="Authority Logo" style="height: 30px; filter: grayscale(1); opacity: 0.6;"></div>';
                }
            }

            if ( ! $has_custom_logos ) : ?>
                <div class="authority-logo" style="font-size: 1.5rem; font-weight: 800; opacity: 0.2; letter-spacing: 0.1em;">FORBES</div>
                <div class="authority-logo" style="font-size: 1.5rem; font-weight: 800; opacity: 0.2; letter-spacing: 0.1em;">INC</div>
                <div class="authority-logo" style="font-size: 1.5rem; font-weight: 800; opacity: 0.2; letter-spacing: 0.1em;">ENTREPRENEUR</div>
                <div class="authority-logo" style="font-size: 1.5rem; font-weight: 800; opacity: 0.2; letter-spacing: 0.1em;">WIRED</div>
            <?php endif; ?>
        </div>
    </div>
</section>
