<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://emic-solutions.net.ua/
 * @since             1.0.0
 * @package           Itip_Image_Hover
 *
 * @wordpress-plugin
 * Plugin Name:       Itip Image Hover
 * Plugin URI:        https://github.com/emialex40/test-itip
 * Description:       It`s test task for ITIP Company
 * Version:           1.0.0
 * Author:            Alex Yemeliantsev
 * Author URI:        https://emic-solutions.net.ua//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       itip-image-hover
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ITIP_IMAGE_HOVER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-itip-image-hover-activator.php
 */
function activate_itip_image_hover() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-itip-image-hover-activator.php';
	Itip_Image_Hover_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-itip-image-hover-deactivator.php
 */
function deactivate_itip_image_hover() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-itip-image-hover-deactivator.php';
	Itip_Image_Hover_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_itip_image_hover' );
register_deactivation_hook( __FILE__, 'deactivate_itip_image_hover' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-itip-image-hover.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_itip_image_hover() {

	$plugin = new Itip_Image_Hover();
	$plugin->run();

}
run_itip_image_hover();
