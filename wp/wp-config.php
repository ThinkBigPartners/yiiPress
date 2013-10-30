<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'roverrain');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'abc');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Z-tNLXY)}fF9I*e9G#`[X@QagfcdU#7zp,8+:Yv}YnhAf#iThtI/[: [0r#nD~i|');
define('SECURE_AUTH_KEY',  '^L)+Wld65o c|AY{&cQZvx@,Q(>|p)}Ih)gRH`a_ODB&<r~Xj`~z6MxA%NNz[lT1');
define('LOGGED_IN_KEY',    ':{L@_vWiQ-v@&3F?j]MLFcjk]!&+%.MDi ,!E25]&6JiPJc d| f5]wLbr<`lDBB');
define('NONCE_KEY',        '|0f-P%xL7g[BmXDF8UZ+-@-4-CU7scG6^GxZ[ ;R=[`UJ+h&FLj1sGmL[%!cJe/r');
define('AUTH_SALT',        'Dpv|%!t&g;mjYwJ44E+1T~)}lkX[fM%H|pZ1_cmX`O9|n7h7VO0R6hp+l~YXXhSn');
define('SECURE_AUTH_SALT', 'QQgd|C8w&rEv:+/ms`1|{w|}n:4kS@2c%o63H-fOM>Hk|)/>M_9VJ]Fa+@Sb9Me:');
define('LOGGED_IN_SALT',   'ES-8+qYkc4[bP1xDQSkFV;/u~*z|N|6LC<VmND$zTsZ<:*=,WLyKu3mT8,D[P=kN');
define('NONCE_SALT',       's {C/gnbl@>:|Z1):+TNtH;qD8br+en6k]Kri+@`.cW~0W@:ejS|%!(1)#*WIOJ/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
