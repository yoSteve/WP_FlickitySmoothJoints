<?php
/*
*
* Template Part for inserting a Flickity Gallery Modal
*
* Call it with "include( locate_template( 'parts/flickity-gallery.php' ) );"
* Create a $gallery_tag variable in the parent template to call slides with
* of images with specific tags, otherwise slider will fall back to ALL images in Media Library.
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
wp_reset_postdata();
$gallery_query = new WP_Query($args); ?>

<h1>parts/flickity-gallery.php</h1>
<div class="gallery grid">

    <?php if ($gallery_query->have_posts()) {
        $index = 0;
        $ids_array = array();
        while ( $gallery_query->have_posts() ) {
            $gallery_query->the_post();
            $thumb_url  = wp_get_attachment_thumb_url( $post->ID );
            $alt_text   = "fetch string from image meta"; ?>
            <a id="thumb-<?php echo $index; ?>" class="clickable thumb notSmooth" data-open="galleryModal">
                <img src="<?php echo $thumb_url; ?>" alt="<?php echo $alt_text; ?>" />
                <!-- <div class="clearfix"></div> -->
            </a>
            <?php $ids_array[] = $post->ID;
            $index++;
        } ?>

        <div id="galleryModal" class="reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

            <div id="galleryMain" class="carousel carousel-main">

                <?php $index = 0;
                foreach ($ids_array as $id) {
                    $thumb_url  = wp_get_attachment_image_src( $id, $size = 'full' ); ?>
                    <div id="slide-<?php echo $index; ?>" class="carousel-cell" style="background-image: url('<?php echo $thumb_url[0]; ?>');">
                        <!-- <img src="<?php echo $thumb_url[0]; ?>" alt="" /> -->
                    </div>
                <?php $index++;
                } ?>

            </div>

            <div id="galleryNav" class="carousel carousel-nav">

                <?php $index = 0;
                foreach ($ids_array as $id) {
                    $thumb_url  = wp_get_attachment_thumb_url( $id ); ?>
                    <div class="carousel-cell">
                        <img id="nav-<?php echo $index; ?>" src="<?php echo $thumb_url; ?>" alt="" />
                    </div>
                <?php $index++;
                } ?>
            </div>

            <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>

        </div> <!-- /#galleryModal -->

    <?php } // end if   ?>
</div>


<script type="text/javascript">
        var clickedIndex = 0;
        jQuery('a.clickable.thumb').on('click', function() {
            clickedIndex = jQuery(this).index();
        });
        jQuery('#galleryModal').on('open.zf.reveal', function() {
            console.log("Modal opening");
            // 1st gallery, main
            jQuery('#galleryMain.carousel-main').flickity({
                wrapAround: true,
                autoPlay: false,
                setGallerySize: true,
                prevNextButtons: true,
                imagesLoaded: true,
                percentPosition: false,
                cellAlign: "center",
                initialIndex: clickedIndex,
                adaptiveHeight: true,
            });
            console.log("Main loaded");
            // 2nd gallery, navigation
            jQuery('#galleryNav.carousel-nav').flickity({
                asNavFor: "#galleryMain.carousel-main",
                draggable: true,
                contain: true,
                pageDots: false,
                imagesLoaded: true,
                percentPosition: false,
                cellAlign: "center",
            });
            console.log("Nav Loaded");
            var flktyMain = Flickity.data(jQuery('#galleryMain.carousel-main')[0]);
            console.log("Number of cells (Main): " + flktyMain.cells.length);
            var flktyNav = Flickity.data(jQuery('#galleryNav.carousel-nav')[0]);
            console.log("Number of cells (Nav) : " + flktyNav.cells.length);
        });
        // destroy Flickity when modal closes (allows clickedIndex to work on next opening)
        jQuery('#galleryModal').on('closed.zf.reveal',function() {
            jQuery('#galleryMain.carousel-main').flickity('destroy');
            jQuery('#galleyrNav.carousel-nav').flickity('destroy');
        });


</script>
