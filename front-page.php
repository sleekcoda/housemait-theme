<?php get_header(); ?>

		<div class="negative-padding-15">
			<div id="cover-image">
				<div class="cover-container">

					<h1 id="cover-title">No more house rent wahala</h1>
					<h2 id="cover-subtitle">Get apartment, hook with housemates to get an apartments at any location</h2>
					
					<form action="<?php echo get_bloginfo('url'); ?>" method="get" id="search">
						<div>
							<label for="">I'm Looking for</label>
							<select name="need_category" class="form-elements">
								<option value="">Apartment/Roommate</option>
								<option value="both">Both</option>
								<option value="housemait">A Roommate</option>
								<option value="house">An Apartment</option>
							</select>
							<label for="location">Within</label>
							<input type="text" name="location" id="location" class="form-elements">
							<button type="submit">Search <i class="fa fa-search"></i></button>
						</div>

					</form>

					<a class="links" href="<?php echo get_bloginfo('url').'/accomodation-wanted'; ?>">I need accomodation <i class="fa fa-arrow-right"></i></a>
					<a class="links" href="<?php echo get_bloginfo('url').'/roommate-wanted'; ?>">I need a roommate <i class="fa fa-arrow-right"></i></a>
				</div>
			</div><!-- #cover .container -->
			
		</div> 
	
	
	
<?php get_footer(); ?>