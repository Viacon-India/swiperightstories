<?php
session_start();

if (file_exists(get_template_directory() . '/required/theme-setup.php')) {
	require_once(get_template_directory() . '/required/theme-setup.php');
}



function add_custom_meta_box() {
    add_meta_box(
        'custom_subtitle_field',
        'Post Sub Title',
        'custom_subtitle_callback',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_custom_meta_box');

function custom_subtitle_callback($post) {
    wp_nonce_field('custom_meta_box_nonce_action', 'custom_meta_box_nonce_name');
    $value = get_post_meta($post->ID, 'post_sub_title', true);
    echo '<input type="text" id="custom_subtitle_field" name="custom_subtitle_field" value="' . esc_attr($value) . '" style="width:100%;">';
}

function save_custom_meta_box_data($post_id) {
    if (!isset($_POST['custom_meta_box_nonce_name']) || !wp_verify_nonce($_POST['custom_meta_box_nonce_name'], 'custom_meta_box_nonce_action')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['custom_subtitle_field'])) {
        update_post_meta($post_id, 'post_sub_title', sanitize_text_field($_POST['custom_subtitle_field']));
    }
}
add_action('save_post', 'save_custom_meta_box_data');



///////////////////
// Add Custom Field in General Settings for Social Links
function social() {  
	add_settings_section(  
		'social_links', // Section ID 
		'Social Links', // Section Title
		'social_callback', // Callback
		'general' // What Page?  This makes the section show up on the General Settings Page
	);
		
	add_settings_field( // Option 1
		'facebook', // Option ID
		'Facebook', // Label
		'url_callback', // !important - This is where the args go!
		'general', // Page it will be displayed (General Settings)
		'social_links', // Name of our section
		array( // The $args
			'facebook' // Should match Option ID
		)  
	); 
		
	add_settings_field( // Option 2
		'twitter', // Option ID
		'Twitter', // Label
		'url_callback', // !important - This is where the args go!
		'general', // Page it will be displayed
		'social_links', // Name of our section (General Settings)
		array( // The $args
			'twitter' // Should match Option ID
		)  
	); 

	add_settings_field( // Option 3
		'linkedin', // Option ID
		'LinkedIn', // Label
		'url_callback', // !important - This is where the args go!
		'general', // Page it will be displayed
		'social_links', // Name of our section (General Settings)
		array( // The $args
			'linkedin' // Should match Option ID
		)
	);

		add_settings_field( // Reddit
    		'reddit',
    		'Reddit',
    		'url_callback',
    		'general',
    		'social_links',
    		array('reddit')
    	);
    	
		
	register_setting('general','facebook', 'esc_attr');
	register_setting('general','twitter', 'esc_attr');
	register_setting('general','linkedin', 'esc_attr');
    register_setting('general', 'reddit', 'esc_attr');
}
add_action('admin_init', 'social'); //Enable Social Links Under Settings

function social_callback() { // Section Callback
	echo '<p>Add Your Social Media Links Below</p>';  
}
	
function url_callback($args) {  // Textbox Callback
	$option = get_option($args[0]);
	echo '<input type="url" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}



// Add Custom Field in General Settings for Footer Content 
function footer_content() {  
	add_settings_section(  
		'footer_content', // Section ID 
		'Footer Content', // Section Title
		'footer_content_callback', // Callback
		'general' // What Page?  This makes the section show up on the General Settings Page
	);
		
	add_settings_field( // Option 1
		'content_data', // Option ID
		'Text', // Label
		'text_callback', // !important - This is where the args go!
		'general', // Page it will be displayed (General Settings)
		'footer_content', // Name of our section
		array( // The $args
			'content_data' // Should match Option ID
		)  
	);
		
	register_setting('general','content_data', 'esc_attr');

}
add_action('admin_init', 'footer_content'); //Enable Footer Text in Pages

function footer_content_callback() { // Section Callback
	echo '<p>Add Your Footer Text Below</p>';  
}
	
function text_callback($argu) {  // Textbox Callback
	$text = get_option($argu[0]);
	echo '<textarea rows="4" cols="50" type="content_data" name="'. $argu[0] .'" id="'. $argu[0] .'">' . $text . '</textarea>';
}

/////////////////////////
//Add Post Views Function
function set_post_views($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function track_post_views ($post_id) {
	if ( !is_single() ) return;
	if ( empty ( $post_id) ) {
		global $post;
		$post_id = $post->ID;    
	}
	set_post_views($post_id);
}
add_action( 'wp_head', 'track_post_views');


/////////////User
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra profile information", "blank"); ?></h3>

    <table class="form-table">
		<tr>
			<th><label for="designation"><?php _e("Designation"); ?></label></th>
			<td>
				<input type="text" name="designation" id="designation" value="<?php echo esc_attr( get_the_author_meta( 'designation', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e("Please enter your designation."); ?></span>
			</td>
		</tr>    
    </table>
<?php }


add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( empty( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'update-user_' . $user_id ) ) {
        return;
    }
    
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'designation', $_POST['designation'] );
}

/////

// Remove any existing robots meta tags output by plugins
function force_index_follow_meta() {
    // Remove any existing robots meta tags output by plugins
    ob_start(function($buffer) {
        // Remove existing robots meta tags
        $buffer = preg_replace('/<meta name=[\'"]robots[\'"].*?>/i', '', $buffer);

        // Add our forced robots meta tag just before </head>
        $meta_tag = "<meta name='robots' content='index, follow' />\n";
        $buffer = preg_replace('/<\/head>/i', $meta_tag . '</head>', $buffer);

        return $buffer;
    });
}
add_action('template_redirect', 'force_index_follow_meta');

