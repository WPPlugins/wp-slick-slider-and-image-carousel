<?php
/**
 * Plugin Name: WP Slick Slider and Image Carousel
 * Plugin URI: http://www.wponlinesupport.com/
 * Text Domain: wp-slick-slider-and-image-carousel
 * Domain Path: /languages/
 * Description: Easy to add and display wp slick image slider and carousel  
 * Author: WP Online Support
 * Version: 1.2.5
 * Author URI: http://www.wponlinesupport.com/
 *
 * @package WordPress
 * @author WP Online Support
 */

if( !defined('WPSISAC_VERSION') ){
    define( 'WPSISAC_VERSION', '1.2.5' ); // Plugin version
}
if( !defined( 'WPSISAC_POST_TYPE' ) ) {
    define( 'WPSISAC_POST_TYPE', 'slick_slider' ); // Plugin post type
}

register_activation_hook( __FILE__, 'free_wpsisac_install_premium_version' );
function free_wpsisac_install_premium_version(){
if( is_plugin_active('wp-slick-slider-and-image-carousel-pro/wp-slick-image-slider.php') ){
     add_action('update_option_active_plugins', 'free_wpsisac_deactivate_premium_version');
    }
}
function free_wpsisac_deactivate_premium_version(){
   deactivate_plugins('wp-slick-slider-and-image-carousel-pro/wp-slick-image-slider.php',true);
}
add_action( 'admin_notices', 'free_wpsisac_rpfs_admin_notice');
function free_wpsisac_rpfs_admin_notice() {
    $dir = ABSPATH . 'wp-content/plugins/wp-slick-slider-and-image-carousel-pro/wp-slick-image-slider.php';
    if( is_plugin_active( 'wp-slick-slider-and-image-carousel/wp-slick-image-slider.php' ) && file_exists($dir)) {
        global $pagenow;
        if( $pagenow == 'plugins.php' ){
            deactivate_plugins ( 'wp-slick-slider-and-image-carousel-pro/wp-slick-image-slider.php',true);
            if ( current_user_can( 'install_plugins' ) ) {
                echo '<div id="message" class="updated notice is-dismissible"><p><strong>Thank you for activating  WP Slick Slider and Image Carousel</strong>.<br /> It looks like you had PRO version <strong>(<em> WP Slick Slider and Image Carousel  Pro</em>)</strong> of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it. </p></div>';
            }
        }
    }
}     

add_action('plugins_loaded', 'wpsisac_load_textdomain');
function wpsisac_load_textdomain() {
	load_plugin_textdomain( 'wp-slick-slider-and-image-carousel', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
} 

/**
 * Function to get plugin image sizes array
 * 
 * @package WP Slick Slider and Image Carousel
 * @since 1.2.2
 */
function wpsisac_get_unique() {
  static $unique = 0;
  $unique++;

  return $unique;
}

add_action( 'wp_enqueue_scripts','wpsisacstyle_css' );
function wpsisacstyle_css() {
    
    // Registring slick slider script
    if( !wp_script_is( 'wpos-slick-jquery', 'registered' ) ) {
        wp_register_script( 'wpos-slick-jquery', plugin_dir_url( __FILE__ ).'assets/js/slick.min.js', array('jquery'), WPSISAC_VERSION, true );
    }

    wp_enqueue_style( 'wpsisac_slick_style',  plugin_dir_url( __FILE__ ) . 'assets/css/slick.css', array(), WPSISAC_VERSION );
    wp_enqueue_style( 'wpsisac_recent_post_style',  plugin_dir_url( __FILE__ ) . 'assets/css/slick-slider-style.css', array(), WPSISAC_VERSION);
}

require_once( 'wpsisac-slider-custom-post.php' );
require_once( 'templates/wpsisac-template.php' );
require_once( 'templates/wpsisac-carousel-template.php' );
require_once( 'wpsisac_post_menu_function.php' );