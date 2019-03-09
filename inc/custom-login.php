<?php
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo-large.png);
            background-position: 50% 50%;
            background-repeat: no-repeat;
            padding-bottom: 30px;
            width: 100%;
            background-size: 60%;
            background-color: #fff;
            border-radius:2px;
            height:50px
        }

        body.login{
            background-color:#680296;
        }
        .wp-core-ui .button-primary {
        background: #680296 !important;
        border-style:none  !important;
        box-shadow: none  !important;
        text-shadow: none  !important;
    }
    .login #backtoblog, .login #nav {
        font-size: 16px !important;
    }
    .login #backtoblog a, .login #nav a{
        color:#fff !important;
    }
    .button-primary:hover {
       transition: .2s linear;
       transform: translateY(-2px);
    }
    .login form {
        background: #fff;
        box-shadow: 0 1px 3px rgba(0,0,0,.5);
        border-radius:2px;
    }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Welcome to Housemait.com';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function redirect_housemait_user(){
    if(!current_user_can('verify_hmposts')):
        wp_redirect(home_url('/user/my-ads'));
    endif;
}
add_action( 'admin_init', 'redirect_housemait_user' );
