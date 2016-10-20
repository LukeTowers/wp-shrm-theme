<?php get_header(); ?>

		<?php dynamic_sidebar('home-slider-area'); ?>
	
		<div class="content_container">
			<div class="cost_info_container">
				<div class="three-column">
					<a href="https://www.shrmsk.com/get-involved/donate/donate-form/?utm_source=internal&utm_medium=banner&utm_content=Provides%20One%20Meal&utm_campaign=2015-11-17" target="_blank">
                    	<img src="/wp-content/themes/shrm-2016/includes/images/icons/Plate-Blue.jpg"/>
						<span class="cost">$3.43</span>
						<span class="item">Provides One Meal</span>
					</a>
				</div>
				<div class="three-column">
					<a href="https://www.shrmsk.com/get-involved/donate/donate-form/?utm_source=internal&utm_medium=banner&utm_content=One%20Night%20of%20Shelter&utm_campaign=2015-11-17" target="_blank">
                    	<img src="/wp-content/themes/shrm-2016/includes/images/icons/House-Blue.jpg"/>
						<span class="cost">$24.88</span>
						<span class="item">One Night of Shelter</span>
					</a>
				</div>
				<div class="three-column">
					<a href="https://www.shrmsk.com/get-involved/donate/donate-form/?utm_source=internal&utm_medium=banner&utm_content=One%20Day%20in%20Program&utm_campaign=2015-11-17" target="_blank">
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