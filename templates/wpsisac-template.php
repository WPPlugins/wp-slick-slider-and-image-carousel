<?php 
function get_wpsisac_slider( $atts, $content = null ){          

      extract(shortcode_atts(array(
	    "limit"    => '',
		"category" => '',
		"design" => '',
		"show_content" => '',       
		"dots"     			=> '',
		"arrows"     		=> '',
		"autoplay"     		=> '',	
		"autoplay_interval"  => '',
		"speed"             => '',
		"fade"		        => '',
		"sliderheight"     => '',
		

	), $atts));
	
	// required enqueue
	wp_enqueue_script( 'wpos-slick-jquery' );
	 
    if( $limit ) { 
		$posts_per_page = $limit; 
	} else {
		$posts_per_page = '-1';
	}
	
	if( $category ) { 
		$cat = $category; 
	} else {
		$cat = '';
	}	

	if( $design ) { 
		$slidercdesign = $design; 
	} else {
		$slidercdesign = 'design-1';
	}	

    if( $show_content ) { 
        $showContent = $show_content; 
    } else {
        $showContent = 'true';
    }


	if( $dots ) { 
		$dotsv = $dots; 
	} else {
		$dotsv = 'true';
	}

	if( $arrows ) {
		$arrowsv = $arrows; 
	} else {
		$arrowsv = 'true';
	}	

	if( $autoplay ) { 
		$autoplayv = $autoplay;
	} else {
		$autoplayv = 'true';
	}	

	if( $autoplay_interval ) { 
		$autoplayIntervalv = $autoplay_interval; 
	} else {
		$autoplayIntervalv = '3000';
	}	

	if( $speed ) { 
		$speedv = $speed;
	} else {
		$speedv = '300';
	}
	if( $fade ) { 
		$fadev = $fade;
	} else {
		$fadev = 'false';
	}
if( $sliderheight ) { 
		$sliderheightv = $sliderheight;
	} else {
		$sliderheightv = '500';
	}

	ob_start();	

	$unique 		= wpsisac_get_unique();
	$post_type 		= 'slick_slider';
	$orderby 		= 'post_date';
	$order 			= 'DESC';		

        $args = array ( 
            'post_type'      => $post_type, 
            'orderby'        => $orderby, 
            'order'          => $order,
            'posts_per_page' => $posts_per_page,  
           
            );
	if($cat != ""){
            	$args['tax_query'] = array( array( 'taxonomy' => 'wpsisac_slider-category', 'field' => 'id', 'terms' => $cat) );
            }        
      $query = new WP_Query($args);
      $post_count = $query->post_count;         

             if ( $query->have_posts() ) :
			 ?>
		<div class="wpsisac-slick-slider-<?php echo $unique; ?> wpsisac-slick-slider <?php echo $slidercdesign; ?>">
				<?php while ( $query->have_posts() ) : $query->the_post();
				global $post;
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
				switch ($slidercdesign) {
				 case "design-1":
					include('designs/design-1.php');
					break;
				 case "design-2":
					include('designs/design-2.php');
					break;
				 case "design-3":
					include('designs/design-3.php');
					break;
				 case "design-4":
					include('designs/design-4.php');
					break;	
					case "design-5":
					include('designs/design-5.php');
					break;	
				 default:		 

						include('designs/design-1.php');

					}

					endwhile; ?>

		  </div><!-- #post-## -->		

		  <?php
            endif; 
             wp_reset_query(); 	
?>

<script type="text/javascript">

		jQuery(document).ready(function(){
		jQuery('.wpsisac-slick-slider-<?php echo $unique; ?>').slick({

			dots: <?php echo $dotsv; ?>,
			infinite: true,
			arrows: <?php echo $arrowsv; ?>,
			speed: <?php echo $speedv; ?>,
			autoplay: <?php echo $autoplayv; ?>,				
			fade: <?php echo $fadev; ?>,
			autoplaySpeed: <?php echo $autoplayIntervalv; ?>,

			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: false
			

			
});
	});

	</script>				 
<?php
		return ob_get_clean();			             

	}

add_shortcode('slick-slider','get_wpsisac_slider');