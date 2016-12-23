<?php
/**
/*
/*
Plugin Name: Web Font Coupe
Plugin URI: http://wordpress.org/plugins/webfont-coupe/
Description: This is a plugin that utilizes the Google Webfont Loader in order to speed up the loading of webfonts.
Author: Chris Diehl
Version: 1.0
Author URI: http://chrisdiehldemos.com/
*/
include 'coupe_features.php';
//Enqueue Plugin Stylesheets
/*
function add_webfontcoupe_stylesheet() 
{
    wp_enqueue_style( 'wfc_stylesheet', plugins_url( '/css/myCSS.css', __FILE__ ) );
}

add_action('admin_print_styles', 'add_webfontcoupe_stylesheet');
*/
// Let's load that Loader
function load_loader() {
$font = get_option( 'wfc_settings' );
print_r($font);

$arr = $font["wfc_text_field_1"];

//Show Array
//$profile_arr = unserialize($arr);
//print_r($profile_arr);

	echo "
	<script>
	    WebFontConfig = {
			google: {
				families: [$arr]
			}
		};

		(function(d) {
		var wf = d.createElement('script'), s = d.scripts[0];
		wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
		s.parentNode.insertBefore(wf, s);
	})(document);
	</script>
	";

}

add_action( 'wp_footer', 'load_loader' );