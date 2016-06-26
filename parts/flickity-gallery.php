<?php
/*
*
* Template Part for inserting a Flickity Gallery Modal
*
* Call it with "include( locate_template( 'template-parts/flickity-gallery.php' ) );"
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

    <?php while ( $slider_query->have_posts() ) {
        $gallery_query->the_post();
        $thumb_url  = ?????;
        $alt_text   = "fetch string from image meta"
        $index = 0; ?>
        <a id="slide-<?php echo $index; ?>" href="#" data-reveal-id="galleryModal">
            <img src="<?php echo $thumb_url; ?>" alt="<?php echo $alt_text; ?>" />
        </a>
        <?php $index++;
    } ?>


</div>


<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

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
</script>
