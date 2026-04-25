	<footer id="colophon" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
		<div class="container footer-container">
            <div class="footer-widgets">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
			<div class="site-info">
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
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
