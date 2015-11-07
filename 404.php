<?php get_header(); ?>

		<div class="content_container">
			<?php
				get_template_component('breadcrumbs', array(
					'breadcrumb-override'	=>	array(
						'title'	=>	'404',
						'url'	=>	'#',
						'parent'=>	array(
							'title'	=>	'Home',
							'url'	=>	'/',
						),
					),
				)); 	
			?>
			<p>
				Whoops! The content you are looking for doesn't appear to exist here. Perhaps searching can help?
			</p>
			<?php get_template_component('search-form'); ?>
			<div class="clearfix"></div>
		</div>
			
<?php get_footer(); ?>