<?php

// function themeslug_theme_customizer( $wp_customize ) {
//     add_action( 'customize_register', 'themeslug_theme_customizer' );
//
//     $wp_customize->add_section( 'themeslug_logo_section' , array(
//         'title'       => __( 'Logo', 'themeslug' ),
//         'priority'    => 30,
//         'description' => 'Upload a logo to replace the default site name and description in the header',
//     ) );
//
//     $wp_customize->add_setting( 'themeslug_logo' );
//
//     $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
//         'label'    => __( 'Logo', 'themeslug' ),
//         'section'  => 'themeslug_logo_section',
//         'settings' => 'themeslug_logo',
//     ) ) );
//
// }

function fsjtheme_setup() {
    add_image_size('theme-logo', 360, 360);
    add_theme_support('custom-logo', array(
        'size' =>   'theme-logo'
    ));
}

add_action('after_setup_theme', 'fsjtheme_setup');

?>
