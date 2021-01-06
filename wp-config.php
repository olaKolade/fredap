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
define( 'DB_NAME', 'aqua' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '#Y4^4E:D*m`o>86*P>M?$#c<P,5^T7L2N*m}#D[2(]3~d:dt5Juafq 0fN9A;g3|' );
define( 'SECURE_AUTH_KEY',  'I8S=s*o-BLGfw@5:]Lik0TKu910<JuX{sC@IBtpy_)H$hVR=1k j%]wySr<Jle<-' );
define( 'LOGGED_IN_KEY',    '](+GEheY90z9cx+S)n;Tv^Zw>]o/E$JW0@,rm2) <A^s?xVJiu{0j/!}N{EUmR8F' );
define( 'NONCE_KEY',        'ZA@VBD_SJ?[(;mNE7n=^%O*EV82KYGUz_6>]1+xU-uh#(.%?od%on%lT?LmWgv($' );
define( 'AUTH_SALT',        'nE]gRDXSrR=bj0C-KAc/ .hQ$`7:Bhj-szX]H[ir~k=+_g6!y M]LF.PcRsauqp<' );
define( 'SECURE_AUTH_SALT', 'uq[R)&IRTc^x]soDn&&)5w@Nczs<.~UefaJ_O940_@0C:E=oR2q$n2TN1|52bWAd' );
define( 'LOGGED_IN_SALT',   '*OZ7%$Ydb KBD-OWH^sKjQ[V}?>1T>SJeu G-`42X>E&*R$UhVCijCD,rVzYYN#Y' );
define( 'NONCE_SALT',       'blQsGi2;MEw>QBV*zwJVwW[*L}<2QCdxwr=hk52/U=CSoJ9,A^5AI=BuLPZK<[3B' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'aq_';

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
