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
define( 'AUTH_KEY',         '^bXP0h$^3515X K_s&#<fGNf$z=m_,5n6qu7B[oV(T(4lxvy.N[aa5jQmb<CWQ>I' );
define( 'SECURE_AUTH_KEY',  'X3zapH7~-eF^1r[>S!LnMA48-c5jPO$ub!C^1-OxAl9[`^:8(8%S9-`#*)O<LC<w' );
define( 'LOGGED_IN_KEY',    'XzR$[R1KGJbr^-|rjC4B*PrZ(p{JuV`_fN?[vXt`[#iY9P{*YG1F RK~{5c^cXsG' );
define( 'NONCE_KEY',        '^$rp$M_Bt;3ehPV<OWQpMbG#NxUb#Hv86rL+byER:dk Rm8B59<@{nf(WSq;nyC(' );
define( 'AUTH_SALT',        'r >X$,;!IPGj>+uf=CmmZ539Ij3Zci-M5;j5`XVsGK5 ,x:4:v0OrhC0zyC&?6h&' );
define( 'SECURE_AUTH_SALT', 'C}[]$zcA tBiPSx|SCfB&RRES|eHd-]VT|<q4_ZOd,znhNtI)$z,2Zo kWc#AfNH' );
define( 'LOGGED_IN_SALT',   'd?]vl0#![^e![jRy5iVgxw&9,fifw#{c d)5BmXu/#e4_vjAq>J)Y98S[y98RIF!' );
define( 'NONCE_SALT',       ']IB}ex/s]ncv$d|qV,oY}`)0A/z.E&K{>(NVaLmHl,E5xrY$ug<vnku=+nJMzsXN' );

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
