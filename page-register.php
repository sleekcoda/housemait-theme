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
			<div class="col-md-3"></div>
			<div class="col-md">
				
			<div class="text-center form-header full-width bg-white"> <a href="<?php echo get_bloginfo('url'); ?>">
			<img src="<?php echo get_template_directory_uri().'/images/logo.png'; ?>" alt=""></a>
		</div><!--- Logo .row -->
			<div id="register-container" class="bg-white active">				
				<h2>Register</h2>
				<form id="register" method="post">
					<div class="row">
						<div class="col-md">
							<label for="firstname">First name:</label><input class="form-control"  type="text" name="firstname" id="firstname" required>
						</div>
						<div class="col-md">
							<label for="lastname">Last name:</label><input class="form-control" type="text" name="lastname" id="lastname" required >
						</div>
						
					</div><!--- First name last name .row -->

					<div class="row">
						<div class="col-md">
							<label for="email">Email:</label><input class="form-control"  type="email" name="email" id="email" required>
						</div>
					</div><!--- Email .row -->

					<div class="row">
						<div class="col-md">
							<label for="reg_username">Username:</label><input class="form-control" type="text" name="username" id="reg_username" required>
						</div>
					</div><!--- Email .row -->

					<div class="row">
						<div class="col-md">
							<label for="reg_password">Password:</label><input class="form-control"  type="password" name="password" id="reg_password" required>
						</div>
						<div class="col-md">
							<label for="confirm_password">Confirm password:</label><input class="form-control" type="password" name="confirm_password" id="confirm_password" required>
						</div>
					</div><!--- Password .row -->

					<div class="row">
						<div class="col-md">
							<label class="radio">I am</label>
							<label class="radio" for="gender" class="inline">Male  <input type="radio" name="gender" id="gender" value="male"></label>
							<label class="radio" for="female" class="inline">Female <input type="radio" name="gender" id="female" value="female"></label>
						</div>
					</div><!--- Gender .row -->

					<div class="notification error"></div>
					<div class="notification success"></div>
					<?php wp_nonce_field( 'register_user','register_user' ); ?>
					<input type="hidden" name="action" value="user_registration">
					<div><input type="submit" class="btn submit" value="Register"><span class="img-placeholder loading" style="">&nbsp;</span>&nbsp; I have an account <a href="<?php echo get_bloginfo('url').'/login/'; ?>">Login</a></div>
				</form>
			</div>
				
			</div><!-- .md register--->
			<div class="col-md-3"></div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
