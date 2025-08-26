<?php
/**
 * Theme footer template.
 *
 * @package Fictional_University
 */

?>

<footer class="site-footer">
	<div class="site-footer__inner container container--narrow">
		<div class="group">

			<div class="site-footer__col-one">
				<h1 class="school-logo-text school-logo-text--alt-color">
					<a href="<?php echo esc_url( site_url( '/' ) ); ?>">
						<strong><?php esc_html_e( 'Fictional', 'fictional-university' ); ?></strong>
						<?php esc_html_e( 'University', 'fictional-university' ); ?>
					</a>
				</h1>
				<p>
					<a class="site-footer__link" href="tel:5555555555">
						<?php esc_html_e( '555.555.5555', 'fictional-university' ); ?>
					</a>
				</p>
			</div>

			<div class="site-footer__col-two-three-group">
				<div class="site-footer__col-two">
					<h3 class="headline headline--small">
						<?php esc_html_e( 'Explore', 'fictional-university' ); ?>
					</h3>
					<nav class="nav-list">
						<ul>
							<li><a href="<?php echo esc_url( site_url( '/about-us' ) ); ?>"><?php esc_html_e( 'About Us', 'fictional-university' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Programs', 'fictional-university' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Events', 'fictional-university' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Campuses', 'fictional-university' ); ?></a></li>
						</ul>
					</nav>
				</div>

				<div class="site-footer__col-three">
					<h3 class="headline headline--small">
						<?php esc_html_e( 'Learn', 'fictional-university' ); ?>
					</h3>
					<nav class="nav-list">
						<ul>
							<li><a href="#"><?php esc_html_e( 'Legal', 'fictional-university' ); ?></a></li>
							<li><a href="<?php echo esc_url( site_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy', 'fictional-university' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Careers', 'fictional-university' ); ?></a></li>
						</ul>
					</nav>
				</div>
			</div>

			<div class="site-footer__col-four">
				<h3 class="headline headline--small">
					<?php esc_html_e( 'Connect With Us', 'fictional-university' ); ?>
				</h3>
				<nav>
					<ul class="min-list social-icons-list group">
						<li><a href="#" class="social-color-facebook" aria-label="<?php esc_attr_e( 'Facebook', 'fictional-university' ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="social-color-twitter" aria-label="<?php esc_attr_e( 'Twitter', 'fictional-university' ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="social-color-youtube" aria-label="<?php esc_attr_e( 'YouTube', 'fictional-university' ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
						<li><a href="#" class="social-color-linkedin" aria-label="<?php esc_attr_e( 'LinkedIn', 'fictional-university' ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li><a href="#" class="social-color-instagram" aria-label="<?php esc_attr_e( 'Instagram', 'fictional-university' ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</nav>
			</div>

		</div>
	</div>
</footer>

<div class="search-overlay">
	<div class="search-overlay__top">
		<div class="container">
			<i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
			<input type="text" class="search-term" placeholder="<?php esc_attr_e( 'What are you looking for?', 'fictional-university' ); ?>" id="search-term">
			<i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
		</div>
	</div>

	<div class="container">
		<div id="search-overlay__results"></div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
