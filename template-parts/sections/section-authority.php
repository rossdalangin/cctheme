<?php
/**
 * Authority Logos Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-authority text-center py-5">
    <div class="container">
        <p class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_authority_tag', 'POWERING WORLD-CLASS AUTHORITIES' ) ); ?></p>

        <div class="logo-bar">
            <?php
            $has_custom = false;
            for ( $i = 1; $i <= 5; $i++ ) {
                $logo = get_theme_mod( "closeclient_authority_logo_$i" );
                if ( $logo ) {
                    echo '<div class="authority-logo"><img src="' . esc_url( $logo ) . '" alt="Authority Logo"></div>';
                    $has_custom = true;
                }
            }

            if ( ! $has_custom ) : ?>
                <div class="authority-logo-text">FORBES</div>
                <div class="authority-logo-text">WIRED</div>
                <div class="authority-logo-text">INC.</div>
                <div class="authority-logo-text">BUSINESS INSIDER</div>
            <?php endif; ?>
        </div>
    </div>
</section>
