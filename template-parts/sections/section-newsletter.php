<?php
/**
 * Template part for a newsletter opt-in section
 *
 * @package CloseClient
 */
?>

<section class="section section-newsletter text-center">
    <div class="container container-narrow">
        <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_newsletter_title', 'Join the Authority Circle' ) ); ?></h2>
        <p class="section-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_newsletter_text', 'Weekly insights on authority positioning, high-ticket sales, and scaling systems for coaches.' ) ); ?></p>

        <form class="newsletter-form-inline">
            <input type="email" placeholder="<?php esc_attr_e( 'Your primary email address', 'closeclient' ); ?>" required>
            <button type="submit" class="button button-accent"><?php echo esc_html( get_theme_mod( 'closeclient_newsletter_button', 'Subscribe Now' ) ); ?></button>
        </form>
        <p class="form-disclaimer"><?php esc_html_e( 'No spam. Just value. Unsubscribe anytime.', 'closeclient' ); ?></p>
    </div>
</section>
