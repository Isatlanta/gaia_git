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
define( 'DB_NAME', 'isatlanta_dktema10' );

/** Database username */
define( 'DB_USER', 'isatlanta_dktema10' );

/** Database password */
define( 'DB_PASSWORD', 'Chilli12' );

/** Database hostname */
define( 'DB_HOST', 'isatlanta.dk.mysql' );

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
define( 'AUTH_KEY',         '@Spa%zN^#XQkF+77b1^`uE!):lL.7nc[,{V uE<]@H!K_8{1EV3z_W}<8wtIUjZ4' );
define( 'SECURE_AUTH_KEY',  'r]e5AAA[kOo2&Y_Q;fjr2+.b+|uf49}3Nc,[hMLD=~w.Sn!Hl7?r<0OL$ppu+RU;' );
define( 'LOGGED_IN_KEY',    ')VP//we)PTs_MwLT[OjMa.aX{Q.Yay-vvfeaM_mWFcxq^qy%e>=I-H0g#t8jBVji' );
define( 'NONCE_KEY',        '4n|1W5&UZh!Xa<Nlg_)==Q1R;N6$aBHd[84nOJQ&~uFeIUV/+1vWR8*I8XRN0**E' );
define( 'AUTH_SALT',        '&7 (6)ADp2x sj=KX>uBQp7%9qzAH!J$u^Y%:5}KkeQwOIsejtoIHLk?wQOCy24u' );
define( 'SECURE_AUTH_SALT', '*P?_hBh ,m@Ay&CJ(A,bZwsX(kjNK5D(&q@4M|qyt[<k/JPtk7m{t4^u3r/F9T17' );
define( 'LOGGED_IN_SALT',   '*7&kQN_Uv+-NuP!<{@<aY[*WsZ{Va68W<=wn=,vgb4p|SD,tt-z&z(* -tFaq7. ' );
define( 'NONCE_SALT',       'Hd+%8`~Rp?Yd59)yg|QY7Fu#iO1NzWofRDL=iF+aTU8Tiw..Kr*Pm==z`J4aMJ~H' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gaia_wp_';

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
