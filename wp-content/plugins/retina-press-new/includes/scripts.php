<?php

/* ----------------------------------------
* load scripts
----------------------------------------- */
function rp_admin_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script('colorpicker');
	wp_enqueue_script('jquery-ui-sortable');

	wp_enqueue_script('rp-admin-scripts', rp_PLUGIN_DIR . 'includes/js/admin-scripts.js');
	
	if ( is_multisite() ){
		wp_enqueue_script('media-uploader', rp_PLUGIN_DIR . 'includes/js/media-uploader-multisite.js');
	} else {
		wp_enqueue_script('media-uploader', rp_PLUGIN_DIR . 'includes/js/media-uploader.js');
	}
	
	wp_enqueue_script('jscolor', rp_PLUGIN_DIR . 'includes/js/jscolor.js');
}

if (isset($_GET['page']) && ( $_GET['page'] == 'rp-settings') ){
	add_action('admin_print_scripts', 'rp_admin_scripts');
}


?>