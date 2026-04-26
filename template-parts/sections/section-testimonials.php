<?php
/**
 * Testimonials Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-testimonials">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_testimonials_tag', 'SUCCESS STORIES' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_testimonials_headline', 'Results From Our Clients' ) ); ?></h2>
        </div>

        <div class="testimonials-grid">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $text = get_theme_mod( "closeclient_testimonial_{$i}_text" );
                $name = get_theme_mod( "closeclient_testimonial_{$i}_name" );
                $role = get_theme_mod( "closeclient_testimonial_{$i}_role" );

                if ( $text ) : ?>
                <div class="testimonial-card bento-item reveal">
                    <p class="testimonial-content">"<?php echo esc_html( $text ); ?>"</p>
                    <div class="testimonial-meta">
                        <strong class="client-name"><?php echo esc_html( $name ); ?></strong>
                        <span class="client-role"><?php echo esc_html( $role ); ?></span>
                    </div>
                </div>
                <?php endif;
            endfor; ?>
        </div>
    </div>
</section>
