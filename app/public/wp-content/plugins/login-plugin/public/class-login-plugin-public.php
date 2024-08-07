<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class User_Authentication {

    // Constructor
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
        add_action('wp_ajax_nopriv_register_user', array($this, 'register_user'));
        add_action('wp_ajax_nopriv_check_user_exists', array($this, 'check_user_exists'));
        
    }

    // Initialize the plugin
    public function init() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
        add_shortcode('registration_form', array($this, 'display_registration_form'));
        add_shortcode('login_form', array($this, 'display_login_form'));
        add_action('wp_ajax_register_user', array($this, 'register_user'));
        add_action('wp_ajax_nopriv_register_user', array($this, 'register_user'));
        add_action('wp_ajax_login_user', array($this, 'login_user'));
        add_action('wp_ajax_nopriv_login_user', array($this, 'login_user'));
        add_action('wp_ajax_check_user_exists', array($this, 'check_user_exists'));
        add_action('wp_ajax_nopriv_check_user_exists', array($this, 'check_user_exists'));


    }

    // Enqueue styles and scripts
    public function enqueue_assets() {
        wp_enqueue_style('custom-authentication-css', plugin_dir_url(__FILE__) . 'css/styles.css');
        wp_enqueue_script('custom-authentication-js', plugin_dir_url(__FILE__) . 'js/validation.js', array('jquery'), null, true);
        wp_localize_script('custom-authentication-js', 'customAuth', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('custom-auth-nonce')
        ));
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
                <p class="form__text">Already have an account? <a href="<?php echo site_url('/login'); ?>" class="form__link">Login</a></p>
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
                <p class="form__text">Don't have an account? <a href="<?php echo site_url('/register'); ?>" class="form__link">Register</a></p>
            </form>
        </div>
    </div>
        <?php
        return ob_get_clean();
    }

    // Handle user registration via AJAX
public function register_user() {
    check_ajax_referer('custom-auth-nonce', 'nonce');

    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_users';

    $email = sanitize_email($_POST['email']);
    $password = wp_hash_password(sanitize_text_field($_POST['password']));

    // Check if user already exists
    $user_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE email = %s", $email));
    if ($user_exists) {
        wp_send_json_error(array('message' => 'User already exists'));
    } else {
        $wpdb->insert($table_name, array(
            'email' => $email,
            'password' => $password
        ));
        wp_send_json_success(array('message' => 'Registration successful!'));
    }
}


public function check_user_exists() {
    check_ajax_referer('custom-auth-nonce', 'nonce');

    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_users';
    $email = sanitize_email($_POST['email']);

    $user_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE email = %s", $email));

    if ($user_exists) {
        wp_send_json_success(array('exists' => true));
    } else {
        wp_send_json_success(array('exists' => false));
    }
}


// Handle user login via AJAX
public function login_user() {
    check_ajax_referer('custom-auth-nonce', 'nonce');

    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_users';

    $email = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);

    // Fetch user data
    $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE email = %s", $email));
    if ($user) {
        // Verify password
        if (wp_check_password($password, $user->password)) {
            wp_send_json_success(array('message' => 'Login successful!'));
        } else {
            wp_send_json_error(array('message' => 'Incorrect password.'));
        }
    } else {
        wp_send_json_error(array('message' => 'User not found.'));
    }
}

}

