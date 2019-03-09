<h4>Filters</h4>
<form action="s" method="get" class="row">
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