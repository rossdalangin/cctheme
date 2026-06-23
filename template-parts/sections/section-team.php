<?php
/**
 * Team Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_team_headline', 'The Digital Architects' );
$tag      = get_theme_mod( 'closeclient_team_tag', 'MEET THE TEAM' );
?>

<section id="team" class="section section-lg section-team bg-secondary">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline gradient-text"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="cc-grid-3">
            <?php
            $team_query = new WP_Query( array(
                'post_type'      => 'team',
                'posts_per_page' => 3,
            ) );

            if ( $team_query->have_posts() ) :
                while ( $team_query->have_posts() ) : $team_query->the_post();
                    $role = get_post_meta( get_the_ID(), '_member_role', true );
                    $linkedin = get_post_meta( get_the_ID(), '_member_linkedin', true );
                    ?>
                    <div class="team-item cc-card glass text-center reveal p-4 p-md-5">
                        <div class="member-image-wrapper mb-4">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="member-image-circle">
                                    <?php the_post_thumbnail( 'medium', array( 'class' => 'member-img' ) ); ?>
                                </div>
                            <?php else : ?>
                                <div class="member-image-placeholder"></div>
                            <?php endif; ?>

                            <?php if ( $linkedin ) : ?>
                                <a href="<?php echo esc_url($linkedin); ?>" class="member-social-link" target="_blank" rel="noopener">
                                    <?php echo closeclient_get_svg('linkedin'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <h3 class="h4 mb-2 text-white"><?php the_title(); ?></h3>
                        <div class="member-role text-accent small fw-bold uppercase tracking-wider mb-3"><?php echo esc_html( $role ); ?></div>
                        <div class="member-bio small text-muted mb-4">
                            <?php the_excerpt(); ?>
                        </div>
                        <?php if ( $linkedin ) : ?>
                            <a href="<?php echo esc_url($linkedin); ?>" class="cc-button cc-button-secondary small" style="padding: 10px 20px; font-size: 0.65rem;">View Profile →</a>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback
                for ( $i = 1; $i <= 3; $i++ ) :
                    $name = get_theme_mod( "closeclient_team_{$i}_name", "Expert Architect $i" );
                    $role = get_theme_mod( "closeclient_team_{$i}_role", "Strategy Lead" );
                    ?>
                    <div class="team-item cc-card glass text-center reveal p-4 p-md-5">
                        <div class="member-image-wrapper mb-4">
                            <div class="member-image-placeholder"></div>
                        </div>
                        <h3 class="h4 mb-2 text-white"><?php echo esc_html( $name ); ?></h3>
                        <div class="member-role text-accent small fw-bold uppercase tracking-wider"><?php echo esc_html( $role ); ?></div>
                    </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
