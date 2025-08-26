<?php
/**
 * Template for displaying a single professor post.
 *
 * @package Fictional_University
 */

get_header();

while ( have_posts() ) {
	the_post();
	pageBanner();
	?>

	<div class="container container--narrow page-section">

		<div class="generic-content">
			<div class="row group">

				<div class="one-third">
					<?php the_post_thumbnail( 'professorPortrait' ); ?>
				</div>

				<div class="two-thirds">
					<?php the_content(); ?>
				</div>

			</div>
		</div>

		<?php
		$related_programs = get_field( 'related_programs' );

		if ( $related_programs ) :
			?>
			<hr class="section-break">
			<h2 class="headline headline--medium"><?php esc_html_e( 'Subject(s) Taught', 'fictional-university' ); ?></h2>
			<ul class="link-list min-list">
				<?php
				foreach ( $related_programs as $program ) :
					?>
					<li>
						<a href="<?php echo esc_url( get_the_permalink( $program ) ); ?>">
							<?php echo esc_html( get_the_title( $program ) ); ?>
						</a>
					</li>
					<?php
				endforeach;
				?>
			</ul>
		<?php endif; ?>

	</div>

	<?php
}

get_footer();
