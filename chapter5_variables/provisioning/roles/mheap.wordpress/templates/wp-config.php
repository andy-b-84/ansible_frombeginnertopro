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
define('DB_NAME', '{{database_name}}');

/** MySQL database username */
define('DB_USER', '{{database_user}}');

/** MySQL database password */
define('DB_PASSWORD', '{{database_password}}');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'L+3HD=(Q7rR@i[QHb}ky3VQn>`;XkrG7e.ZZMS}i&`la,u%32<:&d5t(/yqMRpc{');
define('SECURE_AUTH_KEY',  'kq^{`V{[u/HL3C%8R/-M9pI0[uw[L2Ir,__s/!a(.%.%mq=QXdf}>2Ih1v~^,EPm');
define('LOGGED_IN_KEY',    'Xp1Qlia&F~o~3It|;aOqM[3g.oj=OS>-yKXqw&Y)/gFptTl5fEY!m3E(QR4NxD]+');
define('NONCE_KEY',        '%ESg]*on,}=MIdLG.l,(S#VG(mIbp&Qa=l+X &#Il,<8$jAn_uhj39-{aUWmyAA3');
define('AUTH_SALT',        'y,$5/ii:8)_F}r9wtz-gI(JoR4}L@r,KfWU^hS~!6EnMmw1Y0!4%+^?ecmcE5uT|');
define('SECURE_AUTH_SALT', ')-OHg(Y&V?~Z6!s td&{t4fzTSEF]:C}|FLY&BV{5IM&v7dMu[,A32_g9t|NK4 x');
define('LOGGED_IN_SALT',   're+LwE>9vcT%S+&D#%ew`b1zcF<&3j,0E Sy,6k+93gMU;A,^kTo?ixe.#MdSq<;');
define('NONCE_SALT',       'WU|-_sB<pU=aW/0,S@<2+XAy#IzoL4EvHy7RqkVK[|S0p{Wr;OYvuW~TCDt~? ]X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
