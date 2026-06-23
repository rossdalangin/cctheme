<?php
/**
 * Services Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_services_headline', 'The Architecture of Dominance' );
$tag      = get_theme_mod( 'closeclient_services_tag', 'SERVICES' );
?>

<section id="services" class="section section-lg section-services bg-dark">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline gradient-text"><?php echo esc_html( $headline ); ?></h2>
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
                    $span = ( $i == 1 ) ? 'bento-span-7' : ( ( $i == 2 ) ? 'bento-span-5' : ( ( $i == 3 ) ? 'bento-span-4' : 'bento-span-8' ) );
                    $icons = array('⚡', '💎', '🚀', '🎯');
                    $icon = isset($icons[$i-1]) ? $icons[$i-1] : '⚡';
                    ?>
                    <?php $reveal_class = ( $i <= 3 ) ? '' : 'reveal'; ?>
                    <div class="service-item cc-card <?php echo esc_attr($reveal_class); ?> <?php echo esc_attr($span); ?> d-flex flex-column">
                        <div class="service-icon mb-4"><?php echo $icon; ?></div>
                        <h3 class="h3 mb-3 text-white"><?php the_title(); ?></h3>
                        <div class="text-muted small mb-5 lead"><?php the_excerpt(); ?></div>
                        <div class="mt-auto">
                            <a href="<?php the_permalink(); ?>" class="cc-button cc-button-secondary small" style="padding: 12px 24px; font-size: 0.65rem;">System Details →</a>
                        </div>
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
                    <?php $reveal_class = ( $s['id'] <= 3 ) ? '' : 'reveal'; ?>
                    <div class="service-item cc-card <?php echo esc_attr($reveal_class); ?> <?php echo esc_attr($s['span']); ?> d-flex flex-column">
                        <div class="service-icon mb-4"><?php echo $s['icon']; ?></div>
                        <h3 class="h3 mb-3 text-white"><?php echo esc_html( $title ); ?></h3>
                        <p class="text-muted small mb-5 lead"><?php echo esc_html( $text ); ?></p>
                        <div class="mt-auto">
                            <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="cc-button cc-button-secondary small" style="padding: 12px 24px; font-size: 0.65rem;">System Details →</a>
                        </div>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>
