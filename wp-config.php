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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pruebtec' );

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
define( 'AUTH_KEY',         'D6[WeM}$F]1?dJKdD-{z{F`pR3KVx1)=Srs u-+X,S->AoGGN+VV:jiL]q+Z!M@^' );
define( 'SECURE_AUTH_KEY',  ')M_SnH50z:qwl;>1F|rf@FpHw6FQZs}i[C<,>4c^dc;E/J8=<%wlbz2]jDO`^muW' );
define( 'LOGGED_IN_KEY',    '&ife+6c+Q|?wu9=G1rD7Ltan5^bTkuR6K%-k1 5o_=STCp<uqMM CP=]=y)]Y;J[' );
define( 'NONCE_KEY',        ',fpdz}J*AL1Cs ^xVRf{iKh:F]*%H3-mA3|/YJdMPrt;Cy?MOg1+yUC^loKg6F B' );
define( 'AUTH_SALT',        'RT3McXg54o).TkI*UA}^&,A]$gHGkReTA}6>}r >n`6aAc#}$[8sAPSw*$7 0Y?K' );
define( 'SECURE_AUTH_SALT', 'eZ!&/tA|+gso,x3tqxkJxdMkUj#7_L4dw)>>=`u|E}8wM]><)qoI@/H.zL#W]M:R' );
define( 'LOGGED_IN_SALT',   'whPat.Hvx>f?!R]zcQTO4m]Smk/Uj2WkFH4*/kD-oWMW_iL!rEhXr!C_JWt2ON)c' );
define( 'NONCE_SALT',       'u0{|hPC7:!K8Ni N?3Sq^eaUE1S`[b)ft1dbOl*3?FU>VmRA$-T7>)O%gX.PrSj0' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
