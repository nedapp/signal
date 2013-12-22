<div class="menu-wrapper menu-main">
	<div class="menu-content tabler">
		<div class="menu">
			<div class="artist">
				<img src="<?php echo get_template_directory_uri(); ?>/images_design/nav/rihanna.jpg"/>
			</div>
			<div class="player-wrapper">
				<?php include('player-inline.php'); ?>
			</div>
			<div class="icons">
				<div class="brand">
					<div class="signal-logo">
						<img class="signal-logo-img" src="<?php echo get_template_directory_uri(); ?>/images_design/nav/logo.png"/>
					</div>
					<div class="signal-logo-text">
						Radio <br> signal
					</div>
				</div>
			</div>
		</div>

		<div class="menu">
			<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'menu tabler', 'container_class' => 'menu-container')); ?>
		</div>
		<div class="menu">
			<div class="menu-item square"><img
					src="<?php echo get_template_directory_uri(); ?>/images_design/nav/facebook.png"></div>
			<div class="menu-item square"><img
					src="<?php echo get_template_directory_uri(); ?>/images_design/nav/twitter.png"></div>
			<div class="menu-item square"><img
					src="<?php echo get_template_directory_uri(); ?>/images_design/nav/user.png"></div>
		</div>
	</div>
</div>