<?php
/*
Plugin Name: Wordpress Sinhala Comments
Plugin URI: http://webexplorar.com/wordpress-sinhala-comments-plugin/
Description: You can comment very easily in sinhala. No need to use any 3rd party sites or Software. Only you must have own a sinhala blog.
Author: Iroshan
Version: 2.5
Author URI: http://webexplorar.com/wordpress-sinhala-comments-plugin/
*/	
// load jquery library file
function sinhalen_comment_load_jquery_library() {
	//wp_enqueue_script('jquery',plugins_url('js/jquery.min.js', __FILE__));
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
}     
add_action('wp_enqueue_scripts', 'sinhalen_comment_load_jquery_library');


// load script file
function sinhalen_comment_script() {
	wp_enqueue_script('jsscript',plugins_url('js/script.js', __FILE__));
}    
add_action('wp_enqueue_scripts', 'sinhalen_comment_script');


// load style sheet
function sinhalen_comment_stylesheet() {
        wp_enqueue_style( 'prefix-style', plugins_url('css/style.css', __FILE__) );
}
add_action( 'wp_enqueue_scripts', 'sinhalen_comment_stylesheet' );


?>