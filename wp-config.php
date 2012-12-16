<?php

define( 'DISALLOW_FILE_EDIT', true );

/**
* The base configurations of the WordPress.
*
* This file has the following configurations: MySQL settings, Table Prefix,
* Secret Keys, WordPress Language, and ABSPATH. You can find more information
* by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Codex page. You can get the MySQL settings from your web host.
*
* This file is used by the wp-config.php creation script during the
* installation. You don't have to use the web site, you can just copy this file
* to "wp-config.php" and fill in the values.
*
* @package WordPress
*/

// ** MySQL settings - You can get this info from your web host ** //

define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME']);
define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME']);

if ( substr($_SERVER['SERVER_NAME'], -3) == 'wip'){
define('DB_NAME', 'wp_whiterabbit');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
} else {
define('DB_NAME', 'fx_whiterabbit');
define('DB_USER', 'fx_whiterabbit');
define('DB_PASSWORD', 'rand0mstuff');
}

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

#define('FTP_CONTENT_DIR', '/var/domain/wordpress/wp-content/');
#define('FTP_PLUGIN_DIR ', '/var/domain/wordpress/wp-content/plugins/');
#define('FTP_PUBKEY', '/home/username/.ssh/id_rsa.pub');
#define('FTP_PRIKEY', '/home/username/.ssh/id_rsa');
if ( substr($_SERVER['SERVER_NAME'], -3) == 'wip'){
define('FS_METHOD', 'direct');

} else {
define('FS_METHOD', 'ftpext');
define('FTP_USER', DB_NAME);
define('FTP_PASS', DB_PASSWORD);
define('FTP_HOST', 'dev.fixel.co.uk');
define('FTP_BASE', '/var/domain/whiterabbitmedia/');
define('FTP_CONTENT_DIR', '/var/domain/whiterabbitmedia/live/wp-content/');
define('FTP_SSL', true);

define('DISALLOW_FILE_MODS',true);
define('DISABLE_WP_CRON', true);
}
/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY',         'O,;raPN[%OfiA&wA]=*g>q95Oe|*6(qs(qH?jhUM|4V+w7w1T`8:VVX$1|/Plo(6');
define('SECURE_AUTH_KEY',  'Hvo+E<>+ o;-Jq9.2]xg9n`-87O;XpMvGfP$#N}p2NiFfsI^f= zgY|h7?]<y@hO');
define('LOGGED_IN_KEY',    'A^Dg/N=wC1k.+V0]fBa-2~uA!K04LFAP7+LL@5`h2J(3pd=-YHZI=B Z2$~QZ,4+');
define('NONCE_KEY',        '-NpJL]TLE0TvqX!fROtiX@/l&|%>h+C @1IgoZXw-rZ@|dti6@}aV2~rIQi3CbdA');
define('AUTH_SALT',        '+D&[Y@[:k&1IHGI?0to(OG,gy%^@a-7.s0AuS@e/LZQr+FglwX8>,7c=9|Dve%r?');
define('SECURE_AUTH_SALT', 'Ro+c|{!G)7)YPckUdFT2MGz=,u+?F6y+3-,{*GKQ@Y%tZ1=!K9]np0P.fNz?;{gF');
define('LOGGED_IN_SALT',   '}BF0hP1G.7M~$VOM=ahcOv^/qH7Kdl>:i9<~hB53wRUA][G/JW1<iu* yo+rL;J3');
define('NONCE_SALT',       '*+&I-:;@pn.`n{,!^-U{lcD,qS<i8=dsK5C*a-&`Mt}@tsUbIa@KtVXp6tJBQi+6');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'wp_';

/**
* WordPress Localized Language, defaults to English.
*
* Change this to localize WordPress.  A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de.mo to wp-content/languages and set WPLANG to 'de' to enable German
* language support.
*/
define ('WPLANG', '');

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/
define('WP_DEBUG', false);
define('WP_MEMORY_LIMIT', '64M');

if ( substr($_SERVER['SERVER_NAME'], -3) != 'wip') {
define('WP_CACHE', true);
}

//define('WP_ALLOW_MULTISITE', true);
/*
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', 'kenro.co.uk' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
*/
//define( 'SUNRISE', 'on' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
