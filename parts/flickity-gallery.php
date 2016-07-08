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
<style media="screen">
/* external css: flickity.css */

* {
-webkit-box-sizing: border-box;
box-sizing: border-box;
}

body { font-family: sans-serif; }

.gallery {
background: #FAFAFA;
margin-bottom: 40px;
}

.gallery-cell {
width: 66%;
height: 200px;
margin-right: 10px;
background: #8C8;
counter-increment: gallery-cell;
}

/* cell number */
.gallery-cell:before {
display: block;
text-align: center;
content: counter(gallery-cell);
line-height: 200px;
font-size: 80px;
color: white;
}

.gallery-nav .gallery-cell {
height: 80px;
width: 100px;
}

.gallery-nav .gallery-cell:before {
font-size: 50px;
line-height: 80px;
}

.gallery-nav .gallery-cell.is-nav-selected {
background: #ED2;
}

</style>
<div class="gallery grid">

    <?php if ($gallery_query->have_posts()) {
        $index = 0;
        while ( $gallery_query->have_posts() ) {
            $gallery_query->the_post();
            $thumb_url  = wp_get_attachment_thumb_url( $post->ID );
            $alt_text   = "fetch string from image meta"; ?>
            <a id="slide-<?php echo $index; ?>" class="notSmooth" data-open="galleryModal">
                <img src="<?php echo $thumb_url; ?>" alt="<?php echo $alt_text; ?>" />
                <!-- <div class="clearfix"></div> -->
            </a>
            <?php $index++;
        }
    }   ?>
</div>

<p><a class="notSmooth" data-open="galleryModal">Click me for a modal</a></p>


<div id="galleryModal" class="reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

    <div id="galleryMain" class="gallery gallery-main js-flickity" data-flickity-options='{
        "wrapAround": "true",
        "autoPlay": "true",
        "setGallerySize": "true",
        "prevNextButtons": "false"
    }'>
        <!-- [REPEAT with LARGE IMAGE] -->
        <?php foreach ($variable as $key => $value) {
            # code...
        } ?>
        <div class="gallery-cell"><p>ONE</p></div>
        <div class="gallery-cell"><p>TWO</p></div>
        <div class="gallery-cell"><p>THREE</p></div>
    </div>

    <div id="galleryNav" class="gallery gallery-nav js-flickity" data-flickity-options='{
        "asNavFor": ".gallery-main",
        "contain": true,
        "pageDots": false
    }'>
        <!-- [REPEAT with THUMB] -->
        <div class="gallery-cell"><p>ONE</p></div>
        <div class="gallery-cell"><p>TWO</p></div>
        <div class="gallery-cell"><p>THREE</p></div>
    </div>

    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        // 1st gallery, main
        jQuery('#galleryMain.gallery-main').flickity();
        // 2nd gallery, navigation
        jQuery('#galleryNav.gallery-nav').flickity({
            asNavFor: '.gallery-main',
            contain: true,
            pageDots: false
        });
    });
</script>
