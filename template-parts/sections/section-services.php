<?php
/**
 * Services Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_services_headline', 'The Architecture of Dominance' );
$tag      = get_theme_mod( 'closeclient_services_tag', 'SERVICES' );
?>

<section id="services" class="section section-services bg-dark">
    <div class="container">
        <div class="section-header text-center reveal" style="margin-bottom: 80px;">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="bento-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px;">
            <?php
            $services = array(
                array('id' => 1, 'span' => 'span 8', 'icon' => '⚡'),
                array('id' => 2, 'span' => 'span 4', 'icon' => '💎'),
                array('id' => 3, 'span' => 'span 4', 'icon' => '🚀'),
                array('id' => 4, 'span' => 'span 8', 'icon' => '🎯'),
            );

            foreach ( $services as $s ) :
                $title = get_theme_mod( "closeclient_service_{$s['id']}_title" );
                $text  = get_theme_mod( "closeclient_service_{$s['id']}_text" );

                // Fallbacks if not set
                if ( empty($title) ) {
                    $defaults = array(
                        1 => 'Authority Infrastructure',
                        2 => 'Revenue Engineering',
                        3 => 'Vortex Funnels',
                        4 => 'Elite Positioning'
                    );
                    $title = $defaults[$s['id']];
                }

                if ( empty($text) ) {
                    $text = "Engineered solutions designed to crush the complexity ceiling and scale your impact.";
                }
                ?>
                <div class="service-item cc-card reveal" style="grid-column: <?php echo esc_attr($s['span']); ?>;">
                    <div class="service-icon mb-4" style="font-size: 2rem;"><?php echo $s['icon']; ?></div>
                    <h3 class="h4 mb-3"><?php echo esc_html( $title ); ?></h3>
                    <p class="text-muted small"><?php echo esc_html( $text ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
@media (max-width: 992px) {
    .bento-grid { grid-template-columns: 1fr !important; }
    .service-item { grid-column: span 1 !important; }
}
</style>
