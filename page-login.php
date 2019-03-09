<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Housemait
 */

get_header(); 
wp_enqueue_script('login-register-js');
wp_enqueue_style('login-register-css');
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main fullscreen">

        <div class="row">
			
			<div class="col-md">
							
				<div class="text-center form-header bg-white">
				<a href="<?php echo get_bloginfo('url'); ?>">
					<img src="<?php echo get_template_directory_uri().'/images/logo.png'; ?>" alt="">
				</a>
				</div>

				<div id="login-container" class="active bg-white">
					
					<h2>Login <i class="fa fa-lock"></i></h2>
					<form id="login">
						<div class="row">
							<div class="col-md">
								<label for="username">Username</label><input class="form-control" type="text" name="username" id="username">
								<label for="password">Password</label><input class="form-control" type="password" name="password" id="password"></div>
								<input type="hidden" name="action" value="housemait_login">
								<?php wp_nonce_field('authenticate','authenticate'); ?>
						</div>
						<div class="notification error"></div>
						<div class="notification success"></div>
						<div class="row">
								<div class="col-md"><input type="submit" class="btn" value="Login">&nbsp; <span class="img-placeholder loading" style=""></span><a href="<?php echo get_bloginfo('url').'/register/'; ?>">Create a new account</a></div>
						</div>
					</form>
					
				</div>
				
			</div><!-- .md login--->
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
