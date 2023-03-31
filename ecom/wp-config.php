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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecom' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '[3_=tA?IN_Mf#mEn`O_=m5@{V9MT,pZH5YMs=XfJ/$IMua_Ms@`==K1i.<cD,w:r' );
define( 'SECURE_AUTH_KEY',  'w7Z0}wza%ffOCG^=a.1Fw9gd);=IDemMNz$ITgpr`gfN%cReh%$h-Z=tNQ;zrR/f' );
define( 'LOGGED_IN_KEY',    'e33S}4_dxIzo{:A}Vo8<N:DK@&Yz}IRVb(OhD;[XcrdO](9go=cM_Rg+oP?^!N9S' );
define( 'NONCE_KEY',        'ju#Y)^u!>j)HQ`hd)^OB.CcOZ,#+_Kw3:KlizUieylECS9_%izk&u}Ictyy~mlUP' );
define( 'AUTH_SALT',        '-g-Aq_PB_Z`I:MpSClL8i4dhI)A1^8#cyRM) AR-]Id0c|~&&R1v{Fj@2coL+@.A' );
define( 'SECURE_AUTH_SALT', 'QSKfcWt,#Wh@Ej%|I8n?g%al0WD4TcDZ)JO0)*XRNb|Sh)K6F?|uX+(^U;7yn1By' );
define( 'LOGGED_IN_SALT',   '5xZkDobYyXLm)dV~:;T[B&`Kf$v^}[8-&5@1lF4G_@v|f?@}d&~@=d+/d5s7Lf3j' );
define( 'NONCE_SALT',       'uT<6F[,l#NMdfK6J%JT_CK/R`3A.Ra.::inhWPWm?f2dTM6(Z!H+5V=oO#W+$l[c' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
