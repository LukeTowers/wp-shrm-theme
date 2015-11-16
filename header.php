<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title><?php wp_title(' - ',true,'right'); bloginfo('name'); ?></title>
		
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
						<img src="<?php echo SHRM_2016_TEMPLATE_URL . '/includes/images/shrm-logo.png'; ?>" alt="SHRM logo" style="width: 546px; height: auto;">
					</a>
				</div>
				<div class="header-right">
					<a href="/get-involved/donate/donate-form/" target="_blank" class="donate-button">DONATE</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="navigation_container">
				<div id="menu-button">
					<a class="mobile-menu-btn" href="#">
						<div class="menu-btn-bar-container">
							<span class="menu-btn-bar"></span>
							<span class="menu-btn-bar"></span>
							<span class="menu-btn-bar"></span>
						</div>
						<span class="menu-btn-text">MENU</span>
					</a>
				</div>
				
				<div class="main-navigation">
					<?php
						add_filter('wp_nav_menu_objects', 'add_menu_parent_class');
						
						function add_menu_parent_class($items) {
							foreach ($items as &$item) {
								if (hasSub($item->ID, $items)) {
									$title = $item->title;
									$item->title = $title . '</a><a class="sub-menu-button" href="#">';
								}
							}
							return $items;    
						}
						
						function hasSub($menu_item_id, $items) {
							foreach ($items as $item) {
								if ($item->menu_item_parent && $item->menu_item_parent==$menu_item_id) {
									return true;
								}
							}
							return false;
						};
						
						$navMain_settings = array(
							'theme_location'  => 'main-menu',
							'container'       => 'div',
							'menu_class'      => 'main-menu',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'after'			  => '<div class="clearfix"></div>',
							'depth'           => 0,
						);
						
						wp_nav_menu($navMain_settings);
					?>
					<div class="clearfix"></div>
				</div>
			</div>
			
			<?php
			/*
	if (is_front_page()) {
					dynamic_sidebar('home-slider-area');
				}
*/
			?>
			
			<div class="shadow_container">
				<?php
					if (is_front_page()) {
						dynamic_sidebar('home-slider-area');
					}
				?>
				<?php
					if (!is_front_page()) {
						get_template_component('header-image');
					}
				?>