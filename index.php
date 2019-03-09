<?php   

get_header();

/**
 * Need Category
 */

$posts 				=	get_transient('approved_posts');
$args 				=	array();
$need 				=	get_query_var('need_category','');
$location			= 	get_query_var('location','');
$hm_gender			= 	get_query_var('hm_gender','');
$min_budget			= 	get_query_var('min_budget','');
$max_budget			= 	get_query_var('max_budget','');
$hm_religion		= 	get_query_var('hm_religion','');

$apartment_category	= 	get_query_var('apartment_category','');
$date_relocating	= 	get_query_var('date_relocating','');
$hm_occupation		= 	get_query_var('hm_occupation','');

if($posts):
	$args = array(
		'post__in'		=> $posts,
		'post_type'		=> array('hmpost'),
		'meta_query'	=> array(
		'relation'		=> 'OR',
			array(
					'key'   => (empty($need)) ?  '' : 'need_category',
					'value' => (empty($need)) ?  '' : $need,
					'compare' => '='
			),
			array(
					'key'		=> (empty($location)) ? '' : 'location',
					'value'		=> (empty($location)) ? '' : $location,
					'compare'	=>	'LIKE'
			),
			array(
					'key'		=> (empty($hm_gender)) ? '' : 'hm_gender',
					'value'		=> (empty($hm_gender)) ? '' : $hm_gender,
					'compare'	=>	'='
			),
			array(
					'key'		=> (empty($min_budget)) ? '' : 'budget',
					'value'		=> (empty($min_budget)) ? '' : $min_budget,
					'compare'	=>	'>=',
					'type'	=>	'numeric'
			),
			array(
					'key'		=> (empty($max_budget)) ? '' : 'budget',
					'value'		=> (empty($max_budget)) ? '' : $max_budget,
					'compare'	=>	'<=',
					'type'		=>	'NUMERIC'
			),
			array(
					'key'		=> (empty($apartment_category)) ? '' : 'apartment_category',
					'value'		=> (empty($apartment_category)) ? '' : $apartment_category,
					'compare'	=>	'='
			),
			array(
					'key'		=> (empty($hm_occupation)) ? '' : 'hm_occupation',
					'value'		=> (empty($hm_occupation)) ? '' : $hm_occupation,
					'compare'	=>	'='
			),
			array(
					'key'		=> (empty($date_relocating_min)) ? '' : 'date_relocating',
					'value'		=> (empty($date_relocating_min)) ? '' : $date_relocating_min,
					'compare'	=>	'>=',
					'type'	=>	'DATE'
			),
			array(
					'key'		=> (empty($date_relocating_max)) ? '' : 'date_relocating',
					'value'		=> (empty($date_relocating_max)) ? '' : $date_relocating_max,
					'compare'	=>	'=<',
					'type'		=>	'DATE'
			),
			array(
					'key'		=> (empty($hm_religion)) ? '' : 'hm_religion',
					'value'		=> (empty($hm_religion)) ? '' : $hm_religion,
					'compare'	=>	'='
			),
			)
	);
endif;

$need_category = new WP_Query($args);
?>


		<div id="primary" class="content-area  row justify-content-md-center">
		<main id="main" class="site-main grid col-md">
			<div class="row">

			

		<?php

			if($need_category->have_posts()):
				while ( $need_category->have_posts() ) :

					$need_category->the_post();

					get_template_part( 'template-parts/content', 'hmpost-grid' );

				endwhile; // End of the loop.

				echo '<div class="paginate">';
				include 'template-parts/pagination.php'; 
				echo '</div>';
				
				wp_reset_postdata();
			else:
				echo "No post";
			endif;
			
		?>
			</div>
		</main><!-- #main -->
		
		<?php get_sidebar('filter'); ?>

		
	</div><!-- #primary -->
		<div class="paginate">
			<?php //include 'template-parts/pagination.php'; ?>
		</div>
<?php
get_footer();