<?php 
/*
	Template Name: Events Page
*/ 
get_header(); ?>
	<div class="content_container page-events">	
		<?php 
			get_template_component('breadcrumbs');
			
			// Note, query var event-type is added to list of useable query_vars in theme-support.php
			
			$events_to_display = get_query_var('event-type', 'upcoming');				
			
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			$eventArgs = array(
				'post_type'			=>	'event',
				'post_status'		=>	'publish',
				'suppress_filters'	=>	false,
				'posts_per_page'	=>	12,
				'paged'				=>	$paged,
			);
			
			if ($events_to_display === 'past') {
				$eventArgs['showpastevents'] = true;
				$eventArgs['event_end_before'] = 'today';
				$eventArgs['orderby'] = 'eventend';
			} else {
				$eventArgs['event_start_after'] = 'today';
			}
			
			$eventQuery = new WP_Query($eventArgs);
		?>
		<div class="event_selector_container">
			<label for="events-to-show">Display&nbsp;</label>
			<select name="events-to-show" id="events-to-show">
				<option value="<?php echo esc_url(add_query_arg('event-type', 'upcoming', get_the_permalink())); ?>" <?php selected($events_to_display, 'upcoming'); ?>>Upcoming Events</option>
				<option value="<?php echo esc_url(add_query_arg('event-type', 'past', get_the_permalink())); ?>" <?php selected($events_to_display, 'past'); ?>>Past Events</option>
			</select>
			<script>
				document.getElementById("events-to-show").onchange = function() {
					window.location.href = this.value;
				};
			</script>
		</div>
		<?php if ($eventQuery->have_posts()) : while ($eventQuery->have_posts()) : $eventQuery->the_post(); ?>
			<div class="event_container">
				<div class="event-picture">
					<a href="<?php echo get_the_permalink(); ?>">
						<?php 
							$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
							if (empty($image[0])) {
								$image[0] = SHRM_2016_TEMPLATE_URL . '/includes/images/default-placeholder.png';
							}
							echo '<span class="image-content rectangle" style="background-image: url(\'' . $image[0] . '\');"></span>';
						?>
					</a>
				</div>
				<div class="event-details">
					<h3 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<span class="event-date">
						<?php
							if (eo_is_all_day()) {
								$format = 'F jS, Y';
							} else {
								$format = 'F jS, Y ' . get_option('time_format');
							} 
							
							eo_the_start($format);
						?>
					</span>
					<?php
						$tickets_url = get_post_meta(get_the_ID(), 'ticket_url', true);
						if (!empty($tickets_url)) {
							echo '<a href="' . $tickets_url . '" class="event-tickets" target="_blank">Get Tickets</a>';
						}
					?>
					<a href="<?php the_permalink(); ?>" class="event-more-info">Find Out More</a>
				</div>
			</div>
		<?php endwhile; else: ?>
			<p>There are no events to display at this time. Check back later.</p>
		<?php endif; 
			
			get_template_component('pagination', array(
				'event-page' => true, 
				'max_num_pages' => $eventQuery->max_num_pages, 
				'current_page' => $paged,
			));
			
			wp_reset_postdata();
		?>
		<div class="clearfix"></div>
	</div>
<?php get_footer(); ?>