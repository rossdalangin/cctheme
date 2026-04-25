<?php
/**
 * Testimonials Section Template Part (CPT Version)
 *
 * @package CloseClient
 */
?>

<section class="section section-testimonials">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_testimonials_tag', 'SUCCESS STORIES' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_testimonials_headline', 'Results From Our Clients' ) ); ?></h2>
        </div>

        <div class="testimonials-grid">
            <?php
            $testimonials_query = new WP_Query( array(
                'post_type'      => 'testimonial',
                'posts_per_page' => 1,
            ) );

            if ( $testimonials_query->have_posts() ) :
                while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>
                    <div class="testimonial-card">
                        <blockquote class="testimonial-text">
                            <?php the_content(); ?>
                        </blockquote>
                        <div class="testimonial-author">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="author-photo"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
                            <?php endif; ?>
                            <cite>- <?php the_title(); ?></cite>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="testimonial-card">
                    <blockquote class="testimonial-text">
                        <?php echo esc_textarea( get_theme_mod( 'closeclient_testimonial_1', '"Within 90 days of implementing this authority system, our high-ticket sales increased by 300% without adding a single hour to my work week."' ) ); ?>
                    </blockquote>
                    <cite>- Sample Client, Position</cite>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
