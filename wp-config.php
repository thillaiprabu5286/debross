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
define('DB_NAME', 'debross-db');

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
define('AUTH_KEY',         '[?FZ~zKE86!f~{v9_TuLbXg*f.[=zXKLoT]~Hc7E~eF2Q7uyf[?c#=qeE.*C9NAu');
define('SECURE_AUTH_KEY',  'P|eUYs>0FU|pTXv[v1rlGHALfQZqy=Lz-&oqu:bJ7a|-6QBPdXYvcG]V#hypv^Bx');
define('LOGGED_IN_KEY',    'K|pOTTe[/;Y3jQ5s-A9O7rOq~vjudiUbb_Bm=9{V#%;lqqT0hOd=-|o S |-Dacf');
define('NONCE_KEY',        'tXxi0Y,b&5a))gc^^?kDe 3!6YO.:@pXFoc_HW!.AjTqaVe~A$G{$*spM@?+hSBp');
define('AUTH_SALT',        '|w2%D{}gW:2+^t|TH:Vahvcu:-2B(u&A,RJxz]0GI.h`k4iX]vK(Hh4}~kZmIV=W');
define('SECURE_AUTH_SALT', '!X+cOD1g@lFu`Bw,_[?zq=O<t&.EP@{?}xOP+-Hhn4gS6G2MR+vn,|b%b/(0r},[');
define('LOGGED_IN_SALT',   '07Ub]TdO3lsD4i{&E58wm%-</4wC}QWXHeK2rn<s=a; Z /sC#W5L]Cg K(8c<`F');
define('NONCE_SALT',       '3LwKp^,$6?N.bLCpnz>ic?}kYWf^HkvW4VQ6U@[D8xXk+,gbSP:AvK{xkY)_-c87');

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
