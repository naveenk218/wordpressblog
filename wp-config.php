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
define('DB_NAME', 'sivaji');

/** MySQL database username */
define('DB_USER', 'homestead');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

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
define('AUTH_KEY',         'u7P$^}=<@.fgogj)/H2YmjK20T/f@Pck+l1MGZ!D:`PR[l?o2^. W6m U[QqtF;A');
define('SECURE_AUTH_KEY',  '_c(7#NHA-|K8#&jl*u&SA>#GxHs_]))IjK%[g1(m<6zWfIU{XGL!:WqXU/08qz*T');
define('LOGGED_IN_KEY',    'R[yf0I||v%?6OL9WM#|PbbQAm8I=J(Kn+d/bwo&y-OF!+X98ULZ{s{&tfa}7c0i.');
define('NONCE_KEY',        '(Fn{WcL8.oc3KNVw]qefH=B~TgbsL$2A.IwaSX/cl2%AU#<CSsye4V~5;q7m0M.:');
define('AUTH_SALT',        'n`aM6QbDtK/tWAx$0lLbz{a58.#*=]05Ve?ef-ImpwIdGie6C-H9xx<.2GXRW`qW');
define('SECURE_AUTH_SALT', '}M&Bs%{vJz$]XdYW.hJV!52`,5Q^!}2<s&v_vgZ}shung0v4Wy~Q;X20:CEliN(p');
define('LOGGED_IN_SALT',   'V]g./E%Lw8|&<F-$9[~]Kc(ip?}|oJ_O?pqJ`w(6f! Z,/u!~63DFUqgN*P6`ArG');
define('NONCE_SALT',       '[ByuJ=z Odt@ZR~-Z!xn,xm9,]8IO8iKhG;ZsDgP0U`S:>Vsst^tH42tM?xglE1d');

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
