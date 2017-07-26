<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package WP Slick Slider and Image Carousel
 * @since 1.2.4
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'wpsisac_register_design_page');

/**
 * Register plugin design page in admin menu
 * 
 * @package WP Slick Slider and Image Carousel
 * @since 1.2.4
 */
function wpsisac_register_design_page() {
	add_submenu_page( 'edit.php?post_type='.WPSISAC_POST_TYPE, __('Slider Designs', 'wp-slick-slider-and-image-carousel'), __('Slider Designs', 'wp-slick-slider-and-image-carousel'), 'manage_options', 'wpsisac-designs', 'wpsisac_designs_page' );
}

/**
 * Function to display plugin design HTML
 * 
 * @package WP Slick Slider and Image Carousel
 * @since 1.2.4
 */
function wpsisac_designs_page() {

	$wpsisac_feed_tabs = array(
								'design-feed' 	=> __('Plugin Designs', 'wp-slick-slider-and-image-carousel'),
								'plugins-feed' 	=> __('Our Plugins', 'wp-slick-slider-and-image-carousel')
							);

	
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'design-feed';
	?>
	
	<div class="wrap wpsisac-wrap">

		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpsisac_feed_tabs as $tab_key => $tab_val) {

				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array( 'post_type' => WPSISAC_POST_TYPE, 'page' => 'wpsisac-designs', 'tab' => $tab_key), admin_url('edit.php') );
			?>

			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_val; ?></a>

			<?php } ?>
		</h2>

		<div class="wpsisac-tab-cnt-wrp">
		<?php 
			if( isset($_GET['tab']) && $_GET['tab'] == 'plugins-feed' ) {
				echo wpsisac_get_design( 'plugins-feed' );
			} else {
				echo wpsisac_get_design();
			}
		?>
		</div><!-- end .wpsisac-tab-cnt-wrp -->

	</div><!-- end .wpsisac-wrap -->

<?php
}

/**
 * Gets the plugin design part feed
 *
 * @package WP Slick Slider and Image Carousel
 * @since 1.2.4
 */
function wpsisac_get_design( $feed_type = '' ) {
	
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'design-feed';
	$transient_key 	= 'wpsisac_' . $active_tab;
	
	// Feed URL
	if( $feed_type == 'plugins-feed' ) {
		$url 			= 'http://wponlinesupport.com/plugin-data-api/plugins-data.php';
		$transient_key 	= 'wpos_plugins_feed';
	} else {
		$url = 'http://wponlinesupport.com/plugin-data-api/wp-slick-slider-and-image-carousel/wp-slick-slider-and-image-carousel.php';
	}

	$cache = get_transient( $transient_key );
	
	if ( false === $cache ) {
		
		$feed 			= wp_remote_get( esc_url_raw( $url ), array( 'timeout' => 120, 'sslverify' => false ) );
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( $transient_key, $cache, 172800 );
			}
		} else {
			$cache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'wp-slick-slider-and-image-carousel' ) . '</div>';
		}
	}
	return $cache;
}