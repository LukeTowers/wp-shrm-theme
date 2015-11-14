<?php get_header(); ?>

		<div class="content_container page-ways-to-donate">	
			<?php 
				get_template_component('breadcrumbs', array(
					'breadcrumb-override'	=>	array(
						'title'	=>	'Ways to Donate',
						'url'	=>	'/get-involved/donate/ways-to-donate/',
						'parent'=>	array(
							'title'	=>	'Donate',
							'url'	=>	'/get-involved/donate/',
						),
					),
				));
			?>
				
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post_container">
					<div class="post-picture">
						<a href="<?php echo get_the_permalink(); ?>">
							<?php 
								$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
								if (empty($image[0])) {
									$image[0] = SHRM_2016_TEMPLATE_URL . '/includes/images/default-placeholder.png';
								}
								echo '<span class="image-content rectangle" style="background-image: url(\'' . $image[0] . '\');"></span>';
							?>
						</a>
					</div>
					<div class="post-content">
						<h2 class="post-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php endwhile; else: ?>
				<p>There are no posts to display at this time. Check back later.</p>
			<?php endif; 
			get_template_component('pagination');
			?>
			<div class="clearfix"></div>
		</div>
			
<?php get_footer(); ?>