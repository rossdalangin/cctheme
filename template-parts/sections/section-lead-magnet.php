<?php
/**
 * Lead Magnet Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-lead-magnet bg-accent text-white">
    <div class="container lead-magnet-grid">
        <div class="lead-magnet-content">
            <h2 class="section-headline text-white"><?php echo esc_html( get_theme_mod( 'closeclient_lm_headline', 'Free Authority Blueprint' ) ); ?></h2>
            <p><?php echo esc_html( get_theme_mod( 'closeclient_lm_subheadline', 'Download the exact roadmap I use to help consultants land high-ticket clients without cold outreach.' ) ); ?></p>
            <div class="lead-magnet-form-minimal">
                <!-- Replace with actual form integration -->
                <input type="email" placeholder="Enter your email...">
                <button class="button button-primary"><?php echo esc_html( get_theme_mod( 'closeclient_lm_button', 'Get the Blueprint' ) ); ?></button>
            </div>
        </div>
        <div class="lead-magnet-image">
             <?php if ( get_theme_mod( 'closeclient_lm_image' ) ) : ?>
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_lm_image' ) ); ?>" alt="Lead Magnet">
             <?php else : ?>
                <div class="mockup-placeholder"></div>
             <?php endif; ?>
        </div>
    </div>
</section>
