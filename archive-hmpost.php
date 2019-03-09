<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Housemait
 */

get_header();
$args = array(
    'post__in'		=> get_transient('approved_posts'),
	'post_type'		=> array('hmpost'),
	'posts_per_page' 	=> get_option('posts_per_page'),
);

$query = new WP_Query($args);
?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main col-md">

		<?php if ( $query->have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">All ads </h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( $query->have_posts() ) :
				$query->the_post();

				get_template_part( 'template-parts/content', 'hmpost-grid' );

			endwhile;?>
			<div class="paginate">
				<?php
					$pagination = get_the_posts_pagination( array(
					'mid_size' => 2,
					'prev_text' =>'<i class="fa fa-chevron-left"></i>',
					'next_text' => '<i class="fa fa-chevron-right"></i>',
					) );
					echo $pagination;
				?>
			</div>
		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
		<?php get_sidebar('filter'); ?>
	</div><!-- #primary -->

	

<?php
get_footer();