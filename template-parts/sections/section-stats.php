<?php
/**
 * Stats Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-stats">
    <div class="container">
        <div class="grid-3">
            <div class="stat-card card reveal" style="text-align: center;">
                <span class="section-tag" style="margin-bottom: 20px;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_1_label', 'CLIENT CAPITAL SCALED' ) ); ?></span>
                <h3 class="stat-value" style="font-size: 4rem; font-weight: 800; margin: 0; color: var(--c-primary);"><?php echo esc_html( get_theme_mod( 'closeclient_stat_1_value', '$500M+' ) ); ?></h3>
            </div>
            <div class="stat-card card reveal" style="text-align: center;">
                <span class="section-tag" style="margin-bottom: 20px;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_2_label', 'GLOBAL IMPACT' ) ); ?></span>
                <h3 class="stat-value" style="font-size: 4rem; font-weight: 800; margin: 0; color: var(--c-primary);"><?php echo esc_html( get_theme_mod( 'closeclient_stat_2_value', '50+' ) ); ?></h3>
            </div>
            <div class="stat-card card reveal" style="text-align: center;">
                <span class="section-tag" style="margin-bottom: 20px;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_3_label', 'EFFICIENCY' ) ); ?></span>
                <h3 class="stat-value" style="font-size: 4rem; font-weight: 800; margin: 0; color: var(--c-primary);"><?php echo esc_html( get_theme_mod( 'closeclient_stat_3_value', '98%' ) ); ?></h3>
            </div>
        </div>
    </div>
</section>
