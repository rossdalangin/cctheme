<?php
/**
 * Team Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-team">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_team_tag', 'MEET THE TEAM' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_team_headline', 'Meet the Experts' ) ); ?></h2>
        </div>

        <div class="team-grid">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $name = get_theme_mod( "closeclient_team_{$i}_name" );
                $role = get_theme_mod( "closeclient_team_{$i}_role" );
                $image = get_theme_mod( "closeclient_team_{$i}_image" );

                if ( $name ) : ?>
                <div class="team-card bento-item reveal text-center">
                    <div class="team-photo" style="margin-bottom: 24px;">
                        <?php if ( $image ) : ?>
                            <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $name ); ?>" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin: 0 auto;">
                        <?php else : ?>
                            <div style="width: 100px; height: 100px; border-radius: 50%; background: var(--secondary); margin: 0 auto;"></div>
                        <?php endif; ?>
                    </div>
                    <h3><?php echo esc_html( $name ); ?></h3>
                    <p class="section-tag"><?php echo esc_html( $role ); ?></p>
                </div>
                <?php endif;
            endfor; ?>
        </div>
    </div>
</section>
