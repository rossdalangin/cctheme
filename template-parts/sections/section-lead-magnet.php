<?php
/**
 * Lead Magnet Section
 *
 * @package CloseClient
 */
?>

<section class="section section-lead-magnet">
    <div class="container grid-2 reveal">
        <div class="lm-image" style="border-radius: 40px; overflow: hidden; box-shadow: var(--shadow-premium);">
            <?php if ( get_theme_mod( 'closeclient_lm_image' ) ) : ?>
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_lm_image' ) ); ?>" alt="Elite Asset">
            <?php else : ?>
                <div class="lm-mockup" style="aspect-ratio:1/1; background: linear-gradient(135deg, var(--c-indigo), var(--c-accent)); opacity: 0.1;"></div>
            <?php endif; ?>
        </div>
        <div class="lm-content">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_lm_tag', 'FREE RESOURCE' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_lm_headline', 'The $100M Authority Blueprint' ) ); ?></h2>
            <p class="section-subheadline" style="color: var(--c-text-muted); font-size: 1.25rem; margin-bottom: 40px;"><?php echo esc_html( get_theme_mod( 'closeclient_lm_subheadline', 'Discover the exact infrastructure used by the world\'s top 1% of experts to scale to high-figures while working fewer hours.' ) ); ?></p>

            <div class="cf7-integration-wrapper" style="background: var(--c-secondary); padding: 40px; border-radius: 24px; border: 1px solid var(--c-border);">
                <?php
                // Display placeholder or actual CF7 if provided in settings later
                // For now, we stylize the standard form fields in CSS
                ?>
                <form class="wpcf7-form">
                    <input type="email" placeholder="Enter your business email" required>
                    <button type="submit" class="cc-button" style="width: 100%;"><?php echo esc_html( get_theme_mod( 'closeclient_lm_button', 'Access The Blueprint' ) ); ?></button>
                </form>
            </div>
        </div>
    </div>
</section>
