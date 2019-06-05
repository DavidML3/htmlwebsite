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
define( 'DB_NAME', 'kaddatec_wp512' );

/** MySQL database username */
define( 'DB_USER', 'kaddatec_wp512' );

/** MySQL database password */
define( 'DB_PASSWORD', '13vb]4pSu)' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'dgizhok58lhg8culfer4uk1jmmh27ivepz39utwtivf74iqwsmvbkgdccqls8opm' );
define( 'SECURE_AUTH_KEY',  'eqhfeoys5apjabiub6fyzxezpsjjmydigm66w4acgxyiui8fir71kzjcbilscuqb' );
define( 'LOGGED_IN_KEY',    'xosir9olsgzrrnmxjpxsjdqirnylp3rxxls3mox4qms9zp3ubkmr49vycp9bxlkz' );
define( 'NONCE_KEY',        'chk6dvnspkaz7izvu1kayouri9ktaf3jwhdca4rfcbdklohyj4nu3yznyb1x9hrv' );
define( 'AUTH_SALT',        'bloqmjqqpxc4wkjoyzzworpszgb0mfh1jllv2i8t0ngkwgkybmaoo25fpfklnc61' );
define( 'SECURE_AUTH_SALT', 'r0vjdtmkcr6x2k5kdqoejgoud2v4izylgbv0z3jt6boeqwasghcfuqrunzb8x8w4' );
define( 'LOGGED_IN_SALT',   'bv77bvo0rtnzywo5c78vffsp1aiwqavamsbjenj5jo5fxyj1fieypxjlfmw1vvzu' );
define( 'NONCE_SALT',       'ccgcrnqql1rjp35vrndhsrv9tk2bis2mykkyquai3c7fhfhucys7utvaytfhwskt' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

# Disables all core updates. Added by SiteGround Autoupdate:
define( 'WP_AUTO_UPDATE_CORE', false );



@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system

