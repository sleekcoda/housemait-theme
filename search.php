<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Housemait
 */

get_header();
?>
<div class="grid row justify-content-md-center">
	<section id="primary" class="content-area col-md">
		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'housemait' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->
		<main id="main" class="site-main grid row">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

                get_template_part( 'template-parts/content', 'hmpost-grid' );
                                
			endwhile;
                echo '<div class="paginate">';
				    include 'template-parts/pagination.php'; 
                echo '</div>';
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
		
	</section><!-- #primary -->
	<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Housemait
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-md-3">
    <h4>Filters</h4>
    <form method="get" class="row">
        <div class="col-6">
            select
        </div>
        <div class="col-6">
            <label for="state">
                State
            </label>
            <select name="state" id="state">
                <option value="">state</option>
            </select>
        </div>
        <div class="col-6">
            <label for="budget">Budget</label><br>
            <input type="number" name="budget_min" class="full-width" >
        </div>
        <div class="col-6">
            <label for="budget_max"></label><br>
            <input type="number" name="budget_max" class="full-width" id="budget_max">
        </div>
        <div class="col-6">
            <label for="bedroom">Bedrooms</label>
            <input type="number" name="bedroom" id="bedroom">
        </div>
        <div class="col-6">
            <label for="space">Type</label>
            <select name="space" id="space">
                <?php $space = get_query_var('apartment-type'); ?>
                <option value="">--Select--</option>
                <option value="Bungalow" <?php echo ($space === 'Bungalow')?  'selected':null; ?>>Bungalow</option>
                <option value="Duplex" <?php echo ($space === 'Duplex')?  'selected':null; ?> >Duplex</option>
                <option value="Flat" <?php echo ($space === 'Flat')?  'selected':null; ?> >Flat</option>
                <option value="House" <?php echo ($space === 'House')?  'selected':null; ?> >House</option>
                <option value="Self Contain" <?php echo ($space === 'Self Contain')?  'selected':null; ?> >Self Contain</option>
                <option value="Shop">Shop</option>
            </select>
        </div>

    </form>
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
</div>
<?php
get_footer();
