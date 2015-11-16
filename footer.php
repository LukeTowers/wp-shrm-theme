			</div> <!-- .shadow_container -->
			<div class="footer_container">
				<div class="newsletter_container">
					<?php get_template_component('newsletter-signup'); ?>
				</div>
				<div class="footer-content">
					<div class="footer_column_container">
						<div class="footer-column">
							<?php dynamic_sidebar('footer-column-1'); ?>
						</div>
						<div class="footer-column">
							<?php dynamic_sidebar('footer-column-2'); ?>
						</div>
						<div class="footer-column">
							<?php dynamic_sidebar('footer-column-3'); ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="footer-credits">
					<div class="column_container">
						<div class="footer-column privacy-policy">
							<a href="/privacy-policy/">Privacy Policy</a>
						</div>
						<div class="footer-column copyright">
							<span>&copy; <?php echo date('Y'); ?> Souls Harbour Rescue Mission</span>
						</div>
						<div class="footer-column fusion-credits">
							<a href="http://fusiononline.ca/" target="_blank">Developed by Fusion Online</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div> <!-- .site_container -->
		<?php 
			do_action('footer_scripts');
			wp_footer(); 
		?>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-17932908-1']);
			_gaq.push(['_trackPageview']);
			
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</body>
</html>