<?php
/*
Plugin Name: Retina Press
Plugin URL: http://codecanyon.net/item/retina-press-wordpress-admin-theme/4872562?ref=leegrant
Description: Add a little beauty to your Wordpress admin with this customised theme.
Version: 1.5
Author: Lee Grant
Author URI: http://themeforest.net/user/leegrant
Contributors: Rémi Corson, Tammy Hart
*/

// Custom login CSS
function rp_login_css() {
  echo '<link rel="stylesheet" type="text/css" href="' .plugins_url('css/login.php  ', __FILE__). '">';
}
add_action('login_head', 'rp_login_css');
function rp_css() {
    $url = get_settings('siteurl');
    $dir = $url . '/wp-content/plugins/retina-press-new/css/';
    echo '
    <link rel="stylesheet" type="text/css" href="' . $dir . 'style.php" />
	<!--[if IE]><link rel="stylesheet" type="text/css" href="' . $dir . 'ie.css" /><![endif]-->
    ';
}

add_action('admin_print_styles', 'rp_css');

// Load custom javascript
function rp_load_scripts() {
	wp_enqueue_script('rp_custom', plugins_url('js/custom.js', __FILE__), '1,0');
}

add_action('admin_enqueue_scripts', 'rp_load_scripts');

// Remove Howdy message
function rp_remove_howdy( $wp_admin_bar ) {
	$my_account=$wp_admin_bar->get_node('my-account');
	$newtitle = str_replace( 'Howdy,', '', $my_account->title );
	$wp_admin_bar->add_node( array(
	'id' => 'my-account',
	'title' => $newtitle,
	) );
}
add_filter( 'admin_bar_menu', 'rp_remove_howdy',25 );


/* ----------------------------------------
* Plugin Globals
----------------------------------------- */

global $rp_base_dir;
$rp_base_dir = dirname(__FILE__);

global $rp_prefix;
$rp_prefix = 'rp_';

