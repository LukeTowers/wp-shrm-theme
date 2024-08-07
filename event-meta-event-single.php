<?php
/**
 * The template is used for displaying a single event details.
 *
 * You can use this to edit how the details re displayed on your site. (see notice below).
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.7
 */
?>

<div class="entry-meta eventorganiser-event-meta">
	<!-- Choose a different date format depending on whether we want to include time -->
	<?php 
		if (eo_is_all_day()) {
			$date_format = 'F jS, Y'; 
		} else {
			$date_format = 'F jS, Y - ' . get_option('time_format'); 
		} 
	?>
	<hr>

	<!-- Event details -->
		<h4><?php _e('Event Details', 'eventorganiser') ;?></h4>

	<ul class="eo-event-meta">

		<?php 
			if (!eo_reoccurs()) {
				if (eo_is_all_day()) { ?>
					<li><strong>Date:</strong> <?php eo_the_start($date_format); ?></li>
				<?php } else { ?>
					<li><strong>Start:</strong> <?php eo_the_start($date_format); ?></li>
					<li><strong>End:</strong> <?php eo_the_end($date_format); ?></li>
				<?php }
			}
		?>

		<?php if( eo_get_venue() ){ 
			$tax = get_taxonomy( 'event-venue' ); ?>
			<li><strong><?php echo esc_html( $tax->labels->singular_name ) ?>:</strong> <a href="<?php eo_venue_link(); ?>"> <?php eo_venue_name(); ?></a></li>
		<?php } ?>


		<?php if( get_the_terms(get_the_ID(),'event-category') ){ ?>
			<li><strong><?php _e('Categories','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></li>
		<?php } ?>

	
		<?php if( get_the_terms(get_the_ID(),'event-tag') && !is_wp_error( get_the_terms(get_the_ID(),'event-tag') ) ){ ?>
			<li><strong><?php _e('Tags','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-tag', '', ', ', '' ); ?></li>
		<?php } ?>

		<?php if( eo_reoccurs() ){ 			
				//Event reoccurs - display dates. 
				$upcoming = new WP_Query(array(
					'post_type'=>'event',
					'event_start_after' => 'today',
					'posts_per_page' => -1,
					'event_series' => get_the_ID(),
					'group_events_by'=>'occurrence'//Don't group by series
				));
	
				if( $upcoming->have_posts() ): ?>

					<li><strong><?php _e('Upcoming Dates','eventorganiser'); ?>:</strong>
						<ul id="eo-upcoming-dates">
							<?php while( $upcoming->have_posts() ): $upcoming->the_post(); ?>
									<li> <?php eo_the_start($date_format) ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
 
					<?php 
					wp_reset_postdata(); 
					//With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
					wp_enqueue_script('eo_front');
					?>
				<?php endif; ?>
		<?php } ?>

		<?php do_action( 'eventorganiser_additional_event_meta' ) ?>

	</ul>
	
	<?php
		$tickets_url = get_post_meta(get_the_ID(), 'ticket_url', true);
		if (!empty($tickets_url)) {
			echo '<a href="' . $tickets_url . '" class="event-tickets" target="_blank">Get Tickets</a>';
		}
	?>

	<!-- Does the event have a venue? -->
	<?php if( eo_get_venue() ): ?>
		<!-- Display map -->
		<div class="eo-event-venue-map">
			<?php echo eo_get_venue_map(eo_get_venue(),array('width'=>'100%')); ?>
		</div>
	<?php endif; ?>


	<div style="clear:both"></div>

	<hr>

</div><!-- .entry-meta -->