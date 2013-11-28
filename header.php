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


        <div class="signal-home-stream">
            <div class="signal-stream-popups">
                <div class="signal-logo">
                    <img class="signal-logo-img" src="<?php echo get_template_directory_uri(); ?>/images_design/nav/logo.png"/>
                </div>
                <div class="signal-logo-text">
                    Radio <br> signal
                </div>
            </div>

            <div class="signal-icon-popups video">
               <img class="signal-icon-popups-img" src="<?php echo get_template_directory_uri(); ?>/images_design/nav/video.png"/>
            </div>

            <div class="signal-icon-popups audio">
                <img class="signal-icon-popups-img" src="<?php echo get_template_directory_uri(); ?>/images_design/nav/audio.png"/>
            </div>

            <div class="clearfix"></div>

            <div class="signal-stream-live">
                <div class="signal-stream-artist">
                    Rihanna
                </div>
                <div class="signal-stream-song">
                    Pour it up
                </div>
                <div class="signal-stream-on-air">
                    <div class="on-air-icon">
                        <img class="on-air-icon-img" src="<?php echo get_template_directory_uri(); ?>/images_design/big_image/on-air.png"/>
                        On Air
                    </div>
                    <div class="signal-host-name">
                        Vladimir Vucinic
                    </div>
                    <div class="signal-show-name">
                        Jutarnji program
                    </div>
                </div>
            </div>

            <div class="signal-home-stream-play-btn"></div>
            <div class="signal-stream-nav">
                <div class="signal-blur-nav give-away">Give away</div>
                <div class="signal-blur-nav">Top news</div>
                <div class="signal-search-nav">
                    <div class="signal-search-nested-nav">
                        <img class="signal-search-nav-img" src="<?php echo get_template_directory_uri(); ?>/images_design/big_image/search.png"/>
                    </div>
                </div>
            </div>
        </div>

<!--		<div id="main" class="site-main">-->
        <div class="signal-top-news">
            <div class="signal-center-content">
                <div class="top-news-header">
                    <div class="top-news-logo"></div>
                    <div class="top-news-title">Top news</div>
                </div>

                <div class="top-news-content signal-fill">

                    <?php query_posts($query_string."&featured=yes"); ?>
                    <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
                    <div class="top-news-single" data-id='<?php echo get_the_ID();?>'>
                        <div class="top-news-layer">
                            <?php
                            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                the_post_thumbnail(400, 400);
                            }
                            ?>
                        </div>
                        <!--<div class="clearfix"></div>-->
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>

                    <?php query_posts($query_string."&featured=yes"); ?>
                    <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
                    <div class="top-news-single-preview" data-id='<?php echo get_the_ID();?>'>
                        <div class="top-news-single-preview-leading">
                            <div class="top-news-single-preview-logo">

                            </div>
                            <div class="top-news-single-preview-title">
                                <?php the_title(); ?>
                            </div>
                        </div>

                        <div class="top-news-single-preview-second">
                            <div class="top-news-single-preview-text">
                                <?php the_content(50, "Read more"); ?>
                            </div>
                            <div class="top-news-single-preview-social">

                            </div>
                        </div>

                        <div class="top-news-single-preview-image">

                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

            <div class="signal-posts">
<!--                <div class="signal-posts-layer">-->
                    <div class="signal-posts-header">
                        <div class="signal-posts-logo">

                        </div>
                        <div class="signal-posts-title">
                             Posts
                        </div>
                        <div class="signal-posts-more">
                              More ...
                        </div>
                    </div>

                    <div class="signal-posts-listing">
                        <?php
                        wp_reset_postdata();
                        global $post;
                        $args = array( 'numberposts' => '4' );
                        $recent_posts = wp_get_recent_posts( $args );
                        $i = 0;
                        foreach( $recent_posts  as $post ) : setup_postdata($post); ?>
                            <div class="<?php echo get_post_meta( $post["ID"], 'oblik_clanka')[0] ?>" >
                                <div class="<?php echo get_post_meta( $post["ID"], 'oblik_clanka')[0] ?>-image">
                                    <?php echo get_the_post_thumbnail($post["ID"], 'full'); ?>
                                </div>
                                <div class="<?php echo get_post_meta( $post["ID"], 'oblik_clanka')[0] ?>-title">
                                    <?php if (get_post_meta( $post["ID"], 'oblik_clanka')[0] == 'vertikalni-pravougaonik'){?>
                                        <div class="margintop">
                                    <?php } ?>
                                    <?php echo  $post['post_title']; ?>
                                    <div class="<?php echo get_post_meta( $post["ID"], 'oblik_clanka')[0] ?>-excerpt">
                                        <?php echo  $post['post_excerpt']; ?>
                                    </div>
                                    <?php if (get_post_meta( $post["ID"], 'oblik_clanka')[0] == 'vertikalni-pravougaonik'){ ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                                $i++;
                                if ($i == 2) {
                             ?>
                                <div class="clearfix"></div>
                            <?php } ?>
                        <?php endforeach; wp_reset_postdata(); ?>

<!--                    </div>-->
                </div>


            </div>