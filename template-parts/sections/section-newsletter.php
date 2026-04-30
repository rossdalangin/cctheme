<?php
/**
 * Template part for a newsletter opt-in section
 *
 * @package CloseClient
 */
?>

<section class="section section-lg section-newsletter text-center">
    <div class="container container-narrow py-lg">
        <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_newsletter_title', 'Join the Authority Circle' ) ); ?></h2>
        <p class="section-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_newsletter_text', 'Weekly insights on authority positioning, high-ticket sales, and scaling systems for coaches.' ) ); ?></p>

        <?php $custom_action = get_theme_mod( 'closeclient_newsletter_form_action' ); ?>
        <form class="newsletter-form-inline" action="<?php echo esc_url( $custom_action ); ?>" method="<?php echo $custom_action ? 'POST' : 'GET'; ?>">
            <input type="email" name="email" placeholder="<?php esc_attr_e( 'Your primary email address', 'closeclient' ); ?>" required>
            <button type="submit" class="cc-button"><?php echo esc_html( get_theme_mod( 'closeclient_newsletter_button', 'Subscribe Now' ) ); ?></button>
        </form>
        <p class="form-disclaimer"><?php esc_html_e( 'No spam. Just value. Unsubscribe anytime.', 'closeclient' ); ?></p>
    </div>
</section>
