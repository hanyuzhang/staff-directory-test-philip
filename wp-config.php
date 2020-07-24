<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
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
define('DB_NAME', 'staffdirectory');

/** MySQL database username */
define('DB_USER', 'philip');

/** MySQL database password */
define('DB_PASSWORD', 'qa6G7lC#L5');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY',         'DTNJVu0jsgih2ZjfD3B0f*5v4SQTMB30C900m0g9tZmQ*RC(1XVD0e&06BkTqDST');
define('SECURE_AUTH_KEY',  'q9I44BaH*xxhe*G@!mEgP(F3M@EIqp3#&XbXX#f2AN*KkQ%f^C3(a*upndY0Vpot');
define('LOGGED_IN_KEY',    'JRk1Yjioaq7O*UaksyCnW737OFLa08dp6QZHWLhTZ39Kc(&1pqigMCj)dZ(*s3ax');
define('NONCE_KEY',        'OEgx6b3V%lrhSDaiEqLm^zEu&N7FNhq)eQlaXIHdioO@AZDP!%7@YjV7POVl68)^');
define('AUTH_SALT',        'XqvFZ8uoEBv%bhr3eu6vkOq2Ag)Zh&BSEJQAGEHschq@qQeQIggi93kj!!!cHU7f');
define('SECURE_AUTH_SALT', 'x2SCf5Qru5z*vKv(y)4&8xIe(RX#vng4dzcbjRCYX3fpqhZ5fhs@Xt1Icz&s!&u(');
define('LOGGED_IN_SALT',   'Em%z&#hSrN7DB@vwRS4reH3QfrKmO!C)cTRZYI0QpxPdDr1M7wx9zso%sYkoOdfe');
define('NONCE_SALT',       ')*HXJKj#wGwA876wkTqkFFX274JGfEkAVLMksd#79tyK*6F#1qLG68k72uh81W#l');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Zq9XM6E987_';

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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
