<?php
/**
 * Testimonials Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-testimonials">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 80px;">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_testimonials_tag', 'SUCCESS STORIES' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_testimonials_headline', 'Results From Our Clients' ) ); ?></h2>
        </div>

        <div class="testimonials-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px;">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $text = get_theme_mod( "closeclient_testimonial_{$i}_text" );
                $name = get_theme_mod( "closeclient_testimonial_{$i}_name" );
                $role = get_theme_mod( "closeclient_testimonial_{$i}_role" );

                if ( $text ) : ?>
                <div class="testimonial-card bento-item" style="padding: 40px; text-align: left;">
                    <p class="testimonial-text-small" style="font-size: 1.1rem; font-style: italic; margin-bottom: 24px;">"<?php echo esc_html( $text ); ?>"</p>
                    <div class="testimonial-meta">
                        <strong style="display: block; color: var(--white);"><?php echo esc_html( $name ); ?></strong>
                        <span style="font-size: 0.85rem; color: var(--text-muted);"><?php echo esc_html( $role ); ?></span>
                    </div>
                </div>
                <?php endif;
            endfor; ?>
        </div>
    </div>
</section>
