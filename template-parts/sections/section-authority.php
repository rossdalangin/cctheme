<?php
/**
 * Authority / Logo Bar Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-authority reveal">
    <div class="container text-center">
        <p class="section-tag" style="margin-bottom: 40px; opacity: 0.6;"><?php esc_html_e( 'POWERING WORLD-CLASS AUTHORITIES', 'closeclient' ); ?></p>
        <div class="logo-bar" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 60px; opacity: 0.3; align-items: center;">
            <?php
            $has_custom_logos = false;
            for ( $i = 1; $i <= 5; $i++ ) {
                $logo = get_theme_mod( "closeclient_authority_logo_$i" );
                if ( $logo ) {
                    $has_custom_logos = true;
                    echo '<div class="authority-logo" style="height: 30px;"><img src="' . esc_url( $logo ) . '" alt="Authority Logo" style="height: 100%; width: auto; filter: grayscale(1) invert(1);"></div>';
                }
            }

            if ( ! $has_custom_logos ) : ?>
                <div class="authority-logo" style="font-size: 1.4rem; font-weight: 900; letter-spacing: 0.2em; color: var(--c-white);">FORBES</div>
                <div class="authority-logo" style="font-size: 1.4rem; font-weight: 900; letter-spacing: 0.2em; color: var(--c-white);">WIRED</div>
                <div class="authority-logo" style="font-size: 1.4rem; font-weight: 900; letter-spacing: 0.2em; color: var(--c-white);">INC.</div>
                <div class="authority-logo" style="font-size: 1.4rem; font-weight: 900; letter-spacing: 0.2em; color: var(--c-white);">BUSINESS INSIDER</div>
            <?php endif; ?>
        </div>
    </div>
</section>
