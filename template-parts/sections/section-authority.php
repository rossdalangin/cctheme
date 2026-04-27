<?php
/**
 * Authority / Logo Bar Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-authority">
    <div class="container text-center reveal">
        <p class="section-tag" style="margin-bottom: 40px;"><?php esc_html_e( 'POWERING ELITE BRANDS', 'closeclient' ); ?></p>
        <div class="logo-bar" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 80px; opacity: 0.3;">
            <?php
            $has_custom_logos = false;
            for ( $i = 1; $i <= 5; $i++ ) {
                $logo = get_theme_mod( "closeclient_authority_logo_$i" );
                if ( $logo ) {
                    $has_custom_logos = true;
                    echo '<div class="authority-logo"><img src="' . esc_url( $logo ) . '" alt="Authority Logo" style="height: 35px; filter: grayscale(1) invert(1);"></div>';
                }
            }

            if ( ! $has_custom_logos ) : ?>
                <div class="authority-logo" style="font-size: 1.5rem; font-weight: 900; letter-spacing: 0.2em; color: var(--c-white);">FORBES</div>
                <div class="authority-logo" style="font-size: 1.5rem; font-weight: 900; letter-spacing: 0.2em; color: var(--c-white);">WIRED</div>
                <div class="authority-logo" style="font-size: 1.5rem; font-weight: 900; letter-spacing: 0.2em; color: var(--c-white);">INC</div>
                <div class="authority-logo" style="font-size: 1.5rem; font-weight: 900; letter-spacing: 0.2em; color: var(--c-white);">FAST CO</div>
            <?php endif; ?>
        </div>
    </div>
</section>
