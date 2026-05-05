<?php
/**
 * Template part for a newsletter opt-in section
 *
 * @package CloseClient
 */
?>

<section class="section section-lg section-newsletter text-center reveal">
    <div class="container container-narrow py-xl glass border-accent rounded-xl shadow-premium">
        <span class="section-tag small mb-3"><?php echo esc_html__( 'THE ARCHITECTS INNER CIRCLE', 'closeclient' ); ?></span>
        <h2 class="section-headline gradient-text mt-3"><?php echo esc_html( get_theme_mod( 'closeclient_newsletter_title', 'The Authority Circle' ) ); ?></h2>
        <p class="section-subheadline lead text-muted mb-5"><?php echo esc_html( get_theme_mod( 'closeclient_newsletter_text', 'Weekly insights on authority positioning, technical performance, and scaling systems.' ) ); ?></p>

        <?php $custom_action = get_theme_mod( 'closeclient_newsletter_form_action' ); ?>
        <form class="newsletter-form-inline d-flex gap-2 flex-wrap flex-md-nowrap mb-4" action="<?php echo esc_url( $custom_action ); ?>" method="<?php echo $custom_action ? 'POST' : 'GET'; ?>">
            <input type="email" name="email" class="flex-grow-1" placeholder="<?php echo esc_attr( get_theme_mod( 'closeclient_newsletter_placeholder', 'Business Email' ) ); ?>" required>
            <button type="submit" class="cc-button"><?php echo esc_html( get_theme_mod( 'closeclient_newsletter_button', 'Join the Circle' ) ); ?></button>
        </form>
        <p class="form-disclaimer"><?php echo esc_html( get_theme_mod( 'closeclient_newsletter_disclaimer', 'No spam. Just high-fidelity engineering insights.' ) ); ?></p>
    </div>
</section>
