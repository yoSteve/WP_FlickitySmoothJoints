<?php

// change priority of WP's auto <p>'s
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'wpautop', 12);

// Wrap your columns in a Foundation Row
function make_row($atts, $content = null) {
    $content = do_shortcode($content);
    return '<div class="row">'.$content.'</div><!-- close row -->';
}
add_shortcode('row', 'make_row');
/* USAGE:   [row]
*           [col-half] ...content...[/col-half]
*           [col-half] ...content...[/col-half]
*           [/row]
*/

// Write functions that generate Foundation Columns
function half_columns($atts, $content = null ) {
    $offset =   shortcode_atts(array(
        'offset'    =>  0, // defaults to no offset
    ), $atts );
    if ($offset != 0) {
        $output =   '<div class="small-12 medium-6 medium-offset-'.$offset['offset'].' columns">'.do_shortcode($content).'</div>';
    } else {
        $output =   '<div class="small-12 medium-6 columns">'.do_shortcode($content).'</div>';
    }
    return $output;
}
add_shortcode('col-half', 'half_columns');
// USEAGE: [col-half offset="6"] ...content... [/col-half]

function third_columns($atts, $content = null ) {
    $offset =   shortcode_atts(array(
        'offset'    =>  0, // defaults to no offset
    ), $atts );
    if ($offset != 0) {
        $output =   '<div class="small-12 medium-4 medium-offset-'.$offset['offset'].' columns">'.do_shortcode($content).'</div>';
    } else {
        $output =   '<div class="small-12 medium-4 columns">'.do_shortcode($content).'</div>';
    }
    return $output;
}
add_shortcode('col-third', 'third_columns');
// USEAGE: [col-third offset="4"] ...content... [/col-third]

function quarter_columns($atts, $content = null ) {
    $offset =   shortcode_atts(array(
        'offset'    =>  0, // defaults to no offset
    ), $atts );
    if ($offset != 0) {
        $output =   '<div class="small-12 medium-3 medium-offset-'.$offset['offset'].' columns">'.do_shortcode($content).'</div>';
    } else {
        $output =   '<div class="small-12 medium-3 columns">'.do_shortcode($content).'</div>';
    }
    return $output;
}
add_shortcode('col-quarter', 'quarter_columns');
// USEAGE: [col-quarter offset="3"] ...content... [/col-quarter]

function custom_columns($atts, $content = null ) {
    $args   =   shortcode_atts(array(
        'small'            =>  12, // defaults to full width
        'small-offset'     =>   0, // defaults to 0
        'medium'           =>   0, // defaults to 0
        'medium-offset'    =>   0, // defaults to 0
        'large'            =>   0, // defaults to 0
        'large-offset'     =>   0, // defaults to 0
    ), $atts );

    if ($args['small'] != '12' ) {
        $small = "small-".$args['small'];
    } else { $small = "small-12"; }

    if ($args['small-offset'] != '0' ) {
        $small_offset = "small-offset-".$args['small-offset']." ";
    } else { $small_offset = ""; }

    if ($args['medium'] != '0' ) {
        $medium = "medium-".$args['medium']." ";
    } else { $medium = ""; }

    if ($args['medium-offset'] != '0' ) {
        $medium_offset = "medium-offset-".$args['medium-offset']." ";
    } else { $medium_offset = ""; }

    if ($args['large'] != '0' ) {
        $large = "large-".$args['large']." ";
    } else { $large = ""; }

    if ($args['large-offset'] != '0' ) {
        $large_offset = "large-offset-".$args['large-offset']." ";
    } else { $large_offset = ""; }

    $output =   '<div class="'.$small.' '.$small_offset.$medium.$medium_offset.$large.$large_offset.' columns">'.do_shortcode($content).'</div>';

    return $output;
}
add_shortcode('col-custom', 'custom_columns');
// USEAGE: [col-custom medium="6" large="4" large-offset="2"] ...content... [/col-custom]


?>
