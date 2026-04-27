<?php
/**
 * Testimonials Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_testimonials_headline', 'The Engineered Path to Success' );
$tag      = get_theme_mod( 'closeclient_testimonials_tag', 'SUCCESS STORIES' );
?>

<section id="testimonials" class="section section-testimonials">
    <div class="container">
        <div class="section-header text-center reveal" style="margin-bottom: 80px;">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="cc-grid-3">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $text = get_theme_mod( "closeclient_testimonial_{$i}_text", "Working with this team was the single most impactful decision for my coaching business. We scaled from $10k to $50k/mo in 90 days." );
                $name = get_theme_mod( "closeclient_testimonial_{$i}_name", "Founder $i" );
                $role = get_theme_mod( "closeclient_testimonial_{$i}_role", "Business Coach" );
                ?>
                <div class="testimonial-card cc-card reveal">
                    <div class="quote-icon mb-4" style="color: var(--c-accent); font-size: 2rem; font-family: serif;">"</div>
                    <p class="mb-5" style="font-style: italic; color: var(--c-text); line-height: 1.8;"><?php echo esc_html( $text ); ?></p>
                    <div class="client-meta d-flex align-items-center gap-3">
                        <div class="client-info">
                            <div class="client-name h5 mb-0" style="color: var(--c-white);"><?php echo esc_html( $name ); ?></div>
                            <div class="client-role small text-muted"><?php echo esc_html( $role ); ?></div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
