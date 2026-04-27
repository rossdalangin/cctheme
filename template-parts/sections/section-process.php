<?php
/**
 * Process Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-process">
    <div class="container">
        <div class="section-header text-center reveal" style="margin-bottom: 100px;">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_process_tag', 'OUR PROCESS' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_process_headline', 'The 3-Step Authority Roadmap' ) ); ?></h2>
        </div>

        <div class="process-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "closeclient_process_step_{$i}_title", "Step $i" );
                $text = get_theme_mod( "closeclient_process_step_{$i}_text", "Description for step $i of your proven process." );
                ?>
                <div class="process-step cc-card reveal">
                    <div class="step-num" style="font-size: 8rem; font-weight: 900; color: var(--c-indigo); opacity: 0.05; position: absolute; top: -2rem; left: 0; line-height: 1;">0<?php echo $i; ?></div>
                    <h3 style="font-size: 2rem; margin-bottom: 1.5rem; position: relative; z-index: 2;"><?php echo esc_html( $title ); ?></h3>
                    <p style="color: var(--c-text-muted); font-size: 1.15rem; line-height: 1.8; position: relative; z-index: 2;"><?php echo esc_html( $text ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
