	<footer id="colophon" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
		<div class="container footer-container">
            <div class="footer-branding text-center">
                <?php the_custom_logo(); ?>
                <p class="site-description"><?php bloginfo( 'description' ); ?></p>
            </div>

            <div class="footer-social-links">
                <?php
                $socials = array( 'twitter', 'facebook', 'linkedin', 'instagram', 'youtube' );
                foreach ( $socials as $social ) :
                    $link = get_theme_mod( "closeclient_social_{$social}", '#' );
                    if ( $link && '#' !== $link ) : ?>
                        <a href="<?php echo esc_url( $link ); ?>" class="social-link-<?php echo esc_attr( $social ); ?>" target="_blank" rel="noopener"><?php echo esc_html( ucfirst( $social ) ); ?></a>
                    <?php endif;
                endforeach; ?>
            </div>

            <div class="footer-widgets">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>

			<div class="site-info text-center">
				<p class="copyright"><?php echo esc_html( get_theme_mod( 'closeclient_footer_copyright', '© ' . date('Y') . ' CloseClient. All rights reserved.' ) ); ?></p>
				<div class="footer-links">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'closeclient' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'closeclient' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'closeclient' ), 'closeclient', '<a href="https://closeclient.com/">CloseClient</a>' );
					?>
				</div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
