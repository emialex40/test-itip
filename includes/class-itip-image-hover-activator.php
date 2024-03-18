<?php

/**
 * Fired during plugin activation
 *
 * @link       https://emic-solutions.net.ua/
 * @since      1.0.0
 *
 * @package    Itip_Image_Hover
 * @subpackage Itip_Image_Hover/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Itip_Image_Hover
 * @subpackage Itip_Image_Hover/includes
 * @author     Alex Yemeliantsev <26emic73@gmail.com>
 */
class Itip_Image_Hover_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        // Check if the ACF plugin is installed and activated
        if ( ! class_exists('ACF') && ! is_plugin_active('advanced-custom-fields/acf.php') ) {
            wp_die('To run your plugin, you need to install and activate the Advanced Custom Fields (ACF) plugin.');
        }

        // Check if the WooCommerce plugin is installed and activated
        if ( ! class_exists('WooCommerce') && ! is_plugin_active('woocommerce/woocommerce.php') ) {
            wp_die('To run your plugin, you need to install and activate the WooCommerce plugin.');
        }
    }

}
