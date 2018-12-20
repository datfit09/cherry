<footer class="footer">
    <div class="footer-widget">
        <div class="container">
            
            <div class="footer-logo">

                <?php phungdat_logo_footer(); ?>

                <h2 class="index-title">
                    CHERRY RESTAURANT
                </h2>
                
                <p><?php echo esc_html( get_option( 'footer_description' ) ); ?></p>
            </div>

            

            <?php
            if ( is_active_sidebar( 'footer-widget' ) ) {
                dynamic_sidebar( 'footer-widget' );
            }
            ?>
        </div>
    </div>

    <div class="ft-end">
        <div class="container">
            <div class="ft-copyright">
                <?php echo wp_kses_post( get_option( 'footer_copyright' ) ); ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>    
</body>
</html>