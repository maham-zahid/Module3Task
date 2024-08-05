<?php
/**
 * Plugin Name: Login Plugin
 * Description: A custom plugin for user registration and login.
 * Version: 1.0.0
 * Author: Maham Zahid
 * Text Domain: login-plugin
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/class-login-plugin.php';

// Activation hook
function login_plugin_activate() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-login-plugin-activator.php';
    Login_Plugin_Activator::activate();
}
register_activation_hook(__FILE__, 'login_plugin_activate');

// Deactivation hook
function login_plugin_deactivate() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-login-plugin-deactivator.php';
    Login_Plugin_Deactivator::deactivate();
}
register_deactivation_hook(__FILE__, 'login_plugin_deactivate');

// Initialize the core plugin class
function run_login_plugin() {
    $plugin = new Login_Plugin();
    $plugin->run();
}
run_login_plugin();
