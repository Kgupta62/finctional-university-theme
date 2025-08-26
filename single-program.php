<?php
/**
 * Template for displaying a single program post.
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
				<a class="metabox__blog-home-link" href="<?php echo esc_url( get_post_type_archive_link( 'program' ) ); ?>">
					<i class="fa fa-home" aria-hidden="true"></i>
					<?php esc_html_e( 'All Programs', 'fictional-university' ); ?>
				</a>
				<span class="metabox__main"><?php the_title(); ?></span>
			</p>
		</div>

		<div class="generic-content"><?php the_content(); ?></div>

		<?php
		$related_professors = new WP_Query(
			array(
				'posts_per_page' => -1,
				'post_type'      => 'professor',
				'orderby'        => 'title',
				'order'          => 'ASC',
				'meta_query'     => array(
					array(
						'key'     => 'related_programs',
						'compare' => 'LIKE',
						'value'   => '"' . get_the_ID() . '"',
					),
				),
			)
		);

		if ( $related_professors->have_posts() ) :
			?>
			<hr class="section-break">
			<h2 class="headline headline--medium"><?php the_title(); ?> <?php esc_html_e( 'Professors', 'fictional-university' ); ?></h2>
			<ul class="professor-cards">
				<?php
				while ( $related_professors->have_posts() ) :
					$related_professors->the_post();
					?>
					<li class="professor-card__list-item">
						<a class="professor-card" href="<?php echo esc_url( get_the_permalink() ); ?>">
							<img class="professor-card__image" src="<?php echo esc_url( get_the_post_thumbnail_url( null, 'professorLandscape' ) ); ?>" alt="<?php the_title_attribute(); ?>">
							<span class="professor-card__name"><?php the_title(); ?></span>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php
		endif;
		wp_reset_postdata();

		$today           = gmdate( 'Ymd' );
		$upcoming_events = new WP_Query(
			array(
				'posts_per_page' => 2,
				'post_type'      => 'event',
				'meta_key'       => 'event_date',
				'orderby'        => 'meta_value_num',
				'order'          => 'ASC',
				'meta_query'     => array(
					array(
						'key'     => 'event_date',
						'compare' => '>=',
						'value'   => $today,
						'type'    => 'numeric',
					),
					array(
						'key'     => 'related_programs',
						'compare' => 'LIKE',
						'value'   => '"' . get_the_ID() . '"',
					),
				),
			)
		);

	if ( $upcoming_events->have_posts() ) :
		?>
			<hr class="section-break">
			<h2 class="headline headline--medium"><?php the_title(); ?> <?php esc_html_e( 'Upcoming Events', 'fictional-university' ); ?></h2>
			<?php
			while ( $upcoming_events->have_posts() ) :
				$upcoming_events->the_post();
				get_template_part( 'template-parts/content', 'event' );
			endwhile;
		endif;
		wp_reset_postdata();

		$related_campuses = get_field( 'related_campus' );

	if ( $related_campuses ) :
		?>
			<hr class="section-break">
			<h2 class="headline headline--medium"><?php the_title(); ?> <?php esc_html_e( 'is Available At These Campuses:', 'fictional-university' ); ?></h2>
			<ul class="min-list link-list">
			<?php
			foreach ( $related_campuses as $campus ) :
				?>
					<li>
						<a href="<?php echo esc_url( get_the_permalink( $campus ) ); ?>">
						<?php echo esc_html( get_the_title( $campus ) ); ?>
						</a>
					</li>
					<?php
				endforeach;
			?>
			</ul>
		<?php endif; ?>

	</div>

	<?php
endwhile;

get_footer();
