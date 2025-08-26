<?php
/**
 * The template for displaying the homepage.
 *
 * @package Fictional_University
 */

get_header();
?>

<div class="page-banner">
	<div class="page-banner__bg-image" style="background-image: url(<?php echo esc_url( get_theme_file_uri( '/images/library-hero.jpg' ) ); ?>);"></div>
	<div class="page-banner__content container t-center c-white">
		<h1 class="headline headline--large"><?php esc_html_e( 'Welcome!', 'fictional-university' ); ?></h1>
		<h2 class="headline headline--medium"><?php esc_html_e( 'We think you’ll like it here.', 'fictional-university' ); ?></h2>
		<h3 class="headline headline--small">
			<?php
			printf(
				/* translators: %s: strong tag for emphasis */
				esc_html__( 'Why don’t you check out the %1$smajor%2$s you’re interested in?', 'fictional-university' ),
				'<strong>',
				'</strong>'
			);
			?>
		</h3>
		<a href="<?php echo esc_url( get_post_type_archive_link( 'program' ) ); ?>" class="btn btn--large btn--blue">
			<?php esc_html_e( 'Find Your Major', 'fictional-university' ); ?>
		</a>
	</div>
</div>

<div class="full-width-split group">
	<div class="full-width-split__one">
		<div class="full-width-split__inner">
			<h2 class="headline headline--small-plus t-center"><?php esc_html_e( 'Upcoming Events', 'fictional-university' ); ?></h2>

			<?php
			$today           = wp_date( 'Ymd' );
			$homepage_events = new WP_Query(
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
					),
				)
			);

			while ( $homepage_events->have_posts() ) {
				$homepage_events->the_post();
				get_template_part( 'template-parts/content', 'event' );
			}
			wp_reset_postdata();
			?>

			<p class="t-center no-margin">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>" class="btn btn--blue">
					<?php esc_html_e( 'View All Events', 'fictional-university' ); ?>
				</a>
			</p>
		</div>
	</div>

	<div class="full-width-split__two">
		<div class="full-width-split__inner">
			<h2 class="headline headline--small-plus t-center"><?php esc_html_e( 'From Our Blogs', 'fictional-university' ); ?></h2>

			<?php
			$homepage_posts = new WP_Query(
				array(
					'posts_per_page' => 2,
				)
			);

			while ( $homepage_posts->have_posts() ) {
				$homepage_posts->the_post();
				?>
				<div class="event-summary">
					<a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
						<span class="event-summary__month"><?php echo esc_html( get_the_time( 'M' ) ); ?></span>
						<span class="event-summary__day"><?php echo esc_html( get_the_time( 'd' ) ); ?></span>  
					</a>
					<div class="event-summary__content">
						<h5 class="event-summary__title headline headline--tiny">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h5>
						<p>
							<?php
							if ( has_excerpt() ) {
								echo esc_html( get_the_excerpt() );
							} else {
								echo esc_html( wp_trim_words( get_the_content(), 18 ) );
							}
							?>
							<a href="<?php the_permalink(); ?>" class="nu gray">
								<?php esc_html_e( 'Read more', 'fictional-university' ); ?>
							</a>
						</p>
					</div>
				</div>
			<?php } wp_reset_postdata(); ?>

			<p class="t-center no-margin">
				<a href="<?php echo esc_url( site_url( '/blog' ) ); ?>" class="btn btn--yellow">
					<?php esc_html_e( 'View All Blog Posts', 'fictional-university' ); ?>
				</a>
			</p>
		</div>
	</div>
</div>

<div class="hero-slider">
	<div data-glide-el="track" class="glide__track">
		<div class="glide__slides">

			<div class="hero-slider__slide" style="background-image: url(<?php echo esc_url( get_theme_file_uri( '/images/bus.jpg' ) ); ?>);">
				<div class="hero-slider__interior container">
					<div class="hero-slider__overlay">
						<h2 class="headline headline--medium t-center"><?php esc_html_e( 'Free Transportation', 'fictional-university' ); ?></h2>
						<p class="t-center"><?php esc_html_e( 'All students have free unlimited bus fare.', 'fictional-university' ); ?></p>
						<p class="t-center no-margin"><a href="#" class="btn btn--blue"><?php esc_html_e( 'Learn more', 'fictional-university' ); ?></a></p>
					</div>
				</div>
			</div>

			<div class="hero-slider__slide" style="background-image: url(<?php echo esc_url( get_theme_file_uri( '/images/apples.jpg' ) ); ?>);">
				<div class="hero-slider__interior container">
					<div class="hero-slider__overlay">
						<h2 class="headline headline--medium t-center"><?php esc_html_e( 'An Apple a Day', 'fictional-university' ); ?></h2>
						<p class="t-center"><?php esc_html_e( 'Our dentistry program recommends eating apples.', 'fictional-university' ); ?></p>
						<p class="t-center no-margin"><a href="#" class="btn btn--blue"><?php esc_html_e( 'Learn more', 'fictional-university' ); ?></a></p>
					</div>
				</div>
			</div>

			<div class="hero-slider__slide" style="background-image: url(<?php echo esc_url( get_theme_file_uri( '/images/bread.jpg' ) ); ?>);">
				<div class="hero-slider__interior container">
					<div class="hero-slider__overlay">
						<h2 class="headline headline--medium t-center"><?php esc_html_e( 'Free Food', 'fictional-university' ); ?></h2>
						<p class="t-center"><?php esc_html_e( 'Fictional University offers lunch plans for those in need.', 'fictional-university' ); ?></p>
						<p class="t-center no-margin"><a href="#" class="btn btn--blue"><?php esc_html_e( 'Learn more', 'fictional-university' ); ?></a></p>
					</div>
				</div>
			</div>

		</div>
		<div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
	</div>
</div>

<?php
get_footer();
