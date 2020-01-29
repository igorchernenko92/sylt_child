<?php
/**
 * The template for displaying the footer.
 *
 * @package WPCasa Sylt
 */
?>

		<div class="site-footer-bg">

			<?php if( is_active_sidebar( 'footer' ) ) : ?>
		
				<div class="site-footer-top site-section">
				
					<div class="container">
						
						<div class="row 150%">
		
							<?php dynamic_sidebar( 'footer' ); ?>

						</div>

					</div><!-- .container -->
				
				</div><!-- .footer-top -->
				
			<?php endif; ?>
			
			<footer class="site-footer site-section" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
				
				<div class="container">
					
					<div class="row">
				
						<div class="12u$">

                            <p class="social-media">
                                <a href="https://www.facebook.com/ccc.immo"><img src="<?php echo THEME_PATH ?>/assets/images/facebook.png" /></a>
                                <a href="https://www.linkedin.com/in/anke-köhler-640b1357"><img src="<?php echo THEME_PATH ?>/assets/images/linkedin.png" /></a>
                                <a href="https://www.xing.com/profile/Anke_Koehler"><img src="<?php echo THEME_PATH ?>/assets/images/xing.png" /></a>
                            </p>

                            <?php wpsight_sylt_menu( 'footer', array( 'container' => 'div', 'align' => 'center' ) ); ?>

                            <p class="copyright">
                                <?php printf( 'Copyright &copy; %s', '<span itemprop="copyrightYear">' . date( 'Y' ) . '</span>' ); ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="copyrightHolder"><?php bloginfo( 'name' ); ?></a> &#9632;
                                <?php _e( 'Developed by', 'ccc')?>&nbsp;<a href="https://www.kybernetik-services.de">Kybernetik Services GmbH</a>
                            </p>

						</div>
					
					</div>
				
				</div><!-- .container -->
		
			</footer>
			
		</div><!-- .site-footer-bg -->
		
	</div><!-- .site-container -->

	<?php wp_footer(); ?>

</body>
</html>