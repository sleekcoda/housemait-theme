<script>
// API KEY AIzaSyBTFJu6FDOE8ciqxa5gJThRGZ_tAyMfIR4
// API KEY AIzaSyBTFJu6FDOE8ciqxa5gJThRGZ_tAyMfIR4
// API KEY AIzaSyBTFJu6FDOE8ciqxa5gJThRGZ_tAyMfIR4
</script>
<?php 
	wp_enqueue_script( 'google-autocomplete-js');
?>
<form action="<?php echo get_bloginfo('url'); ?>" method="get">
    <input type="text" name="s" class="search">

    <select name="need_type" id="type">
        <option value="">House / Roommate</option>
        <option value="house">House</option>
        <option value="housemait">Roommate</option>
    </select>

    <label for="location">Location <input type="text" name="location" id="location" autocomplete="on"></label>
    <button type="submit"><i class="fa fa-search"></i></button>
</form>