<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class User_Authentication {

    // Constructor
    public function __construct() {
        
    }

    // Initialize the plugin
    public function init() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
        add_shortcode('registration_form', array($this, 'display_registration_form'));
        add_shortcode('login_form', array($this, 'display_login_form'));
    }

    // Enqueue styles and scripts
    public function enqueue_assets() {
        wp_enqueue_style('custom-authentication-css', plugin_dir_url(__FILE__) . 'css/styles.css');
        //wp_enqueue_script('custom-authentication-js', plugin_dir_url(__FILE__) . 'js/form-validation.js', array('jquery'), null, true);
    }

    // Display registration form
    public function display_registration_form() {
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

    // Display login form
    public function display_login_form() {
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
}
