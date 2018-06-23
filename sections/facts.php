<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function std_customize_register_facts( $wp_customize ) {

	// Section

	$section_id = 'std_section_facts';
	$slug = 'std_section_facts_';

  $wp_customize->add_section(
      $section_id,
      array(
          'title'         => __('Facts', 'std'),
          'priority'      => 120,
          'panel'         => 'sydney_theme_designer_panel',
          'description'   => __('Customize facts.', 'std'),
      )
  );

  $wp_customize->add_setting(
      $slug.'0',
      array(
          'sanitize_callback' => 'sydney_sanitize_checkbox',
      )
  );

  $wp_customize->add_control(
      $slug.'0',
      array(
          'type'      => 'checkbox',
          'label'     => __('Edit employees?', 'std'),
          'section'   => $section_id,
          'priority'  => 10,
      )
  );

}
add_action( 'customize_register', 'std_customize_register_facts' );
