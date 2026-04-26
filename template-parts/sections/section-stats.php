<?php
/**
 * Stats Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-stats">
    <div class="container">
        <div class="stats-grid">
            <div class="bento-item reveal large">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_stat_1_label', 'CLIENT CAPITAL SCALED' ) ); ?></span>
                <h3 class="stat-value" style="font-size: 5rem; font-weight: 800; margin: 1rem 0;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_1_value', '$500M+' ) ); ?></h3>
            </div>
            <div class="bento-item reveal">
                <span class="stat-label"><?php echo esc_html( get_theme_mod( 'closeclient_stat_2_label', 'GLOBAL IMPACT' ) ); ?></span>
                <h3 class="stat-value" style="font-size: 3rem; margin-top: 10px;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_2_value', '50+' ) ); ?></h3>
            </div>
            <div class="bento-item reveal">
                <span class="stat-label"><?php echo esc_html( get_theme_mod( 'closeclient_stat_3_label', 'EFFICIENCY' ) ); ?></span>
                <h3 class="stat-value" style="font-size: 3rem; margin-top: 10px;"><?php echo esc_html( get_theme_mod( 'closeclient_stat_3_value', '98%' ) ); ?></h3>
            </div>
        </div>
    </div>
</section>
