<?php
/**
 * The template for displaying the footer
 */
?>
    </div>
<?php
    /**
     * Footer subscribe block
     */
    aquaterias_the_subscribe_block();

    /**
     * Footer widgets area
     * Visible only with Unyson framework activated
     */
    $aquaterias_footer_cols = aquaterias_get_footer_cols_num();
    if ( function_exists( 'FW' ) AND $aquaterias_footer_cols['num'] > 0 ):
    ?>
	<section id="block-footer">
		<div class="container">
			<div class="row">
                <?php
                for ($x = 1; $x <= 4; $x++):
                    ?>
                    <?php if ( !isset($aquaterias_footer_cols['hidden'][ $x ]) ): ?>
					<div class="<?php echo esc_attr( $aquaterias_footer_cols['classes'][$x] ).' '.esc_attr( $aquaterias_footer_cols['hidden_mobile'][$x] ); ?> matchHeight clearfix">    
						<?php if ( is_active_sidebar( 'footer-' . $x ) ) : ?>
							<div class="footer-widget-area">
								<?php
                                    dynamic_sidebar( 'footer-' . $x );
                                ?>
							</div>
						<?php else: ?>
							<div class="footer-widget-area">
	                            <h4><?php esc_html__( 'Footer', 'aquaterias' ); ?> <?php echo esc_html( $x ); ?></h4>
	                            <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php echo esc_html__( 'To add your widgets click here', 'aquaterias' ); ?></a>
	                        </div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
                    <?php
                endfor;
                ?>
			</div>
		</div>
	</section>
    <?php endif; ?>
    <?php 
    if ( function_exists( 'FW' ) ) {

        $aquaterias_copyrights = fw_get_db_settings_option( 'copyrights' );
        $aquaterias_go_top_hide = fw_get_db_settings_option( 'go_top_hide');
        $aquaterias_go_top_img = fw_get_db_settings_option( 'go_top_img');
    }
    ?>
	<footer class="footer-block">
		<div class="container">
			<?php if ( !empty($aquaterias_copyrights) ) : ?>
				<?php echo wp_kses_post( $aquaterias_copyrights ); ?>
			<?php else : ?>
				<p><?php echo esc_html__( 'Like-themes &copy; All Rights Reserved - 2018', 'aquaterias' );?></p>
			<?php endif; ?>
			<?php if ( isset($aquaterias_go_top_hide) AND $aquaterias_go_top_hide !== true ) : ?>

                <?php if ( empty($aquaterias_go_top_img) ): ?>
                    <a href="#" class="go-top hidden-xs hidden-ms"><span class="fa fa-arrow-up"></span><?php echo esc_html__( 'Top', 'aquaterias' );?></a>
                <?php else: ?>
                <a href="#" class="go-top go-top-img hidden-xs hidden-ms">                    
                    <?php echo wp_get_attachment_image( $aquaterias_go_top_img['attachment_id'], 'full' ); ?>
                </a>
                <?php endif; ?>
			<?php endif; ?>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
