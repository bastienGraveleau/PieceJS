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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpresslocal' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         's,myS<W[u@rX3&KlJ6N4t^3k1hcd3~lb<<&RrV_X@6 O}/bDZ%lGfMN,KJ2wODK#' );
define( 'SECURE_AUTH_KEY',  'QfeQNePG+uhCa;37/f)-l(p^ M5q^r;Z]wS<uoWc.>feEF(pa2n}0Q.~T_x#>UME' );
define( 'LOGGED_IN_KEY',    'KmN)A+]dW|`O_bESe?rCW3oyM&9SVxu|(8FUc{#!3O#aDr<?^ .y*T+]oU n@|y|' );
define( 'NONCE_KEY',        ',6gTL18z./h_^F``gem&0.I1b8QX9=rYsNh3unw9pr48z!@4:Pg]aYMC9BX:l{[k' );
define( 'AUTH_SALT',        'S!m`hs4s%gQIdi4)ZD2wR]%2M~vwNEriO#:.f-^~x0Du@APFQ|SIs(e_[/pl~3w|' );
define( 'SECURE_AUTH_SALT', 'U8#_27#|~qkhu]+()eA&paald]jl+Rxj3&1(W-Oa*(6%2Q5>MvB36?J:|5Kb3D%m' );
define( 'LOGGED_IN_SALT',   'Zy]mbdbK(M%NdM}`aq+sVO_cMO3xd67yG:GCF23o0E1XH/MqhLMrQ?%?Vqrcii(9' );
define( 'NONCE_SALT',       '*{ts-}1!F}H2jGD>wRVew]H6IBUAkLOC5*S|^BEegGU!kYy$X^MgUys>BYY6!2uv' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
