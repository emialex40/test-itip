<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://emic-solutions.net.ua/
 * @since      1.0.0
 *
 * @package    Itip_Image_Hover
 * @subpackage Itip_Image_Hover/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Itip_Image_Hover
 * @subpackage Itip_Image_Hover/public
 * @author     Alex Yemeliantsev <26emic73@gmail.com>
 */
class Itip_Image_Hover_Public
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
     * @param  string  $plugin_name  The name of the plugin.
     * @param  string  $version  The version of this plugin.
     *
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version     = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Itip_Image_Hover_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Itip_Image_Hover_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/itip-image-hover-public.css', [], $this->version, 'all');
        wp_enqueue_style('swiper-' . $this->plugin_name, 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Itip_Image_Hover_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Itip_Image_Hover_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script('swiper-' . $this->plugin_name, 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], $this->version, false);
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/itip-image-hover-public.js', ['jquery'], $this->version, false);
    }

    public function remove_woocommerce_template_loop_product_thumbnail()
    {
        remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    }

    public function add_custom_template_loop_product_thumbnail()
    {
        $product_id = get_the_ID();

        $imageUrl        = $this->get_thumbnail_product_image($product_id);
        $croppedImageUrl = $this->get_cropper_image_url($product_id);

        if ($imageUrl && $croppedImageUrl) {
            $html = '<div class="swiper">';

            $html.= '<div class="swiper-wrapper">';

            $html .= '<div class="swiper-slide">';
            $html .= '<div class="swiper-content">';
            $html .= '<img src="'. $imageUrl .'" alt="Slide 1">';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '<div class="swiper-slide">';
            $html .= '<div class="swiper-content">';
            $html .= '<img src="'. $croppedImageUrl .'" alt="Slide 2">';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '</div>';

            $html .= '<div class="swiper-pagination"></div>';
            $html .= '</div>';
        }



        echo $html;
    }

    protected function get_thumbnail_product_image($product_id, $size = 'full')
    {
        $product = wc_get_product($product_id);

        // Check if the product exists and if it has an image
        if ( $product && $product->get_image_id() ) {
            // Get the product image URL
            $image_url = wp_get_attachment_image_url($product->get_image_id(), $size);

            return $image_url;
        } else {
            // If the image is missing, return false
            return false;
        }
    }

    protected function get_cropper_image_url($product_id)
    {
        $image_url = get_field('field_product_cropper_image', $product_id);

        if ( ! $image_url ) {
            return false;
        }

        return $image_url;
    }

}
