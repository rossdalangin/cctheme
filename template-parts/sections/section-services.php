<?php
/**
 * Services Section Template Part (CPT Version)
 *
 * @package CloseClient
 */
?>

<section class="section section-services bg-light">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_services_tag', 'SERVICES' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_services_headline', 'Elite Solutions for Elite Experts' ) ); ?></h2>
            <p class="section-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_services_subheadline', 'Premium solutions tailored for your stage of growth.' ) ); ?></p>
        </div>

        <div class="services-grid">
            <?php
            $services_query = new WP_Query( array(
                'post_type'      => 'service',
                'posts_per_page' => 3,
            ) );

            if ( $services_query->have_posts() ) :
                while ( $services_query->have_posts() ) : $services_query->the_post(); ?>
                    <div class="service-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="service-icon-img"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <div class="service-description"><?php the_excerpt(); ?></div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback demo content if no services exist
                for ( $i = 1; $i <= 3; $i++ ) : ?>
                    <div class="service-card">
                        <div class="service-icon"><?php echo $i; ?></div>
                        <h3>Sample Service <?php echo $i; ?></h3>
                        <p>Go to Services > Add New to replace this content with your actual offers.</p>
                    </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
