<?php
/**
 * Logo Ticker Section (Infinite Scroll)
 *
 * @package CloseClient
 */
?>

<section class="section section-logo-ticker" style="padding: 40px 0; border-top: 1px solid var(--c-border); border-bottom: 1px solid var(--c-border); background: var(--c-bg);">
    <div class="container-fluid" style="overflow: hidden; white-space: nowrap; position: relative;">
        <div class="ticker-wrapper" style="display: inline-block; animation: ticker 30s linear infinite;">
            <?php
            for ( $i = 1; $i <= 5; $i++ ) :
                $logo = get_theme_mod( "closeclient_authority_logo_$i" );
                if ( $logo ) : ?>
                    <div class="ticker-item" style="display: inline-block; margin: 0 40px; opacity: 0.4; transition: 0.3s;">
                        <img src="<?php echo esc_url( $logo ); ?>" alt="Partner Logo" style="height: 30px; width: auto; filter: grayscale(1);">
                    </div>
                <?php endif;
            endfor; ?>

            <!-- Duplicate for infinite effect -->
            <?php
            for ( $i = 1; $i <= 5; $i++ ) :
                $logo = get_theme_mod( "closeclient_authority_logo_$i" );
                if ( $logo ) : ?>
                    <div class="ticker-item" style="display: inline-block; margin: 0 40px; opacity: 0.4;">
                        <img src="<?php echo esc_url( $logo ); ?>" alt="Partner Logo" style="height: 30px; width: auto; filter: grayscale(1);">
                    </div>
                <?php endif;
            endfor; ?>
        </div>
    </div>
</section>

<style>
@keyframes ticker {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.ticker-item:hover { opacity: 1 !important; }
</style>
