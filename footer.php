<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
		<footer>
			<div class="footer-intro">

			</div>
			<div class="footer-content">
				<div class="footer-content-column">
					<div class="footer-logo">
					</div>
					<div class="footer-facebook-stream latest-facebook-stream">
					</div>
					<div class="facebook-status">Veliki like za sve</div>
					<div class="footer-twitter-stream latest-facebook-stream">
					</div>
					<div class="twitter-tweet">
						Veliki tweet za sve
					</div>
				</div>

				<div class="footer-content-column">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '', 'container_class' => 'footer-menu-class' ) ); ?>
				</div>

				<div class="footer-content-column">
					<div class="footer-social">
						<div class="footer-mail float-left margin-left30"> </div>
						<div class="footer-facebook-stream float-left margin-left30"> </div>
						<div class="footer-twitter-stream float-left margin-left30"> </div> 
					</div>
					<div class="clearfix"></div>
					<div class="footer-telephone">
						<div class="telephone-label signal-bold">TELEFON</div>
						<div class="telephone-number">+381. 21.453.121</div>
					</div>
					<div class="footer-telephone">
						<div class="address-label signal-bold">ADRESA</div>
						<div class="address-value">BULEVAR OSLOBOĐENJA 88 LL SPRAT</div>
						<div class="address-city">21000. NOVI SAD. SRBIJA</div>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="disclaimer">© RADIO SIGNAL, 2013  All trademarks are the property of their respective owners </div>
			 </div>
		</footer>

	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>