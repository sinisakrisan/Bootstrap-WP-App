<?php
/**!
 * Enqueues for scripts and styles
 */

if ( ! function_exists('app_enqueues') ) {
	function app_enqueues() {

		/********************************
		**                             **
		**********    STYLES     ********
		**                             **
		********************************/

		// Bootstrap 4 1.3
		wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, '4.1.3', null);
		wp_enqueue_style('bootstrap-css');

		// Font Awesome 5.3.1
		wp_register_style('fontawesome-css', get_template_directory_uri() . '/fonts/fontawesome/css/all.min.css', false, '5.3.1', null);
		wp_enqueue_style('fontawesome-css');

		// App Theme Style
		wp_register_style('app-css', get_template_directory_uri() . '/css/app.css', false, null);
		wp_enqueue_style('app-css');

		/********************************
		**                             **
		*********    SCRIPTS     ********
		**                             **
		********************************/

		// Bootstrap 4 with Native jQuery dependency
		wp_register_script('bootstrap-js', get_template_directory_uri() .'/js/bootstrap.bundle.min.js', false, '4.1.3', true);
		wp_enqueue_script('bootstrap-js', array('jquery'));

		// App theme script
		wp_register_script('app-js', get_template_directory_uri() . '/js/app.js', false, null, true);
		wp_enqueue_script('app-js');

		// Why is this here?? 
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'app_enqueues', 100);
