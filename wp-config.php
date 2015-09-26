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
define('DB_NAME', 'ICTICT');

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
define('AUTH_KEY',         '3>`u&UR~E3M(_V&7qt9pob=I9YE9S3|ze|_|FUotJsr/&}=V04YAQKIx!s_[`T3n');
define('SECURE_AUTH_KEY',  '757 )*-X7g!y?Aa&d+t(]_e#fs>6,Dw|Bh{iy9oe2q&yB|>|%zT-B R2UMY-T3BB');
define('LOGGED_IN_KEY',    'JjW?C;Z[;Ra^&++iNxYS)<.FO)sAnnix_M%_!skOE;@36lC#fLoUc_qrB5olM_tP');
define('NONCE_KEY',        'Quh U,!5&4/BaUgGP@6 -H2M+:_ =[~7O)&w_Vb$5<-I.0A,1;4bJv#Ii7+3dX]S');
define('AUTH_SALT',        'CrW3IK(GDGd3G_Jwg x1)Az93}+:61i{toHA,1uU/+?#?/;8y-uEcZa5-QxcRz>O');
define('SECURE_AUTH_SALT', ';F^#2;!i0P3b)%0.>:UgoapslehK+hQ=o0i#*2Rv4!Og;orB=ZbA+$2o=V}}<Spg');
define('LOGGED_IN_SALT',   '-sE+4-<R/)0OR7]Vk+i/ok*Hke^yJzdiyDxZuEV| #.Q NevPN/Z]|NdA}XO#HpJ');
define('NONCE_SALT',       'rGHWK0bIB^t9n[>Pm;IXw~4@$t4eM51pFp%/pJj2D(J&J5by`ut65&kvS%R=+2cb');

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
