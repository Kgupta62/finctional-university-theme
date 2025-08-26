<?php
/**
 * Page template for displaying hierarchical pages with parent/child navigation.
 *
 * @package Fictional_University
 */

get_header();

while ( have_posts() ) {
	the_post();
	pageBanner();
	?>
	<div class="container container--narrow page-section">
		<?php
		$the_parent = wp_get_post_parent_id( get_the_ID() );

		if ( $the_parent ) {
			?>
			<div class="metabox metabox--position-up metabox--with-home-link">
				<p>
					<a class="metabox__blog-home-link" href="<?php echo esc_url( get_permalink( $the_parent ) ); ?>">
						<i class="fa fa-home" aria-hidden="true"></i>
						<?php
						/* translators: %s: Parent page title */
						printf( esc_html__( 'Back to %s', 'fictional-university' ), esc_html( get_the_title( $the_parent ) ) );
						?>
					</a>
					<span class="metabox__main"><?php the_title(); ?></span>
				</p>
			</div>
			<?php
		}

		$test_array = get_pages(
			array(
				'child_of' => get_the_ID(),
			)
		);

	if ( $the_parent || $test_array ) {
		?>
			<div class="page-links">
				<h2 class="page-links__title">
					<a href="<?php echo esc_url( get_permalink( $the_parent ) ); ?>">
					<?php echo esc_html( get_the_title( $the_parent ) ); ?>
					</a>
				</h2>
				<ul class="min-list">
				<?php
				$find_children_of = $the_parent ? $the_parent : get_the_ID();

				wp_list_pages(
					array(
						'title_li'    => null,
						'child_of'    => $find_children_of,
						'sort_column' => 'menu_order',
					)
				);
				?>
				</ul>
			</div>
			<?php
	}
	?>

		<div class="generic-content">
			<?php the_content(); ?>
		</div>
	</div>
	<?php
}

get_footer();
