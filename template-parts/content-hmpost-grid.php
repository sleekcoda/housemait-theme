<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Housemait
 */

$apartment_category = get_post_meta(get_the_ID(),'apartment_category',true); 
$need_category = get_post_meta(get_the_ID(),'need_category',true);  

$hm_gender = get_post_meta(get_the_ID(),'hm_gender',true); 
$hm_gender = ($hm_gender === 'any' ) ? 'Male/Female' : $hm_gender;  

$my_occupation = get_post_meta(get_the_ID(),'my_occupation',true);  
$my_gender = get_post_meta(get_the_ID(),'my_gender',true);  

$hm_occupation = get_post_meta(get_the_ID(),'hm_occupation',true);  
$hm_occupation =($hm_occupation === 'any')? 'Prof/Student' : $hm_occupation;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 grid-item'); ?>>
	<div class="post-grid">
			<!-- budget -->
			<div class="budget">  
				
				<span>Budget -
					<?php $price = get_post_meta(get_the_ID(),'budget',true); ?>
				₦ <?php echo ( strlen($price)>=1)? number_format_i18n( $price) :'0';?>
				</span>
			</div>

			<div class="row align-items-center">
				<div class="col-4">
					<div class="img-placeholder text-center">
						<a href="<?php the_permalink(); ?>"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="img-responsive" data-src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($apartment->ID)); ?>" /></a>
					</div>
				</div>
				<div class="col-8">
					<!-- date _-->
					<div class="date">Moving by: <i class="fa fa-calendar"></i> <?php echo get_post_meta(get_the_ID(),'date_relocating',true); ?> </div>
					<!-- title _-->
					<div class="excerpt-title"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></div>
					<p class="excerpt">
						<?php echo (wp_is_mobile()) ? get_the_author_meta('user_firstname').', '.$my_gender.' '.$my_occupation: get_the_excerpt(); ?>
					</p>
					<!-- Specs -->
					<div class="details"> 
						<?php echo get_post_meta(get_the_ID(),'bedroom',true); ?> <i class="fa fa-bed"></i> | 
						<?php echo get_post_meta(get_the_ID(),'bathroom',true); ?> <i class="fa fa-shower"></i> | 
						<i class="fa fa-map-marker"></i> <?php echo get_post_meta(get_the_ID(),'location',true); ?> 
					</div>
				</div>
				
			
		</div>
		
		<!-- <div class="row"></div> -->
			<!-- Footer -->
		<footer>
		<?php if($need_category === 'housemait' || $need_category === 'both'):?> 
			<div>
				  
				<?php echo ($need_category === 'both') ? $hm_gender.ucfirst(' roommate & an apartment &nbsp;') : ''; ?>
				<?php echo ($need_category === 'housemait') ? $hm_gender.' roommate' : '' ?>
			</div>
			
		<?php else: echo ucfirst($apartment_category); endif; ?>
		</footer>
		
		
	</div><!-- .post-grid -->
	
</article><!-- #post-<?php the_ID(); ?> -->
