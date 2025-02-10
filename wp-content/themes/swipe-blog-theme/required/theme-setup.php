<?php
//Enqueue Script and Style
add_action('wp_enqueue_scripts', 'my_plugin_assets');
function my_plugin_assets()
{
	$ver = '1.2.'.rand(10,100);	

	wp_enqueue_script('jquery.min', get_template_directory_uri() . '/js/jquery-3.7.1.js', array('jquery'), $ver, true);
	wp_enqueue_script('swiper-bundle.min', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'), $ver, true);
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/themescript.js', array('jquery'), $ver, true);

	// wp_enqueue_style('owl.carousel.min', get_template_directory_uri() . '/css/owl.carousel.min.css', $ver, 'all');

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
		add_image_size('contact-thumbnail', 660, 728, true);
		add_image_size('search-thumbnail', 441, 351, true);
		add_image_size('card1-thumbnail', 680, 518, true);

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
		'categories-menu'	=> 'Categories Menu'
	));
}


if(!function_exists('logo_url')) {
	function logo_url() {
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
}

if(!function_exists('footer_logo_url')) {
	function footer_logo_url() {
		$footer_logo_url = get_stylesheet_directory_uri() . '/images/logo2.png';
		return '<img class="w-full h-full object-contain" src="'.esc_url($footer_logo_url).'" alt="logo"/>';
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



function toc($html) {
    if (is_single()) {
        if (empty($html)) return $html; // Check if HTML content is empty
        $dom = new DOMDocument();

        // Suppress warnings from malformed HTML and check for errors
        libxml_use_internal_errors(true);

        // Try to load the HTML and check if it's valid
        $loaded = @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

        // If loading the HTML failed, return the original HTML
        if (!$loaded) {
            libxml_clear_errors();
            return $html;
        }

        // Proceed if HTML loaded correctly
        libxml_clear_errors();

        // Loop through all elements to add IDs to h2, h3, h4 elements
        foreach($dom->getElementsByTagName('*') as $element) {
            if ($element->tagName == 'h2' || $element->tagName == 'h3' || $element->tagName == 'h4') {
                $title_id = str_replace(array(' '), array('-'), rtrim(preg_replace('#[\s]{2,}#', ' ', preg_replace('#[^\w\säüöß]#', null, str_replace(array('ä', 'ü', 'ö', 'ß'), array('ae', 'ue', 'oe', 'ss'), html_entity_decode(strtolower($element->textContent)))))));
                $element->setAttribute('id', $title_id);
            }
        }
        $html = $dom->saveHTML();
    }
    return $html;
}
add_filter('the_content', 'toc');


function table_of_content($li_class, $a_class) {
    $toc = '';
    $html = get_the_content();

    if (empty($html)) return $toc; // Return empty TOC if content is empty

    $dom = new DOMDocument();

    // Suppress warnings from malformed HTML and check for errors
    libxml_use_internal_errors(true);

    // Try to load the HTML and check if it's valid
    $loaded = @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

    // If loading the HTML failed, return an empty TOC
    if (!$loaded) {
        libxml_clear_errors();
        return $toc;
    }

    // Proceed if HTML loaded correctly
    libxml_clear_errors();

    // Loop through all elements to generate the TOC
    foreach($dom->getElementsByTagName('*') as $element) {
        if ($element->tagName == 'h2' || $element->tagName == 'h3' || $element->tagName == 'h4') {
            $title_id = str_replace(array(' '), array('-'), rtrim(preg_replace('#[\s]{2,}#', ' ', preg_replace('#[^\w\säüöß]#', null, str_replace(array('ä', 'ü', 'ö', 'ß'), array('ae', 'ue', 'oe', 'ss'), html_entity_decode(strtolower($element->textContent)))))));
            $toc .= '<li class="' . $li_class . '"><a href="' . get_the_permalink() . '#' . $title_id . '" id="toc-' . $title_id . '" class="' . $a_class . '">' . $element->textContent . '</a></li>';
        }
    }
    return $toc;
}


////////////////////////
/*---------------------Add Image To Category--------------------*/
function add_taxonomy_fields($taxonomy ) { ?>
	<tr class="form-field">
		<th scope="row" valign="top"><label>Image</label></th>
		<td>
			<div style="display: flex;">
				<div style="line-height: 60px; margin-right: 10px;display: flex;flex-direction: column;gap: 6px;">
					<input type="hidden" id="tax_image_id" name="tax_image_id" value="" />
					<button type="button" class="upload_image_button button">Upload/Add image</button>
					<button type="button" class="remove_image_button button" style="display: none;">Remove image</button>
				</div>
				<div id="tax_image" style="float: left; display: none;"><img src="" width="60px" height="60px" alt="LOGO"/></div>
			</div>
			<script>
				jQuery(document).ready( function($){
					var file_frame;
					$( 'body' ).on( 'click', '.upload_image_button', function( event ) {
						event.preventDefault();
						if ( file_frame ) {
							file_frame.open();
							return;
						}
						file_frame = wp.media.frames.downloadable_file = wp.media({
							title: '<?php _e( 'Choose a Logo', 'category-featured-image' ); ?>',
							button: {
								text: '<?php _e( 'Use as Logo', 'category-featured-image' ); ?>'
							},
							multiple: false
						});
						file_frame.on( 'select', function() {
							var attachment           = file_frame.state().get( 'selection' ).first().toJSON();
							var attachment_thumbnail = attachment.sizes.full;
							$( '#tax_image_id').val( attachment.id );
							$( '#tax_image' ).show().find( 'img' ).attr( 'src', attachment_thumbnail.url );
							$( '.remove_image_button' ).show();
						});
						file_frame.open();
					});

					$( 'body' ).on( 'click', '.remove_image_button', function() {
						$( '#tax_image').hide().find( 'img' ).attr( 'src', '' );
						$( '#tax_image_id' ).val( '' );
						$( '.remove_image_button' ).hide();
						return false;
					});
				});
			</script>
			<div style="clear:both;"></div>
		</td>
	</tr><?php
}
add_action('category_add_form_fields', 'add_taxonomy_fields', 10, 2);
function edit_taxonomy_fields( $term, $taxonomy ) {
	$thumbnail_id = get_term_meta( $term->term_id, 'tax_image_id', true );
	if ( $thumbnail_id ) {
		$image = wp_get_attachment_image_url( $thumbnail_id, 'full' );
	} else {
		$image = '';
	} ?>
	<tr class="form-field">
		<th scope="row" valign="top"><label>Image</label></th>
		<td>
			<div style="display: flex;">
				<div style="line-height: 60px; margin-right: 10px;display: flex;flex-direction: column;gap: 6px;">
					<input type="hidden" id="tax_image_id" name="tax_image_id" value="<?php echo $thumbnail_id; ?>" />
					<button type="button" class="upload_image_button button">Upload/Add image</button>
					<button type="button" class="remove_image_button button" <?php echo (empty($image))?'style="display: none;"':''; ?>>Remove image</button>
				</div>
				<div id="tax_image" style="float: left; <?php echo (empty($image))?'display: none;':''; ?>"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" alt="LOGO"/></div>
			</div>
			<script>
				jQuery(document).ready( function($){
					var file_frame;
					$( 'body' ).on( 'click', '.upload_image_button', function( event ) {
						event.preventDefault();
						if ( file_frame ) {
							file_frame.open();
							return;
						}
						file_frame = wp.media.frames.downloadable_file = wp.media({
							title: '<?php _e( 'Choose a Logo', 'category-featured-image' ); ?>',
							button: {
								text: '<?php _e( 'Use as Logo', 'category-featured-image' ); ?>'
							},
							multiple: false
						});
						file_frame.on( 'select', function() {
							var attachment           = file_frame.state().get( 'selection' ).first().toJSON();
							var attachment_thumbnail = attachment.sizes.full;
							$( '#tax_image_id' ).val( attachment.id );
							$( '#tax_image' ).show().find( 'img' ).attr( 'src', attachment_thumbnail.url );
							$( '.remove_image_button' ).show();
						});
						file_frame.open();
					});

					$( 'body' ).on( 'click', '.remove_image_button', function() {
						$( '#tax_image' ).hide().find( 'img' ).attr( 'src', '' );
						$( '#tax_image_id' ).val( '' );
						$( '.remove_image_button' ).hide();
						return false;
					});
				});
			</script>
			<div style="clear:both;"></div>
		</td>
	</tr><?php
}
add_action('category_edit_form_fields', 'edit_taxonomy_fields', 10, 2);

function save_taxonomy_fields( $term_id){
	if ( isset( $_POST['tax_image_id'] ) ) {
		update_term_meta( $term_id, 'tax_image_id', $_POST['tax_image_id'] );
	}
}
add_action('edited_category', 'save_taxonomy_fields', 10, 2);
add_action('create_category', 'save_taxonomy_fields', 10, 2);



//Code for HSTS
function wps_enable_strict_transport_security_hsts_header_wordpress() {
    header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains; preload' );
}
add_action('send_headers','wps_enable_strict_transport_security_hsts_header_wordpress' );
 
 
add_filter('wpseo_opengraph_url', 'custom_opengraph_url');
function custom_opengraph_url($url) {
   
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 
    if (strpos($current_url, '/page/') !== false) {
        return $current_url;
    } else {
        return $url; // Return the original URL for other pages
    }
}





add_filter( 'comment_form_fields', 'custom_comment_form_fields' );
function custom_comment_form_fields( $fields ) {
	unset($fields['author']);
	unset($fields['email']);
	unset($fields['url']);
	unset($fields['comment']);
	unset($fields['cookies']);

	$fields['email-wrapper-open']	= '<div class="comment-from-row">';
	$fields['author']	= '<input type="text" class="comment-from-input" id="author" name="author" placeholder="Enter your name" required>';
	$fields['email']	= '<input type="email" class="comment-from-input" id="email" name="email" placeholder="Enter your email" required>';
	$fields['url']		= '<input type="url" class="comment-from-input" id="url" name="url" placeholder="website">';
	$fields['email-wrapper-close']	= '</div>';
	$fields['comment']	= '<div class="comment-from-text-aria-wrapper"><textarea class="comment-from-text-aria" id="comment" name="comment" placeholder="Write a comment" cols="30" rows="7" required></textarea></div>';
	$fields['cookies']	= '<div class="single-page-comment-from-massage-checkbox-wrapper"><input class="translate-y-[6px] md:translate-y-0" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent" class="text-[16px] font-Lato text-[#8A8A8A]">Save my name, email, and website in this browser for the next time I comment.</label></div>';
	return $fields;
}


function custom_comment_form_defaults( $defaults ) {
	$defaults['class_form']				= 'reply-box flex flex-col gap-[10px] md:gap-[18px]';
	$defaults['title_reply']			= 'Leave A Reply';
	$defaults['title_reply_before']		= '<h2 class="comment-from-title">';
	$defaults['title_reply_after']		= '</h2>';
	$defaults['submit_button']			= '<button type="submit" class="single-page-comment-from-submit-button">Post Comment</button>';
	return $defaults;
	
}
add_filter( 'comment_form_defaults', 'custom_comment_form_defaults' );