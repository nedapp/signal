<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

    <!-- HOME STREAM -------------------------------------------------------------------------------------------------->

    <div class="signal-home-stream stretch">
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
    </div>

    <!-- BOTTOM NAVIGATION -------------------------------------------------------------------------------------------->

    <div class="signal-bottom-nav">
        <div class="signal-nav">
            <ul class="signal-menu">
                <li><a href="#" class="signal-nav-top-news">Top news</a></li>
                <li class="nav-social "><a href="#" class="signal-nav-search"><img src="<?php echo get_template_directory_uri(); ?>/images_design/nav/search.png"></a></li>
            </ul>

        </div>
        <div class="signal-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'signal-menu', 'container_class' => 'signal-menu-container' ) ); ?>
        </div>
        <div class="signal-search">
            <form role="search" method="get" class="search-form tabler" action="<?php esc_url( home_url( '/' ) )?>">
                <div class="search-field-wrapper">
                    <input type="search" class="search-field" placeholder="SEARCH SOMETHING" value="<?php get_search_query();?>" name="s" />
                </div>
                <div class="search-button">
                    <input type="submit" class="search-submit" value="Search" />
                </div>
                <div class="search-button">
                    <input type="button" class="search-submit search-cancel" value="Cancel" />
                </div>
            </form>
        </div>

    </div>

    <!-- TOP NEWS ----------------------------------------------------------------------------------------------------->

    <div class="signal-top-news stretch">
        <div class="signal-center-content stretch">
            <div class="top-news-header">
                <div class="top-news-title"><img src="<?php echo get_template_directory_uri(); ?>/images_design/top_news/top_news.png">Top news</div>
            </div>
            <?php query_posts($query_string."&featured=yes&posts_per_page=3"); ?>
            <div class="top-news-single-wrapper fill">
            <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
                <div class="top-news-single" data-id='<?php echo get_the_ID();?>'>
                    <div class="news-image stretch">
                        <?php
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                            the_post_thumbnail(400, 400);
                        }
                        ?>
                    </div>
                    <span class="news-title"><?php the_title(); ?></span>
                    <span class="news-subtitle"><?php the_title(); ?></span>
                    <!--<div class="clearfix"></div>-->
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
            <?php /*query_posts($query_string."&featured=yes"); */
               rewind_posts();
            ?>
            <div class="top-news-preview-wrapper fill">
            <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
                <div class="top-news-preview stretch tabler" data-id='<?php echo get_the_ID();?>'>
                    <div class="news-leading">
                        <div class="news-logo"></div>
                        <div class="news-info">
                            <span class="news-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></span>
                            <span class="news-date"><?php the_date(); ?></span>
                            <span class="news-subtitle"><?php the_title(); ?></span>
                        </div>
                    </div>

                    <div class="top-news-preview-second">
                        <div class="news-text">
                            <?php the_content(200, "Read more"); ?>
                        </div>
                        <div class="news-social">
                        </div>
                    </div>
                    <div class="top-new-preview-images">
                        <!--TODO insert post images-->
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- POSTS -------------------------------------------------------------------------------------------------------->

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
        foreach( $recent_posts as $post ) : setup_postdata($post); ?>
            <?php $shape = get_post_meta( $post["ID"], 'oblik_clanka'); ?>
            <div class="<?php echo $shape[0] ?>" >
                <div class="<?php $shape[0] ?>-image">
                    <?php echo get_the_post_thumbnail($post["ID"], 'full'); ?>
                </div>
                <div class="<?php echo $shape[0] ?>-title">
                    <?php if ($shape[0] == 'vertikalni-pravougaonik'){?>
                    <div class="margintop">
                        <?php } ?>
                        <?php echo $post['post_title']; ?>
                        <div class="<?php echo $shape[0] ?>-excerpt">
                            <?php echo $post['post_excerpt']; ?>
                        </div>
                        <?php if ($shape[0] == 'vertikalni-pravougaonik'){ ?>
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

        <!-- </div>-->
    </div>

    <!--<div style="height: 130%;"></div>-->
<?php get_footer(); ?>