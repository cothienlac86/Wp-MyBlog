<?php
/** Enable W3 Total Cache Edge Mode */
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'D:\Xampp\htdocs\wordpress\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache

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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_myblog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8_unicode_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '],1`exO<bH>k7u>e(Yl%T=^j~E.9.+q]%pO0UHqaR =~f<]2a5[brRYBggj-Pid ');
define('SECURE_AUTH_KEY',  'HUuVr.|M&h.6~]v!Dk#]Mc!p=9x3:1%hZk{Pt!SmFNwJGFkzM;@B9<AH5:(a7@X8');
define('LOGGED_IN_KEY',    'tG#&XA?%?5fSQYJDS4|sLkibL*vWO/f`di)Q&$9iG8x,nK[y5YlnK)U6j| BtJL7');
define('NONCE_KEY',        'd>Qmung8pFV!E<4aS(Xd~7OoVjqzB,x+Kl^mOvON03mCiZu`b}qA3a)|~R&p0A)!');
define('AUTH_SALT',        '<I`jzkKmMC_6QOP*@@}Gs1vLA>O<y|<o{?!}p`O@MY52Di_S&n/]iij]qK,PEW(N');
define('SECURE_AUTH_SALT', 'U@A*c|~V2{2oPpd,aV :@ CR3[SaAP^&KZsUIq#>z{:l%1%<k:2Mst| a$j,1f<-');
define('LOGGED_IN_SALT',   'q/#_d1&~KkQ;6v<&`>l4^ j*-6]biA+X/wu?d-ZF2:b+V5dQiYUrx_%!Xlc,}Jal');
define('NONCE_SALT',       'hUno^}a%TA)L/J>oz6/7AQ<$Oy~-iMi{[Z:?WhzMImpoA5XJqpWw{B=<_I|dQb V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
