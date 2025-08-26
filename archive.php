<?php
/**
 * Template for displaying archive pages.
 *
 * @package Fictional_University
 */

get_header();

pageBanner(
	array(
		// Archive title and description are already escaped by WP core.
		'title'    => wp_kses_post( get_the_archive_title() ),
		'subtitle' => wp_kses_post( get_the_archive_description() ),
	)
);
?>

<div class="container container--narrow page-section">
	<?php
	while ( have_posts() ) {
		the_post();
		?>
		<div class="post-item">
			<h2 class="headline headline--medium headline--post-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>">
					<?php the_title(); ?>
				</a>
			</h2>

			<div class="metabox">
				<p>
					<?php
					printf(
								/* translators: 1: Author name, 2: Date, 3: Categories list */
						esc_html__( 'Posted by %1$s on %2$s in %3$s', 'fictional-university' ),
						// Author link is already safe output from WP core.
						wp_kses_post( get_the_author_posts_link() ),
						esc_html( get_the_time( 'n.j.y' ) ),
						wp_kses_post( get_the_category_list( ', ' ) )
					);
					?>
				</p>
			</div>

			<div class="generic-content">
				<?php the_excerpt(); ?>
				<p>
					<a class="btn btn--blue" href="<?php echo esc_url( get_permalink() ); ?>">
						<?php esc_html_e( 'Continue reading »', 'fictional-university' ); ?>
					</a>
				</p>
			</div>

		</div>
		<?php
	}

	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- paginate_links() returns safe HTML.
	echo wp_kses_post( paginate_links() );
	?>
</div>

<?php get_footer(); ?>
