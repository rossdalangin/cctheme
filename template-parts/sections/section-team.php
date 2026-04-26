<?php
/**
 * Team Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-team">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_team_tag', 'MEET THE TEAM' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_team_headline', 'Meet the Experts' ) ); ?></h2>
        </div>

        <div class="team-grid">
            <div class="team-member text-center">
                <div class="team-photo">
                    <?php if ( get_theme_mod( 'closeclient_team_image' ) ) : ?>
                        <img src="<?php echo esc_url( get_theme_mod( 'closeclient_team_image' ) ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'closeclient_team_member_name', 'Coach Name' ) ); ?>">
                    <?php else : ?>
                        <div class="hero-image-placeholder" style="width:200px; height:200px; border-radius:50%; margin: 0 auto 24px;"></div>
                    <?php endif; ?>
                </div>
                <h3><?php echo esc_html( get_theme_mod( 'closeclient_team_member_name', 'Coach Name' ) ); ?></h3>
                <p class="team-role"><?php echo esc_html( get_theme_mod( 'closeclient_team_member_role', 'Founder & CEO' ) ); ?></p>
            </div>
        </div>
    </div>
</section>
