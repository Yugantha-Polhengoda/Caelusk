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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'q*P(Bj^`,XYe!$>*1(my q5<ftl-HbNR_RTM^0dZl0SYGJo]Pt%xej},%%=5uaj(' );
define( 'SECURE_AUTH_KEY',  'G6x4eOvu}D[{?+,DCDa<LD=byveuaYI3xvv4q/{~M6$(,l9JV#7&V=3$*j#)VK#K' );
define( 'LOGGED_IN_KEY',    '5xhv3zudVl/mxHA,B15]Og V7Bf)ogGtjzDpikbp=uwx3u(yX,{bP_{QwtsgECgX' );
define( 'NONCE_KEY',        '>$Nh?O[4MGf+-RcV#uJC!sEU;6CBIdlRj$hJNM?RV#hWpN$]%s%kjEws}waDK<i ' );
define( 'AUTH_SALT',        ' -x/g^|Dcj(,u~k`1EdDMHQYStim%&E3uS:n67=Wp9?{RM4;i/V1UG]^a90.V^Y=' );
define( 'SECURE_AUTH_SALT', 'F@]Yk(MDjgoJNSVH (5GAC/O[ZxZ0U&l<3q;u;/]<tqwJ=*CLkl{l*5Qec[,B/i%' );
define( 'LOGGED_IN_SALT',   ')AjC$=4I;N@[ sTyDI8VR:2$@?3S/JSrSiA*EIBryE)pL2o07w0MGBf3<^BRr<P?' );
define( 'NONCE_SALT',       '~-Q~$18&(Dq|lEo2CxZf:_g+RVCfpWV#%k:7h.&=yX&``gr5/?K*97rN;-8*;WI=' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
