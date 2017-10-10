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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cloud');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'EKUZXp0qJy$da?zAm,Y--MR>yY?K~(JuiU-~^Gqtst9*z;nMd&O&+/5~R|vt0 E;');
define('SECURE_AUTH_KEY',  '2c%aze^`(/M1V`nN3e}E)#.S.uMj?d7Z*fkuu}!1}.63m;Uw65B0OpVSx[$=q6|x');
define('LOGGED_IN_KEY',    '^WAk8qhS!NeegyJMV)w4UW%O%-FzUd#eGp7C=WX+wrJ]k|nw!Qw/x}FRbfh(+b5z');
define('NONCE_KEY',        'Sh4q[Ps]+Ys>u[&b7:%vC;<)m(E)!EwhP7j)/r$K@dA{VnL#OX~2.w9XvAO2[eBk');
define('AUTH_SALT',        '@j/5tA>H>s<LqTPj8-TM_K-tCZ^aaH@(4+O?x{+<N1QYw=lE[U=Z$VZz>+4BvP>1');
define('SECURE_AUTH_SALT', '5yMPKfgGZAH}]i) ]q%v}q[^%SLf+w|@gI<lg]`%}o:GM$%xY;BBdyv%ERmiSpSH');
define('LOGGED_IN_SALT',   '! =@3n]R5>gAd3UOsWAhx,cl|/I`&IAe36*ra:9k8c$g.f}ygi,,o-K]pDy={kyX');
define('NONCE_SALT',       '{5g(h_Kj.%?5y8pSsfF&tO6okiw;+?o4Rf}5X#~?B0y/dJ%LC=>S.Av.5/+%@)&(');

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
