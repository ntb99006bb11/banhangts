<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'banhangts' );

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
define( 'AUTH_KEY',         '+>BTiD*HL=NOtcPcK3@gHLS22u1I)XauJl+7nX@c5FRVZNE#+5O:>/xf?  AI{@g' );
define( 'SECURE_AUTH_KEY',  '=-NBjx:X 5wMeis]6Hk4hTPiLxniG)$}e(K$,fuzbipygqhM<v)$V];tE8a1%m)(' );
define( 'LOGGED_IN_KEY',    'sh?|v_S5U!mBv.i0iN~c2m-^1nV[wHX3uPfcf:/F/by3}seI&zrq]k=:{`Xux&T;' );
define( 'NONCE_KEY',        '_Myqs&5VGyT:~kb~J&!?kcf(2h}cUqty5&|qTthBdS@aIt7b uNzcYu|b[;f(:m.' );
define( 'AUTH_SALT',        'FmN7HP b-20Npql~Ju$O{j$2 [ =c4+Q:yfo9T (gITa|b),4-0a4#0c]cgJgoqW' );
define( 'SECURE_AUTH_SALT', 'kJ9PXo+2CDQ}jt/3G9{fr)e Gj`%DOYXL}vb wM/!w2efbC(@v/N9R&Zx5`IqnS`' );
define( 'LOGGED_IN_SALT',   '+TJ`AfOcuXW5Pd&Im/n}=c3WF^`T7$_hhf~h-&:pfd]^Q@8o?d)4.pYL}sD9_%uM' );
define( 'NONCE_SALT',       '+Vm,5Ff-81MjB%2$f;1(`mOiL9chDUhEtSANLL]doFdvQElNDezz:yf]&XV>h${o' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bhts';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
