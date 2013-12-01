<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/signal.js"></script>
    <?php wp_head(); ?>
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css" type='text/css' media='all'/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/single.css" type='text/css' media='all'/>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<div class="signal-navbar">
                <div class="signal-nav-stream">
                    <div class="current-artist-player">
                        <img class="current-artist-img" src="<?php echo get_template_directory_uri(); ?>/images_design/nav/rihanna.jpg"/>
                    </div>
                    <div class="signal-audio-player">
                        <div class="signal-audio-info">
                            <span class="signal-current-time"><?php date_default_timezone_set("Europe/Belgrade"); echo date("H:i"); ?></span>
                            <div class="signal-audio-player-artist">Rihanna</div>
                            <div class="signal-audio-player-song"> - Pour it up </div>
                            <span class="clearfix"></span>
                            <div class="signal-audio-player-hostname">Vladimir Vucinic</div>
                            <div class="signal-audio-player-on-air">On air</div>
                        </div>

                        <div class="signal-timeline">
                            <img class="signal-timeline-icon" src="<?php echo get_template_directory_uri(); ?>/images_design/nav/timeline.png"/>
                        </div>
                    </div>
                </div>

                <div class="signal-navigation">
                    <div class="signal-page home">
                        Home
                    </div>
                    <div class="signal-page live">
                        Live
                    </div>
                    <div class="signal-page on-air">
                        On air
                    </div>
                    <div class="signal-page social">
                        Social
                    </div>
                    <div class="signal-page contact">
                        Contact
                    </div>
                </div>

                <div class="signal-nav-social">
                    <div class="nav-social"><img src="<?php echo get_template_directory_uri(); ?>/images_design/nav/facebook.png"></div>
                    <div class="nav-social"><img src="<?php echo get_template_directory_uri(); ?>/images_design/nav/twitter.png"></div>
                    <div class="nav-social"><img src="<?php echo get_template_directory_uri(); ?>/images_design/nav/user.png"></div>
                </div>



            </div><!-- #navbar -->
		</header><!-- #masthead -->
