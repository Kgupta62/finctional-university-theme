<?php
/**
 * Template for displaying the Events archive.
 *
 * @package Fictional_University
 */

get_header();

pageBanner(
	array(
		/* translators: Page banner title for Events archive. */
		'title'    => esc_html__( 'All Events', 'fictional-university' ),
		/* translators: Page banner subtitle for Events archive. */
		'subtitle' => esc_html__( 'See what is going on in our world.', 'fictional-university' ),
	)
);
?>

<div class="container container--narrow page-section">

	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', 'event' );
	}

	echo wp_kses_post( paginate_links() );
	?>

	<hr class="section-break">

	<p>
		<?php esc_html_e( 'Looking for a recap of past events?', 'fictional-university' ); ?>
		<a href="<?php echo esc_url( site_url( '/past-events' ) ); ?>">
			<?php esc_html_e( 'Check out our past events archive', 'fictional-university' ); ?>
		</a>.
	</p>

</div>

<?php get_footer(); ?>
