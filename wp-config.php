<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '#Y=`&nDuUpr.>g+Ba.F#]2V1!rch%f^AT53wR,6W&8{[um.,MG~y~eF5`uzb9 [P' );
define( 'SECURE_AUTH_KEY',   'DpDO72/z<p+U-i$y=v}N$u?07YJU]tc%cgz?1M,3gC2b_cjF<JgLRvJvjx*.QANw' );
define( 'LOGGED_IN_KEY',     'YUEuvu aUJt+jL1RA!dk1.Fp*pKM/poyY4dtD|gu[0N1r [K&7msl(3L2e/;p4dy' );
define( 'NONCE_KEY',         'cgo>7StAD42bL8@Ts}9^C[-RajkDXBu4&GrqsxF*ZORd{mUM-fv)alZ^U{*3J[Qa' );
define( 'AUTH_SALT',         '[<-?W~3S~rzAy=Ck9[D ZvJe(QUo@srs~RT2xGg*A<~y8=ygkGgiGb)+lB~eayH=' );
define( 'SECURE_AUTH_SALT',  '3aq,cT!*(i0sqU]Kv?Z&!7@Fb6w`S}hYu@J%H,i$hLV6vt_4Nj~>jvoB.d*]zGkf' );
define( 'LOGGED_IN_SALT',    'cb (;;N$q))DStVya,QYYOT/E`[%Vp-N801`=UwB){&JOzf{a}Sd?}$2V>3[>PiZ' );
define( 'NONCE_SALT',        ':ZUNg;YGTz]:8xZ;i=BD=j&,*=gJ>nvS>tY06@^fLC[7Cd#.aZ4lb06w%(~eAHw4' );
define( 'WP_CACHE_KEY_SALT', 'Fl/<eEh:3QW*X=?)N;c)uvWj[O{5nj;.`9R@M}$[oAVP,jmyXl%(rT{7Zc(yI,@S' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