if(!defined('rp_PLUGIN_DIR')) {
	define('rp_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}

/* ----------------------------------------
* plugin text domain for translations
----------------------------------------- */

load_plugin_textdomain( 'rp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/* ----------------------------------------
* Includes
----------------------------------------- */

if( isset($_GET['page']) AND $_GET['page'] == 'rp-settings' ) {
	include($rp_base_dir . '/includes/styles.php');
	include($rp_base_dir . '/includes/options.php');
	include($rp_base_dir . '/includes/functions/rp_functions.php');
	include($rp_base_dir . '/includes/scripts.php');
}

include($rp_base_dir . '/includes/shortcodes.php');

/* ----------------------------------------
* load plugin data
----------------------------------------- */

$rp_options = get_option('rp_settings');


/* ----------------------------------------
* add subpage in appearance menu
----------------------------------------- */

function rp_settings_menu() {

	if ( is_multisite() ){
		// add settings page if network admin
		add_submenu_page(
						'settings.php', 
						__('Retina Press Settings', 'rp'), 
						__('Retina Press Settings', 'rp'),
						'manage_options', 
						'rp-settings', 
						'rp_settings_page');
		// add import export page
	add_submenu_page(
					'settings.php', 
					__('Retina Press Settings import / export', 'rp'), 
					__('RP Import / Export', 'rp'),
					'manage_options', 
					'rp-import-export', 
					'rp_import_export_page');
	} else {
		// add settings page if not on network
// 		add_submenu_page(
// 						'options-general.php', 
// 						__('Retina Press Settings', 'rp'), 
// 						__('Retina Press Settings', 'rp'),
// 						'manage_options', 
// 						'rp-settings', 
// 						'rp_settings_page');
// 		// add import export page
// 	add_submenu_page(
// 					'options-general.php', 
// 					__('Retina Press Settings import / export', 'rp'), 
// 					__('RP Import / Export', 'rp'),
// 					'manage_options', 
// 					'rp-import-export', 
// 					'rp_import_export_page');
	}
					
}

if ( is_multisite() ){
    add_action("network_admin_menu", 'rp_settings_menu', 100);
} else  {
	add_action("admin_menu", 'rp_settings_menu', 100);
}


/* ----------------------------------------
* register the plugin settings
----------------------------------------- */

function rp_register_settings() {

	// create whitelist of options
	register_setting( 'rp_settings_group', 'rp_settings' );
}
//call register settings function
add_action( 'admin_init', 'rp_register_settings', 100 );


/* ----------------------------------------
* create the submenu links in plugins page
----------------------------------------- */

function rp_plugin_action_links($links, $file) {
    static $this_plugin;
 
    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }
 
    // check to make sure we are on the correct plugin
    if ($file == $this_plugin) {
	    
	    if ( is_multisite() ){
			// link to what ever you want
	        $plugin_links[] = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/settings.php?page=rp-settings">'.__('Theme Options','rp').'</a>';
	    } else 	{
	    	// link to what ever you want
	        $plugin_links[] = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=rp-settings">'.__('Theme Options','rp').'</a>';
	    }
        // add the links to the list of links already there
		foreach($plugin_links as $link) {
			array_unshift($links, $link);
		}
    }
 
    return $links;
}
add_filter('plugin_action_links', 'rp_plugin_action_links', 10, 2);

/* ------------------------------------------------------------------*/
/* GET AN IMAGE FROM GLOBAL STRING */
/* ------------------------------------------------------------------*/

function rp_image($field_id,  $width = '', $height = '') {
	
	global $rp_options;
	
	if( isset($field_id) ) {
	
		// Get attachment data
		$image_data = wp_get_attachment_image_src( $rp_options["$field_id"], '' );
		
		//print_r( $image_data );
		
		// get URL
		$url = $image_data[0];
		
		// Height and width
		if( $height != '' && $width != '' ) {
			$height = $height;
			$width 	= $width;
		} else {
			$width = $image_data[1];
			$height = $image_data[2];
		}

		echo '<img src="'.$url.'" with="'.$width.'" height="'.$height.'"/>'; 
		
	}
}

/* ------------------------------------------------------------------*/
/* RETURN AN IMAGE URL FROM GLOBAL STRING */
/* ------------------------------------------------------------------*/

function rp_get_image($field_id) {
	
	global $rp_options;
	
	if( isset($field_id) ) {
	
		// Get attachment data
		$image_data = wp_get_attachment_image_src( $rp_options["$field_id"], '' );
		
		// get URL
		$url = $image_data[0];
	
		return $url;
		
	}
}

/* ----------------------------------------
* function to retrieve the get_option() value
----------------------------------------- */

function rp_get_option($option_name) {
	$rp_options = get_option('rp_settings');
	return $rp_options[$option_name];
}


/* ----------------------------------------
* create the settings page layout
----------------------------------------- */

function rp_settings_page() {
	
	global $rp_options;
		
	?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"><br /></div>
		<h2><?php _e('Retina Press Settings', 'rp'); ?></h2>
		<?php
		if ( ! isset( $_REQUEST['settings-updated'] ) )
			$_REQUEST['settings-updated'] = false;
		?>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'rp' ); ?></strong></p></div>

		<?php endif; ?>
		<form method="post" action="<?php if ( is_multisite() ){ ?>../options.php<?php } else { ?>options.php<?php } ?>" class="rp_options_form">

			<?php settings_fields( addslashes('rp_settings_group') ); ?>
			
			<?php rp_show_custom_tabs(); ?>

			<?php rp_show_custom_fields(); ?>
			
			<!-- save the options -->
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'rp' ); ?>" />
			</p>
			
		</form>
	</div><!--end .wrap-->
	<?php
}


/* ----------------------------------------
* create the settings page layout
----------------------------------------- */

function rp_import_export_page() {

	$rp_settings = get_option( 'rp_settings' );
	$currentsettings = "";
	if ( isset( $_POST['import'] ) && trim($_POST['rp_import_settings']) != "" ) {
		$currentsettings = $_POST['gpp_import_settings'];
	} elseif ( isset( $rp_settings ) && ( $rp_settings != "" ) ) {	
		$currentsettings = base64_encode( serialize( $rp_settings ) );		
	} 
		
	?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"><br /></div>
		<h2><?php _e('Login Theme - Import / Export', 'rp'); ?></h2>
		<?php if ( isset( $_POST['import'] ) && $_POST['rp_import_settings'] != "" ) { ?>
		<div class="updated fade"><p><strong><?php _e('Settings imported successfully!', 'rp'); ?></strong></p></div>
		<?php } ?>
		
	<div class="wrap" id="transport_settings">

		<p class="description"><?php _e('Here you can import and export Retina Press Settings from one installation to another.', 'rp'); ?></p>
		<div class="option option-textarea">
			<div class="option-inner">
				<label class="titledesc"><h3><?php _e('Import Options', 'rp'); ?></h3></label>
				<div class="formcontainer">
					<div class="forminp">
						<form id="impexp" method="post" action="#">
						<textarea rows="8" cols="60" id="rp_import_settings" name="rp_import_settings" class=""></textarea><br />
						<div class="desc"><?php _e('Paste the encoded text from export options field from your development site or another installation.', 'rp'); ?></div>
						<input type="submit" value="<?php _e('Import', 'rp'); ?>" id="import" name="import" class="button-primary" onClick="return confirm('<?php _e('Are you sure you want to import the settings?', 'rp'); ?>')"> 
						</form>
					</div>
					
				</div>
			</div>
		</div>
		<div class="option option-textarea">
			<div class="option-inner">
				<label class="titledesc"><h3><?php _e('Export Options', 'rp'); ?></h3></label>
				<div class="formcontainer">
					<div class="forminp">
						<textarea rows="8" cols="60" id="rp_export_settings" name="rp_export_settings" class="" readonly="readonly"><?php echo $currentsettings; ?></textarea>					
					</div>
					<div class="desc"><?php _e('Copy this text to import settings into another installation.', 'rp'); ?></div>
				</div>
			</div>
		</div>
	 </div>

	</div><!--end .wrap-->
	<?php
}

