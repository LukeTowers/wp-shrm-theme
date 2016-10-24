<?php get_header(); ?>

		<?php dynamic_sidebar('home-slider-area'); ?>
	
		<div class="content_container">
			<div class="cost_info_container">
				<div class="three-column">
					<a href="https://donate.shrmsk.com" target="_blank">
                    	<img src="/wp-content/themes/shrm-2016/includes/images/icons/Plate-Blue.jpg"/>
						<span class="cost">$3.43</span>
						<span class="item">Provides One Meal</span>
					</a>
				</div>
				<div class="three-column">
					<a href="https://donate.shrmsk.com" target="_blank">
                    	<img src="/wp-content/themes/shrm-2016/includes/images/icons/House-Blue.jpg"/>
						<span class="cost">$24.88</span>
						<span class="item">One Night of Shelter</span>
					</a>
				</div>
				<div class="three-column">
					<a href="https://donate.shrmsk.com" target="_blank">
                    	<img src="/wp-content/themes/shrm-2016/includes/images/icons/Woman-Blue.jpg"/>
						<span class="cost">$34.86</span>
						<span class="item">One Day in Program</span>
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
			
			<?php if (have_posts()) : while (have_posts()) : the_post();
				the_content();
			endwhile; else:
			endif;
			?>
			<div class="clearfix"></div>
		</div>
			
<?php get_footer(); ?>