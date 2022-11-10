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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/vol11_1/epizy.com/epiz_25973461/htdocs/wp-content/plugins/wp-super-cache/' );
define( 'WP_HOME', 'http://rajshahiraam.epizy.com' );
define( 'WP_SITEURL', 'http://rajshahiraam.epizy.com' );

define( 'DB_NAME', 'epiz_25973461_rjmango' );

/** MySQL database username */
define( 'DB_USER', '*******' );

/** MySQL database password */
define( 'DB_PASSWORD', '*******' );

/** MySQL hostname */
define( 'DB_HOST', '*******' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '-zZEaE}`Z<&eBz]R:h!AZe,:zl$FSo:1m!rpTix ^eO#rYxL4-{)@MVXvz}>XjKB' );
define( 'SECURE_AUTH_KEY',  'r~QBPdgT.N57YH7x(%paaePzAi^&}f02#~r^`SRX}Cy.GMo;|v78I{U~^n]Crr/6' );
define( 'LOGGED_IN_KEY',    'tZbF/qH9+VXa>`Ww?NHZ$KcgcY1&>p_)>WDVX7W#$GNQe6iA&whSG&TKS|xaab<.' );
define( 'NONCE_KEY',        '0HKr>UH4S%go00m}#$dU&Q=y@7[<2{]jHzh-lJ}u7rrCgl^m,>Tfw rJ4y8mDL3H' );
define( 'AUTH_SALT',        'EZ7`m0_8.)f).p,bDuj;Qmx+yMNCOXPmr(9|v+Q%_<NWq:rgS=A:7Z7pic08_HGn' );
define( 'SECURE_AUTH_SALT', 'fAOJkCNu2*iiiw^Mg@{KG+-5TigFVP/&]Xn}Z?mE/1Z}thx/rm@X4pLIK{F8 6UO' );
define( 'LOGGED_IN_SALT',   '9<(qSYJ@Rk$`!7Y`UC(kyEWiLK7H2Mgpal)!<L~-z9Ntj^hC605>:SK.F65EKN|a' );
define( 'NONCE_SALT',       'aw1?X.Kd33D&EOlrAv+UpkJQ59by&f0w]vr7<-jUbdG2i8IQ<kP.R~HV~QScDt?H' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
