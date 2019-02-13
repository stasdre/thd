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
define('DB_NAME', 'thd');

/** MySQL database username */
define('DB_USER', 'homestead');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

/** MySQL hostname */
define('DB_HOST', 'database:3306');
//define('DB_PORT', '3306');
//define('DB_SOCKET', '');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8mb4_unicode_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '1}$+vxJ!t$? K*|S6YW>y{_de!tg21C,`,Rjq7_e{&@he|9[]6W0Rg$RCnlV9ldO');
define('SECURE_AUTH_KEY',  'M=pTuy%M1$x>J-=G&Z>elKHX/UuiOS_E~ oui6O$k1(*H~OTYXW[QVgfJhQ=H#!u');
define('LOGGED_IN_KEY',    '~Ny-R=O=;]K/?BwzK8Pm0tfP%6_wu+Jn:]~~.s;OuUc<!ypLx-V}#Av~~-bzZC`O');
define('NONCE_KEY',        'T7f:L*wTg..]>?R2UDsv2uz`.=f*;=NZl7=34Yh0/cbAw>,LH8N5OO!+2cz|LZ]p');
define('AUTH_SALT',        '%I[!-8:L?[fLHa(p1g8VMrrIc/R)fno66pM-bPO.jdHC+ytB{**;4nUMl3]{z9}K');
define('SECURE_AUTH_SALT', 'm&:+;Xd;$D|,QcnW_+gNJ#zKXsaQ?wss!M_LS|Q%6<HqLjhfYX|~iOEb 7eU,@gL');
define('LOGGED_IN_SALT',   ';f:4U(H[;f5saO6)zjWgl;s6U1L=UnaagaNjQR$[D>H~{3.+vMEHY{5G0;wLc,m0');
define('NONCE_SALT',       'm{JZMl1z,]6=BObw?}C]G/L~1o.Tn+K>Ik4k<7*m|;ku*_Al[&iD/AN I9Os9((0');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
