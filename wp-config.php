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
define( 'DB_NAME', 'university' );

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
define( 'AUTH_KEY',         'Bnr(?-/CL|DNu`*u;Vv4TMB$:O%?geiQsVOd[*V$ht7unhr:Bir(H)~oH7?DAXkv' );
define( 'SECURE_AUTH_KEY',  'ZoUF<=J+g^hS64)5{h6IA<hmq#+9.f7Q/V,4:Rx;5ZkIzSYew(ibr0W+75 u%IDS' );
define( 'LOGGED_IN_KEY',    'hA6^K%e.r{DpEVW%#R0@>xLq~l/b-2j`qovuEvKzFfAF6KwoY8U$R S6[Z=2.jg{' );
define( 'NONCE_KEY',        'NpBaDwv%l&vPW9QY~>yZt[@ Hfve=j~eYS_9Ur+5NsZ@*&Bj_#DJwL{Qo?_eWk&R' );
define( 'AUTH_SALT',        'TS7<p$t$EbDxZAQFLL&:Qd-l?.e7.`h5&|B7v#IEA~s4g4TE*,lCDBGs3?MACaUv' );
define( 'SECURE_AUTH_SALT', '4bfQlH-wJp%S#h$Jw>Q=M#,R2}]L|Cdy?iq(W7R7`KxG?Z:]jWS;?G#mXE?~dCZJ' );
define( 'LOGGED_IN_SALT',   '[|:x#Z^U.{Cq8qil0@h+e>|7k^v&JanKJEvCBR|o(QN{_nyoAk:KT#iE^{s5[o6,' );
define( 'NONCE_SALT',       'i03Xn.`z^%y:r?uKz6fQD&``CaxNN2o>xDz> :d15@};Tl#2TKnZU8z=;]zQ|Wv4' );

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
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
