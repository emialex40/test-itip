<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://emic-solutions.net.ua/
 * @since      1.0.0
 *
 * @package    Itip_Image_Hover
 * @subpackage Itip_Image_Hover/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Itip_Image_Hover
 * @subpackage Itip_Image_Hover/includes
 * @author     Alex Yemeliantsev <26emic73@gmail.com>
 */
class Itip_Image_Hover_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'itip-image-hover',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
