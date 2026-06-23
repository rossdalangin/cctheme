<?php
/**
 * The template for displaying archive pages for services
 *
 * @package CloseClient
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header section text-center bg-dark overflow-hidden">
                <div class="mesh-gradient"></div>
                <div class="container container-narrow">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_label_service_archive_tag', 'OUR CAPABILITIES' ) ); ?></span>
				<h1 class="hero-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_label_service_archive_title', 'Strategic Systems' ) ); ?></h1>
                    <div class="section-subheadline section-subheadline-centered lead text-muted mt-4">
                        <?php
                        $desc = get_the_archive_description();
                        echo $desc ? $desc : esc_html( get_theme_mod( 'closeclient_label_service_archive_desc', 'High-fidelity infrastructure components engineered to scale elite digital brands.' ) );
                        ?>
                    </div>
                </div>
			</header>

            <div class="container section">
                <?php
                $terms = get_terms( array( 'taxonomy' => 'service_cat', 'hide_empty' => true ) );
                if ( ! empty( $terms ) ) : ?>
                    <div class="archive-filters mb-5 pb-5 d-flex justify-content-center gap-3 reveal">
                        <a href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>" class="filter-link glass p-2 px-4 small fw-bold active"><?php echo esc_html__( 'All Systems', 'closeclient' ); ?></a>
                        <?php foreach ( $terms as $term ) : ?>
                            <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="filter-link glass p-2 px-4 small fw-bold"><?php echo esc_html( $term->name ); ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

			<div class="archive-service-grid">
				<?php
                    $i = 0;
				while ( have_posts() ) :
					the_post();
                        $i++;
                        $span = ( $i % 5 == 1 || $i % 5 == 0 ) ? 'bento-span-8' : 'bento-span-4';
                        $icons = array('⚡', '💎', '🚀', '🎯', '🔥', '🛡️');
                        $icon = isset($icons[$i-1]) ? $icons[$i-1] : '⚡';
					?>
                        <?php $reveal_class = ( $i <= 3 ) ? 'no-reveal' : 'reveal'; ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( "service-item cc-card $reveal_class $span" ); ?>>
                            <div class="service-icon mb-4"><?php echo $icon; ?></div>
                            <h3 class="h4 mb-3"><a href="<?php the_permalink(); ?>" class="text-white text-decoration-none"><?php the_title(); ?></a></h3>
                            <div class="text-muted small mb-4 lead"><?php the_excerpt(); ?></div>

                            <?php
                            $blueprint = get_post_meta( get_the_ID(), '_service_blueprint', true );
                            if ( $blueprint ) : ?>
                                <div class="service-mini-features mb-4 d-flex flex-wrap gap-2">
                                    <?php
                                    $items = array_slice(explode( ',', $blueprint ), 0, 2);
                                    foreach ( $items as $item ) : ?>
                                        <span class="badge bg-secondary text-white-50 border-0 p-2 px-3 small fw-bold" style="font-size: 0.65rem;"><?php echo esc_html( trim($item) ); ?></span>
                                    <?php endforeach; ?>
                                    <span class="badge bg-accent text-white border-0 p-2 px-3 small fw-bold" style="font-size: 0.65rem;"><?php echo esc_html__( 'ELITE SYSTEM', 'closeclient' ); ?></span>
                                </div>
                            <?php endif; ?>

                            <div class="mt-auto">
                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="cc-button cc-button-secondary read-more-btn"><?php echo esc_html( get_theme_mod( 'closeclient_label_service_btn', 'System Details →' ) ); ?></a>
                            </div>
                        </article>
                        <?php
				endwhile;
				?>
			</div>

                <div class="pagination-wrapper mt-5 text-center">
                    <?php the_posts_navigation(); ?>
                </div>
            </div>

            <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content/content-none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();
