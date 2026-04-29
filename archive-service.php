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

			<header class="page-header section text-center">
                <div class="container container-narrow">
                    <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_service_archive_tag', 'OUR CAPABILITIES' ) ); ?></span>
				<h1 class="hero-headline reveal"><?php echo esc_html( get_theme_mod( 'closeclient_service_archive_headline', 'Strategic Systems' ) ); ?></h1>
                    <?php the_archive_description( '<div class="section-subheadline section-subheadline-centered">', '</div>' ); ?>
                </div>
			</header>

            <div class="container section">
			<div class="archive-service-grid">
				<?php
                    $i = 0;
				while ( have_posts() ) :
					the_post();
                        $i++;
                        $span = ( $i % 3 == 1 ) ? 'bento-span-8' : 'bento-span-4';
                        $icons = array('⚡', '💎', '🚀', '🎯', '🔥', '🛡️');
                        $icon = isset($icons[$i-1]) ? $icons[$i-1] : '⚡';
					?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( "service-item cc-card reveal $span" ); ?>>
                            <div class="service-icon"><?php echo $icon; ?></div>
                            <h3 class="h4 mb-3"><a href="<?php the_permalink(); ?>" class="text-white text-decoration-none"><?php the_title(); ?></a></h3>
                            <div class="text-muted small mb-4"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="cc-button cc-button-secondary read-more-btn"><?php esc_html_e( 'System Details →', 'closeclient' ); ?></a>
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
            <?php get_template_part( 'template-parts/sections/section-pricing' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content/content-none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();
