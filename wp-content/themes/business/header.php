<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<title><?php wp_title(''); ?></title>

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- mobile meta -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/responsive-nav.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.cookiebar.js"></script>


		<?php wp_head(); ?>
		
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/js/responsive-nav.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/js/jquery.cookiebar.css">
		
		<!-- Drop Google Analytics here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

	<div class="off-canvas-wrap">
		<div class="inner-wrap">
			<div id="container">
	
				<header class="header" role="banner">
				
				    <div class="row">
				      <div class="large-6 medium-6 small-12 columns">
				        <div class="logo">
				          <a href="<?php echo get_permalink( 9 );?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png"/></a>
				        </div>
				      </div>
				      <div class="large-6 medium-6 small-12 columns contactOuter sortOverflow">
				      	<div class="contact">
				        	 <span>Call us today: <a href="tel:01234567890">01234 567 890</a></span>
				      	</div>
				      </div><!-- end .columns.contactOuter.sortOverflow -->
				    </div><!-- end .row -->
	
					<div id="inner-header" class="row">
										
						
						 <?php // get_template_part( 'partials/nav', 'offcanvas' ); ?> 
						
						 <?php  get_template_part( 'partials/nav', 'topbar' ); ?>
						 
						 <?php // get_template_part( 'partials/nav', 'offcanvas-sidebar' ); ?>  								
						
						<!-- You only need to use one of the above navigations.
							 Offcanvas-sidebar adds a sidebar to a "right" offcanavas menus. -->
										
					</div> <!-- end #inner-header -->
	
				</header> <!-- end header -->