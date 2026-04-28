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
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="bento-grid">
            <?php
            // Try CPT first
            $services_query = new WP_Query( array(
                'post_type'      => 'service',
                'posts_per_page' => 4,
            ) );

            if ( $services_query->have_posts() ) :
                $i = 0;
                while ( $services_query->have_posts() ) : $services_query->the_post();
                    $i++;
                    $span = ( $i == 1 || $i == 4 ) ? 'bento-span-8' : 'bento-span-4';
                    $icons = array('⚡', '💎', '🚀', '🎯');
                    $icon = isset($icons[$i-1]) ? $icons[$i-1] : '⚡';
                    ?>
                    <div class="service-item cc-card reveal <?php echo esc_attr($span); ?>">
                        <div class="service-icon"><?php echo $icon; ?></div>
                        <h3 class="h4 mb-3"><?php the_title(); ?></h3>
                        <div class="text-muted small"><?php the_excerpt(); ?></div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback to Customizer
                $services = array(
                    array('id' => 1, 'span' => 'bento-span-8', 'icon' => '⚡'),
                    array('id' => 2, 'span' => 'bento-span-4', 'icon' => '💎'),
                    array('id' => 3, 'span' => 'bento-span-4', 'icon' => '🚀'),
                    array('id' => 4, 'span' => 'bento-span-8', 'icon' => '🎯'),
                );

                foreach ( $services as $s ) :
                    $title = get_theme_mod( "closeclient_service_{$s['id']}_title" );
                    $text  = get_theme_mod( "closeclient_service_{$s['id']}_text" );

                    if ( empty($title) ) {
                        $defaults = array( 1 => 'Authority Infrastructure', 2 => 'Revenue Engineering', 3 => 'Vortex Funnels', 4 => 'Elite Positioning' );
                        $title = $defaults[$s['id']];
                    }
                    if ( empty($text) ) { $text = "Engineered solutions designed to crush the complexity ceiling and scale your impact."; }
                    ?>
                    <div class="service-item cc-card reveal <?php echo esc_attr($s['span']); ?>">
                        <div class="service-icon"><?php echo $s['icon']; ?></div>
                        <h3 class="h4 mb-3"><?php echo esc_html( $title ); ?></h3>
                        <p class="text-muted small"><?php echo esc_html( $text ); ?></p>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>
