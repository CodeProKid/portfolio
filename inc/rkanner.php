<?php

class Rkanner_Theme {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	function __construct() {
		//add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
		//add_action( 'init', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ), 999 );
	}
	
	function wp_enqueue_scripts() {
	
		wp_enqueue_style('rkanner', get_template_directory_uri() . '/css/rkanner.css', '', '');
		wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'));
		
	}
	
}

$rkanner = new Rkanner_Theme();