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

include(plugin_dir_path(__FILE__) . 'include/class-login-plugin-activator.php');

// Include public functionality
include(plugin_dir_path(__FILE__) . 'public/class-login-plugin-public.php');

register_activation_hook(__FILE__, array('Login_Plugin_Activator', 'activate'));

// Initialize the plugin
function user_authentication_init() {
    $plugin = new User_Authentication();
    $plugin->init();
    add_action('plugins_loaded', 'user_authentication_init');
}

// Handle AJAX request to check if user exists
add_action('wp_ajax_check_user_exists', 'check_user_exists');
add_action('wp_ajax_nopriv_check_user_exists', 'check_user_exists');

function check_user_exists() {
    check_ajax_referer('custom-auth-nonce', 'nonce');

    if (!isset($_POST['email'])) {
        wp_send_json_error(array('message' => 'Email is required'));
    }

    $email = sanitize_email($_POST['email']);
    $user = get_user_by('email', $email);

    wp_send_json_success(array('exists' => $user ? true : false));
}

class Login_Plugin {
    public function __construct() {
        $this->public = new User_Authentication();
        add_action('init', array($this->public, 'init'));
    }
}

new Login_Plugin();

