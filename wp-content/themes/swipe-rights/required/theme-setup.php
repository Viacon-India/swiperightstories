<?php

//Enqueue Script and Style
add_action('wp_enqueue_scripts', 'my_plugin_assets');
function my_plugin_assets()
{
	$ver = '1.0.'.rand(10,100);	

	wp_enqueue_script('jquery.min', get_template_directory_uri() . '/js/jquery-3.7.1.min.js', array('jquery'), $ver, true);
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/ThemeScript.js', array('jquery'), $ver, true);

	wp_enqueue_style('owl.carousel.min', get_template_directory_uri() . '/css/owl.carousel.min.css', $ver, 'all');

	wp_enqueue_style('style', get_stylesheet_uri(), $ver, 'all');

	$jsData = [
		'ajaxurl' => admin_url('admin-ajax.php'),
		'test' => '123',
		'test1' => 'world',
		];

	wp_localize_script('custom-script', 'Front', $jsData);
	
}


add_action('admin_enqueue_scripts', 'admin_scripts');
function admin_scripts() {
	wp_enqueue_media();
}



//Theme Setup
add_action('after_setup_theme', 'custom_theme_setup');
if (!function_exists('custom_theme_setup')) {
	function custom_theme_setup()
	{

		add_theme_support( 'woocommerce' );
		
		load_theme_textdomain('custom_theme');
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('custom-logo');
		add_theme_support('post-thumbnails');

		add_image_size('single-thumbnail', 	825, 428, true);

		set_post_thumbnail_size(1200, 9999);

		$GLOBALS['content_width'] = 900;

		add_theme_support('html5', array('comment-form', 'comment-list', 'script', 'style'));

		$allowed_roles = array('administrator', 'editor', 'author');
		if (!count(array_intersect($allowed_roles, wp_get_current_user()->roles))) {
			show_admin_bar(false);
		} else {
			show_admin_bar(true);
		}
	}
}

//Theme Menu
add_action('init', 'register_my_menus');
function register_my_menus()
{
	register_nav_menus(array(
		'header-menu'		=> 'Header Menu',
		'useful-links'		=> 'Useful Links',
		'categories-menu'		=> 'Categories Menu'
	));
}