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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'shopfifa' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'NXpEJ=x@u+q#Mrwh*P2j:X{G)XT_e?@6|.#+wG3+^DKGqxG-tGnc=TRuE9<!I/-<');
define('SECURE_AUTH_KEY',  'n]=(Ahd`=H;n8R*;H4kNenQkDW>h+a@dpWP7GRYO{K|$cl:`<Q[*x1SPT$v{)?5d');
define('LOGGED_IN_KEY',    'SL|2{I%n5}_56s@+Disfz_VG9p]hd4Db6.f_z,(/-G/P|/N+zE`WF$nP Kr7;gc*');
define('NONCE_KEY',        'qd&tN)i:;Q)J.[~ PA%a{6VtaLu-iG8MHst@$wTlf.GkUPmox0GJ6;[{iU/bg:|;');
define('AUTH_SALT',        '-|J_5NI`^MC#Y/$tRB.jk9b4R6>0G9v)htwv*RfN?TQ!-atyhQV#j3Ie>*>)%=[7');
define('SECURE_AUTH_SALT', 'ut5mv2e0E|2v=u#s7.e>6:%2AT:>+zml2++s/%Ag6N<tVW8@F[/ra7imfS8q>) n');
define('LOGGED_IN_SALT',   'MaX|*u9O~gS}^75o/#fQCg$0Q89c~iv/?^$r#r^F.smW1^BuOoL^+ D+r8k_[Q4 ');
define('NONCE_SALT',       'x$XM*?^5=*3$c/(+!epfAZ@KQN+,gNX>g?(ua9r)aRHFx7%qy|EcbYw~3r.@b:w*');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpstg0_';// = 'wp_';
define('DISALLOW_FILE_EDIT', true);
define( 'AUTOMATIC_UPDATER_DISABLED', true );

define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
