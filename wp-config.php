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
define('DB_NAME', 'cloudemotion');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'sector379.aA');

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
define('AUTH_KEY',         '.6**K<MPB9[MBT[@<^E$Ad|R3D+XxI9RT0phP&&T8 vz lOB1/3:Ro5YgfnLX89T');
define('SECURE_AUTH_KEY',  '8SxIj:=`9%1`:Ze ACXWxtT)J?YwIhy6D*>euwN%fssmZWZ6iH<`{> H6]_@C,NS');
define('LOGGED_IN_KEY',    'y%,ke&Dn<*)]jKXS$({Tb% k5essG~p`y|ZG;>}BqUT_2,2pymc1}3[Pr tP.~36');
define('NONCE_KEY',        'BKp^u6NHDQG2sE4>-Btgvu3f{h^inwQm`EdWnnXw2PeH`pgxhU2VB1B(9g]fv6_y');
define('AUTH_SALT',        '+k0?_0R(@@)&I/H)s6QTnA2uZ`e<(PGFvLO=#n!qaDyyM:e9B?*,=0k&V~ne]&[.');
define('SECURE_AUTH_SALT', '&GcxNQcR}EC<O;IiGK5da-h|s%1./^&UlAg#gK@7&+q-.C?YJhmbtV[K_N2kU(q;');
define('LOGGED_IN_SALT',   ' /M %|m!/SiLxE6r:ciySOi}VBoFpY:[+zdNKIU#TMcykxHb63W`z_nQt:+HN TX');
define('NONCE_SALT',       'F8uy1}>Yooh9]v]>GcQN2bW+E9okD2UsNO&@gt!c0OcyS_Q5h@Rv6R8@xUXi$vC6');
define('FTP_BASE', '/var/www/html/cloudemotion/wordpress/');
define('FTP_CONTENT_DIR', '/var/www/html/cloudemotion/wordpress/wp-content/');
define('FTP_USER', 'ftp_cloud');
define('FTP_PASS', 'sector379');
define('FTP_HOST', '190.38.63.129');
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

