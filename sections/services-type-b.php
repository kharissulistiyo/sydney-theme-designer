<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function std_customize_register_services_b( $wp_customize ) {

	// Section

	$section_id = 'std_section_services_b';
	$slug = 'std_section_services_b_';

  $wp_customize->add_section(
      $section_id,
      array(
          'title'         => __('Services (Type B)', 'std'),
          'priority'      => 110,
          'panel'         => 'sydney_theme_designer_panel',
          'description'   => __('Customize services type A.', 'std'),
      )
  );

	$wp_customize->add_setting(
      $slug.'title_font_size',
      array(
          'default'           => '16',
          'sanitize_callback' => 'absint'
      )
  );

  $wp_customize->add_control(
      $slug.'title_font_size',
      array(
          'label' => __( 'Title font size (px)', 'std' ),
          'section' => $section_id,
          'type' => 'number',
          'priority' => 10
      )
  );

	$wp_customize->add_setting(
      $slug.'icon_size',
      array(
          'default'           => '26',
          'sanitize_callback' => 'absint'
      )
  );

  $wp_customize->add_control(
      $slug.'icon_size',
      array(
          'label' => __( 'Icon size (px)', 'std' ),
          'section' => $section_id,
          'type' => 'number',
          'priority' => 15
      )
  );

	$wp_customize->add_setting(
      $slug.'remove_icon_circle',
      array(
          'sanitize_callback' => 'sydney_sanitize_checkbox',
      )
  );

  $wp_customize->add_control(
      $slug.'remove_icon_circle',
      array(
          'type'      => 'checkbox',
          'label'     => __('Remove icon circle?', 'std'),
          'section'   => $section_id,
          'priority'  => 20,
      )
  );

	$wp_customize->add_setting(
			$slug.'icon_color',
			array(
					'default'           => '#d65050',
					'sanitize_callback' => 'sanitize_hex_color'
			)
	);
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					$slug.'icon_color',
					array(
							'label' => __('Icon color', 'std'),
							'section' => $section_id,
							'priority' => 25
					)
			)
	);

}
add_action( 'customize_register', 'std_customize_register_services_b' );
