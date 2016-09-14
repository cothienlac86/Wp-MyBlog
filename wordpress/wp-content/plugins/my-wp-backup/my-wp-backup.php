<?php
namespace MyWPBackup;

use MyWPBackup\Admin\Admin;
use MyWPBackup\Admin\Backup;
use MyWPBackup\Admin\Job;

if ( ! defined( 'ABSPATH' ) ) { die; }

class MyWPBackup {

	const KEY_VERSION = 'my-wp-backup-version';

	/**
	 * An associative array where the key is a namespace prefix and the value
	 * is an array of base directories for classes in that namespace.
	 *
	 * @var array
	 */
	protected $prefixes = array();

	protected static $instance;

	public static $info = array();

	protected function __construct() {

		if ( false !== get_transient( '_my-wp-backup-activated' ) ) {
			delete_transient( '_my-wp-backup-activated' );
			wp_redirect( Admin::get_page_url( '' ) );
		}

		self::$info = get_file_data( __DIR__ . '/pre-53.php', array(
	        'name'        => 'Plugin Name',
	        'pluginUri'   => 'Plugin URI',
	        'supportUri'  => 'Support URI',
	        'version'     => 'Version',
	        'description' => 'Description',
	        'author'      => 'Author',
	        'authorUri'   => 'Author URI',
	        'textDomain'  => 'Text Domain',
	        'domainPath'  => 'Domain Path',
	        'slug'        => 'Slug',
	        'license'     => 'License',
	        'licenseUri'  => 'License URI',
	    ) );
		Admin::get_instance();

		$options = get_site_option( 'my-wp-backup-options', Admin::$options );

		self::$info['baseDir'] = plugin_dir_path( __FILE__ );
		self::$info['baseDirUrl'] = plugin_dir_url( __FILE__ );
		self::$info['backup_dir'] = trailingslashit( ABSPATH ) . trailingslashit( ltrim( $options['backup_dir'], '/' ) );
		self::$info['root_dir'] = trailingslashit( ABSPATH );


		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			\WP_CLI::add_command( 'job', new Cli\Job() );
			\WP_CLI::add_command( 'backup', new Cli\Backup() );
		}

		add_action( 'wp_backup_run_job', array( Job::get_instance(), 'cron_run' ) );
		add_action( 'wp_backup_restore_backup', array( Backup::get_instance(), 'cron_run' ) );

		$version = get_site_option( self::KEY_VERSION );
		if ( ! $version || self::$info['version'] !== $version ) {
			if ( $this->update_options() ) {
				update_site_option( self::KEY_VERSION, self::$info['version'] );
			}
		}
	}

	public static function get_instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new MyWPBackup();
		}

		return self::$instance;

	}

	private function update_options() {
		$current = get_site_option( 'my-wp-backup-options', array() );
		$new = Admin::$options;
		$changed = false;

		foreach ( $new as $key => $value ) {
			if ( ! isset( $current[ $key ] ) ) {
				$current[ $key ] = $value;
				$changed = true;
			}
		}

		return $changed ? update_site_option( 'my-wp-backup-options', $current ) : true;
	}
}

require( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' );

register_activation_hook( __FILE__, array( 'MyWPBackup\Install\Activate', 'run' ) );
register_deactivation_hook( __FILE__, array( 'MyWPBackup\Install\Deactivate', 'run' ) );

add_action( 'plugins_loaded', 'MyWPBackup\MyWPBackup::get_instance' );
