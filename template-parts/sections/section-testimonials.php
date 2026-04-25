<?php
/**
 * Testimonials Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-testimonials">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-headline"><?php esc_html_e( 'Results From Our Clients', 'closeclient' ); ?></h2>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <blockquote class="testimonial-text">
                    <?php echo esc_textarea( get_theme_mod( 'closeclient_testimonial_1', '"Working with this team changed my business. I went from $2k months to $20k months in just 90 days."' ) ); ?>
                </blockquote>
                <div class="testimonial-author">
                    <cite>- Sarah Jenkins, Business Coach</cite>
                </div>
            </div>
            <!-- More testimonials can be added here -->
        </div>
    </div>
</section>
