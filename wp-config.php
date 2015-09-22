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
define('DB_NAME', 'ICTICT project');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '>k>I3~~a6Lm*-TfP^5[P=3j0U&9c^prSyl-9pAH)5~$[.j*.n:9)/;1;HPJBs{J9');
define('SECURE_AUTH_KEY',  '_V|ugn?,SYI_[e>ViLZnO#/Fp7;mDs |j!Bbrl)rrvU-6t+MgZ;,#e$;m1gL2m=m');
define('LOGGED_IN_KEY',    'PMjJC):w?gY6/(T4MO3SCWf8#??i4k]GWnj}Nz/|5Svbh%R!M6g#Mx{^kYN|SYx_');
define('NONCE_KEY',        '}iT+I1n)o!A`}_1fr{1cmI0Y>,y N%pzq8XGVh*o^QN{%?I|?KN1nYxW?2-i?M4k');
define('AUTH_SALT',        'dOBKwoT.[Tmu|rRRFToe>9jk+D.~u$%}EioI{10uG3RmRi;kcc2N7|ylX}ICAuC8');
define('SECURE_AUTH_SALT', '--&)O>2BR&CFeR+|!43-w _g<a4vLhLQBTO+wNL<+S,oZQ~j{zH:+SpN$ck9(C-b');
define('LOGGED_IN_SALT',   'l[Iy?9 [j/+pS{!>UQnCRbOT^kJ, D%Qsf$nFhieW|6;Wd+(}5VRrh7 syTd[$Pl');
define('NONCE_SALT',       'G.nE?L:u -ma4+J.HJr4nARiFqsSJZ,a>)>8P#+0~YEpn&8HKYdI|VV+Z.NpiYC=');

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
