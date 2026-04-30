<?php
/**
 * Lead Magnet Section
 *
 * @package CloseClient
 */
?>

<section class="section section-lg section-lead-magnet">
    <div class="container cc-grid-2 reveal">
        <div class="lm-image">
            <?php if ( get_theme_mod( 'closeclient_lm_image' ) ) : ?>
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_lm_image' ) ); ?>" alt="Elite Asset">
            <?php else : ?>
                <div class="lm-mockup"></div>
            <?php endif; ?>
        </div>
        <div class="lm-content">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_lm_tag', 'FREE RESOURCE' ) ); ?></span>
            <h2 class="section-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_lm_headline', 'The $100M Authority Blueprint' ) ); ?></h2>
            <p class="section-subheadline lead text-muted mb-5"><?php echo esc_html( get_theme_mod( 'closeclient_lm_subheadline', 'Discover the exact infrastructure used by the world\'s top 1% of experts to scale to high-figures while working fewer hours.' ) ); ?></p>

            <div class="cf7-integration-wrapper">
                <?php
                $custom_action = get_theme_mod( 'closeclient_lm_form_action' );
                if ( $custom_action ) : ?>
                    <form action="<?php echo esc_url( $custom_action ); ?>" method="POST" class="custom-lead-form">
                        <div class="mb-4">
                            <input type="email" name="email" placeholder="Enter your business email" required>
                        </div>
                        <button type="submit" class="cc-button w-100"><?php echo esc_html( get_theme_mod( 'closeclient_lm_button', 'Access The Blueprint' ) ); ?></button>
                    </form>
                <?php else : ?>
                    <form class="wpcf7-form">
                        <input type="email" placeholder="Enter your business email" required>
                        <button type="submit" class="cc-button w-100 mt-4"><?php echo esc_html( get_theme_mod( 'closeclient_lm_button', 'Access The Blueprint' ) ); ?></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
