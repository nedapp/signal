<!-- BOTTOM NAVIGATION -------------------------------------------------------------------------------------------->
<div class="menu-bottom-wrapper">
	<div class="page-content">
		<div class="menu-bottom">
			<div class="menu">
				<ul>
					<?php if (is_home()) {?>
					<li class="menu-item"><a href="#" class="nav-news menu-item">Top news</a></li>
					<?php } ?>
					<li class="menu-item square "><a href="#" class="nav-search"><img
								src="<?php echo get_template_directory_uri(); ?>/images_design/nav/search.png"></a></li>
				</ul>
			</div>
			<?php if (is_home()) {?>
			<div class="menu">
				<?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_class' => 'menu', 'container_class' => 'menu-container')); ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="search-form">
		<form role="search" method="get" class="tabler" action="<?php esc_url(home_url('/')) ?>">
			<div class="search-field-wrapper">
				<input type="search" class="search-field" placeholder="SEARCH SOMETHING"
					   value="<?php get_search_query(); ?>" name="s"/>
			</div>
			<div class="search-button">
				<input type="submit" class="search-submit" value="Search"/>
			</div>
			<div class="search-button">
				<input type="button" class="search-submit search-cancel" value="Cancel"/>
			</div>
		</form>
	</div>

</div>
