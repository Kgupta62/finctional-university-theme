<?php
/**
 * Template for displaying the Campus archive.
 *
 * @package Fictional_University
 */

get_header();

pageBanner(
	array(
		/* translators: Page banner title for the Campus archive. */
		'title'    => esc_html__( 'Our Campuses', 'fictional-university' ),
		/* translators: Page banner subtitle for the Campus archive. */
		'subtitle' => esc_html__( 'We have several conveniently located campuses.', 'fictional-university' ),
	)
);
?>

<div class="container container--narrow page-section">

	<div class="acf-map">
		<?php
		while ( have_posts() ) {
			the_post();
			$map_location = get_field( 'map_location' );

			if ( ! empty( $map_location['lat'] ) && ! empty( $map_location['lng'] ) ) :
				?>
				<div 
					class="marker" 
					data-lat="<?php echo esc_attr( $map_location['lat'] ); ?>" 
					data-lng="<?php echo esc_attr( $map_location['lng'] ); ?>">
					<h3>
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
					<p><?php echo esc_html( $map_location['address'] ); ?></p>
				</div>
				<?php
			endif;
		}
		?>
	</div>

</div>

<?php get_footer(); ?>
