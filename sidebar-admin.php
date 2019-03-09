<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Housemait
 */


$user = wp_get_current_user();

?>

<aside id="secondary" class="widget-area col-md-4 <?php if(is_page('user') && wp_is_mobile()) echo 'order-first'; ?>">
	<section class="text-center  widget-items">
		
		<div class="avata-container">

			<?php $url_id = get_user_meta($user->ID, 'avata', true); ?>
			<div class="img-placeholder">
				<img src="" data-src="<?php  echo ( $url_id == get_template_directory_uri().'/images/unknown.jpg') ? $url_id : wp_get_attachment_url($url_id) ; ?>" class="avata rounded">
			</div>
			<p></p>
			<?php if(is_page('user')): ?>
		 		<p><label for="photo_file_selector" style="border:none;box-shadow:none;background-color:white;">Edit Avata</label></p>
			<?php endif; ?>
			<h5><?php echo $user->user_firstname. ' ' . $user->user_lastname; ?></h5>
		<div class="info"><?php echo $user->user_email; ?>  </div>
		</div>
		
	</section>
	
</aside><!-- #secondary -->
