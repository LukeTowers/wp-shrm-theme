<?php get_header(); ?>

		<div class="content_container single-success-story">
			<?php if (have_posts()) : while (have_posts()) : the_post();
				get_template_component('breadcrumbs');
				the_content();
			endwhile; else:
			endif;
			?>
			
			<div class="clearfix"></div>
		</div>
			
<?php get_footer(); ?>