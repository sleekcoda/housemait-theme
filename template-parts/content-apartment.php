<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Housemait
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('apartment-view'); ?>>
	<?php 
		the_title('<h2>','</h2>'); 
		
		$photos_id = get_post_meta(get_the_ID(),'aparment_gallery_image'); 

	?>
	<div class="gallery"> 
		<div id="photo-preview">
			<img src="<?php echo wp_get_attachment_url($photos_id[0][0]); ?>">
			<?php $price = get_post_meta(get_the_ID(),'apartment-price',true); ?>
			<h3>₦ <?php echo ( strlen($price)>=1)? number_format_i18n( $price) :'0';?></h3>
		</div>
		<ul id="slides">
			<?php 
			if(is_array($photos_id[0])):
				foreach($photos_id[0] as $photo_id):
					$html= '<li class="slide" data-img="'.wp_get_attachment_url($photo_id).'" style="background-image:url('.wp_get_attachment_url($photo_id).');"></li>';
					echo $html;
				endforeach;
			endif;
			?>
		</ul>

	</div>
	<p>
		<table>
			<tbody>
				<tr>
					<th>Apartment Type:</th>
					<td><?php echo get_post_meta(get_the_ID(),'apartment-type',true); ?></td>
				</tr>
				<tr>
					<th>Bedrooms</th>
					<td><?php echo get_post_meta(get_the_ID(),'apartment-bedrooms',true); ?></td>
				</tr>
				<tr>
					<th>Bathrooms</th>
					<td><?php echo get_post_meta(get_the_ID(),'apartment-bathrooms',true); ?></td>

				</tr>
				<tr>
					<th>Location</th>
					<td><?php echo get_post_meta(get_the_ID(),'apartment-location-area',true).', '.get_post_meta(get_the_ID(),'apartment-location-state',true); ?></td>
				</tr>
			</tbody>
		</table>
	</p>
	<h4>Description</h4>
	<p><?php the_content(); ?></p>
</article><!-- #post-<?php the_ID(); ?> -->
