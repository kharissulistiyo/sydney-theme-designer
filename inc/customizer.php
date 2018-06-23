<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function std_customize_register( $wp_customize ) {

  $wp_customize->add_panel( 'sydney_theme_designer_panel', array(
      'priority'       => 9000,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Sydney Theme Designer', 'std'),
  ));

  // Section

  $wp_customize->add_section(
      'std_header_branding',
      array(
          'title'         => __('Header Branding', 'std'),
          'priority'      => 70,
          'panel'         => 'sydney_theme_designer_panel',
          'description'   => __('Customize header branding.', 'std'),
      )
  );

  $wp_customize->add_setting(
      'std_header_branding_display_both_logo_and_tagline',
      array(
          'sanitize_callback' => 'sydney_sanitize_checkbox',
      )
  );

  $wp_customize->add_control(
      'std_header_branding_display_both_logo_and_tagline',
      array(
          'type'      => 'checkbox',
          'label'     => __('Display both logo and tagline?', 'std'),
          'section'   => 'std_header_branding',
          'priority'  => 10,
      )
  );

	$wp_customize->add_setting(
      'std_header_branding_logo_height',
      array(
          'default'           => '100',
          'sanitize_callback' => 'absint'
      )
  );

  $wp_customize->add_control(
      'std_header_branding_logo_height',
      array(
          'label' => __( 'Maximum image logo height', 'std' ),
          'section' => 'std_header_branding',
          'type' => 'number',
          'priority' => 15
      )
  );

  // Section

  $wp_customize->add_section(
      'std_header_image',
      array(
          'title'         => __('Header image', 'std'),
          'priority'      => 80,
          'panel'         => 'sydney_theme_designer_panel',
          'description'   => __('Customize header image.', 'std'),
      )
  );

  // Title

  $wp_customize->add_setting(
      'std_header_image_main_title',
      array(
          'default'           => '',
          'sanitize_callback' => 'sydney_sanitize_text'
      )
  );

  $wp_customize->add_control(
      'std_header_image_main_title',
      array(
          'label' => __( 'Title', 'std' ),
          'section' => 'std_header_image',
          'type' => 'text',
          'priority' => 5
      )
  );

  // Subtitle

  $wp_customize->add_setting(
      'std_header_image_sub_title',
      array(
          'default'           => '',
          'sanitize_callback' => 'sydney_sanitize_text'
      )
  );

  $wp_customize->add_control(
      'std_header_image_sub_title',
      array(
          'label' => __( 'Subtitle', 'std' ),
          'section' => 'std_header_image',
          'type' => 'text',
          'priority' => 10
      )
  );

  // Button text

  $wp_customize->add_setting(
      'std_header_image_button_text',
      array(
          'default'           => '',
          'sanitize_callback' => 'sydney_sanitize_text'
      )
  );

  $wp_customize->add_control(
      'std_header_image_button_text',
      array(
          'label' => __( 'Button Text', 'std' ),
          'section' => 'std_header_image',
          'type' => 'text',
          'priority' => 15
      )
  );

  // Button URL

  $wp_customize->add_setting(
      'std_header_image_button_url',
      array(
          'default'           => '',
          'sanitize_callback' => 'esc_url_raw'
      )
  );

  $wp_customize->add_control(
      'std_header_image_button_url',
      array(
          'label' => __( 'Button URL', 'std' ),
          'section' => 'std_header_image',
          'type' => 'text',
          'priority' => 20
      )
  );

  // Hide button on inner pages

  $wp_customize->add_setting(
      'std_header_image_hide_btn',
      array(
          'sanitize_callback' => 'sydney_sanitize_checkbox',
      )
  );
  $wp_customize->add_control(
      'std_header_image_hide_btn',
      array(
          'type'      => 'checkbox',
          'label'     => __('Hide button on inner pages?', 'std'),
          'section'   => 'std_header_image',
          'priority'  => 25,
      )
  );

  // Header image height

  $wp_customize->add_setting(
      'std_header_image_height',
      array(
          'default'           => '300',
          'sanitize_callback' => 'absint'
      )
  );

  $wp_customize->add_control(
      'std_header_image_height',
      array(
          'label' => __( 'Height', 'std' ),
          'section' => 'std_header_image',
          'type' => 'number',
          'priority' => 30
      )
  );

	// Section

  $wp_customize->add_section(
      'std_main_menu',
      array(
          'title'         => __('Main menu', 'std'),
          'priority'      => 80,
          'panel'         => 'sydney_theme_designer_panel',
          'description'   => __('Customize main menu.', 'std'),
      )
  );

	$wp_customize->add_setting(
      'std_main_menu_add_search_form',
      array(
          'sanitize_callback' => 'sydney_sanitize_checkbox',
      )
  );
  $wp_customize->add_control(
      'std_main_menu_add_search_form',
      array(
          'type'      => 'checkbox',
          'label'     => __('Add search from to main menu?', 'std'),
          'section'   => 'std_main_menu',
          'priority'  => 10,
      )
  );

}
add_action( 'customize_register', 'std_customize_register' );
