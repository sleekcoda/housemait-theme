<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Housemait
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info container-fluid">
			<div class="row footer-one" style="<?php echo (get_option('footer_background_color')); ?>">
				<div class="col-md"><?php dynamic_sidebar( 'footer-widget-left' ); ?></div>
				<div class="col-md"><?php dynamic_sidebar( 'footer-widget-center' ); ?></div>
				<div class="col-md"><?php dynamic_sidebar( 'footer-widget-right' ); ?></div>
			</div>
			<div class="row footer-two">
				<div class="col-md-6">

					<div class="col-md">
						<a href="<?php echo get_bloginfo('url'); ?>">
							<img src="<?php echo get_template_directory_uri().'/images/logo.png'; ?>" alt="" style="width:120px;">
						</a>
						&copy; <?php echo date('Y'); ?> Time Inc. All rights reserved.
					</div>

					<div class="col-md-12">
						<div class="footer-lite">
							<?php echo get_bloginfo('name'); ?> may receive compensation for some links to products and services on this website. Offers may be subject to change without notice.
						</div>
					</div>
				</div>

			</div><!-- .row -->
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script>
window.addEventListener('load', function(){
    var allimages= document.getElementsByTagName('img');
    for (var i=0; i<allimages.length; i++) {
        if (allimages[i].getAttribute('data-src')) {
            allimages[i].setAttribute('src', allimages[i].getAttribute('data-src'));
        }
    }
}, false)
</script>
<?php wp_footer(); ?>

</body>
</html>
