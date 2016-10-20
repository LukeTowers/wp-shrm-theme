<?php get_header(); ?>
	<div class="content_container page-donate">	
		<?php get_template_component('breadcrumbs'); ?>
			
		<?php 
			if (have_posts()) : while (have_posts()) : the_post(); 
				
				the_content();
				
			endwhile; else:
			endif;
		?>
		
		<!-- <hr class="wtd-archive-line"> -->
		
		<div class="page-ways-to-donate">
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

				$wtd_args = array(
					'post_type'			=>	'wtd',
					'post_status'		=>	'publish',
					'posts_per_page'	=>	6,
					'order'				=>	'DESC',
					'paged'				=>	$paged,
				);
				
				$wtd_query = new WP_Query($wtd_args);
			?>
			
<!-- 			<h2 class="wtd-archive-title"><a href="/get-involved/donate/ways-to-donate">Ways to Donate</a></h2> -->
			
			<?php if ($wtd_query->have_posts()) : while ($wtd_query->have_posts()) : $wtd_query->the_post(); ?>
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
				get_template_component('pagination', array(
					'max_num_pages' => $wtd_query->max_num_pages,
					'current_page' => $paged,
				));
				wp_reset_postdata();
			?>
			<div class="clearfix"></div>
		</div>
	</div>
<?php get_footer(); ?>