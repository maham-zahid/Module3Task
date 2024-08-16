<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '649G8ZKjgBiA%RgEhFb.KJarp1R|R/-0MOldXxV`9M<z]}MGEE>vd5CSrFMGX?rC' );
define( 'SECURE_AUTH_KEY',   'r56qo$.g^jEl4m67~+UHz %bIJ-~N$%RfM7}h|:r=-E59cH2v3|b%|^ZN.2:2]M9' );
define( 'LOGGED_IN_KEY',     '>7aMlW^SBVc4qotLNSK%q8%oA9mo+8]D0t5,nL)Q3uOo}JKl@aU#H`B=wc[5it~3' );
define( 'NONCE_KEY',         '4y*-Y+awV`UI#3(2b?^rj:o)9n?b#`b /!e%guLZ]b33*w{cDi-S14EGqYx@%QsX' );
define( 'AUTH_SALT',         'NXGZ},/z-iwjLwF~R4awDwm],3uq.P17mCf-<+PSnY4:^oZ(8b$Q4zkaRT&-[9:?' );
define( 'SECURE_AUTH_SALT',  'bNrQpoT@CF#{4TuN{.4Y&jkxW}MQ%D>xZm2EE$&*FBpROqb(Q^vMe0gJ-K@Usbrl' );
define( 'LOGGED_IN_SALT',    'yyi`.WZ!u4Y*AEUtPF8yvQz3UOH4}j+a|sS}A-iDp G72t$j%UMIZk1fvK^mbm,i' );
define( 'NONCE_SALT',        '02q9x.<<!4LJ<EJ5M]z]S+`iT,5? F5Ii}4@G&ib?j5Dx65]?:8^E(hUL[z_]?Fu' );
define( 'WP_CACHE_KEY_SALT', '&Vq>)W&>y7oT}IE kmoM46LgnsVl@Y]]v1v-kd ?Bf9.3-@,wzH8X=1;kn]@KyMw' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
// Enable WP_DEBUG mode
if ( ! defined( 'WP_DEBUG' ) ) {
    define( 'WP_DEBUG', true );
}

// Enable debugging in development environment
if ( ! defined( 'WP_DEBUG_LOG' ) ) {
    define( 'WP_DEBUG_LOG', true );
}

// Disable display of errors and warnings on the site
if ( ! defined( 'WP_DEBUG_DISPLAY' ) ) {
    define( 'WP_DEBUG_DISPLAY', false );
}

// Enable script debugging
if ( ! defined( 'SCRIPT_DEBUG' ) ) {
    define( 'SCRIPT_DEBUG', true );
}




define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', 'todolistplugin.local' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
