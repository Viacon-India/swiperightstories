<?php
//Enqueue Script and Style
add_action('wp_enqueue_scripts', 'my_plugin_assets');
function my_plugin_assets()
{
	$ver = '1.1.'.rand(10,100);	

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

		add_image_size('single-thumbnail', 	950, 600, true);
		add_image_size('related-thumbnail', 440, 297, true);

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


function logo_url()
{
	$logo_url = get_stylesheet_directory_uri() . '/images/logo.png';
	if (has_custom_logo()) {
		$custom_logo_id = get_theme_mod('custom_logo');
		$custom_logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
		$custom_logo_url = $custom_logo_data[0];
		return '<img class="w-full h-full object-contain" src="'.esc_url($custom_logo_url).'" alt="logo"/>';
	} else {
		return '<img class="w-full h-full object-contain" src="'.esc_url($logo_url).'" alt="logo"/>';;
	}
}




// Check and Add Favicon
function add_favicon()
{
	if (!has_site_icon()  && !is_customize_preview()) {
		$favicon_url = get_stylesheet_directory_uri() . '/images/favicon.png';
		echo '<link rel="icon" type="image/gif" href="' . $favicon_url . '" />';
	} else {
		echo '<link rel="icon" type="image/gif" href="' . wp_get_attachment_image_url(get_option('site_icon'), 'full') . '">';
	}
}
add_action('wp_head', 'add_favicon');
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');