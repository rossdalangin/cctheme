<?php
/**
 * Lead Magnet Section
 *
 * @package CloseClient
 */
?>

<section class="section section-lead-magnet">
    <div class="container lead-magnet-grid">
        <div class="lm-image">
            <?php if ( get_theme_mod( 'closeclient_lm_image' ) ) : ?>
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_lm_image' ) ); ?>" alt="Elite Asset">
            <?php else : ?>
                <div class="lm-mockup" style="aspect-ratio:1/1; background:var(--midnight); border-radius:24px;"></div>
            <?php endif; ?>
        </div>
        <div class="lm-content">
            <span class="section-tag">FREE RESOURCE</span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_lm_headline', 'The $100M Coaching Blueprint' ) ); ?></h2>
            <p class="section-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_lm_subheadline', 'Discover the exact infrastructure used by the world\'s top 1% of consultants to scale to 7-figures while working fewer hours.' ) ); ?></p>

            <form class="lm-form" style="margin-top: 3rem;">
                <div class="newsletter-form-inline" style="margin: 0;">
                    <input type="email" placeholder="Your Primary Email" required style="border: 1px solid var(--border); background: var(--white); color: var(--midnight);">
                    <button type="submit" class="button button-accent"><?php echo esc_html( get_theme_mod( 'closeclient_lm_button', 'Send Me The Blueprint' ) ); ?></button>
                </div>
            </form>
        </div>
    </div>
</section>
