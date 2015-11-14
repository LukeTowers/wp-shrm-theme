<?php get_header(); ?>

		<div class="content_container single-cup-of-joe">
			<?php if (have_posts()) : while (have_posts()) : the_post();
				get_template_component('breadcrumbs');
				get_template_component('meta-date');
				the_content();
			endwhile; else:
			endif;
			?>
			
			<div class="clearfix"></div>
			
			<hr>
			
			<?php get_template_component('author-joe'); ?>
		</div>
			
<?php get_footer(); ?>