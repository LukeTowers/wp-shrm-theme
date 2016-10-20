<?php get_header(); ?>

	<div class="content_container single-event">
		<?php 
			while (have_posts()) : the_post();
				get_template_component('breadcrumbs');
			
				eo_get_template_part('event-meta','event-single');
				
				the_content();
			endwhile;
		?>
	</div>
	
<?php get_footer(); ?>