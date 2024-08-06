<?php
/*
 * Plugin Name:       Login Plugin
 * Plugin URI:        http://loginplugin.local/wp-admin/login-plugin.php
 * Description:       A custom plugin for login and signup with validations.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Maham
 * Author URI:        https://maham.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       login-plugin
 * Domain Path:       /languages
 */

 // Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include public functionality
include(plugin_dir_path(__FILE__) . 'public/class-login-plugin-public.php');

// Initialize the plugin
function user_authentication_init() {
    $plugin = new User_Authentication();
    $plugin->init();
}
add_action('plugins_loaded', 'user_authentication_init');
 
