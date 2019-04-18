<?php
/*
Plugin Name: Fixed Footer Plugin
Description: A plugin to display a mobile responsive fixed footer for cta's and announcements.
Version: 1.0.0
License: GPL
Author: Chris Clarke
Author URI: http://www.chrisclarkewebservices.co.uk
Text Domain: fixed-footer


*/
defined( 'ABSPATH' ) or die( 'duck!' );

	define( 'GENESIS_FIXED_FOOTER_VERSION', '1.0.0' );


/**
 * Load the CSS files
 */
add_action( 'wp_enqueue_scripts', 'genesis_fixed_footer_styles' );
 
 
function genesis_fixed_footer_styles() {
	wp_register_style( 'footer-styles', plugins_url('/assets/css/style.css', __FILE__), array(), GENESIS_FIXED_FOOTER_VERSION_VERSION );
	wp_enqueue_style( 'footer-styles' );
}

add_action( 'init', function () {

	genesis_register_sidebar( array(
		'id' => 'fixed-footer',
		'name' => __( 'Fixed Footer', 'genesis' ),
		'description' => __( 'Custom Widget Area', 'genesis' ),
		) );
	} );
	
		
	add_action( 'genesis_after_footer', 'add_genesis_footer_widget_area' );
		function add_genesis_footer_widget_area() {
	                genesis_widget_area( 'fixed-footer', array(
			'before' => '<div class="fixed-footer widget-area">',
			'after'  => '</div>',
	    ) );

}
