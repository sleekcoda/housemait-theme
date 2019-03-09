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

<aside id="secondary" class="widget-area col-md-4">

		<?php dynamic_sidebar( 'sidebar-top' ); ?>
		<?php dynamic_sidebar( 'sidebar-middle' ); ?>
		<?php dynamic_sidebar( 'sidebar-bottom' ); ?>

	
</aside><!-- #secondary -->
