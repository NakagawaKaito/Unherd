

	<footer class="site-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="footer-col col-xs-12 col-sm-6 col-md-3">
					<?php # include sidebar
					if (function_exists('dynamic_sidebar')) {
						dynamic_sidebar("footer-1");
					} ?>
				</div>
				<div class="footer-col col-xs-12 col-sm-6 col-md-3">
					<?php # include sidebar
					if (function_exists('dynamic_sidebar')) {
						dynamic_sidebar("footer-2");
					} ?>
				</div>
				<div class="footer-col col-xs-12 col-sm-6 col-md-3">
					<?php # include sidebar
					if (function_exists('dynamic_sidebar')) {
						dynamic_sidebar("footer-3");
					} ?>
				</div>
				<div class="footer-col col-xs-12 col-sm-6 col-md-3">
					<?php # include sidebar
					if (function_exists('dynamic_sidebar')) {
						dynamic_sidebar("footer-4");
					} ?>
				</div>
			</div>
	  	</div>
	</footer>

  	<div class="site-copyright"><?php the_field('site_copyright','option') ?></div>

	<a class="sr-only" href="https://whoisandywhite.com" title="WordPress theme development by whois: Andy White">whois: Andy White Freelance WordPress Developer London</a>

<?php wp_footer(); ?>

</body>
</html>
