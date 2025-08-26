<?php
/**
 * Theme Functions for Fictional University.
 *
 * @package Fictional_University
 */

/**
 * Display a custom page banner.
 *
 * @param array|null $args {
 *     Optional. Arguments for the banner.
 *
 *     @type string $title    The banner title. Defaults to the page title.
 *     @type string $subtitle The banner subtitle. Defaults to ACF field.
 *     @type string $photo    The banner background image URL.
 * }
 */
function pageBanner( $args = null ) {

	$args = (array) $args;

	if ( empty( $args['title'] ) ) {
		$args['title'] = get_the_title();
	}

	if ( empty( $args['subtitle'] ) ) {
		$args['subtitle'] = get_field( 'page_banner_subtitle' );
	}

	if ( empty( $args['photo'] ) ) {
		if ( get_field( 'page_banner_background_image' ) && ! is_archive() && ! is_home() ) {
			$background_image = get_field( 'page_banner_background_image' );
			$args['photo']    = isset( $background_image['sizes']['pageBanner'] ) ? $background_image['sizes']['pageBanner'] : '';
		} else {
			$args['photo'] = get_theme_file_uri( '/images/ocean.jpg' );
		}
	}
	?>
	<div class="page-banner">
		<div class="page-banner__bg-image" style="background-image: url(<?php echo esc_url( $args['photo'] ); ?>);"></div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title"><?php echo esc_html( $args['title'] ); ?></h1>
			<div class="page-banner__intro">
				<p><?php echo esc_html( $args['subtitle'] ); ?></p>
			</div>
		</div>  
	</div>
	<?php
}

/**
 * Enqueue theme scripts and styles.
 *
 * @return void
 */
function university_files() {
	wp_enqueue_script( 'google-map', '//maps.googleapis.com/maps/api/js?key=AIzaSyDin3iGCdZ7RPomFLyb2yqFERhs55dmfTI', array(), '1.0', true );
	wp_enqueue_script( 'main-university-js', get_theme_file_uri( '/build/index.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_style( 'custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'university-main-styles', get_theme_file_uri( '/build/style-index.css' ) );
	wp_enqueue_style( 'university-extra-styles', get_theme_file_uri( '/build/index.css' ) );
}
add_action( 'wp_enqueue_scripts', 'university_files' );

/**
 * Add theme support and image sizes.
 *
 * @return void
 */
function university_features() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'professor_landscape', 400, 260, true );
	add_image_size( 'professor_portrait', 480, 650, true );
	add_image_size( 'page_banner', 1500, 350, true );
}
add_action( 'after_setup_theme', 'university_features' );

/**
 * Adjust queries for custom post type archives.
 *
 * @param WP_Query $query The current WP_Query instance.
 * @return void
 */
function university_adjust_queries( $query ) {
	if ( ! is_admin() && is_post_type_archive( 'campus' ) && $query->is_main_query() ) {
		$query->set( 'posts_per_page', -1 );
	}

	if ( ! is_admin() && is_post_type_archive( 'program' ) && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
		$query->set( 'posts_per_page', -1 );
	}

	if ( ! is_admin() && is_post_type_archive( 'event' ) && $query->is_main_query() ) {
		$today = wp_date( 'Ymd' ); // ✅ timezone-safe.
		$query->set( 'meta_key', 'event_date' );
		$query->set( 'orderby', 'meta_value_num' );
		$query->set( 'order', 'ASC' );
		$query->set(
			'meta_query',
			array(
				array(
					'key'     => 'event_date',
					'compare' => '>=',
					'value'   => $today,
					'type'    => 'numeric',
				),
			)
		);
	}
}
add_action( 'pre_get_posts', 'university_adjust_queries' );

/**
 * Add API key for ACF Google Map field.
 *
 * @param array $api The API configuration.
 * @return array
 */
function university_map_key( $api ) {
	$api['key'] = 'yourKeyGoesHere';
	return $api;
}
add_filter( 'acf/fields/google_map/api', 'university_map_key' );
