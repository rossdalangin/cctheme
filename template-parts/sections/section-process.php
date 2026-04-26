<?php
/**
 * Process Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-process">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_process_headline', 'How It Works' ) ); ?></h2>
        </div>

        <div class="process-grid">
            <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
                <div class="process-step">
                    <div class="step-number"><?php echo $i; ?></div>
                    <h3><?php echo esc_html( get_theme_mod( "closeclient_process_step_{$i}_title", "Step $i" ) ); ?></h3>
                    <p><?php echo esc_html( get_theme_mod( "closeclient_process_step_{$i}_text", "Description for step $i of your proven process." ) ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
