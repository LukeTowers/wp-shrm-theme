<?php get_header(); ?>

		<div class="content_container single-success-story">
			<?php if (have_posts()) : while (have_posts()) : the_post();
				get_template_component('breadcrumbs', array(
					'breadcrumb-override'	=>	array(
						'title'	=>	get_the_title(),
						'url'	=>	get_the_permalink(),
						'parent'=>	array(
							'title'	=>	'Success Stories',
							'url'	=>	'/success-stories/',
						),
					),
				));
			
				the_content();
			endwhile; else:
			endif;
			?>
			
			<div class="clearfix"></div>
		</div>
			
<?php get_footer(); ?>