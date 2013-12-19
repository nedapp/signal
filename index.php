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

    <div class="page stream">
        <div class="page-content">
			<div class="icon-popups">
				<img class="video" src="<?php echo get_template_directory_uri(); ?>/images_design/nav/video.png"/>
				<img class="audio" src="<?php echo get_template_directory_uri(); ?>/images_design/nav/audio.png"/>
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
		<?php get_header('search'); ?>
    </div>

    <!-- TOP NEWS ----------------------------------------------------------------------------------------------------->

    <div class="page news">
        <div class="page-content">
            <div class="header">
                <div class="title"><img src="<?php echo get_template_directory_uri(); ?>/images_design/top_news/top_news.png">Top news</div>
            </div>
            <?php query_posts($query_string."&featured=yes&posts_per_page=3"); ?>
            <div class="post-image-container">
            <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
                <div class="post-image" data-id='<?php echo get_the_ID();?>'>
                    <div class="image">
                        <?php
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                            the_post_thumbnail(400, 400);
                        }
                        ?>
                    </div>
                    <div class="image-overlay"></div>
                    <span class="title"><?php the_title(); ?></span>
                    <span class="subtitle"><?php the_title(); ?></span>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
            <?php rewind_posts();?>
            <div class="post-preview-container">
            <?php if(have_posts()) : while ( have_posts() ) : the_post();
                $gallery = get_post_gallery_images($post);
                ?>
                <div class="post-preview <?php if (count($gallery)) echo " gallery"; ?>" data-id='<?php echo get_the_ID();?>'>
                    <div class="post-info">
                        <div class="logo"></div>
                        <div class="info">
                            <span class="title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></span>
                            <span class="date"><?php the_date(); ?></span>
                            <span class="subtitle"><?php the_title(); ?></span>
                        </div>
                    </div>

                     <div class="text">
                        <?php the_content("Read more..."); ?>
                         <div class="social">
                         </div>
                    </div>
                    <div class="post-images">
                        <!--TODO insert post images-->
                        <?php
                        $image_list = '';
                        // Loop through each image in each gallery
                        foreach ($gallery as $image) {
                            $image_list .= "<img src=" . $image . ">";
                        }
                        echo $image_list;
                        ?>
                    </div>


                </div>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- POSTS -------------------------------------------------------------------------------------------------------->

    <div class="page posts">
        <div class="page-content">
            <div class="header">
                <div class="title"><img src="<?php echo get_template_directory_uri(); ?>/images_design/single/post-title.png">
                    <span>Posts</span>
                    <a class="title link" href="">More...</a>
                </div>

            </div>
            <div class="posts-listing">
                <?php
                wp_reset_postdata();
                global $post;
                $args = array( 'numberposts' => '4' );
                $recent_posts = wp_get_recent_posts( $args );
                $i = 0;
                foreach( $recent_posts as $post ) : setup_postdata($post); ?>
                    <?php $shape = get_post_meta( $post["ID"], 'post-form'); ?>
                    <div class="post <?php echo $shape[0] ?>" >
                        <div class="post-image">
                            <?php echo get_the_post_thumbnail($post["ID"], 'full'); ?>
                        </div>
                        <div class="title">
                            <a href="<?php echo get_permalink($post["ID"]);?>"><span><?php echo $post['post_title']; ?></span></a>
                            <div class="excerpt">
                                <span><?php echo $post['post_excerpt']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>

            </div>
        </div>
    </div>

    <!--<div style="height: 130%;"></div>-->
<?php get_footer(); ?>