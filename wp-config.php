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
define('DB_NAME', 'ruthbenstead');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'qL2GNPO^vfC70=ytpO2zb3+!+#mS/yt+c(t^kVGbE5R!foja^l_4+0BCrzjeCyx0');
define('SECURE_AUTH_KEY',  'dZVG6uUjdepxrkBg89xLjGxHAD^FVggvGX9xlv+fSo/6moS/hoy+a^n)QTwnpD7/');
define('LOGGED_IN_KEY',    'M6tB3nkt3TX9(4X#^(6k8/dKWq(gFfKYUQxrBIoH5crpAkkbaDJl^/o!9fCLGiUZ');
define('NONCE_KEY',        '!_#Jaa1DSNQ_8z_sJI6Jm3Qhxnjw9OM7i48^4Pm2MJttS4b7QLlg(aKl=5UWe^Jm');
define('AUTH_SALT',        'Tg2R3SQ=HeGYH30r6bpeDLwlQ5((y5OqoYHIFx2w+NbBmWEROL3GXlwYQ9TtQ=wP');
define('SECURE_AUTH_SALT', '^!4FjU3k9M-T9lj_W#WHHjZO!8Ez55_#bnxXo2WaFUSEI+4aR-x7d32(w_d#rCSO');
define('LOGGED_IN_SALT',   'grqunI!_CqVwg6c(LSnPHU#SFqr4BE-42_hzSlVmBTTsrUIG+v5/DBbmYO=_Bl9d');
define('NONCE_SALT',       '5T733FcplEh8gAxvRV+_UKkYcqclMSVfktUGnKi)Je2F5Z1Rv^HIlnXS5fmykRqA');

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
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
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

/**
 *  Change this to true to run multiple blogs on this installation.
 *  Then login as admin and go to Tools -> Network
 */
define('WP_ALLOW_MULTISITE', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/* Destination directory for file streaming */
define('WP_TEMP_DIR', ABSPATH . 'wp-content/');

