<?php
/**
 * This is the header file for the whole site
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	 
	<?php wp_head(); ?>
</head>

<body <?php body_class('housemait front-page'); ?> style="display:block !important">

	<header id="masthead" class="site-header">
		<div class="container-fluid">
			<div class="row">
				<div class="site-branding col">
				<?php
					if( !is_page( array('login','register') ) ):
				?>
					<a href="<?php echo site_url(); ?>" style="display:inline-block;vertical-align:middle;"> <img src="<?php echo get_template_directory_uri().'/images/logo.png'; ?>" alt=""> </a>
					<?php
					
					$housemait_description = get_bloginfo( 'description', 'display' );
					if ( $housemait_description || is_customize_preview() ) :
						?>
						<p class="site-description" style="display:none;"><?php echo $housemait_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<div class="col-xs-8" style="padding-right:15px;">

					<?php if(!is_user_logged_in()): ?>

					<a href="<?php echo wp_registration_url(); ?>" class="login-register"><?php echo __('Register','housemait'); ?></a>&nbsp;
					<i class="fa fa-dot"></i>&nbsp;
					<a href="<?php echo wp_login_url(); ?>" class="login-register"><?php echo __('Log in','housemait'); ?></a>
					<?php 
					
						else: $user = wp_get_current_user();
							
						?>
						<div style="text-align:right;">
							Hi <button id="menu-button" ><?php  $url_id =get_user_meta($user->ID,'avata',true); ?> &nbsp; <span id="profile-avata" style="background-image:url(<?php  echo ( $url_id == get_template_directory_uri().'/images/unknown.jpg') ? $url_id : wp_get_attachment_url($url_id) ; ?>);"></span>
							 <i class="fa fa-chevron-down"></i></button>
						</div>
						
						<?php wp_nav_menu(array(
							'theme_location'	=>	'user-menu',
							'container'			=>	'nav',
							'container_id'		=>	'user-menu-container',
							'container_class'	=>	'user-menu-container',
							'menu_class'		=>	'user-menu',
						)); ?>
						
					<?php endif; ?>

				</div><!-- Login/Logout Menu --> 
				
			</div><!-- .row -->
		</div>
		
	</header><!-- #masthead -->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip', 'housemait' ); ?></a>
	
		<?php wp_nav_menu(array(
				'theme_location'	=>	'primary',
				'container'			=>	'nav',
				'container_id'		=>	'primary-menu-container',
				'container_class'	=>	'primary-menu-container  container-fluid',
				'menu_class'		=>	'primary-menu',
		)); ?>

	<?php 
		endif; //Condition for excluding header from login and register page
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		else { $paged = 1; }
	?>
	<div id="content" class="site-content container-fluid">
