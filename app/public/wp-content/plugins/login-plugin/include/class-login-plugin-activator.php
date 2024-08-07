<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Login_Plugin_Activator {

    public static function activate() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'custom_users';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            email varchar(255) NOT NULL,
            password varchar(255) NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
?>
