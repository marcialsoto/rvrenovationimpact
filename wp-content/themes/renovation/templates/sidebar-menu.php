<section class="widget">
    <?php
	if (has_nav_menu('primary_navigation')) :
		wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-sidebar']);
	endif;
	?>
</section>
