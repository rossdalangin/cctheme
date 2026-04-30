<?php
/**
 * Portfolio Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_portfolio_headline', 'Our Engineered Success Stories' );
$tag      = get_theme_mod( 'closeclient_portfolio_tag', 'FEATURED WORK' );
?>

<section id="portfolio" class="section section-lg section-portfolio bg-dark">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline gradient-text"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="portfolio-grid">
            <?php
            $portfolio_query = new WP_Query( array(
                'post_type'      => 'portfolio',
                'posts_per_page' => 3,
            ) );

            if ( $portfolio_query->have_posts() ) :
                $i = 0;
                while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
                    $i++;
                    $span = ( $i == 1 ) ? 'bento-span-12' : 'bento-span-6';
                    $reveal_class = ( $i <= 2 ) ? '' : 'reveal';
                    ?>
                    <div class="portfolio-item-card cc-card <?php echo esc_attr($reveal_class); ?> <?php echo esc_attr($span); ?>">
                        <div class="portfolio-image">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large' ); ?>
                            <?php endif; ?>
                        </div>
                        <div class="portfolio-content">
                            <h3 class="h4 mb-3"><?php the_title(); ?></h3>
                            <div class="text-muted small mb-4"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="cc-button cc-button-secondary read-more-btn"><?php esc_html_e( 'View Case Study', 'closeclient' ); ?></a>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="portfolio-empty-card cc-card reveal">
                    <p class="text-muted"><?php esc_html_e( 'Success stories are being engineered. Check back soon.', 'closeclient' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
