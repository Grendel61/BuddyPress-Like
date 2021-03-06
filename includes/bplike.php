<?php
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( ! defined( 'BP_LIKE_VERSION' ) ) {
    define( 'BP_LIKE_VERSION' , '0.3.0' );
}

if ( ! defined( 'BP_LIKE_DB_VERSION' ) ) {
    define( 'BP_LIKE_DB_VERSION' , '29' );
}

if ( ! defined( 'BPLIKE_PATH' ) ) {
    define( 'BPLIKE_PATH' , plugin_dir_path( dirname( __FILE__ ) ) );
}

add_action('plugins_loaded', 'bp_like_load_textdomain');
function bp_like_load_textdomain() {
	load_plugin_textdomain( 'buddypress-like' , false , BPLIKE_PATH . '/languages/' );
}

/**
 * bp_like_get_text()
 *
 * Returns a custom text string from the database
 *
 */
function bp_like_get_text( $text = false , $type = 'custom' ) {
    $settings = get_site_option( 'bp_like_settings' );
    $text_strings = $settings['text_strings'];
    $string = $text_strings[$text];
    return $string[$type];
}

if ( is_admin() ) {
    require_once BPLIKE_PATH . 'admin/admin.php';
}
require_once BPLIKE_PATH . 'includes/button-functions.php';
require_once BPLIKE_PATH . 'includes/activity-comment-button.php';
require_once BPLIKE_PATH . 'includes/install-functions.php';
require_once BPLIKE_PATH . 'includes/activity-functions.php';
require_once BPLIKE_PATH . 'includes/ajax.php';
require_once BPLIKE_PATH . 'includes/like-functions.php';
require_once BPLIKE_PATH . 'includes/scripts.php';
require_once BPLIKE_PATH . 'includes/settings.php';
require_once BPLIKE_PATH . 'includes/blogpost.php';