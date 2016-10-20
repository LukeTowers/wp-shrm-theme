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
			
			<div class="sitemap">
				<h2 style="text-align: center;">Site Map</h2>
				<?php
					$sitemap_settings = array(
						'theme_location'  => 'sitemap',
						'container'       => 'div',
						'menu_class'      => 'sitemap-menu',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'after'			  => '<div class="clearfix"></div>',
						'depth'           => 0,
					);
					
					wp_nav_menu($sitemap_settings);
				?>
			</div>
			<div class="clearfix"></div>
		</div>
			
<?php get_footer(); ?>