<?php

/**
 *
 * @link              https://kharis.risbl.co/
 * @since             0.05
 * @package           Sydney_Theme_Designer
 *
 * @wordpress-plugin
 * Plugin Name:       Sydney Theme Designer
 * Plugin URI:        https://kharis.risbl.co/sydney-theme-designer/
 * Description:       Redesign Sydney theme's elements easily from customizer panel
 * Version:           0.05
 * Author:            Kharis Sulistiyono
 * Author URI:        https://kharis.risbl.co/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       std
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set up and initialize
 */
class Sydney_Theme_Designer {

	private static $instance;

  public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );
		add_action( 'plugins_loaded', array( $this, 'includes' ), 4 );
		add_action( 'wp_enqueue_scripts', array($this, 'scripts'), 8 );

	}

	function constants() {

		define( 'STD_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'STD_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

	}

	function includes() {

		require_once( STD_DIR . 'inc/general-functions.php' );
		require_once( STD_DIR . 'inc/customizer.php' );
		require_once( STD_DIR . 'sections/header.php' );
		require_once( STD_DIR . 'sections/services.php' );
		require_once( STD_DIR . 'sections/services-type-b.php' );
		require_once( STD_DIR . 'sections/employees.php' );
		require_once( STD_DIR . 'sections/facts.php' );
		require_once( STD_DIR . 'sections/testimonials.php' );
		require_once( STD_DIR . 'sections/portfolio.php' );
		require_once( STD_DIR . 'sections/clients.php' );
		require_once( STD_DIR . 'sections/latest-news.php' );

	}

	function scripts() {
		wp_enqueue_style( 'std-main-styles', STD_URI . 'assets/css/main.css' );
		wp_enqueue_script( 'std-main-scripts', STD_URI . 'assets/js/main.js', array('jquery'),'', true );
		wp_enqueue_script( 'std-custom-scripts', STD_URI . 'assets/js/custom.js', array('jquery'),'', true );
	}

  /**
	 * Returns the instance.
	 */
	public static function get_instance() {

		if ( !self::$instance )
			self::$instance = new self;

		return self::$instance;
	}

} // End of class

function sydney_theme_designer() {

		return Sydney_Theme_Designer::get_instance();

}
add_action('plugins_loaded', 'sydney_theme_designer', 1);
