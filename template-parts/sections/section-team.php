<?php
/**
 * Team Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_team_headline', 'Meet the Experts' );
$tag      = get_theme_mod( 'closeclient_team_tag', 'MEET THE TEAM' );
?>

<section id="team" class="section section-team bg-dark">
    <div class="container">
        <div class="section-header text-center reveal" style="margin-bottom: 80px;">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
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
                    <div class="team-card cc-card text-center reveal" itemscope itemtype="https://schema.org/Person">
                        <div class="member-image mb-4" style="aspect-ratio: 1/1; border-radius: 50%; overflow: hidden; background: var(--c-secondary); margin: 0 auto 30px; max-width: 200px;">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium', array( 'itemprop' => 'image', 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
                            <?php endif; ?>
                        </div>
                        <h3 class="h4 mb-2" itemprop="name"><?php the_title(); ?></h3>
                        <p class="section-tag mb-0" itemprop="jobTitle"><?php echo esc_html( $role ); ?></p>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback to Customizer
                for ( $i = 1; $i <= 3; $i++ ) :
                    $name = get_theme_mod( "closeclient_team_{$i}_name", "Expert $i" );
                    $role = get_theme_mod( "closeclient_team_{$i}_role", "Strategist" );
                    ?>
                    <div class="team-card cc-card text-center reveal">
                        <div class="member-image mb-4" style="aspect-ratio: 1/1; border-radius: 50%; overflow: hidden; background: var(--c-secondary); margin: 0 auto 30px; max-width: 200px;"></div>
                        <h3 class="h4 mb-2"><?php echo esc_html( $name ); ?></h3>
                        <p class="section-tag mb-0"><?php echo esc_html( $role ); ?></p>
                    </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
