<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://emic-solutions.net.ua/
 * @since      1.0.0
 *
 * @package    Itip_Image_Hover
 * @subpackage Itip_Image_Hover/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Itip_Image_Hover
 * @subpackage Itip_Image_Hover/admin
 * @author     Alex Yemeliantsev <26emic73@gmail.com>
 */
class Itip_Image_Hover_Admin
{

    /**
     * The ID of this plugin.
     *
     * @var      string $plugin_name The ID of this plugin.
     * @since    1.0.0
     * @access   private
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @var      string $version The current version of this plugin.
     * @since    1.0.0
     * @access   private
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param  string  $plugin_name  The name of this plugin.
     * @param  string  $version  The version of this plugin.
     *
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version     = $version;
        $this->create_cropper_image_field();
    }

    private function create_cropper_image_field()
    {
        if ( function_exists('acf_get_field') ) {
            $existing_field = acf_get_field('product_cropper_image');

            if ( $existing_field ) {
                wp_die('The field product_cropper_image already exists.');
            }
        }

        acf_add_local_field_group([
            'key'      => 'group_product_cropper_image',
            'title'    => 'Product Cropper Image',
            'fields'   => [
                [
                    'key'           => 'field_product_cropper_image',
                    'label'         => 'Product Cropper Image',
                    'name'          => 'product_cropper_image',
                    'type'          => 'image',
                    'instructions'  => 'Upload an image to crop the product.',
                    'required'      => true,
                    'return_format' => 'url',
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'product',
                    ],
                ],
            ],
            'position' => 'side',
        ]);
    }

}
