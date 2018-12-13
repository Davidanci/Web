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
define('DB_NAME', 'wp_c69a911ca9c220ca');

/** MySQL database username */
define('DB_USER', 'wp-c69a911ca9c22');

/** MySQL database password */
define('DB_PASSWORD', 'hCUZpHhK');

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

define('AUTH_KEY',		'Be4h1tUxOKush9gkbD*qKScLK77AG&qm!#*6rg&gRww#vUJbW%@n7!zLuV7BU@@@');
define('SECURE_AUTH_KEY',	'jd$ailwayzDN2#^xLnw2#o$XsQDWWKSpGmdoEZKVXYO8UsigQ#&7p8orwq#7tj8m');
define('LOGGED_IN_KEY',		'o9w5df40L#JuGqX&3cAJIlG$$vOGQzaadwr2w376CSR!I1vyf&fPVCHRxpPB5vA@');
define('NONCE_KEY',		'z2BKZUOQqTlRG4zDg8rFyxRY9uX!4ydd!yBwaSz%M*H&W4zX&IJYYoqPoiht!72C');
define('AUTH_SALT',		'nQI9jF(AUpOuqtpYTpjo0VBXXY!NUw4YVAZB7AeMC9Qs2tbdQGD5c!*#MUTE8X0y');
define('SECURE_AUTH_SALT',	'yOG0aLj9@n8kB&6M7jJSaYlwoh6yy^AB*cWtJvAvX7Gobc5@A4p&LgmAQ7r%e5xI');
define('LOGGED_IN_SALT',	'oBNTaF@AfbY5^qLA&2LX^xEOIggGn@*a#k7ntrJj3Mo763JcC3(y08ftUFwUm8^@');
define('NONCE_SALT',		'PMIOpvzLWtwW5%&$(XYVtRXozJJSifd7c0hZUE8TiP1Iru!2O7A#FjXgJUbj!qWr');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

define('WPLANG', 'es_ES');

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
