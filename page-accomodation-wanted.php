<?php   

get_header();


$args = array(
    'post__in'		=> get_transient('approved_posts'),
	'post_type'		=> array('hmpost'),
	'posts_per_page' => get_option('posts_per_page'),
	'meta_query'	=> array(
        array(
            'key'   => 'need_category',
            'value' => 'house'
        )
        
	)
);

$apartment = new WP_Query($args);
?>


	<div id="primary" class="content-area  row justify-content-md-center">
		<main id="main" class="site-main grid col-md">
			<div class="row">

			

		<?php

			if($apartment->have_posts()):
				while ( $apartment->have_posts() ) :

					$apartment->the_post();

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
	
<?php
get_footer();