<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'beostan' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+$?:jIvt1BB&Qev_C:bO,p(4:DP9W^&7/na+$3rjgTST>ipO/pYHLq}r^gJfH1f_' );
define( 'SECURE_AUTH_KEY',  '2x98jog-tUd3PV|*g+(I2C/8yJceSfM>v9|0F(x1F1=T=35&_XW%Fd#.]M[G,X?q' );
define( 'LOGGED_IN_KEY',    '7A~BBU-^Gu[UJ/OHbqVyeb>:)F-x/Q!t7pEd}8y;=Y-5Wi{uFC34ttnJ1>QI=aEm' );
define( 'NONCE_KEY',        'iwGs_sgdlMJ .rC5Kj+a3#vMhq}1%%U@rr9yyH[U9wua3sI,P=bY-Jhj7ho*rNf]' );
define( 'AUTH_SALT',        'ZA(Jx]x,Fi%Hf2V:a>:%dt~X?DeeOqz=_TqW/{Nl2xT6LI.|ENFo+$?Q)O5$TY#I' );
define( 'SECURE_AUTH_SALT', 'YMtW($U#4~S %ax$O6B;kWSrlsk)#]f{{1.><DGg6tHgA4K[xfG9m9*HY&x)](39' );
define( 'LOGGED_IN_SALT',   ',Dvdf!1?{3x^U/e+Hh&oO>sdKArOxlN@%T*.tP^7f%$JD+*Rr0:QlyJ?E&hx1:9L' );
define( 'NONCE_SALT',       '=f^7<lDRh0ToNE8<*}f3<eZZWKEVyKWxvB74~>74AcRjfV96 ~WTqH1~_vbgXq=7' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
