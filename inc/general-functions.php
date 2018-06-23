<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Localize script

add_action( 'wp_enqueue_scripts', 'std_localize_scripts', 9999 );
function std_localize_scripts() {

  $std = array();
	$std['header_image'] = array(
		'title' 			=> get_theme_mod('std_header_image_main_title'),
		'subtitle' 		=> get_theme_mod('std_header_image_sub_title'),
		'buttonText' 	=> get_theme_mod('std_header_image_button_text'),
		'buttonURL'   => get_theme_mod('std_header_image_button_url'),
		'height'			=> get_theme_mod('std_header_image_height'),
		'hideBtn'     => get_theme_mod('std_header_image_hide_btn')
	);

	$std['header_branding'] = array(
		'displayLogoAndTagline' => get_theme_mod('std_header_branding_display_both_logo_and_tagline'),
		'site_name' => get_bloginfo('name'),
		'site_desc' => get_bloginfo('description')
	);

  wp_localize_script( 'std-main-scripts', 'std', $std );

}

// Inline styles
add_action( 'wp_enqueue_scripts', 'std_inline_styles' );
function std_inline_styles($custom) {

	$custom = '';

	// Branding logo
	if( '' != get_theme_mod('std_header_branding_logo_height') ) {
		$logo_height = get_theme_mod('std_header_branding_logo_height');
		$custom .= ".site-header .site-logo{ max-height:".intval($logo_height)."px }" . "\n";
	}

	// Services type A
	if( '' != get_theme_mod('std_section_services_title_font_size') ) {
		$service_title_font_size = get_theme_mod('std_section_services_title_font_size');
		$custom .= ".widget_sydney_services_type_a .roll-icon-box .content h3{ font-size:".intval($service_title_font_size)."px }" . "\n";
	}

	if( '' != get_theme_mod('std_section_services_icon_size') ) {
		$icon_size = get_theme_mod('std_section_services_icon_size');
		$custom .= ".widget_sydney_services_type_a .roll-icon-box .icon i{font-size:".intval($icon_size)."px}" . "\n";
	}

	if( false != get_theme_mod('std_section_services_remove_icon_circle') ) {
		$custom .= ".widget_sydney_services_type_a .roll-icon-box .icon{border: none}" . "\n";
	}

	if( '#d65050' != get_theme_mod('std_section_services_icon_color') ) {
		$service_a_icon_color =  get_theme_mod('std_section_services_icon_color');
		$custom .= ".widget_sydney_services_type_a .roll-icon-box .icon i{color:".esc_attr($service_a_icon_color)."}" . "\n";
	}

	// Services type B
	if( '' != get_theme_mod('std_section_services_b_title_font_size') ) {
		$service_title_font_size = get_theme_mod('std_section_services_b_title_font_size');
		$custom .= ".widget_sydney_services_type_b .roll-icon-list .content h3{ font-size:".intval($service_title_font_size)."px }" . "\n";
	}

	if( '' != get_theme_mod('std_section_services_b_icon_size') ) {
		$icon_size = get_theme_mod('std_section_services_b_icon_size');
		$custom .= ".widget_sydney_services_type_b .roll-icon-list .icon i{font-size:".intval($icon_size)."px}" . "\n";
	}

	if( false != get_theme_mod('std_section_services_b_remove_icon_circle') ) {
		$custom .= ".widget_sydney_services_type_b .roll-icon-list .icon{border: none}" . "\n";
	}

	if( '#d65050' != get_theme_mod('std_section_services_b_icon_color') ) {
		$service_b_icon_color =  get_theme_mod('std_section_services_b_icon_color');
		$custom .= ".widget_sydney_services_type_b .roll-icon-list .icon i{color:".esc_attr($service_b_icon_color)."}" . "\n";
	}

	wp_add_inline_style( 'std-main-styles', $custom );

}

// Add a search form to menu navigation
add_filter('wp_nav_menu_items', 'std_add_search_from_to_nav', 10, 2);
function std_add_search_from_to_nav($items, $args){

	if( true != get_theme_mod('std_main_menu_add_search_form') ) {
		return false;
	}

  if ($args->theme_location == 'primary') {
      $items .= '<li class="top-search-menu">'.get_search_form(false).'</li>';
  }
  return $items;

}
