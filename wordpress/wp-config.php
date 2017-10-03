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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'alberto');

/** MySQL database password */
define('DB_PASSWORD', 'sector379');

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
define('AUTH_KEY',         'DkwyvvgGh<G63$t>`ue@LtACn?if6Q2:gA6D;HvX*(FDm^U(CpV6pP%&[Cy<Ry0<');
define('SECURE_AUTH_KEY',  '&<E_i@p10/$ZaJt3*e/Ws;XY3]kKq+Vg.q!Sx][wvh_Z[&dEYB:%G/LSBshxoZ-V');
define('LOGGED_IN_KEY',    '{);<1igTdv`N{`fFjD/V#Mv) C=*ghL~QiFl1nWCex;pfC1H)OVI0BYh5M9?4uk~');
define('NONCE_KEY',        '4qSME3XH0g9g<VVX2F;b~9ROl13/8i7h6U~7Bo8kC-sH)de6pvid->a8QKT-iNGH');
define('AUTH_SALT',        'f]i[/Dc^^x%lBY~E_OMc3tu6rHT*< BHbi7BJv2EWi~SFjzw~;SITd-T99{M/0(D');
define('SECURE_AUTH_SALT', '_TJHuo($$>@IUu=EsYbg+R|SCUaMRv~gGEZp6oy5l|({|h^eIUlv<%Z!gHiyHG@H');
define('LOGGED_IN_SALT',   'BCRq||MJx%gd@RAb-F`M.On=HB82ES*OL@~cMNojn.AOB[NbnOg%@FQ3w4]&-Y0E');
define('NONCE_SALT',       'l4v:l6mQ&7A]h4B?`z [22Sq|;SUS{f+PQ `;vY?;W[v}woGIv[K4uI+jy]eryo ');

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
