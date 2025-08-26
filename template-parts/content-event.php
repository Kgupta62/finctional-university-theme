<?php
/**
 * Event Summary Template Part.
 *
 * Displays a single event summary block with date, title, and excerpt.
 *
 * @package Fictional_University
 */

?>

<div class="event-summary">
	<a class="event-summary__date t-center" href="<?php echo esc_url( get_permalink() ); ?>">
		<?php
		$event_date = new DateTime( get_field( 'event_date' ) );
		?>
		<span class="event-summary__month">
			<?php echo esc_html( $event_date->format( 'M' ) ); ?>
		</span>
		<span class="event-summary__day">
			<?php echo esc_html( $event_date->format( 'd' ) ); ?>
		</span>  
	</a>
	<div class="event-summary__content">
		<h5 class="event-summary__title headline headline--tiny">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php the_title(); ?>
			</a>
		</h5>
		<p>
			<?php
			if ( has_excerpt() ) {
				echo esc_html( get_the_excerpt() );
			} else {
				echo wp_kses_post( wp_trim_words( get_the_content(), 18 ) );
			}
			?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="nu gray">
				<?php esc_html_e( 'Learn more', 'fictional-university' ); ?>
			</a>
		</p>
	</div>
</div>