add_action( 'network_admin_menu', 'rp_import_settings' );
function rp_import_settings(){
	
	global $rp_prefix;

	if ( isset( $_POST['import'] ) && trim($_POST['rp_import_settings']) != "" ) {	
		update_option( $rp . 'settings', $_POST['rp_import_settings'] );
	}
}

/* ------------------------------------------------------------------*/
/* UNINSTALL PLUGIN */
/* ------------------------------------------------------------------*/

function rp_uninstall () 
{
    // Uncomment the line above to delete all data at plugin uninstall
    /* delete_option('rp_settings'); */
}

register_deactivation_hook( __FILE__, 'rp_uninstall' );

/*
YToyNDp7czoxNjoicnBfUHJpbWFyeUNvbG91ciI7czo2OiIwMEE2QzYiO3M6MTg6InJwX1NlY29uZGFyeUNvbG91ciI7czo2OiIxNzE4MUIiO3M6MTc6InJwX1RlcnRpYXJ5Q29sb3VyIjtzOjY6IjEyMTIxMiI7czoyODoicnBfU2VsZWN0aW9uQmFja2dyb3VuZENvbG91ciI7czo2OiI0NkJCRDQiO3M6MjI6InJwX1NlbGVjdGlvblRleHRDb2xvdXIiO3M6NjoiRkZGRkZGIjtzOjIwOiJycF9TaWRlYmFyTGlua0NvbG91ciI7czo2OiJGRkZGRkYiO3M6MjU6InJwX1NpZGViYXJMaW5rSG92ZXJDb2xvdXIiO3M6NjoiMTIxMjEyIjtzOjI3OiJycF9TaWRlYmFyTGlua0N1cnJlbnRDb2xvdXIiO3M6NjoiRkZGRkZGIjtzOjEzOiJycF9MaW5rQ29sb3VyIjtzOjY6IjQ2QkJENCI7czoxODoicnBfTGlua0hvdmVyQ29sb3VyIjtzOjY6IjEyMTIxMiI7czoyMjoicnBfUHJpbWFyeUJ1dHRvbkNvbG91ciI7czo2OiIwMEE2QzYiO3M6MjY6InJwX1ByaW1hcnlCdXR0b25UZXh0Q29sb3VyIjtzOjY6IkZGRkZGRiI7czoyNzoicnBfUHJpbWFyeUJ1dHRvbkhvdmVyQ29sb3VyIjtzOjY6IjE3MTgxQiI7czozMToicnBfUHJpbWFyeUJ1dHRvblRleHRIb3ZlckNvbG91ciI7czo2OiJGRkZGRkYiO3M6MjQ6InJwX1NlY29uZGFyeUJ1dHRvbkNvbG91ciI7czo2OiI5MTkxOTEiO3M6Mjg6InJwX1NlY29uZGFyeUJ1dHRvblRleHRDb2xvdXIiO3M6NjoiRkZGRkZGIjtzOjI5OiJycF9TZWNvbmRhcnlCdXR0b25Ib3ZlckNvbG91ciI7czo2OiIwMEE2QzYiO3M6MzM6InJwX1NlY29uZGFyeUJ1dHRvblRleHRIb3ZlckNvbG91ciI7czo2OiJGRkZGRkYiO3M6MTI6InJwX0xvZ29JbWFnZSI7czowOiIiO3M6MTI6InJwX0xvZ29XaWR0aCI7czowOiIiO3M6MTM6InJwX0xvZ29IZWlnaHQiO3M6MDoiIjtzOjIxOiJycF9EYXNoYm9hcmRMb2dvSW1hZ2UiO3M6MjoiMzIiO3M6MjE6InJwX0Rhc2hib2FyZExvZ29XaWR0aCI7czo1OiIxNzhweCI7czoyMjoicnBfRGFzaGJvYXJkTG9nb0hlaWdodCI7czo0OiIzNnB4Ijt9
*/