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
define( 'DB_NAME', 'huuanh' );

/** MySQL database username */
define( 'DB_USER', 'huuanh' );

/** MySQL database password */
define( 'DB_PASSWORD', '1234' );

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
define( 'AUTH_KEY',         'cx`o3WsF}wJ6&Ew.9?Mh[FQx`+{9%IE#PcR!3*~&rpoHY:tpbi>d[f2y#3^4Aedo' );
define( 'SECURE_AUTH_KEY',  '_Rdq=NYlW|th*rn/M):)n<{E2|sd,@95lGJs:j|[4G w+pz<xnRJ6Hm.{uJdDB$5' );
define( 'LOGGED_IN_KEY',    '5^@W9UWhryJJW[;+*<:bh:X&$J>VXS`8+#9kpkrnZt7d{91))*h4?{6M%WDZl:uJ' );
define( 'NONCE_KEY',        'JD-nt$&<!&VC4d:[6}bO^3)I|CVEE5R^3$@N/iOOrBb6#A4HOP|F]A8m5%%tb{}w' );
define( 'AUTH_SALT',        '<Ef-JPGxgP2.AnXL*x^Nk,je@&sqqNZooV]iL(9cAN5NJ+[NiOx9 4T w4&~8a#v' );
define( 'SECURE_AUTH_SALT', 'u0=_]&~Nn@d!zWgyK/zP;kf~c B(z<,0Ze6F5oYM] U@7P/k.?Gd1>X9QWt^ByAw' );
define( 'LOGGED_IN_SALT',   '~{DP._1kSlu8VT(eXEY$u1o#>ZU!>+?t62 <+ Sr}]p+o%[lZC5};qziZLyO,s]p' );
define( 'NONCE_SALT',       'l:OOU(YCt9NWZH` g%%|Dj3b?wFDw[8%!S)YX*8w4L=Y~rzP:^K/`a^xU&P?W@[!' );

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


