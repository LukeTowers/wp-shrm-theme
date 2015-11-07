<?php get_header(); ?>

		<div class="content_container single-staff">	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php 
					get_template_component('breadcrumbs', array(
						'breadcrumb-override'	=>	array(
							'title'	=>	get_the_title(),
							'url'	=>	get_the_permalink(),
							'parent'=>	array(
								'title'	=>	'Executive',
								'url'	=>	'/about-us/staff/',
							),
						),
					)); 
				?>
				
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
						<div class="staff-description">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php endwhile; else: ?>
				<p>There are no staff to display at this time. Check back later.</p>
			<?php endif; ?>
			<div class="clearfix"></div>
		</div>
			
<?php get_footer(); ?>