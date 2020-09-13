<?php
/**
 * @package C4D WordPress theme
 */
global $tet30;
?>
<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'under-big-search' )) { ?>
	<div class="tet30-menu">
		<div id="menu-toggle" class="menu-toggle">
			<div></div>
			<div></div>
			<div></div>
		</div>
		<div id="site-header-menu" class="site-header-menu">
			<div id="menu-toggle-close" class="menu-toggle">
				<div></div>
				<div></div>
				<div></div>
			</div>

			<?php if (!isset($tet30['header-global-layout']) || isset($tet30['header-global-layout']) && $tet30['header-global-layout'] != 'header-big-search'): ?>
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'tet30' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class'     => 'primary-menu',
							 ) );
						?>
					</nav><!-- .main-navigation -->
				<?php endif; ?>
			<?php endif; ?>
			<?php if (isset($tet30['header-global-layout']) && $tet30['header-global-layout'] == 'header-big-search'): ?>
				<?php if ( has_nav_menu( 'under-big-search' ) ) : ?>
					<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Header Big Search Menu', 'tet30' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'under-big-search',
								'menu_class'     => 'under-big-search-menu',
							 ) );
						?>
					</nav><!-- .main-navigation -->
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .site-header-menu -->
	</div>
<?php } else { ?>
	<?php if (current_user_can('edit_theme_options')): ?>
		<a href="<?php echo esc_url(site_url() . '/wp-admin/nav-menus.php'); ?>" class="tet30-button-1"><?php esc_html_e('Create Menu', 'tet30'); ?></a>
	<?php endif; ?>
<?php } ?>