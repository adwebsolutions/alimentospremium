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
define('DB_NAME', 'desarr14_alimentosp');

/** MySQL database username */
define('DB_USER', 'desarr14');

/** MySQL database password */
define('DB_PASSWORD', 'A478MZqrS!0');

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
define('AUTH_KEY',         'w_>Z?o-`bT5AZED t50p/8%g=[[R#ld:7{Q:b>*p]oxY3ER?DA,t37R5?kL6R5V)');
define('SECURE_AUTH_KEY',  '&5}U.qNbO`/7h2j$Lthm_0rE+nBZ]66Uyr9Ho[,U|t[w1Gz|{*}&ctNge=qNDnVS');
define('LOGGED_IN_KEY',    'O.2qDqt2VZjQ!X~9.M|NK!Qc{Jbab2O$IY(3I[YzyHy]<.#/uI MX%=iU@&RNL<a');
define('NONCE_KEY',        'rKNc7_Z~4H8+b4 *KZ4pK[}7Z>A^A&&K2&i6wgXj;H%J#sa7J^Tq+&O&frTUFI:Z');
define('AUTH_SALT',        'v.aas_r*=fZ{Bv!lL^8H*pd,?ENK8x(Cyfds^~dh(w*;R<QV@/b64If5r/WmHPbb');
define('SECURE_AUTH_SALT', 'r-#SIc=O;OnNmST%iA3)~<F^Ri-*41l/g3s]IEX?AvS4~0z_Pt;%vtf._e*@,4K=');
define('LOGGED_IN_SALT',   'x|ttp+*x4_aIhlr.ipE*UBfDeLnE^E2uQyQpo1?=ltvZAC*A8KC%QT#Myq33KM!K');
define('NONCE_SALT',       'g2ZhIw=A)|y JdCnzU| okWr*w*uJN)W{1C%:wq@2q>[AsFYTvg3JwI>-.XW_ <I');

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
