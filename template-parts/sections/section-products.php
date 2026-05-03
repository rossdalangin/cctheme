<?php
/**
 * Products Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_products_headline', 'Essential Tools That Work as Hard as You Do' );
$desc     = get_theme_mod( 'closeclient_products_desc', 'Themes and plugins trusted by elite coaches to streamline operations and elevate branding.' );
?>

<section id="products" class="section section-lg section-products bg-dark">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_products_tag', 'ECOSYSTEM TOOLS' ) ); ?></span>
            <h2 class="section-headline gradient-text"><?php echo esc_html( $headline ); ?></h2>
            <p class="lead text-muted mt-4"><?php echo esc_html( $desc ); ?></p>
        </div>

        <div class="cc-grid-2">
            <?php
            $products_query = new WP_Query( array(
                'post_type'      => 'product',
                'posts_per_page' => 4,
            ) );

            if ( $products_query->have_posts() ) :
                while ( $products_query->have_posts() ) : $products_query->the_post();
                    $price = get_post_meta( get_the_ID(), '_product_price', true );
                    $link  = get_post_meta( get_the_ID(), '_product_link', true );
                    $link  = $link ? $link : get_permalink();
                    ?>
                    <div class="product-item cc-card reveal d-flex flex-column">
                        <div class="product-meta d-flex gap-5 align-items-center">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="product-thumb">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                </div>
                            <?php endif; ?>
                            <div class="product-info">
                                <?php if ( $price ) : ?>
                                    <span class="text-accent small fw-bold mb-2 d-block"><?php echo esc_html( $price ); ?></span>
                                <?php endif; ?>
                                <h3 class="h4 mb-3"><?php the_title(); ?></h3>
                                <div class="text-muted small mb-4">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php echo esc_url( $link ); ?>" class="cc-button cc-button-secondary product-btn">
                                    <?php echo esc_html( get_theme_mod( 'closeclient_product_btn_text', 'Get This Tool →' ) ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="cc-card text-center py-5 product-empty-card">
                    <p class="text-muted"><?php echo esc_html( get_theme_mod( 'closeclient_product_empty_text', 'No products found. Add them in the dashboard.' ) ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
