<?php
/**
 * Process Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-process">
    <div class="container">
        <div class="section-header text-center reveal" style="margin-bottom: 80px;">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_process_tag', 'OUR PROCESS' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_process_headline', 'The 3-Step Authority Roadmap' ) ); ?></h2>
        </div>

        <div class="process-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "closeclient_process_step_{$i}_title", "Step $i" );
                $text = get_theme_mod( "closeclient_process_step_{$i}_text", "Description for step $i of your proven process." );
                ?>
                <div class="process-step cc-card reveal">
                    <div class="step-num" style="font-size: 5rem; font-weight: 900; color: var(--c-accent); opacity: 0.1; position: absolute; top: -10px; left: 20px;">0<?php echo $i; ?></div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1.25rem; position: relative; z-index: 2;"><?php echo esc_html( $title ); ?></h3>
                    <p style="color: var(--c-text-muted); font-size: 1rem; line-height: 1.7; position: relative; z-index: 2;"><?php echo esc_html( $text ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
