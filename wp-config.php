<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sepa-cybertech' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mysql' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** Limit post revisions */
define( 'WP_POST_REVISIONS', 3 );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'evkhbL]{rsYa!=V__iEj%kUs=<Lyx(&wb`hJ_@NyHr/L_3zge<3WK#g*ADFr?F=^' );
define( 'SECURE_AUTH_KEY',  'OgV[sPi`e04xs+/EpH/H$#uU JJx<qaHKyCYn3jqYa$~c&s |ScT[|~33B|W,$ !' );
define( 'LOGGED_IN_KEY',    'QU6|/X)JFOhMo$iFST/im^Jhb<PxFIAiU,MxyrptX!dvnD{oa^.6$*]>V8-EO*lm' );
define( 'NONCE_KEY',        'T+2I2)Z!|WbFxRHdFu<-ZW83Wngr*,x7xsx_eZ6 c?JS)e}.5IlEp0`SNcLz0K=j' );
define( 'AUTH_SALT',        'k/^0g`LH8h)ZQ_nsI!(Xy&X$h#w@phc$!rA-!lGO}P^{)6q`9&Nk2zB>AVR(|3Gq' );
define( 'SECURE_AUTH_SALT', '25juX4<6@{Sq{rsu@A~.L~(7m9?A}m}2qMopsLI+?kA@`(%FJ5:y[gYHK0<k~1IY' );
define( 'LOGGED_IN_SALT',   'z}=jxc9dF0rqxs<5M]!f3vk&iq$EC<//8YUPHSb-$Ar&AFh0ES|!@&|Djl1 OEhD' );
define( 'NONCE_SALT',       '6;cxVFYY%n(@tfO?W,mIA7a2-XN)wy*S`05ipO_pBGUxyokeSU] $|fz:tp/rnaD' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';