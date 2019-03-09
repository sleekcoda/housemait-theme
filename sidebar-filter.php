<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Housemait
 */


?>

<aside id="secondary" class="widget-area col-md-4">
    
    
    <section>
        <h4>Filters</h4>
        <form method="get" class="row" >
            <div class="col-6">
                <label for="need_category">I'm in search of</label><br>
                <select name="need_category" id="need_category" class="form-control">
                <?php $need_category = get_query_var('need_category'); ?>
                    <option value="">--Select--</option>
                    <option <?php echo ($need_category === 'housemait') ? 'selected':''; ?> value="housemait">A roommate</option>
                    <option <?php echo ($need_category === 'house') ? 'selected':''; ?> value="house">An Apartment</option>
                    <option <?php echo ($need_category === 'both') ? 'selected':''; ?> value="both">Both</option>
                </select>
            </div>
            <!-- Need category -->
            <div class="col-6">
                <label for="apartment_category">Apartment Type</label>
                <select class="form-control" name="apartment_category" id="apartment_category">
                    <?php $apartment_category = get_query_var('apartment_category'); ?>
                    <option value="">--Select--</option>
                    <option value="Bungalow" <?php echo ($apartment_category === 'Bungalow')?  'selected':null; ?>>Bungalow</option>
                    <option value="Duplex" <?php echo ($apartment_category === 'Duplex')?  'selected':null; ?> >Duplex</option>
                    <option value="Flat" <?php echo ($apartment_category === 'Flat')?  'selected':null; ?> >Flat</option>
                    <option value="House" <?php echo ($apartment_category === 'House')?  'selected':null; ?> >House</option>
                    <option value="Self Contain" <?php echo ($apartment_category === 'Self Contain')?  'selected':null; ?> >Self Contain</option>
                    <option value="Shop">Shop</option>
                </select>
            </div>
            <!-- Apartment Category  -->
            <div class="col-12">
                <label for="location">Location</label><br>
                <input type="text" class="form-control" name="location" id="location-2" value="<?php echo get_query_var('location',''); ?>">
            </div>
            <!--Location-->

        
            <div class="col-6">
                <label for="budget">Min Budget</label><br>
                <input type="number"class="form-control" name="min_budget" id="min_budget" class="full-width" value="<?php echo get_query_var('min_budget',''); ?>" >
            </div>
            <!-- Minimum Budget -->
            <div class="col-6">
                <label for="budget_max">Max Budget</label><br>
                <input type="number"class="form-control" name="max_budget" class="full-width" id="budget_max"  value="<?php echo get_query_var('max_budget',''); ?>">
            </div>
            <!-- Maxmimum Budget -->
            <div class="col-12">
                <button class="btn" type="submit">Apply filter</button>                   
            </div>

        </form>
    </section>
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
