<?php

class Rkanner_Theme {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	function __construct() {
		add_action( 'after_setup_theme', array( $this, 'rkanner_after_theme_setup' ) );
		//add_action( 'init', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'rkanner_enqueue_scripts' ), 999 );
		add_action( 'init', array( $this, 'rkanner_portfolio_posttype' ) );
	}
	
	function rkanner_enqueue_scripts() {
	
		wp_enqueue_style( 'rkanner', get_template_directory_uri() . '/css/rkanner.css', '', '');
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'));
		
	}
	
	function rkanner_after_theme_setup(){
		
		register_nav_menus( array(
			'Main Menu' => 'Main menu location',
			'Footer Menu' => 'Footer menu location' 
		));
		
		$defaults = array(
			'width' => 1600,
			'height' => 1080,
			'default-image' => get_template_directory_uri() . '/images/hero.jpg',
		);
		
		add_theme_support( 'custom-header', $defaults );
		add_theme_support('post-thumbnails');
		add_theme_support('post-formats', array( 'status', 'video', 'link', 'quote', 'image'));
		
	}
	
	function rkanner_portfolio_posttype() {
		
		//Lets add all these arguments and display settings first to make it a bit cleaner
		$labels = array( 
			'name' 			=> 'Portfolio',
			'singular_name' => 'Portfolio Item',
			'menu_name'		=> 'Portfolio',
			'add_new'		=> 'Add New',
			'add_new_item'	=> 'Add new portfolio piece',
			'new_item'		=> 'New portfolio piece',
			'edit_item'		=> 'Edit portfolio piece',
			'view_item'		=> 'View portfolio piece',
			'all_items'		=> 'All portfolio pieces'
		);
		
		$args = array(
			'labels' => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'portfolio' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
		);
		
		register_post_type( 'portfolio', $args );
		
	}
	
}

$rkanner = new Rkanner_Theme();