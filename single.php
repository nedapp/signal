<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0	
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="single-leading-image">
				<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'full'); endif; ?>
				<div class="current-post-title single-uppercase"> 
					<span class="single-bold"><?php the_title(); ?></span>
					<br/>
					<?php $teaser = get_post_meta( $wp_query->post->ID, 'signal_teaser'); echo $teaser[0]; ?>
				</div>
				<?php get_header("search"); ?>
			</div>
			<div class="single-intro">
				<div class="single-intro-title float-left">
					<div class="post-icon"></div> 
					<div class="current-date single-uppercase float-left">
							<span class="single-bold"><?php echo date('d.'); ?></span>
							<span><?php echo date('F Y.'); ?></span>
					</div>
					<div class="single-excerpt ">
						<?php the_excerpt() ?>
					</div>
				</div>
			</div>

			<div class="single-content">
				<div class="single-content-text">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  						<?php the_content(); ?>
					<?php endwhile; endif; ?>	
				</div>
			</div>

			<div class="recent-posts">
				<div class="recent-posts-block">
					<?php 
						$args = array ('exclude' => $wp_query->post->ID,
										'category' => 13);
						$recent_posts = wp_get_recent_posts( $args);

						foreach( $recent_posts  as $post ) : setup_postdata($post); 
					?>	
					<div class="recent-post-single float-left">
						<div class="post-image">
							<?php echo get_the_post_thumbnail($post["ID"], 'single-page-thumb'); ?>
							<div class="single-post-title text-aligning">
								<a href="<?php echo get_permalink($post["ID"]) ?>"><?php echo $post['post_title'];  ?></a>
							</div>	
						</div>
					</div>
					<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>