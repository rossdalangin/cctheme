<?php
/**
 * Template Name: Lead Magnet
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main lead-magnet-page">
    <section class="section section-lg">
        <div class="container lead-magnet-grid reveal">
            <div class="lead-magnet-content py-lg">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_leadmagnet_tag_tpl', 'FREE STRATEGY ASSET' ) ); ?></span>
                <h1 class="hero-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_leadmagnet_headline_tpl', 'The $100M Authority Blueprint' ) ); ?></h1>
                <p class="lead text-muted mb-5"><?php echo esc_html( get_theme_mod( 'closeclient_leadmagnet_text_tpl', 'Download our proven framework for engineering high-ticket authority on autopilot.' ) ); ?></p>

                <div class="lead-magnet-form glass p-5">
                    <?php
                    $custom_action = get_theme_mod( 'closeclient_lm_form_action' );
                    if ( $custom_action ) : ?>
                        <form action="<?php echo esc_url( $custom_action ); ?>" method="POST" class="custom-lead-form">
                            <div class="mb-4">
                                <input type="text" name="first_name" placeholder="First Name" required>
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" placeholder="Professional Email Address" required>
                            </div>
                            <button type="submit" class="cc-button w-100">
                                <?php echo esc_html( get_theme_mod( 'closeclient_lm_button', 'Access The Blueprint' ) ); ?>
                            </button>
                        </form>
                    <?php else :
                        the_content();
                    endif; ?>
                </div>
            </div>

            <div class="lead-magnet-mockup py-lg">
                <?php if ( get_theme_mod( 'closeclient_lm_image' ) ) : ?>
                    <img src="<?php echo esc_url( get_theme_mod( 'closeclient_lm_image' ) ); ?>" alt="Lead Magnet" class="glass">
                <?php else : ?>
                    <div class="glass">
                        <span class="text-muted"><?php echo esc_html( get_theme_mod( 'closeclient_leadmagnet_mockup_text', 'Blueprint Mockup' ) ); ?></span>
                    </div>
                <?php endif; ?>

                <div class="what-is-inside mt-5 glass p-4 reveal">
                    <h3 class="h6 text-accent mb-3 uppercase letter-spacing-1"><?php echo esc_html( get_theme_mod( 'closeclient_leadmagnet_inside_title', 'What’s Inside:' ) ); ?></h3>
                    <ul class="list-unstyled small text-muted">
                        <?php
                        $benefits = get_theme_mod( 'closeclient_lm_benefits', 'The "Authority Flywheel" Framework, 3 Conversion-Killing Mistakes to Avoid, Automated Lead Intake Blueprints' );
                        $items = explode( ',', $benefits );
                        foreach ( $items as $item ) : ?>
                            <li class="mb-2">✓ <?php echo esc_html( trim( $item ) ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-authority' ); ?>
    <?php get_template_part( 'template-parts/sections/section-testimonials' ); ?>
</main>

<?php
get_footer();
