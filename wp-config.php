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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'serverfo_cred' );

/** Database username */
define( 'DB_USER', 'serverfo_cred' );

/** Database password */
define( 'DB_PASSWORD', 'pJ0XA(S7(2' );

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
define( 'AUTH_KEY',         'fici7gjrysmwrdo5jspob1d3dsnaxhn6au7d9hprke3gdx8kgfmjklhpgidi9b8l' );
define( 'SECURE_AUTH_KEY',  '5mk3sg7talea9czu3zwwuauqn1vviqwnkrbbedvxk0gytsytpfcrtxyfcoaktqvn' );
define( 'LOGGED_IN_KEY',    'st2b6nq0u0k9vxa84epknexxyeghrcfwnt08mwydnxvolmis5vlwg7klbdpfrkdo' );
define( 'NONCE_KEY',        'bm5jgecupbqsotvocnborn5gup8hx61qa49op2dlttd3hqjxsujbungbu2ahtqha' );
define( 'AUTH_SALT',        'ztvhl1cth6byqalkbw49mcaebgjmjq7r8xog9gt9hfmenx30hvm3dl8lcdfriccr' );
define( 'SECURE_AUTH_SALT', '9ida6ne2m2lq3h4kbc51temvczmoxwj8hksk8axri80fwdmploidmhmq2t2ovtxu' );
define( 'LOGGED_IN_SALT',   'n0ucsmyhemiihxh1qotbaokjhn8cdc1d4bn9qde3fx4o0691cgtmhr48tizxoxkk' );
define( 'NONCE_SALT',       'ijjgrxg0kdi7wfthqz5xbowz1wgib9dtryjsxvqbe3fyz5hmcbw1v0qhko76il9m' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpfl_';

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
define( 'WP_DEBUG', true );



define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
