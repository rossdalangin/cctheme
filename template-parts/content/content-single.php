<?php
/**
 * Template part for displaying single posts
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center section">
        <div class="container container-narrow">
            <div class="entry-meta" style="font-size: 0.9rem; color: var(--c-accent); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 20px;">
                <?php closeclient_posted_on(); ?>
            </div>
            <?php the_title( '<h1 class="entry-title reveal">', '</h1>' ); ?>
        </div>
	</header>

	<div class="post-thumbnail-container container reveal" style="margin-bottom: 80px;">
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="aspect-hero" style="border-radius: var(--radius-xl); overflow: hidden;">
                <?php the_post_thumbnail( 'full', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
            </div>
        <?php endif; ?>
	</div>

    <?php
    $show_sidebar = get_theme_mod( 'closeclient_blog_sidebar', true );
    $grid_style   = $show_sidebar ? 'display: grid; grid-template-columns: 1fr 300px; gap: 60px; align-items: start;' : 'max-width: 800px; margin: 0 auto;';
    ?>
	<div class="entry-content container container-narrow reveal" style="<?php echo esc_attr( $grid_style ); ?>">
		<div class="content-body">
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

        get_template_part( 'template-parts/content/blog-social-share' );
		?>
        </div>

        <?php if ( $show_sidebar ) : ?>
            <aside class="content-sidebar">
                <?php get_template_part( 'template-parts/content/blog-sticky-cta' ); ?>
            </aside>
        <?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer container container-narrow">
		<?php closeclient_entry_footer(); ?>

        <?php get_template_part( 'template-parts/content/content-related' ); ?>

        <div class="author-box reveal">
            <div class="author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
            </div>
            <div class="author-info">
                <h4 class="mb-1"><?php echo esc_html( get_the_author() ); ?></h4>
                <p class="small text-muted mb-3"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
                <div class="author-social d-flex gap-2">
                    <?php
                    foreach ( array('linkedin', 'twitter', 'facebook') as $social ) :
                        $url = get_the_author_meta( $social );
                        if ( $url ) : ?>
                            <a href="<?php echo esc_url( $url ); ?>" class="text-muted small" target="_blank" rel="noopener"><?php echo ucfirst($social); ?></a>
                        <?php endif;
                    endforeach; ?>
                </div>
            </div>
        </div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
