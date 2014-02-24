<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php ( is_front_page() ) ? bloginfo( 'name' ) : wp_title( ' | ' . get_bloginfo( 'name' ), true, 'right' ); ?></title>
		<meta name="description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
		<meta name="author" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <meta name="viewport" content="width=device-width">
        <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/core/images/icons'; ?>/images/favicon.ico">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() . '/core/images/icons'; ?>/images/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() . '/core/images/icons'; ?>/images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() . '/core/images/icons'; ?>/images/apple-touch-icon-114x114.png">
		<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    	<div class="wrap">
    	<aside>
    		<img src="<?php echo get_template_directory_uri() . '/images/logo.svg'; ?>" class="svg logo"/>
    		<ul class="tagline">
    			<li class="left">Developer</li>
    			<li class="middle">Designer</li>
    			<li class="right"></li>
    		</ul>
    		<?php 
    		$nav_defaults = array(
    			'theme_location'	=> 'Main Menu',
    			'container' 		=> 'nav',
    			'container_class'	=> 'main-nav-container',
    			'menu-class'		=> 'main-nav',
    			'echo'				=> 'true',
    			'depth'				=> 3
    		);
    		wp_nav_menu( $nav_defaults ); ?>
    	</aside>