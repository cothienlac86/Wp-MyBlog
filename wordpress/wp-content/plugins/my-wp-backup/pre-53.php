<?php
/*
 *
 * @link              https://mythemeshop.com
 * @since             1.0
 *
 * @wordpress-plugin
 * Plugin Name:       My WP Backup
 * Plugin URI:        https://mythemeshop.com/plugins/my-wp-backup/
 * Description:       My WP Backup is the best way to protect your data and website in the event of server loss, data corruption, hacking or other events, or to migrate your WordPress data quickly and easily.
 * Version:           1.3.4
 * Author:            MyThemeShop
 * Author URI:        https://mythemeshop.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       my-wp-backup
 * Domain Path:       /languages
 * Support URI:       https://community.mythemeshop.com
 * Network:           true
 */

if ( ! defined( 'ABSPATH' ) ) { die; }

function wpb_on_activate() {
    $message = sprintf(
        __( 'My WP Backup requires atleast PHP version 5.3.0. You have %s.', 'my-wp-backup' ),
        PHP_VERSION
    );

    if ( 'error_scrape' === filter_input( INPUT_GET, 'action' ) ) {
        echo esc_html( $message );
    } else {
        trigger_error( $message, E_USER_ERROR );
    }
}

function wpb_file_data() {
    return get_file_data( __FILE__, array(
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
}

if ( version_compare(PHP_VERSION, '5.3.0') < 0 ) {
    register_activation_hook( __FILE__, 'wpb_on_activate' );
} else {
    require dirname( __FILE__ ) . '/my-wp-backup.php';
}
