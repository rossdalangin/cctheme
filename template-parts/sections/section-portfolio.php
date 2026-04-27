<?php
/**
 * Portfolio Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_portfolio_headline', 'Our Engineered Success Stories' );
$tag      = get_theme_mod( 'closeclient_portfolio_tag', 'FEATURED WORK' );
?>

<section id="portfolio" class="section section-portfolio bg-dark">
    <div class="container">
        <div class="section-header text-center reveal" style="margin-bottom: 80px;">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="bento-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px;">
            <?php
            $portfolio_query = new WP_Query( array(
                'post_type'      => 'portfolio',
                'posts_per_page' => 3,
            ) );

            if ( $portfolio_query->have_posts() ) :
                $i = 0;
                while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
                    $i++;
                    $span = ( $i == 1 ) ? 'span 12' : 'span 6';
                    ?>
                    <div class="portfolio-item cc-card reveal" style="grid-column: <?php echo esc_attr($span); ?>; padding: 0; overflow: hidden;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="portfolio-image" style="aspect-ratio: 16/9; overflow: hidden;">
                                <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                            </div>
                        <?php endif; ?>
                        <div class="portfolio-content p-5">
                            <h3 class="h4 mb-3"><?php the_title(); ?></h3>
                            <div class="text-muted small mb-4"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="cc-button cc-button-secondary" style="padding: 12px 32px; font-size: 0.8rem;"><?php esc_html_e( 'View Case Study', 'closeclient' ); ?></a>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback Placeholder
                ?>
                <div class="portfolio-item cc-card reveal" style="grid-column: span 12; text-align: center; padding: 100px;">
                    <p class="text-muted"><?php esc_html_e( 'No portfolio items found. Add some in the dashboard or click "Generate Now" in Theme Setup.', 'closeclient' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
