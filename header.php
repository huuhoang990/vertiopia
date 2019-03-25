<!DOCTYPE HTML>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html class="smooth_slider_fouc" dir="ltr" lang="en-US"><!--<![endif]-->

<head>
	<title><?php bloginfo( 'name' );?></title>
    <meta charset="utf-8"/>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Dang Phuoc Loc" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    
    <meta name = "viewport" content = "width=device-width, maximum-scale = 1, minimum-scale=1" />
     
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/menu.css" />  
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/responsive.css" />
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.png" type="image/x-icon" />
    
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/clients.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#menu-button').click(function(){
                $('#mobile-list').slideToggle();
            });
            
            $('#footer-menu-button').click(function(){
                $('#footer-mobile-list').slideToggle();
            });
        });
    </script>
    
</head>

<body>
    <div class="wrapper">
        <!--Header-->
        <div class="header">
            <div class="menu">                
                <div class="menu-content">
                    <a href="<?php bloginfo('home'); ?>" class="logo"><img alt="Vertiopia DDS" src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></a>				
                    <?php 
						//multi language 
						do_action('icl_language_selector'); 
					?>
                    <!--Top Menu-->
                    <div id='cssmenu'>
                    	<?php include(TEMPLATEPATH.'/top-menu.php'); ?>
                    </div>
              		<!--End-Top-Menu-->
                </div>
            </div>
            <!--banner-->
         	<?php include(TEMPLATEPATH.'/banner.php'); ?>
            <!--end-banner-->
        </div>
        <!--Mobile Menu-->
        <div class="mobile-menu">
            <a class="menu-button" id="menu-button" href="javascript:;"><span>Menu</span></a>
            <div id="mobile-list">
                <ul>
                	<?php include(TEMPLATEPATH.'/top-menu.php'); ?>
                </ul>
            </div>
        </div>