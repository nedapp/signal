<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php 
// determine which post should be displayed here
// by defined starting and finishing hour of show

global $wpdb;
date_default_timezone_set('Europe/Belgrade');
$current_hour = date('G');
$currentShow = $wpdb->get_results("SELECT wp_posts.*
							FROM wp_posts 
							JOIN wp_postmeta as start_date
							ON 
							(wp_posts.ID = start_date.post_id AND start_date.meta_key = 'pocetak_emisije')
							JOIN wp_postmeta as end_date
							ON 
							(wp_posts.ID = end_date.post_id AND end_date.meta_key = 'zavrsetak_emisije')
							AND start_date.meta_value <= " . $current_hour . "
							AND end_date.meta_value > " . $current_hour . "
							AND wp_posts.post_status = 'publish'
							");

//var_dump($currentShow);
$pocetak_emisije = get_post_meta( $currentShow[0]->ID, 'pocetak_emisije');
$zavrsetak_emisije = get_post_meta( $currentShow[0]->ID, 'zavrsetak_emisije');
$dani = ['Nedelja', 'Ponedeljak', 'Utorak', 'Sreda', 'Četvrtak', 'Petak', 'Subota'];

$nextShows = $wpdb->get_results("SELECT wp_posts.* 
								 FROM wp_posts
								 JOIN wp_postmeta start_date
								 ON 
								 (wp_posts.id = start_date.post_id AND start_date.meta_key = 'pocetak_emisije')
								 AND 
								 start_date.meta_value >= " . $zavrsetak_emisije[0] . "
								 AND wp_posts.post_status = 'publish'");

// pocetak i kraj dve naredne emisije
$pocetak_sl_emisije_1 = get_post_meta( $nextShows[0]->ID, 'pocetak_emisije');
$zavrsetak_sl_emisije_1 = get_post_meta( $nextShows[0]->ID, 'zavrsetak_emisije');

$pocetak_sl_emisije_2 = get_post_meta( $nextShows[1]->ID, 'pocetak_emisije');
$zavrsetak_sl_emisije_2 = get_post_meta( $nextShows[1]->ID, 'zavrsetak_emisije');
?>

<div>
	<div class="radio-show-leading-image">
		<?php 
		
		$post_object = get_post($currentShow[0]->ID);
		$post = $post_object;   
   		setup_postdata( $post );

   		?>
		<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'full'); endif; ?>
		<div class="radio-show-basic">
			<div class="radio-show-timetable"> <span class="padding-left20"> <?php echo($pocetak_emisije[0]) . ".00" ?> - <?php echo $zavrsetak_emisije[0]  . ".00"?> </span> </div>
			<div class="radio-show-name"> <?php echo($currentShow[0]->post_title) ?></div>
		</div>
	</div>

	<div class="live-radio-intro">
		<div class="live-radio-intro-title">
			<div class="live-radio-post-icon"></div> 
			<div class="live-radio-current-date single-uppercase float-left">
					<span class="single-bold"><?php echo date('d.'); ?></span>
					<span><?php echo date('F Y.'); ?></span>
			</div>
		</div>
		<div class="radio-shows">
			<div class="live-radio-current-show-date">
				<div class="day-name">
					<?php 
						$index = date('w', time()); 
						echo ($dani[$index]);
					?>
				</div>
				<a href="<?php echo get_site_url() . '/shows?day=' . ($index + 1) ?>" ><span class="next"></span></a>
				<div class="current-day">
					<?php echo $date = date('d.m.Y', time()); ?>
				</div>
				<div class="current-time">
					<?php 
						echo $date = date('H:i', time());
					?>
				</div>
				<a href="<?php echo get_site_url() . '/shows?day=' . ($index - 1) ?>" ><span class="prev"></span></a>
			</div>
			<div class="live-radio-show">
				<div class="info">
					<div class="show-title"> 
						<?php echo $currentShow[0]->post_title; ?>
					</div>
					<div class="show-start"> 
						start
						<br>
						<span class="show-start-time"></span>
						<span><?php echo $pocetak_emisije[0] . ".00" ?></span>
					</div>
					<div class="on-air"> 
						on air
					</div>
				</div>
				<div class="image">
					<?php echo get_the_post_thumbnail($currentShow[0]->ID, array(300, 288)); ?>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="live-radio-next-show first">
				<div class="next-show-image">
					<?php echo get_the_post_thumbnail($nextShows[0]->ID, array(300, 288)); ?>
					<div class="next-show-info">
						<div class="show-start live-timetable"> 
							<span class="next-show-start-time"></span>
							<span><?php echo $pocetak_sl_emisije_1[0] . ".00 - " .  $zavrsetak_sl_emisije_1[0] . ".00" ?></span>
						</div>
						<div class="next-show-title">
							<?php echo $nextShows[0]->post_title; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="live-radio-next-show">
				<div class="next-show-image">
					<?php echo get_the_post_thumbnail($nextShows[1]->ID, array(300, 288)); ?>
					<div class="next-show-info">
						<div class="show-start live-timetable"> 
							<span class="next-show-start-time"></span>
							<span><?php echo $pocetak_sl_emisije_2[0] . ".00 - " .  $zavrsetak_sl_emisije_2[0] . ".00" ?></span>
						</div>
						<div class="next-show-title">
							<?php echo $nextShows[1]->post_title; ?>
						</div>
					</div>
				</div>
			</div>
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
