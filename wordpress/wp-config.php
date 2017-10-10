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
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '12111201');

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
define('AUTH_KEY',         '1[t]/[kT3w)A}dlH-(Ejiu*_S+NjSO5,{=P<32= ,I=mg[:ulYAC5xm39| 13FL[');
define('SECURE_AUTH_KEY',  'Kij)o/HO9o^1ITl~h]Vudic|4.E3PYrOb# x(D*Mp@6v8tu5iK~di(}x,DL6G8XY');
define('LOGGED_IN_KEY',    'K7N:[K^:]Qznpi5i/B}i1B7=X~0^Df$aq%?urA/fV%auoc4_}Th*IqsOR#[*<.,&');
define('NONCE_KEY',        '5 ]QtrlhX,{y3,Th!Io)wmblB;]54UI)]bqf^A3oP(:WG)bP0wRe}[h(jI(8)K?6');
define('AUTH_SALT',        'w#M_vw&-Y2:]IcMWiIIeQ=sMdbIw/T^mIYLw>We8LPmQb`Xjj+jy%J6BTq>-*SrE');
define('SECURE_AUTH_SALT', 'gsvOW-Pn;aR&mee-VBV,aHOaZ& :!Y=4W*lszsb&*,HB3Uuc(ZM|W.6)g#QW>@_Q');
define('LOGGED_IN_SALT',   '{W_3MUdIy+kh ZTnWmF{Sikv&6f~hb:]kW;@Ou2q>f(.`JG6{?_}t]Zk`U{fdXH_');
define('NONCE_SALT',       'G4! ~7NpH[ljX$GL9v2vi@iW4lc ^W6es*} W&. ~XHX/;hzlR7ue!Lgn%k4t-Bk');

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
