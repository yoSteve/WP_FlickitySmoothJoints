<?php
/*
*
* Template Part for inserting a Flickity Banner-Slider
*
* Call it with "include( locate_template( 'parts/flickity-banner.php' ) );"
* Create a $banner_slide_tag variable in the parent template to call slides with
* specific tags, otherwise slider will fall back to ALL Banner-Slides.
*
*/
if ( $banner_slide_tag ) {
    $args = array(
        'post_type'			=>	'banner_slide',
        'post_tatus'		=>	'publish',
        'order'				=>	'DESC',
        'tag'				=>	$banner_slide_tag,
        'posts_per_page'	=>	-1,
    );
}  else {
    $args = array(
        'post_type'			=>	'banner_slide',
        'post_tatus'		=>	'publish',
        'order'				=>	'DESC',
        'posts_per_page'	=>	-1,
    );
}
$slider_query = new WP_Query($args);
if ( $slider_query->have_posts() ) { ?>
    <div id="featured-hero" role="banner">

        <div class="carousel js-flickity" data-flickity-options='{
            "wrapAround": "true",
            "autoPlay": "true",
            "setGallerySize": "true",
            "prevNextButtons": "false"
        }'>

        <?php while ( $slider_query->have_posts() ) {
            $slider_query->the_post();
            include( locate_template( 'parts/slides/homepage-banner-slide.php' ) );
        } ?>

        </div>

    </div>
<?php } ?>
