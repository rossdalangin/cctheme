<?php
/**
 * Team Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-team">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 80px;">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_team_tag', 'MEET THE TEAM' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_team_headline', 'Meet the Experts' ) ); ?></h2>
        </div>

        <div class="team-grid bento-grid">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $name = get_theme_mod( "closeclient_team_{$i}_name" );
                $role = get_theme_mod( "closeclient_team_{$i}_role" );
                $image = get_theme_mod( "closeclient_team_{$i}_image" );

                if ( $name ) : ?>
                <div class="bento-item text-center" style="grid-column: span 4;">
                    <div class="team-photo" style="margin-bottom: 24px;">
                        <?php if ( $image ) : ?>
                            <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $name ); ?>" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin: 0 auto; border: 2px solid var(--electric-violet);">
                        <?php else : ?>
                            <div style="width: 120px; height: 120px; border-radius: 50%; background: var(--onyx-light); margin: 0 auto; display: flex; align-items: center; justify-content: center; border: 1px solid var(--border);">
                                <span style="opacity: 0.2;">IMAGE</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h3 style="font-size: 1.25rem; margin-bottom: 8px;"><?php echo esc_html( $name ); ?></h3>
                    <p style="font-size: 0.9rem; color: var(--accent); font-weight: 700; margin: 0;"><?php echo esc_html( $role ); ?></p>
                </div>
                <?php endif;
            endfor; ?>
        </div>
    </div>
</section>
