<?php
/*
Plugin Name: WordAMP
Plugin URI: http://www.wordamp.com/
Description: WordAMP is a widget that will <strong>strengthen your posts with relevant text and images</strong>.  See <a href="http://www.wordamp.com" target="_blank">WordAMP.com</a> for more information.
Version: 1.0
Author: Michael McNally
*/

add_action('the_post', 'wordamp_content_filter_init');
add_action('admin_menu', 'wordamp_options_page_add');
add_shortcode('wordamp', 'wordamp_shortcode');
register_activation_hook(__FILE__, 'wordamp_activate');

function wordamp_activate(){
	
	add_option('wordamp_content_filter', 1);
	
}

function wordamp_content_filter($content){
	
	$code = '<div id="wordamp"></div>';
	$code .= '<script type="text/javascript" src="http://www.wordamp.com/script/tower/"></script>';
	$code .= '<p></p>';
	$content .= $code;
	return $content;
	
}

function wordamp_content_filter_init(){
	
	$filter = get_option('wordamp_content_filter');
	
	if ($filter){

		if (is_single()){
			
			add_filter('the_content', 'wordamp_content_filter');
			
		}
		
	}
	
};

function wordamp_options_page_add(){
	
	add_options_page('WordAMP Options', 'WordAMP', 'manage_options', __FILE__, 'wordamp_options_page_build');
	
}

function wordamp_options_page_build(){

	include(dirname(__FILE__) . '/options.php');
	
}

function wordamp_shortcode($attributes, $content = null){
	
	extract(shortcode_atts(array(
		'style'		=> 'tower',
		'subject'	=> ''
	), $attributes));
	
	if (!empty($content) && empty($subject)) $subject = $content;
	
	$code = '<div id="wordamp'; if (!empty($subject)) $code .= '_' . str_replace(' ', '_', $subject); $code .= '"></div>';
	$code .= '<script type="text/javascript" src="http://www.wordamp.com/script/' . $style . '/' . $subject . '"></script>';
	return $code;
	
}

?>