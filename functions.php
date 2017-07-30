<?php

# Pull the theme name from package.json
$pkg = json_decode( file_get_contents( get_template_directory() . '/package.json'));
define('THEME_NAME', $pkg->name);

# Custom Login Redirect Functions
include('functions/custom-login.functions.php');

# Register Scripts
include('functions/register.scripts.php');

# WP admin functions
include('functions/admin.functions.php');

# General WP functions
include('functions/wordpress.functions.php'); 

# Custom Post Types
include('functions/custom-post-types.php');

# Shortcodes
include('functions/shortcodes.php');

# Theme functions
include('functions/wiaw.functions.php');

# Specific theme functions
include('functions/theme.functions.php');

# Ajax functions
include('functions/ajax.functions.php');

# AB - Password reset functions
include('functions/lib/WP_Mail.php');
include('functions/password-reset.functions.php');

# AB - Access Control
include('functions/access-control/AccessControl.php');

# AB - Taxonomies
include('functions/taxonomies/tag.php');

# AB - User Class
include('functions/user.class.php');
include('functions/update-profile-ajax.php');

# AB - redirectToLoginIfNoAuth
function redirectToLoginIfNoAuth($url = ''){
	if(!is_user_logged_in()){
		if(empty($url)){
			$url = home_url() .'?login';
		}

		wp_redirect($url);
		exit;
	}
}

function getExcerpt($postID){
	$excerpt = get_the_excerpt(get_post($postID));
	if(strlen($excerpt) > 10){
		return $excerpt;
	}

	return implode(' ', array_slice(explode(' ', strip_tags(get_post_field('post_content', $postID))), 0, 100)) .'...';
}

# AB - Sesions
function startSession(){
	$admin = FALSE;
    foreach(['wp-admin', 'wp-login'] as $url) {
        if(strpos($_SERVER['REQUEST_URI'], $url) !== FALSE){
            $admin = TRUE;
        }
    }

    if(!session_id() && !$admin){
        session_start();
    }
    
    session_start();
}
add_action('init', 'startSession', 1);

function endSession() {
    session_destroy();
}
add_action('wp_logout', 'endSession');
add_action('wp_login', 'endSession');




function hwl_home_pagesize($query){
	if(!is_admin()){
    	if($query->query_vars['post_type'] === 'event'){
    		//$query->
    	}
	}
}
add_action('pre_get_posts', 'hwl_home_pagesize');



# Event Cube API
include('functions/vendor/show-api-eventcube/show-api-eventcube.php');

# Theme Setup
// include('functions/theme-setup/functions.php');

# Plugin Functions
	// - Advanced Custom Fields Functions
	if ( class_exists( 'ACF')) {
		include('functions/acf.functions.php');
	}

	// - Gravity Forms Functions
	if ( class_exists( 'GFAPI')) {
		include('functions/gravityforms.functions.php');
	}

