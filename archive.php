<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Housemait
 */

get_header();
?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main col-md">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h3 class="page-title">', '</h3>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			$pagination = get_the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' =>'<i class="fa fa-chevron-left"></i>',
				'next_text' => '<i class="fa fa-chevron-right"></i>',
			) );
			echo $pagination;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
		<?php get_sidebar('filter'); ?>
	</div><!-- #primary -->

	

<?php

get_footer();
