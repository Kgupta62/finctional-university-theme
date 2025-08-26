<?php
/**
 * Template for displaying all Programs archive.
 *
 * @package Fictional_University
 */

get_header();

pageBanner(
	array(
		'title'    => esc_html__( 'All Programs', 'fictional-university' ),
		'subtitle' => esc_html__( 'There is something for everyone. Have a look around.', 'fictional-university' ),
	)
);
?>

<div class="container container--narrow page-section">

	<ul class="link-list min-list">
		<?php
		while ( have_posts() ) {
			the_post();
			?>
			<li>
				<a href="<?php echo esc_url( get_permalink() ); ?>">
					<?php the_title(); ?>
				</a>
			</li>
			<?php
		}

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- paginate_links() returns safe HTML.
		echo wp_kses_post( paginate_links() );
		?>
	</ul>

</div>

<?php get_footer(); ?>
