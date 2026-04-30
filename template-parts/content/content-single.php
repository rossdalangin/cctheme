<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CloseClient
 */

$show_sidebar = get_theme_mod( 'closeclient_blog_sidebar', true );
$grid_class = $show_sidebar ? 'single-post-grid' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header section text-center">
        <div class="container container-narrow">
            <div class="entry-meta">
                <?php closeclient_posted_on(); ?>
            </div>
		<?php the_title( '<h1 class="entry-title hero-headline reveal">', '</h1>' ); ?>
        </div>
	</header>

	<div class="post-thumbnail-container container reveal">
        <div class="aspect-hero">
            <?php closeclient_post_thumbnail(); ?>
        </div>
	</div>

	<div class="entry-content container reveal-stagger <?php echo esc_attr( $grid_class ); ?>">
        <div class="post-body glass p-5">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'closeclient' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'closeclient' ),
				'after'  => '</div>',
			)
		);
		?>
        </div>

        <?php if ( $show_sidebar ) : ?>
            <aside class="post-sidebar px-lg">
                <?php get_template_part( 'template-parts/content/blog-sticky-cta' ); ?>

                <div class="featured-insight-box glass p-4 mt-4">
                    <span class="section-tag small"><?php esc_html_e( 'FEATURED INSIGHT', 'closeclient' ); ?></span>
                    <h4 class="h6 mt-2 text-white"><?php echo esc_html( get_theme_mod( 'closeclient_sidebar_insight_title', 'The Authority Flywheel' ) ); ?></h4>
                    <p class="small text-muted mb-0"><?php echo esc_html( get_theme_mod( 'closeclient_sidebar_insight_text', 'Learn how to transform your expertise into an omnipresent brand that closes deals while you sleep.' ) ); ?></p>
                </div>

                <div class="sidebar-widgets glass p-4 mt-4">
                    <?php get_sidebar(); ?>
                </div>
            </aside>
        <?php endif; ?>
	</div>

	<footer class="entry-footer container container-narrow mt-5 pt-5 border-top border-secondary">
		<?php closeclient_entry_footer(); ?>

        <div class="author-box-wrapper mt-5">
            <?php get_template_part( 'template-parts/content/content-author' ); ?>
        </div>

        <div class="social-share-wrapper mt-4">
            <?php get_template_part( 'template-parts/content/blog-social-share' ); ?>
        </div>
	</footer>
</article>

<?php get_template_part( 'template-parts/content/content-related' ); ?>
<?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>
