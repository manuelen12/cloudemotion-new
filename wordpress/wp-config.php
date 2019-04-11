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
define('DB_USER', 'newadmin');

/** MySQL database password */
define('DB_PASSWORD', 'pr0c3dur3');

/** MySQL hostname */
define('DB_HOST', 'cloudemotion.com.ve');

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
define('AUTH_KEY',         'r[PHE1pf*!m6uI)gNO^_]57OYb&z-.bClx}~?MGgr-KZk;2CC6BTd:rH-p`8h.~1');
define('SECURE_AUTH_KEY',  '+2;39<D-kzGc*(3lR8STm=f6hhKiXI+eV]q`;oj$@ZanEcol<4%W|`{Zg=3J!Tir');
define('LOGGED_IN_KEY',    'mm$npG&|iq3h05H+k,DnD!UV^!v# /:IHIMIehers;g]a:/88no8nF`4XLw Yuo6');
define('NONCE_KEY',        'vK}1b0xsHB8+4Xc_VG 55Fbr7qa&Z^X2:g1g??$q-Im<4B:[kDZLnyY<RA[#%N)a');
define('AUTH_SALT',        ')Uv!hH&`#$369~P9CJ5BAt;YWE<}%wiN^EaUppM-(GY/aA19s`5Eutx~4t2~b]J2');
define('SECURE_AUTH_SALT', 'X7FHM@SlRd1h[dn{D@n5*@xKd}]A>|B@-U0^5#yXGQj51AJ&A[obXid>E80O}&pK');
define('LOGGED_IN_SALT',   '?6*0_{G@9aU?Ki`8CLJ;E>2 s0MP%jynvyMW/DD$.8){4Ri_K#tCSFx!J!lKY08,');
define('NONCE_SALT',       '&Hd&<;/ttTk)v3C&;EvR`y6}Rez#nNCL|3daOyi[$#!htKj3CuD^V)bt/nNh[sTz');

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

