=== WP Slick Slider and Image Carousel  ===
Contributors: wponlinesupport, anoopranawat 
Tags: wponlinesupport, slick, image slider, slick slider, slick image slider, slider, image slider, header image slider, responsive image slider, responsive content slider, carousel, image carousel, carousel slider, content slider, coin slider, touch slider, text slider, responsive slider, responsive slideshow, Responsive Touch Slider, wp slider, wp image slider, wp header image slider, photo slider, responsive photo slider  
Requires at least: 3.1
Tested up to: 4.6.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


A quick, easy way to add and display mulipale WP Slick Slider and carousel using a shortcode.
 

== Description ==

Display multiple slick image slider and carousel using shortcode with category. Fully responsive, Swipe enabled, Desktop mouse dragging and  Infinite looping.
Fully accessible with arrow key navigation  Autoplay, dots, arrows etc.

It uses A custom post type and taxonomy to create a slider, with almost unlimited options and support for multiple sliders on any page.
You can also display image slider on your website header.

We have added 5 designs for slider and 1 design for carousel. You can find all designs under Slick Slider -> Slider Designs. Just copy the shortcode of design
that you like and use.

Check [DEMO](http://wponlinesupport.com/wp-plugin/wp-slick-slider-and-image-carousel/) to know more.

Check [PRO DEMO and Features](http://wponlinesupport.com/wp-plugin/wp-slick-slider-and-image-carousel/) to know more.

= You can use 2 shortcodes =

<code>[slick-slider] and [slick-carousel-slider]</code>


= Complete shortcode  is =

<code>[slick-slider  design="design-1" category="8" show_content="true"
 dots="true" arrows="true" autoplay="true" sliderheight="400"
 autoplay_interval="5000" speed="1000"]</code>
 
<code>[slick-carousel-slider  design="design-6" category="8"
 slidestoshow="4" slidestoscroll="1" dots="true"
 arrows="true" autoplay="true"  autoplay_interval="5000"
 speed="1000" centermode="true" variablewidth="true"]</code> 


= Here is Template code =

<code><?php echo do_shortcode('[slick-slider]'); ?>  and
 <?php echo do_shortcode('[slick-carousel-slider]'); ?> </code>


= Use Following parameters with shortcode =

<code>[slick-slider]</code>

* **limit** : [slick-slider limit="-1"] (Limit define the number of images to be display at a time. By default set to "-1" ie all images. eg. if you want to display only 5 images then set limit to limit="5")
* **category**: [slick-slider category="category_ID"] ( ie Display slider by their category ID ).
* **show_content** : [slick-slider show_content="true" ] (Display content OR not. By default value is "True". Options are "ture OR false").
* **Pagination and arrows** : [slick-slider dots="false" arrows="false"]
* **Autoplay and Autoplay Interval**: [slick-slider autoplay="true" autoplay_interval="100"]
* **Slide Speed**: [slick-slider speed="3000"]
* **fade** : [slick-slider fade="true" ] (Slider Fade effect. By default effect is slide. If you set fade="true" then effect change from slide to fade ).
* **sliderheight** : [slick-slider sliderheight="400" ] (Slider height. By default given 500px height.)

= Use Following parameters with shortcode =

<code>[slick-carousel-slider]</code>

* **limit** : [slick-carousel-slider limit="-1"] (Limit define the number of images to be display at a time. By default set to "-1" ie all images. eg. if you want to display only 5 images then set limit to limit="5")
* **design** : [slick-carousel-slider design="design-1"] (You can select 5 design( design-1, design-2, design-3, design-4, design-5 ) for your  slider. Slick Slider -> Slider Designs ).
* **category**: [slick-carousel-slider category="category_ID"] ( ie Display slider by their category ID ).
* **image_size** : [slick-carousel-slider image_size="large"] (Default is "medium", values are thumbnail, medium, large, original)
* **slidestoshow** : [slick-carousel-slider slidestoshow="3" ] (Display number of images at a time. By default value is "3").
* **slidestoscroll** : [slick-carousel-slider slidestoscroll="1" ] (Scroll number of images at a time. By default value is "1").
* **Pagination and arrows** : [slick-carousel-slider dots="false" arrows="false"]
* **Autoplay and Autoplay Interval**: [slick-carousel-slider autoplay="true" autoplay_interval="100"]
* **Slide Speed**: [slick-carousel-slider speed="3000"]
* **centermode** : [slick-carousel-slider centermode="true" ] ( Display main image on center. By default value is "false" ).
* **variablewidth** : [slick-carousel-slider variablewidth="true" ] (Variable width of images in slider. By default value us "false")

= PRO Features Added : =
> <strong>Premium Version</strong><br>
>
> * 20+ predefined stunning designs
> * 14 Image Slider Designs
> * 10 Image Carousel Slider Designs
> * 8 Slider Variable width Designs
> * Visual Composer Page builder support
> * Drag & Drop frature to display slide in your order
> * Custom CSS plugin setting option
> * Powerful shortcode with strong parameters
> * Display content with image and link in Carousel mode   
> * Fully Responsive
> * 100% Multi Language
>
> Check [PRO DEMO and Features](http://wponlinesupport.com/wp-plugin/wp-slick-slider-and-image-carousel/) to know more.
>

= Features include =

* Display unlimited number of slider and carousel with the help of category.
* Touch-enabled Navigation.
* Fully responsive. Scales with its container.
* Fully accessible with arrow key navigation.
* Responsive
* Given shortcode and template code.
* Use for header image slider.


== Installation ==

1. Upload the 'wp-slick-slider-and-carousel' folder to the '/wp-content/plugins/' directory.
2. Activate the "wp-slick-slider-and-carousel" list plugin through the 'Plugins' menu in WordPress.
3. Add this short code where you want to display slider

<code>[slick-slider] and [slick-carousel-slider]</code>

= How to install : =
[youtube https://www.youtube.com/watch?v=c9pID1dWON4] 

== Screenshots ==

1. Design-1
2. Design-2
3. Design-3
4. Design-4
5. Design-5
6. Design-6

== Changelog ==

= 1.2.5 (20/10/2016) =
* Updated all the designs and fix the bug
* Fixed image display issue on mobile
* Replaced arrow images

= 1.2.4 =
* Updated slider js to latest version.
* Updated plugin design page.

= 1.2.3 =
* Fixed some css issues.

= 1.2.2 =
* Fixed some css issues.
* Resolved multiple slider jquery conflict issue.

= 1.2.1 =
* Fixed some bug
* Added Pro version with 16 designs

= 1.2 =
* Fixed some bug
* Added link to carousel mode

= 1.1 =
* Fixed some bug
* Added Limit

= 1.0 =
* Initial release.


== Upgrade Notice ==

= 1.2.5 (20/10/2016) =
* Updated all the designs and fix the bug
* Fixed image display issue on mobile
* Replaced arrow images

= 1.2.4 =
* Updated slider js to latest version.
* Updated plugin design page.

= 1.2.3 =
* Fixed some css issues.

= 1.2.2 =
* Fixed some css issues.
* Resolved multiple slider jquery conflict issue.

= 1.2.1 =
* Fixed some bug
* Added Pro version with 16 designs

= 1.2 =
* Fixed some bug
* Added link to carousel mode

= 1.1 =
* Fixed some bug
* Added Limit

= 1.0 =
* Initial release.