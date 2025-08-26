<?php
/**
 * Header template for Fictional University Theme.
 *
 * @package Fictional_University
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header class="site-header">
		<div class="container">
			<h1 class="school-logo-text float-left">
				<a href="<?php echo esc_url( site_url() ); ?>">
					<strong>Fictional</strong> University
				</a>
			</h1>
			<span class="js-search-trigger site-header__search-trigger">
				<i class="fa fa-search" aria-hidden="true"></i>
			</span>
			<i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>

			<div class="site-header__menu group">
				<nav class="main-navigation">
					<ul>
						<li 
						<?php
						if ( is_page( 'about-us' ) || wp_get_post_parent_id( 0 ) === 16 ) :
							?>
							class="current-menu-item"<?php endif; ?>>
							<a href="<?php echo esc_url( site_url( '/about-us' ) ); ?>"><?php esc_html_e( 'About Us', 'fictional-university' ); ?></a>
						</li>
						<li 
						<?php
						if ( get_post_type() === 'program' ) :
							?>
							class="current-menu-item"<?php endif; ?>>
							<a href="<?php echo esc_url( get_post_type_archive_link( 'program' ) ); ?>"><?php esc_html_e( 'Programs', 'fictional-university' ); ?></a>
						</li>
						<li 
						<?php
						if ( get_post_type() === 'event' || is_page( 'past-events' ) ) :
							?>
							class="current-menu-item"<?php endif; ?>>
							<a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>"><?php esc_html_e( 'Events', 'fictional-university' ); ?></a>
						</li>
						<li 
						<?php
						if ( get_post_type() === 'campus' ) :
							?>
							class="current-menu-item"<?php endif; ?>>
							<a href="<?php echo esc_url( get_post_type_archive_link( 'campus' ) ); ?>"><?php esc_html_e( 'Campuses', 'fictional-university' ); ?></a>
						</li>
						<li 
						<?php
						if ( get_post_type() === 'post' ) :
							?>
							class="current-menu-item"<?php endif; ?>>
							<a href="<?php echo esc_url( site_url( '/blog' ) ); ?>"><?php esc_html_e( 'Blog', 'fictional-university' ); ?></a>
						</li>
					</ul>
				</nav>

				<div class="site-header__util">
					<a href="#" class="btn btn--small btn--orange float-left push-right"><?php esc_html_e( 'Login', 'fictional-university' ); ?></a>
					<a href="#" class="btn btn--small btn--dark-orange float-left"><?php esc_html_e( 'Sign Up', 'fictional-university' ); ?></a>
					<span class="search-trigger js-search-trigger">
						<i class="fa fa-search" aria-hidden="true"></i>
					</span>
				</div>
			</div>
		</div>
	</header>
