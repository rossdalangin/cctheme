<?php
/**
 * Products Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_products_headline', 'Essential Engineering Tools' );
$desc     = get_theme_mod( 'closeclient_products_desc', 'Technical assets and templates trusted by elite brands to streamline operations.' );
?>

<section id="products" class="section section-lg section-products bg-dark">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_products_tag', 'THE ECOSYSTEM' ) ); ?></span>
            <h2 class="section-headline gradient-text"><?php echo esc_html( $headline ); ?></h2>
            <p class="lead text-muted mt-4"><?php echo esc_html( $desc ); ?></p>
        </div>

        <div class="bento-grid">
            <?php
            $products_query = new WP_Query( array(
                'post_type'      => 'product',
                'posts_per_page' => 4,
            ) );

            if ( $products_query->have_posts() ) :
                $i = 0;
                while ( $products_query->have_posts() ) : $products_query->the_post();
                    $i++;
                    $price = get_post_meta( get_the_ID(), '_product_price', true );
                    $link  = get_post_meta( get_the_ID(), '_product_link', true );
                    $link  = $link ? $link : get_permalink();
                    $span = ( $i == 1 ) ? 'bento-span-7' : ( ( $i == 2 ) ? 'bento-span-5' : ( ( $i == 3 ) ? 'bento-span-5' : 'bento-span-7' ) );
                    ?>
                    <div class="product-item cc-card reveal d-flex flex-column <?php echo esc_attr($span); ?>">
                        <div class="product-meta d-flex flex-column h-100">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="product-thumb mb-4">
                                    <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: 200px; object-fit: cover;' ) ); ?>
                                </div>
                            <?php endif; ?>
                            <div class="product-info mt-auto">
                                <?php if ( $price ) : ?>
                                    <span class="text-accent small fw-bold mb-2 d-block letter-spacing-1"><?php echo esc_html( $price ); ?></span>
                                <?php endif; ?>
                                <h3 class="h4 mb-3 text-white"><?php the_title(); ?></h3>
                                <div class="text-muted small mb-5 lead">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php echo esc_url( $link ); ?>" class="cc-button cc-button-secondary product-btn w-100">
                                    <?php echo esc_html( get_theme_mod( 'closeclient_product_btn_text', 'Access Tool →' ) ); ?>
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
