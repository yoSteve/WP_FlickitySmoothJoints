<?php
/*
*
* Template Part for Homepage Banner Slides
*
*/
$button_label   =   get_post_meta(get_the_ID(), 'button_label', true);
$button_url     =   get_post_meta(get_the_ID(), 'button_url', true);

if ( has_post_thumbnail( $post->ID ) ) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
    $image_url = $image[0];
}

$content_alignment  =   get_post_meta(get_the_ID(), 'align_content', true);

switch ($content_alignment) {
    case "left":
        $columns = "small-12 medium-6 medium-offset-1  columns";
        break;
    case "center":
        $columns = "small-12 medium-6 medium-offset-3 columns text-center";
        break;
    case "right":
        $columns = "small-12 medium-6 medium-offset-5 columns text-right";
        break;
}

?>

<div class="carousel-cell" style="background-image:url('<?php echo $image_url; ?>');">
    <div class='<?php echo $columns; ?>'>
        <h2 style="z-index:2;"><?php the_title(); ?></h2>
        <p style="z-index:2;"><?php the_content(); ?></p>
        <?php if ( !empty($button_label) ) {
            echo '<a class="action button" href="'.$button_url.'" style="z-index:2;">'.$button_label.'</a>';
        } ?>
    </div>
</div>
