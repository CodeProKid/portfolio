<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php ( is_front_page() ) ? bloginfo( 'name' ) : wp_title( ' | ' . get_bloginfo( 'name' ), true, 'right' ); ?></title>
		<meta name="author" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <meta name="viewport" content="width=device-width">
        <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/core/images/icons'; ?>/images/favicon.ico">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() . '/core/images/icons'; ?>/images/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() . '/core/images/icons'; ?>/images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() . '/core/images/icons'; ?>/images/apple-touch-icon-114x114.png">
		<script type="text/javascript" src="//use.typekit.net/opr6rsp.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    	<div class="wrap">
	    	<aside class="main">
	    		<div class="logoHolder">
		    		<a href="<?php echo bloginfo( 'url' ); ?>">
		    			<img src="<?php echo get_template_directory_uri() . '/images/logo.svg'; ?>" class="svg logo"/>
		    		</a>
	    		</div>
	    		<ul class="tagline">
	    			<li class="left">Developer</li>
	    			<li class="middle">Designer</li>
	    			<li class="right"></li>
	    		</ul>
	    		<div class="mobileMenuHolder">
	    			<a href="#" class="mobileMenu"><div class="top"></div><div class="middle"></div><div class="bottom"></div></a>
	    		</div>
	    		<?php 
	    		$nav_defaults = array(
	    			'theme_location'	=> 'Main Menu',
	    			'container' 		=> 'nav',
	    			'container_class'	=> 'main-nav-container',
	    			'menu-class'		=> 'main-nav',
	    			'echo'				=> 'true',
	    			'depth'				=> 3
	    		);
	    		wp_nav_menu( $nav_defaults );
	    		
	    		$bottom_nav = array(
	    			'theme_location'	=> 'Footer Menu',
	    			'container'			=> 'nav',
	    			'container_class'	=> 'bottom-nav-container',
	    			'menu-class'		=> 'bottom-nav'
	    		);
	    		wp_nav_menu( $bottom_nav );
	    		?>
	    	</aside>
	    	<main>