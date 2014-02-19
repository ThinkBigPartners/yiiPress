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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'M?R<6-ts?V$[> a5~H?a[n|NwAYv_P?~3xn+US|J[ovznv%}(%i2$,%XgsGxo,=T');
define('SECURE_AUTH_KEY',  '[77;-6l|wnMVK(y}64?W|$YdCKKIH!swTD:)Sme.#S7u,+ivPElo^pi-j]g3W0QQ');
define('LOGGED_IN_KEY',    '80ALemOf@]n~hA~G-,@/O`k9(GUxF!8Vv$X33<+Qf4TCEGP[w6<]pb8>Vz*_[^Kt');
define('NONCE_KEY',        '7Li_+CJ4YPoDKO/K EY4Cf1$DR|+M:GXs9?!b%vzx~P9|}s8jFhuH?-El0HXWH6}');
define('AUTH_SALT',        '>%i_0V&W5zOx.h{v|h{rj4jmdKp;p9EvtwPosK~|z5}-Z|svVjNM3^T*TVE8cy|F');
define('SECURE_AUTH_SALT', 'c.4VuSC4$I~A_a23,Td~r{}^2|+;|=W)W{#1tw:Pj&!FHS7{uTA:_mG6QtD{@|M)');
define('LOGGED_IN_SALT',   '6LQ<.A=j$5vFMK+T>.=*Z93/.rN#!g1Z~EDg<CM]l);7J9ri7/@3TN:1?+C#G4;X');
define('NONCE_SALT',       'a3~9Z71|-`5|M<Y*^~(+rs6OGww99s5S`?+3aRsd$Hm0/#Q-H.:B+$,Cw1<m#b-f');

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
