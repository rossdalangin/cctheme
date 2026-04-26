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
            <div class="stat-card card reveal text-center">
                <span class="section-tag" style="margin-bottom: 20px;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_1_label', 'CLIENT CAPITAL SCALED' ) ); ?></span>
                <h3 class="stat-value gradient-text" style="font-size: 5rem; font-weight: 900; margin: 0; line-height: 1;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_1_value', '$500M+' ) ); ?></h3>
            </div>
            <div class="stat-card card reveal text-center">
                <span class="section-tag" style="margin-bottom: 20px;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_2_label', 'SYSTEM EFFICIENCY' ) ); ?></span>
                <h3 class="stat-value" style="font-size: 5rem; font-weight: 900; margin: 0; color: var(--c-white); line-height: 1;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_2_value', '98%' ) ); ?></h3>
            </div>
            <div class="stat-card card reveal text-center">
                <span class="section-tag" style="margin-bottom: 20px;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_3_label', 'GLOBAL IMPACT' ) ); ?></span>
                <h3 class="stat-value" style="font-size: 5rem; font-weight: 900; margin: 0; color: var(--c-white); line-height: 1;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_3_value', '24/7' ) ); ?></h3>
            </div>
        </div>
    </div>
</section>
