<?php
/**!
 * Setup
 */

if ( ! function_exists('app_setup') ) {
	function app_setup() {
		//add_editor_style('theme/css/editor-style.css');

		add_theme_support('title-tag');

		add_theme_support('post-thumbnails');
		set_post_thumbnail_size( 1280, 760, true );

		update_option('thumbnail_size_w', 285); /* internal max-width of col-3 */
		update_option('small_size_w', 350); /* internal max-width of col-4 */
		update_option('medium_size_w', 730); /* internal max-width of col-8 */
		update_option('large_size_w', 1110); /* internal max-width of col-12 */

		if ( ! isset($content_width) ) {
			$content_width = 1100;
		}

		add_theme_support( 'post-formats', array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat'
		) );

		add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );

		add_theme_support('automatic-feed-links');

		add_theme_support('customize-selective-refresh-widgets');

	}
}
add_action('init', 'app_setup');

if ( ! function_exists( 'app_avatar_attributes' ) ) {
	function app_avatar_attributes($avatar_attributes) {
		$display_name = get_the_author_meta( 'display_name' );
		$avatar_attributes = str_replace('alt=\'\'', 'alt=\'Avatar for '.$display_name.'\' title=\'Gravatar for '.$display_name.'\'',$avatar_attributes);
		return $avatar_attributes;
	}
}
add_filter('get_avatar','app_avatar_attributes');

if ( ! function_exists( 'app_author_avatar' ) ) {
	function app_author_avatar() {

		echo get_avatar('', $size = '96');
	}
}

if ( ! function_exists( 'app_author_description' ) ) {
	function app_author_description() {
		echo get_the_author_meta('user_description');
	}
}

if ( ! function_exists( 'app_post_date' ) ) {
	function app_post_date() {
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">(updated %4$s)</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_date(),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date()
			);

			echo $time_string;
		}
	}
}


if ( ! function_exists('app_excerpt_more') ) {
	function app_excerpt_more() {
		return '&hellip;</p><p><a class="btn btn-primary" href="'. get_permalink() . '">' . __('Continue reading', 'app') . ' <i class="fas fa-arrow-right"></i>' . '</a></p>';
	}
}
add_filter('excerpt_more', 'app_excerpt_more');

// Hide Admin Bar for All Users Except Adminministrators
function app_hide_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'app_hide_admin_bar');


//
//  REDIRECTS
//
function is_login_page() {
    global $wp, $wpdb;
    $register_id = $wpdb->get_var('SELECT ID FROM '.$wpdb->prefix.'posts WHERE post_content LIKE "%[peepso_register]%" AND post_parent = 0');
    $recovery_id = $wpdb->get_var('SELECT ID FROM '.$wpdb->prefix.'posts WHERE post_content LIKE "%[peepso_recover]%" AND post_parent = 0');
    $reset_id = $wpdb->get_var('SELECT ID FROM '.$wpdb->prefix.'posts WHERE post_content LIKE "%[peepso_reset]%" AND post_parent = 0');

    if ( $GLOBALS['pagenow'] === 'wp-login.php' && ! empty( $_REQUEST['action'] ) && $_REQUEST['action'] === 'register' || is_page( array( $register_id, $recovery_id, $reset_id ) ) )
        return true;
    return false;
}

function guest_redirect() {
    
    $redirect = get_theme_mod( 'app_redirect');

    if ($redirect == 0) return false;

    $page_id = get_theme_mod( 'app_landing_id');

    //Don't redirect if user is logged in or user is trying to sign up or sign in
    if( !is_login_page() && !is_admin() && !is_user_logged_in()) {
        //$page_id is the page id of landing page
        if( !is_page($page_id) ){
            wp_redirect( get_permalink($page_id) );
            exit;
        }
    }
}
add_action( 'template_redirect', 'guest_redirect' );

