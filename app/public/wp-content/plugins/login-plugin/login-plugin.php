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

// Shortcode for login form
function custom_login_form_shortcode() {
    ob_start();
    ?>
    <div class="container">
        <div class="form-wrapper">
            <h2 class="form-wrapper__heading">Log in</h2>
            <form class="form" id="loginForm" method="POST" onsubmit="return validateLoginForm()">
                <div class="form__group">
                    <label for="email" class="form__label">Email</label>
                    <input type="text" id="email" name="email" placeholder="abc@gmail.com" class="form__input" required>
                    <span class="form__error" id="email-error"></span>
                </div>
                <div class="form__group">
                    <label for="password" class="form__label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form__input" required>
                    <span class="form__error" id="password-error"></span>
                </div>
                <button type="submit" name="login" class="form__button">Log in</button>
                <p class="form__text">Don't have an account? <a href="register.php" class="form__link">Register</a></p>
            </form>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_login_form', 'custom_login_form_shortcode');


// Shortcode for registration form
function custom_register_form_shortcode() {
    ob_start();
    ?>
    <div class="container">
        <div class="form-wrapper">
            <h2 class="form-wrapper__heading">Register User</h2>
            <form class="form" id="registerForm" action="php/RegisterController.php" method="POST" onsubmit="return validateRegistrationForm()">
                <div class="form__group">
                    <label for="email" class="form__label">Email</label>
                    <input type="text" id="email" name="email" placeholder="abc@gmail.com" class="form__input" required>
                    <span class="form__error" id="email-error"></span>
                </div>
                <div class="form__group">
                    <label for="password" class="form__label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form__input" required>
                    <span class="form__error" id="password-error"></span>
                </div>
                <div class="form__group">
                    <label for="confirmPassword" class="form__label">Confirm Password</label>
                    <input type="password" id="confpassword" name="confirmPassword" placeholder="Confirm Password" class="form__input" required>
                    <span class="form__error" id="confpassword-error"></span>
                </div>
                <button type="submit" name="register" class="form__button">Register</button>
                <p class="form__text">Already have an account? <a href="index.php" class="form__link">Login</a></p>
            </form>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_register_form', 'custom_register_form_shortcode');

function custom_authentication_assets() {
    wp_enqueue_style('custom-authentication-css', plugin_dir_url(__FILE__) . 'admin/css/styles.css');

}
add_action('wp_enqueue_scripts', 'custom_authentication_assets');
