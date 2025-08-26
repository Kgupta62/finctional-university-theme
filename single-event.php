<?php
/**
 * Template for displaying a single event post.
 *
 * @package Fictional_University
 */

get_header();

while ( have_posts() ) {
	the_post();
	pageBanner();
	?>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>">
					<i class="fa fa-home" aria-hidden="true"></i>
					<?php esc_html_e( 'Events Home', 'fictional-university' ); ?>
				</a>
				<span class="metabox__main"><?php the_title(); ?></span>
			</p>
		</div>

		<div class="generic-content"><?php the_content(); ?></div>

		<?php
		$related_programs = get_field( 'related_programs' );

		if ( $related_programs ) :
			?>
			<hr class="section-break">
			<h2 class="headline headline--medium"><?php esc_html_e( 'Related Program(s)', 'fictional-university' ); ?></h2>
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
