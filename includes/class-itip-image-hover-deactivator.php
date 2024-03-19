<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://emic-solutions.net.ua/
 * @since      1.0.0
 *
 * @package    Itip_Image_Hover
 * @subpackage Itip_Image_Hover/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Itip_Image_Hover
 * @subpackage Itip_Image_Hover/includes
 * @author     Alex Yemeliantsev <26emic73@gmail.com>
 */
class Itip_Image_Hover_Deactivator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate()
    {
        acf_update_field([
            'key'    => 'field_product_cropper_image',
            'active' => false,
        ]);
    }

}
