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
define( 'AUTH_KEY',          'Ez+]pb)bx T^_.NZ8[H_Ve_6B{<WAi8YcD_*{(kOH!KhmNlNKBJx-UU:en&Z9J{[' );
define( 'SECURE_AUTH_KEY',   'm6j#3WRMBzV|T!.^fk=GVq:iJaz.m}jhSTeR(#n$x/xDN,L7*t,$YL6elk[8Bx@p' );
define( 'LOGGED_IN_KEY',     '/{b,!Ol}xEMY:=eJKsJK_7Qc@(bU8}=6&>4`WdgS/K>#Sg/%??t^/>6#AyOB&A-7' );
define( 'NONCE_KEY',         '`Tu&r6C<75$9Q 9F]+8AT.JXi*Y/;uUj|0Lzp?9U[)%_2}*J{I kY%NHG{<^dRbq' );
define( 'AUTH_SALT',         'QPb8v2]=0~={Pfo@2>i|hKlB!.}fd3v|<dzU{yV|3Z|u/_wZ6h<s:/!UpUq4ZF<q' );
define( 'SECURE_AUTH_SALT',  '4}si_7!DV9]>tyaLc$>5{m)D<IHU,t2<(R-vG#6..g)|M[b_R)xeRW34G[QUS@TO' );
define( 'LOGGED_IN_SALT',    '!wXf#.$|EgFr4u Jd]2Z 0k9XJCsOcdx2d12CpZs&Gs+D+?V>izoHX#J~wA_Feg$' );
define( 'NONCE_SALT',        '2YZ^u/wT&kl^/S|:-O=2Wv!hjT$#J>UnA/Ij2vG~:y9&*<nV{3|06HRI[UZHkI6n' );
define( 'WP_CACHE_KEY_SALT', ':*% X>;{#1s6V-xnSsPcL25<ep)Dne}w+1GLGNlhx5|}r3t<T?Kz-(*fAg&?r1_*' );


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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
