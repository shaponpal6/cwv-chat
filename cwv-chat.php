<?php
/**
 * Plugin Name:       CWV Chat Lite
 * Plugin URI:        https://www.cwvchat.xyz/
 * Description:       Beginner friendly WordPress contact form plugin. Use our Drag & Drop form builder to create your WordPress forms.
 * Version:           1.0.0
 * Author:            Shapon Pal
 * Author URI:        https://www.shapon.me
 * Text Domain:       cwv-chat
 * Domain Path:       /languages
 * Requires at least: 4.9
 * Requires PHP:      5.5
 *
 * WPForms is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * WPForms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WPForms. If not, see <http://www.gnu.org/licenses/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Plugin version.
if ( ! defined( 'CWV_CHAT_VERSION' ) ) {
	define( 'CWV_CHAT_VERSION', '1.6.3.1' );
}

// Plugin Folder Path.
if ( ! defined( 'CWV_CHAT_DIR' ) ) {
	define( 'CWV_CHAT_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Folder URL.
if ( ! defined( 'CWV_CHAT_PLUGIN_URL' ) ) {
	define( 'CWV_CHAT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin Root File.
if ( ! defined( 'CWV_CHAT_PLUGIN_FILE' ) ) {
	define( 'CWV_CHAT_PLUGIN_FILE', __FILE__ );
}


//Define the CWV Chat Plugin base name
if (!defined('CWV_CHAT_BASE_NAME')) {
    define('CWV_CHAT_BASE_NAME', plugin_basename(__FILE__));
}


//Define the CWV Chat Plugin file directory url
if (!defined('CWV_CHAT_BASE_URL')) {
    define('CWV_CHAT_BASE_URL', trailingslashit(plugin_dir_url(__FILE__)));
}


//Define the CWV Chat Plugin file directory path
if (!defined('CWV_CHAT_BASE_PATH')) {
    define('CWV_CHAT_BASE_PATH', trailingslashit(plugin_dir_path(__FILE__)));
}


//Define the CWV Chat Plugin access token
if (!defined('CWV_CHAT_ACCESS_TOKEN')) {
    define('CWV_CHAT_ACCESS_TOKEN', uniqid('mrAssistant-', false));
}


//Define the CWV Chat Plugin name
if (!defined('CWV_CHAT_NAME')) {
    define('CWV_CHAT_NAME', 'CWV Chat');
}


//Define the CWV Chat Plugin Slug
if (!defined('CWV_CHAT_SLUG')) {
    define('CWV_CHAT_SLUG', 'mr-assistant');
}


//Define the CWV Chat Plugin Version
if (!defined('CWV_CHAT_VERSION')) {
    define('CWV_CHAT_VERSION', 1.0);
}


// If this file is called directly, abort.
if ( ! defined( 'WPCWV_DIR' ) ) {
	define( 'WPCWV_DIR', plugin_dir_url( __FILE__ ) ); 
}

// If this file is called directly, abort.
if ( ! defined( 'WPCWV_PATH' ) ) {
	define( 'WPCWV_PATH', plugin_dir_path( __FILE__ ) );
}

define( 'CWV_WIDGET_PATH', plugin_dir_path( __FILE__ ) . '/cwv-chat-console' );
define( 'CWV_ASSET_MANIFEST',   WPCWV_DIR.'/cwv-chat-console/build/asset-manifest.json' );

// define( 'ERW_WIDGET_PATH', plugin_dir_path( __FILE__ ) . '/widget' );
// define( 'ERW_ASSET_MANIFEST', ERW_WIDGET_PATH . '/build/asset-manifest.json' );
// define( 'ERW_INCLUDES', plugin_dir_path( __FILE__ ) . '/includes' );
define( 'CWV_ASSETS', plugin_dir_path( __FILE__ ) . '/assets' );

/**
 * Define Directory
 */
if(!defined('CWV_CHAT_DIR')){
	define('CWV_CHAT_DIR', trailingslashit(plugin_dir_url(__FILE__)));
}

/**
 * Define the CWV_CHAT Plugin file directory path
 */
if (!defined('CWV_CHAT_PATH')) {
    define('CWV_CHAT_PATH', trailingslashit(plugin_dir_path(__FILE__)));
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cwv-chat-activator.php
 */
function activate_cwv_chat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cwv-chat-activator.php';
	Cwv_Chat_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cwv-chat-deactivator.php
 */
function deactivate_cwv_chat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cwv-chat-deactivator.php';
	Cwv_Chat_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cwv_chat' );
register_deactivation_hook( __FILE__, 'deactivate_cwv_chat' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cwv-chat.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cwv_chat() {

	$plugin = new Cwv_Chat();
	$plugin->run();

}
run_cwv_chat();
