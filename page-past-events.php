<?php
/**
 * Past Events archive template.
 *
 * @package Fictional_University
 */

get_header();

pageBanner(
	array(
		'title'    => esc_html__( 'Past Events', 'fictional-university' ),
		'subtitle' => esc_html__( 'A recap of our past events.', 'fictional-university' ),
	)
);
?>

<div class="container container--narrow page-section">
	<?php
	// Use gmdate() instead of date() to avoid timezone issues flagged by PHPCS.
	$today = gmdate( 'Ymd' );

	$past_events = new WP_Query(
		array(
			'paged'      => get_query_var( 'paged', 1 ),
			'post_type'  => 'event',
			'meta_key'   => 'event_date',
			'orderby'    => 'meta_value_num',
			'order'      => 'ASC',
			'meta_query' => array(
				array(
					'key'     => 'event_date',
					'compare' => '<',
					'value'   => $today,
					'type'    => 'numeric',
				),
			),
		)
	);

	while ( $past_events->have_posts() ) {
		$past_events->the_post();
		get_template_part( 'template-parts/content', 'event' );
	}

	// Paginate with escaping.
	$pagination = paginate_links(
		array(
			'total' => $past_events->max_num_pages,
		)
	);

	if ( $pagination ) {
		echo wp_kses_post( $pagination );
	}

	wp_reset_postdata();
	?>
</div>

<?php get_footer(); ?>
