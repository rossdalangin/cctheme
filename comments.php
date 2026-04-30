<?php
/**
 * The template for displaying comments
 *
 * @package CloseClient
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area glass p-5 mt-5">

	<?php
	if ( have_comments() ) :
		?>
		<h3 class="comments-title h4 mb-5">
			<?php
			$closeclient_comment_count = get_comments_number();
			if ( '1' === $closeclient_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One Authority Insight on &ldquo;%1$s&rdquo;', 'closeclient' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count, 2: title. */
					esc_html( _nx( '%1$s Insight on &ldquo;%2$s&rdquo;', '%1$s Insights on &ldquo;%2$s&rdquo;', $closeclient_comment_count, 'comments title', 'closeclient' ) ),
					number_format_i18n( $closeclient_comment_count ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h3><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list list-unstyled">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
                    'avatar_size' => 60,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments small text-muted"><?php esc_html_e( 'The discussion is concluded.', 'closeclient' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form( array(
        'class_form' => 'comment-form reveal py-lg',
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title h5 mb-4">',
        'title_reply_after'  => '</h3>',
        'label_submit' => __( 'Submit Insight →', 'closeclient' ),
        'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s cc-button">%4$s</button>',
    ) );
	?>

</div><!-- #comments -->
