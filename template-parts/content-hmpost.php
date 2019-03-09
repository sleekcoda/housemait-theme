<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Housemait
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('hmpost-view'); ?> style="display:block !important;">
	<?php 
		the_title('<h3 class="page-title">','</h3>'); 
		
		$post_id	= get_the_ID();
		$photos_id = get_post_meta($post_id,'post_photos',true); 

	?>
	<div class="gallery">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-9">
				<div class="photo-preview img-placeholder">
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo wp_get_attachment_url($photos_id[0]); ?>">
					<?php $price = get_post_meta($post_id,'budget',true); ?>

					<h3>₦ <?php echo ( strlen($price)>=1)? number_format_i18n( $price) :'0';?></h3>
				</div>
			</div>
			<div class="col-md-1">
				<ul id="slides">
					<?php 
					if(is_array($photos_id)):
						foreach($photos_id as $photo_id):
							$html= '<li class="slide" data-img="'.wp_get_attachment_url($photo_id).'" style="background-image:url('.wp_get_attachment_url($photo_id).');"></li>';
							echo $html;
						endforeach;
					endif;
					?>
				</ul>
			</div>
			<div class="col-md-1"></div>
		</div>
		
		

	</div>
	<div class="section">
		<h5>Description</h5>
		<div>
			<?php the_content(); ?>
		</div>
	</div>
	

	<div  class="section">
		<table>
			<tbody>
				<tr>
					<th>Accomodation Type:</th>
					<td><?php echo get_post_meta($post_id,'apartment_category',true); ?></td>
				</tr>
				<tr>
					<th>Bedrooms</th>
					<td><?php echo get_post_meta($post_id,'bedroom',true); ?></td>
				</tr>
				<tr>
					<th>Bathrooms</th>
					<td><?php echo get_post_meta($post_id,'bathroom',true); ?></td>

				</tr>
				<tr>
					<th>Location</th>
					<td><?php echo get_post_meta($post_id,'location',true); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php $author_id = get_the_author_meta('ID'); ?>

	<?php if(get_post_meta($post_id,'need_category',true) === 'housemait'): ?>

	<div class="section">
		<h5>Preferred Roomy</h5>
		<table>
			<tr>
				<th>Gender</th>
				<td><?php echo get_post_meta($post_id,'hm_gender',true); ?></td>
			</tr>
			<tr style="display:none;">
				<th>Religion</th>
				<td><?php echo get_post_meta($post_id,'religion',true);?></td>
			</tr>
			<tr>
				<th>Profession</th>
				<td><?php echo get_post_meta($post_id,'hm_occupation',true); ?></td>
			</tr>
		</table>
	</div>
	
	<div class="section">
		<h5>About Me</h5>
		<table>
			<tr>
				<th>Gender</th>
				<td><?php echo get_post_meta($post_id,'my_gender',true); ?></td>
			</tr>
			<tr style="display:none;">
				<th>Religion</th>
				<td><?php echo get_post_meta($post_id,'religion',true); ?></td>
			</tr>
			<tr>
				<th>Profession</th>
				<td><?php echo get_post_meta($post_id,'my_occupation',true); ?></td>
			</tr>
		</table>
	</div>
	

	<?php endif; ?>
	
</article><!-- #post-<?php the_ID(); ?> -->
