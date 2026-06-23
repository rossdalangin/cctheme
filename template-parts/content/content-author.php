<?php
/**
 * Template part for displaying the author box
 *
 * @package CloseClient
 */

$author_id = get_the_author_meta( 'ID' );
$description = get_the_author_meta( 'description' );
$display_name = get_the_author_meta( 'display_name' );
$author_url = get_author_posts_url( $author_id );
?>

<div class="author-box glass p-5 reveal">
    <div class="d-flex align-items-center gap-5 flex-wrap flex-md-nowrap">
        <div class="author-avatar flex-shrink-0">
            <?php echo get_avatar( $author_id, 120, '', '', array( 'class' => 'rounded-circle border-accent p-1' ) ); ?>
        </div>
        <div class="author-info">
            <span class="section-tag small"><?php echo esc_html( get_theme_mod( 'closeclient_author_tag', 'THE ARCHITECT' ) ); ?></span>
            <h3 class="author-title h4 mt-2 mb-3">
                <a href="<?php echo esc_url( $author_url ); ?>" class="text-white text-decoration-none"><?php echo esc_html( $display_name ); ?></a>
            </h3>
            <?php if ( $description ) : ?>
                <div class="author-description text-muted small lead mb-4">
                    <?php echo wp_kses_post( $description ); ?>
                </div>
            <?php endif; ?>

            <div class="author-social d-flex gap-3">
                <?php
                $socials = array( 'linkedin', 'twitter', 'facebook' );
                foreach ( $socials as $social ) :
                    $link = get_the_author_meta( $social, $author_id );
                    if ( $link ) : ?>
                        <a href="<?php echo esc_url( $link ); ?>" class="social-icon small" target="_blank" rel="noopener">
                            <span class="screen-reader-text"><?php echo esc_html( ucfirst( $social ) ); ?></span>
                            <?php echo closeclient_get_svg( $social ); ?>
                        </a>
                    <?php endif;
                endforeach; ?>
            </div>
        </div>
    </div>
</div>
