<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  // Add Flickity to the mix
  wp_enqueue_script('flickity', get_template_directory_uri() . '/node_modules/flickity/dist/flickity.pkgd.js', array('jquery'), null, true);

  // Don't forget Flickity's stylesheet
  wp_enqueue_style( 'flickity-css', get_template_directory_uri() . '/node_modules/flickity/css/flickity.css', array(), '', 'all' );

  // Add in SmoothState
  wp_enqueue_script('smoothState', get_template_directory_uri() . '/node_modules/smoothstate/jquery.smoothState.min.js', array ('jquery', 'flickity', 'foundation-js'), null, true);

  // Include FontAwesome
    wp_enqueue_style( 'FontAwesome', get_template_directory_uri() . '/vendor/font-awesome-4.6.3/css/font-awesome.min.css', array(), '', 'all' );

  // Adding scripts file in the footer
  wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

    // Load What-Input files in footer
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/what-input.min.js', array(), '', true );

    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.js', array( 'jquery' ), '6.2', true );

    // uncomment the following line to load Foundation via CDN instead
    // wp_enqueue_script('foundation-js', 'https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.js', array('jquery'), '6.2', true);

    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);
