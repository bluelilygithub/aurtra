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
define('DB_NAME', 'aurtra_tables');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'S Q79 t7<}-Pb5yqO:]ryiI7Y4K]7@6,FH<B=_&v)86<#1~PvN1$DhOUn]S:Xlk`');
define('SECURE_AUTH_KEY',  '*~mQcD]h`;]%i,}W2#u7N{Ar~aMn9z/QF lzdE2 #x;~`Y_i:2jwlomnO&-7[b5W');
define('LOGGED_IN_KEY',    '8qW5XD8BPSz=KC/nlGe5z*do5BCj/y P&lfQ{dJSKl%X[k|wf>,$Eo;pH;T{2K4u');
define('NONCE_KEY',        '$&!tgz44[4)_1A<Y?^{|>wC$RQHv$K(P+:V`fV.T8>wy:YLfsW6<xR~gt5Q387pn');
define('AUTH_SALT',        '_QF?nN0?SmjT.oEuU7:VzFdo[8!L^Wf<DOeCKIG2]Tg&a%UF62xU/ih$?N_=&n1*');
define('SECURE_AUTH_SALT', 'wVqPEMspA+}}g!Mn%.~qPJKd.!OR!m|fvk:*! ^p/NtLn?P8M-YwJ(Xl^AlCpPL0');
define('LOGGED_IN_SALT',   'P&;}R(v;?t^_AV<am<JKe+6$2v;v@OFK(lLzdxD #tJ9^O-=bu?G;C(}_DNG;qg^');
define('NONCE_SALT',       'z&j=f-%~k!XzFM(dY+&v@zq1{Ql Qfj V1ZXl:pEPi#.a3#H%$}I[zchXzPl+23_');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ar_';

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
