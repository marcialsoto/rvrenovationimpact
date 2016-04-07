<header class="header--super">
	<div class="wrap container lang">
		<div class="content">
				<?php
					if (has_nav_menu('social_navigation')) :
						wp_nav_menu(['theme_location' => 'social_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
					endif;
				?>
				<div class="header__lang navbar-right">
					<?php
				      
				        wp_nav_menu( array('menu' => 'Language Navigation' ));
				      
				     ?>
				</div>
		</div>
	</div>
	<div class="wrap container branding">
		<div class="content">
			<div class="container">
				<div class="header__branding">
					<h1 class="logo">
						<a href="<?= esc_url(home_url('/')); ?>">
								<span>R&V Renovation</span>
						</a>
					</h1>
				</div>
				<div class="header__info">
					<?php dynamic_sidebar( 'sidebar-header' ); ?>
				</div>
			</div>
		</div>
	</div>
</header>
