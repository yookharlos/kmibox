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
define('DB_NAME', 'kmimos.box');

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
define('AUTH_KEY', 'NA>4&3I4nF{jyHSbt:9C]AVC#JLb3PYuL?H]V+NCX/}TW&98zw%uLIrq(lu$73@o');
define('SECURE_AUTH_KEY', '!+2h;qqxs0uva.X{Y^>K4+jY1d79v[1X{#&`D;1^lv/VVAP=o|$ZXy,o__c)q3d&');
define('LOGGED_IN_KEY', ')0hyi>g5f`kau5mq-. vIrO&&K0Qh%Q#l[1Mg;C<6.a}&AG27mBDCBMI Xc6I[F[');
define('NONCE_KEY', '@cD3q{g`4Lt.:.fTyU=t6h%45b&P8>l|-g0mwm&aJ#6M?WHGWrb3>I]ny=XqLVz+');
define('AUTH_SALT', '>+^j,=GK:;qOJ!fKbpw#UeS $80BX@?aG/Q]%ao,hAV,Gy_!ia^jcq0R1:*62.Sm');
define('SECURE_AUTH_SALT', '!^[*Hk<~#w2Zdsq{u0OV^x<PxochQzX4s%a0MO8%8 O_8*5N<>tQ%hv)LnY&g]B7');
define('LOGGED_IN_SALT', 'qG7J;~(L4!jmk@MgF#WZr~~XH]@3!_jb[Mz/2 -2KxMuNHP~C|p,J?el%c8%c=He');
define('NONCE_SALT', 'QveUdJCXvH%.6Xoytlg{d1.N060s2R[@ez;>Sd/((8Pxa^[5HS w9q.IgX4>B${c');
// define('AUTH_KEY',         'k4~c6@`{E@.~3n(Z><Yb)>-<N*rZPV%8{K^{z.W(rpYUSAA^FB1,7ohw+h:sM= 1');
// define('SECURE_AUTH_KEY',  'vqkL>l#nM|F{G4qgzi#ig%LIr,kvlQmvH<EEy8.W}.F~%vTX]=f ,gq<e^Se (WU');
// define('LOGGED_IN_KEY',    'Trr{j]OF#nUQERz18]aIp&I8hg.m/@cbvQu14<NLnC`[A<Ok8=H|)<rH*%=fDkj_');
// define('NONCE_KEY',        'sj_zblvv>vhvSC!+tI#gyR9(b&REAWf,tS)e_!.9V&rOPzwHI_#u2)3TFjw:hEh0');
// define('AUTH_SALT',        '8%tflk+#h^qR0o@%5xS1 aa]izuJHAf1t4yDv,X21}^aR3+NLzwR)J>jlhJX`%W!');
// define('SECURE_AUTH_SALT', 'M-[Cv!X5TSf%yZeI#QQtKc@R7_m ZqHq%?cVMJyd7Q8iPVlT3)H`X16HtGXue|Ym');
// define('LOGGED_IN_SALT',   'MqVH>2,(LP-;sOFGlbW~#X[PYxDV]M=.u03[E9F>(SMRs(2M8$~TN0_DhC19,d3A');
// define('NONCE_SALT',       '@;*.zko%#tbDcu%5_&EE=m7xV)zkRPWESSUoU|..HIR7_>YG<]GiJNw~u?x^P<1(');

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
