<?php 
/*
	Template Name: Events Page
*/ 
get_header();
$post_backup = null;
?>
		<div class="content_container page-events">	
			<?php 
				get_template_component('breadcrumbs');
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
				$eventArgs = array(
					'posts_per_page'	=>	12,
					'paged'				=>	$paged,
					'event_start_after'	=>	'yesterday',
				);
				
				$events = eo_get_events($eventArgs);
			?>
				
			<?php if ($events) {
				// Backup the global post object
				global $post;
				$post_backup = $post;
			
				foreach ($events as $event) {
					// Setup post data
					$post = $event;
					setup_postdata($event); ?>
					
					<div class="event_container">
						<div class="event-picture">
							<a href="<?php echo get_the_permalink(); ?>">
								<?php 
									$image = wp_get_attachment_image_src(get_post_thumbnail_id($event->ID), 'medium');
									if (empty($image[0])) {
										$image[0] = SHRM_2016_TEMPLATE_URL . '/includes/images/event-default-rectangle.jpg';
									}
									echo '<span class="image-content rectangle" style="background-image: url(\'' . $image[0] . '\');"></span>';
								?>
							</a>
						</div>
						<div class="event-details">
							<h3 class="event-title"><?php echo get_the_title(); ?></h3>
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
								$tickets_url = get_post_meta($event->ID, 'ticket_url', true);
								if (!empty($tickets_url)) {
									echo '<a href="' . $tickets_url . '" class="event-tickets" target="_blank">Get Tickets</a>';
								}
							?>
							<a href="<?php the_permalink(); ?>" class="event-more-info">Find Out More</a>
						</div>
					</div>
				<?php }
				 
				// Restore global post object
				$post = $post_backup;
				wp_reset_postdata();
			} else { ?>
				<p>There are no events to display at this time. Check back later.</p>
			<?php }
			get_template_component('pagination');
			?>
			<div class="clearfix"></div>
		</div>
			
<?php get_footer(); ?>