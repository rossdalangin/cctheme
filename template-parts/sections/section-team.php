<?php
/**
 * Team Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_team_headline', 'The Authority Architects' );
$tag      = get_theme_mod( 'closeclient_team_tag', 'MEET THE TEAM' );
?>

<section id="team" class="section section-lg section-team">
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
                    ?>
                    <div class="team-item cc-card text-center reveal">
                        <div class="member-image mb-4">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
                            <?php endif; ?>
                        </div>
                        <h3 class="h4 mb-2"><?php the_title(); ?></h3>
                        <div class="member-role text-accent small fw-bold uppercase letter-spacing-1"><?php echo esc_html( $role ); ?></div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback
                for ( $i = 1; $i <= 3; $i++ ) :
                    $name = get_theme_mod( "closeclient_team_{$i}_name", "Expert Architect $i" );
                    $role = get_theme_mod( "closeclient_team_{$i}_role", "Strategy Lead" );
                    ?>
                    <div class="team-item cc-card text-center reveal">
                        <div class="member-image mb-4"></div>
                        <h3 class="h4 mb-2"><?php echo esc_html( $name ); ?></h3>
                        <div class="member-role text-accent small fw-bold uppercase letter-spacing-1"><?php echo esc_html( $role ); ?></div>
                    </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
