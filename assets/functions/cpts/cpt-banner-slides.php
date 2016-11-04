<?php
// Used this handy tool to generate Custom Post Types:
// https://generatewp.com/post-type/

function banner_slide_cpt() {

	$labels = array(
		'name'                  => _x( 'Banner Slides', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Banner Slide', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Banner Slides', 'text_domain' ),
		'name_admin_bar'        => __( 'Banner Slide', 'text_domain' ),
		'archives'              => __( 'Banner Slide Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Slides', 'text_domain' ),
		'add_new_item'          => __( 'Add New Slide', 'text_domain' ),
		'add_new'               => __( 'Add New Slide', 'text_domain' ),
		'new_item'              => __( 'New Slide', 'text_domain' ),
		'edit_item'             => __( 'Edit Slide', 'text_domain' ),
		'update_item'           => __( 'Update Slide', 'text_domain' ),
		'view_item'             => __( 'View Slide', 'text_domain' ),
		'search_items'          => __( 'Search Slide', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Banner Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set banner image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove banner image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as banner image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into slide', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this slide', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Banner Slide', 'text_domain' ),
		'description'           => __( 'Slides for the Flickity Banner', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => get_template_directory_uri().'/assets/images/admin-panel/banner-slides.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'banner_slide', $args );

}
add_action( 'init', 'banner_slide_cpt', 0 );

add_action('acf/register_fields', 'register_banner_slides_fields');

function register_banner_slides_fields() {
	if(function_exists("register_field_group")) {
		register_field_group(array (
			'id' => 'acf_banner-slide-alignment',
			'title' => 'Slide Content Alignment',
			'fields' => array (
				array (
					'key' => 'field_5762119e23edd',
					'label' => 'Content Alignment',
					'name' => 'align_content',
					'type' => 'radio',
					'instructions' => 'Where do you want to align the content of this Banner Slide?',
					'choices' => array (
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'center',
					'layout' => 'horizontal',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'banner_slide',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'side',
				'layout' => 'default',
				'hide_on_screen' => array (
					0 => 'permalink',
					1 => 'excerpt',
					2 => 'custom_fields',
					3 => 'discussion',
					4 => 'comments',
					5 => 'revisions',
					6 => 'slug',
					7 => 'author',
					8 => 'categories',
					9 => 'send-trackbacks',
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_action-button',
			'title' => 'Action Button',
			'fields' => array (
				array (
					'key' => 'field_576215207762f',
					'label' => 'Does this slide have an Action Button?',
					'name' => 'has_action_button',
					'type' => 'radio',
					'choices' => array (
						'yes' => 'Yes',
						'no' => 'No',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'no',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'field_5762156577630',
					'label' => 'Button Label',
					'name' => 'button_label',
					'type' => 'text',
					'instructions' => 'Put your button text here.',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_576215207762f',
								'operator' => '==',
								'value' => 'yes',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_57621606c5a7c',
					'label' => 'Button Url',
					'name' => 'button_url',
					'type' => 'text',
					'instructions' => 'Put the button URL here (don\'t forget the http://)',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_576215207762f',
								'operator' => '==',
								'value' => 'yes',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'banner_slide',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 1,
		));
	}
}


?>
