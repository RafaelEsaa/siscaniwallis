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
define('DB_NAME', 'siscaniwallis');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'zJ&S#8Jy4r0oWpCN+u$|:Y**{X O^X@Bjvjz9`w8KBewEH3cJ0uZ%b^%=`kQn_L|');
define('SECURE_AUTH_KEY',  'WXE}3*atGk,^z]E|p+[?!uKo!JTr+Bds [XEI:6I_!vDZ0[{i<T@$z1}]m+(oV-A');
define('LOGGED_IN_KEY',    'ej4y$hmrB6{Ukj0+.bO$WD@^W.$?p,N*pPN^%zo+k<bQTo1FCnfax3->D?ssi7?#');
define('NONCE_KEY',        '>%^]OA7yP]Rx1^)_gY=)w)RYQt|%Xr}q S>lQu~lyn,JWaG^<Xj~nl8eP/.UI-U}');
define('AUTH_SALT',        'lPkR.owInFHep>E#!%kz}/A9Stu w%_<qsjr.lwsXkAFYmw&^9Js|[*EfgxaRv+;');
define('SECURE_AUTH_SALT', '!$FDcI MDuEuOgUA5gMvj%0:CJG)|?4EGA_@++m3vZddwLAs<9s*|V,;;O(3&wM3');
define('LOGGED_IN_SALT',   'd=5D?1fXD9+cT$yunPX|jRCf:en$qO`PbJK:9_?xC:qU87-U@@9?yDRV0UIuAlZL');
define('NONCE_SALT',       'hS9s `[+DY4;rly)Jf?%{,%MM,QZDDAY EG=>.v1Lxz2xla~>B Li6}fq:<.eo*z');

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
