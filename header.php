<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>
			<?php
				wp_title(' - ',true,'right');
				bloginfo('name');
			?>
		</title>
		
		<?php
			do_action('header_scripts');
			wp_head(); 
		?>
	</head>
	
	<body>
		<div class="site_container">
			<div class="site-header">
				<div class="logo_container">
					<a href="/" id="site-logo">
						<img src="<?php echo SHRM_2016_TEMPLATE_URL . '/includes/images/logo.jpg'; ?>" alt="SHRM logo">
					</a>
				</div>
				<div class="header-right">
					<a href="http://donate.shrmsk.com/" target="_blank" class="donate-button">DONATE</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="navigation_container">
				<div class="main-navigation">
					<?php
						$navMain_settings = array(
							'theme_location'  => 'main-menu',
							'container'       => 'div',
							'menu_class'      => 'main-menu',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
						);
						
						wp_nav_menu($navMain_settings);
					?>
					<div class="clearfix"></div>
				</div>
			</div>
			
			<?php
				if (is_front_page()) {
					get_template_component('home-slider');
				}
			?>
			
			<div class="shadow_container">
				<?php
					if (!is_front_page()) {
						get_template_component('header-image');
					}
				?>