<?php
/**
 * Portfolio Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_portfolio_headline', 'Our Engineered Success Stories' );
$tag = get_theme_mod( 'closeclient_portfolio_tag', 'FEATURED WORK' );

$portfolio_query = new WP_Query( array(
    'post_type'      => 'portfolio',
    'posts_per_page' => 4,
) );
?>

<section class="section section-portfolio">
    <div class="container">
        <div class="section-header text-center reveal" style="margin-bottom: 100px;">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="cc-grid-2">
            <?php if ( $portfolio_query->have_posts() ) :
                while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
                <div class="portfolio-item cc-card reveal" style="padding: 0; overflow: hidden;">
                    <div class="portfolio-image" style="aspect-ratio: 16/10; background: var(--c-onyx-light);">
                        <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                    </div>
                    <div class="portfolio-content" style="padding: 40px;">
                        <h3 style="font-size: 1.8rem; margin-bottom: 15px;"><?php the_title(); ?></h3>
                        <p style="color: var(--c-text-muted); margin-bottom: 25px;"><?php echo get_the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="cc-button cc-btn btn-secondary" style="padding: 14px 32px; font-size: 0.8rem;"><?php esc_html_e( 'View Case Study', 'closeclient' ); ?></a>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata();
            else :
                // Fallback for demo
                for ( $i = 1; $i <= 2; $i++ ) : ?>
                <div class="portfolio-item cc-card reveal" style="padding: 0; overflow: hidden;">
                    <div class="portfolio-image" style="aspect-ratio: 16/10; background: linear-gradient(135deg, var(--c-indigo-soft), transparent);"></div>
                    <div class="portfolio-content" style="padding: 40px;">
                        <h3 style="font-size: 1.8rem; margin-bottom: 15px;">Elite Consultant Platform</h3>
                        <p style="color: var(--c-text-muted); margin-bottom: 25px;">A custom-engineered authority engine that increased high-ticket applications by 400% in 90 days.</p>
                    </div>
                </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
