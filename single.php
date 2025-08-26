<?php
/**
 * Template for displaying a single blog post.
 *
 * @package Fictional_University
 */

get_header();

while ( have_posts() ) :
	the_post();
	pageBanner();
	?>

	<div class="container container--narrow page-section">

		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/blog' ) ); ?>">
					<i class="fa fa-home" aria-hidden="true"></i>
					<?php esc_html_e( 'Blog Home', 'fictional-university' ); ?>
				</a>
				<span class="metabox__main">
					<?php
					printf(
								/* translators: 1: author link, 2: post date, 3: category list */

						wp_kses_post( __( 'Posted by %1$s on %2$s in %3$s', 'fictional-university' ) ),
						wp_kses_post( get_the_author_posts_link() ),
						esc_html( get_the_time( 'n.j.y' ) ),
						wp_kses_post( get_the_category_list( ', ' ) )
					);

					?>
				</span>
			</p>
		</div>

		<div class="generic-content">
			<?php the_content(); ?>
		</div>

	</div>

	<?php
endwhile;

get_footer();
