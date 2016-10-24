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
							<a href="https://www.lookagency.com/" target="_blank">Website by Look Agency</a>
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
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			ga('create', 'UA-17932908-1', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>