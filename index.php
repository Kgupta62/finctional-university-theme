<?php
/**
 * Blog index template.
 *
 * @package Fictional_University
 */

get_header();

pageBanner(
	array(
		'title'    => esc_html__( 'Welcome to our blog!', 'fictional-university' ),
		'subtitle' => esc_html__( 'Keep up with our latest news.', 'fictional-university' ),
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
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>

			<div class="metabox">
				<p>
					<?php
					printf(
								/* translators: %1$s: Author link, %2$s: Post date, %3$s: Category list */
						esc_html__( 'Posted by %1$s on %2$s in %3$s', 'fictional-university' ),
						esc_html( get_the_author_posts_link() ), // Already escaped by core, wrapped for PHPCS.
						esc_html( get_the_time( 'n.j.y' ) ),
						wp_kses_post( get_the_category_list( ', ' ) )
					);
					?>
				</p>
			</div>

			<div class="generic-content">
				<?php the_excerpt(); ?>
				<p>
					<a class="btn btn--blue" href="<?php the_permalink(); ?>">
						<?php esc_html_e( 'Continue reading »', 'fictional-university' ); ?>
					</a>
				</p>
			</div>
		</div>
		<?php
	}

	// Paginate with escaping.
	$pagination = paginate_links(
		array(
			'type' => 'plain',
		)
	);
	if ( $pagination ) {
		echo wp_kses_post( $pagination );
	}
	?>
</div>

<?php
get_footer();
