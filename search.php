<?php get_header(); ?>

		<div class="content_container page-cup-of-joe">	
			<?php 
				get_template_component('breadcrumbs', array(
					'breadcrumb-override'	=>	array(
						'title'	=>	'Search Results',
						'url'	=>	'/?s=' . esc_html(get_search_query(false)),
					),
				));
			?>
				
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
					// Info setup
					$posttype = get_post_type(get_the_ID());
					$show_image = true;
					$default_image = SHRM_2016_TEMPLATE_URL . '/includes/images/default-placeholder.png';
					$breadcrumbs = get_template_component('breadcrumbs', array(
						'return'	=>	true, 
						'class'		=>	'search-result post-title'
					));
					
										
					switch ($posttype) {
						case 'page':
							$show_image = false;
							break;
						case 'cup-of-joe':
							$default_image = SHRM_2016_TEMPLATE_URL . '/includes/images/cup-of-joe.jpg';
							break;
						default:
					}
				?>
			
				<div class="post_container">
					<?php if ($show_image) { ?>
						<div class="post-picture">
							<a href="<?php echo get_the_permalink(); ?>">
								<?php 
									$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
									if (empty($image[0])) {
										$image[0] = $default_image;
									}
									echo '<span class="image-content rectangle" style="background-image: url(\'' . $image[0] . '\');"></span>';
								?>
							</a>
						</div>
					<?php } ?>
					<div class="post-content">
						<?php echo $breadcrumbs; ?>
						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php endwhile; else: ?>
				<p>
					There are no results for your search of "<?php echo esc_html(get_search_query(false)); ?>" to display at this time.
					<br>
					Want to try a different search?
				</p>
				<?php get_template_component('search-form'); ?>
			<?php endif; 
			get_template_component('pagination', array('search-page' => true));
			?>
			<div class="clearfix"></div>
		</div>
			
<?php get_footer(); ?>