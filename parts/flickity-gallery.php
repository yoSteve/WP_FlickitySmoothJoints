<?php
/*
*
* Template Part for inserting a Flickity Gallery Modal
*
* Call it with "include( locate_template( 'parts/flickity-gallery.php' ) );"
* Create a $gallery_tag variable in the parent template to call slides with
* specific tags, otherwise slider will fall back to ALL images in Media Library.
*
*/

if ( $gallery_tag ) {
    $args = array(
        'post_type'			=>	'attachment',
        'post_status'		=>	'inherit',
        'post_mime_type'    =>  array('image', 'video'),
        'order'				=>	'DESC',
        'tag'				=>	$gallery_tag,
        'posts_per_page'	=>	-1,
    );
}  else {
    $args = array(
        'post_type'			=>	'attachment',
        'post_status'		=>	'inherit',
        'post_mime_type'    =>  array('image', 'video'),
        'order'				=>	'DESC',
        'posts_per_page'	=>	-1,
    );
}
$gallery_query = new WP_Query($args); ?>

<div class="gallery grid">

    <?php if ($gallery_query->have_posts()) {
        $index = 0;
        while ( $gallery_query->have_posts() ) {
            $gallery_query->the_post();
            $thumb_url  = wp_get_attachment_thumb_url( $post->ID );
            $alt_text   = "fetch string from image meta"; ?>
            <a id="slide-<?php echo $index; ?>" href="#" data-reveal-id="galleryModal">
                <img src="<?php echo $thumb_url; ?>" alt="<?php echo $alt_text; ?>" />
                <!-- <div class="clearfix"></div> -->
            </a>
            <?php $index++;
        }
    }   ?>
</div>

<p><a data-open="exampleModal1">Click me for a modal</a></p>

<div class="reveal" id="exampleModal1" data-reveal>
    <h1>Awesome. I Have It.</h1>
    <p class="lead">Your couch. It is mine.</p>
    <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
    <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
    </button>
</div>



<!-- <div id="myModal" class="reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

    <div class="gallery gallery-main js-flickity" data-flickity-options='{
        "wrapAround": "true",
        "autoPlay": "true",
        "setGallerySize": "true",
        "prevNextButtons": "false"
    }'>
        <div class="gallery-cell"></div>
    </div>

    <div class="gallery gallery-nav js-flickity" data-flickity-options='{
        "asNavFor": ".gallery-main",
        "contain": true,
        "pageDots": false
    }'>
        <div class="gallery-cell"></div>
    </div>

    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<script type="text/javascript">
    // 1st carousel, main
    jQuery('.carousel-main').flickity();
    // 2nd carousel, navigation
    jQuery('.carousel-nav').flickity({
        asNavFor: '.carousel-main',
        contain: true,
        pageDots: false
    });
</script> -->
