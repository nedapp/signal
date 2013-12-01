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
					<?php echo get_post_meta( $wp_query->post->ID, 'signal_teaser')[0]; ?>
				</div>
			</div>
			<div class="single-intro">
				<div class="margin-left100 height100 float-left">
					<div class="post-icon margin-right20 margin-top70"></div> 
					<div class="single-uppercase white-font font-size60 float-left line-height60 margin-top70">
							<span class="single-bold"><?php echo date('d.'); ?></span>
							<span><?php echo date('F Y.'); ?></span>
					</div>
					<div class="single-italic margin-left200 margin-bottom120 white-font margin-right100 font-size30 text-align-justify margin-top180">
						<?php the_excerpt() ?>
					</div>
				</div>
			</div>

			<div class="single-content">
				<div class="margin-left400 font-size20 background-white padding100">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  						<?php the_content(); ?>
					<?php endwhile; endif; ?>	
				</div>
			</div>

			<div class="recent-posts background-pink">
				<div class="margin-left500 padding-top40">
					<?php 
						$args = array ('exclude' => $wp_query->post->ID);
						$recent_posts = wp_get_recent_posts( $args);

						foreach( $recent_posts  as $post ) : setup_postdata($post); 
					?>	
					<div class="recent-post-single float-left padding-right20">
						<div class="post-image position-relative">
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>