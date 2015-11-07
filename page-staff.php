<?php
/*
	Template Name: Staff Page
*/ 
get_header(); ?>

		<div class="content_container page-staff">			
			<?php 
				get_template_component('breadcrumbs');
				
				$staffArgs = array(
					'post_type'		=>	'staff',
					'post_status'	=>	'publish',
					'orderby'		=>	'menu_order',
					'order'			=>	'ASC',
				);
				
				$staffQuery = new WP_Query($staffArgs);
			?>
				
			<?php if ($staffQuery->have_posts()) : while ($staffQuery->have_posts()) : $staffQuery->the_post(); ?>
				<div class="staff_container">
					<?php if (has_post_thumbnail()) { ?>
						<div class="staff-picture">
							<?php 
								$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
								echo '<span class="image-content circle" style="background-image: url(\'' . $image[0] . '\');"></span>';
							?>
						</div>
					<?php } ?>
					<div class="staff-content">
						<h2 class="staff-title"><?php echo get_the_title(); ?></h2>
						<div class="staff-description">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php endwhile; else: ?>
				<p>There are no staff to display at this time. Check back later.</p>
			<?php endif; 
			wp_reset_postdata();
			?>
			<div class="clearfix"></div>
		</div>
			
<?php get_footer(); ?>