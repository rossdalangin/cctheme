<?php
/**
 * Stats Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-stats">
    <div class="container">
        <div class="bento-grid stats-bento">
            <div class="bento-item">
                <span class="stat-label"><?php echo esc_html( get_theme_mod( 'closeclient_stat_1_label', 'CLIENT CAPITAL SCALED' ) ); ?></span>
                <h3 class="stat-value gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_stat_1_value', '$500M+' ) ); ?></h3>
            </div>
            <div class="bento-item">
                <span class="stat-label"><?php echo esc_html( get_theme_mod( 'closeclient_stat_2_label', 'GLOBAL IMPACT' ) ); ?></span>
                <h3 class="stat-value"><?php echo esc_html( get_theme_mod( 'closeclient_stat_2_value', '50+' ) ); ?></h3>
            </div>
            <div class="bento-item">
                <span class="stat-label"><?php echo esc_html( get_theme_mod( 'closeclient_stat_3_label', 'SYSTEM EFFICIENCY' ) ); ?></span>
                <h3 class="stat-value"><?php echo esc_html( get_theme_mod( 'closeclient_stat_3_value', '98%' ) ); ?></h3>
            </div>
            <div class="bento-item" style="background: var(--accent-gradient);">
                <h3 style="color: var(--white); margin: 0;">Our architecture is built for infinite scale.</h3>
            </div>
        </div>
    </div>
</section>
