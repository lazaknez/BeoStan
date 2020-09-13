<?php
/**
 * @package C4D WordPress theme
 */
global $tet30;
$class = isset($tet30['logo-mobile']['url']) ? 'has-mobile' : '';
?>
<div class="flex-display flex-align-center flex-justify-center">
	<div class="site-branding <?php echo esc_attr($class); ?>">
		<?php
			echo '<a class="logo-desktop" href="'.esc_url(site_url()).'">';
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
			    echo '<span class="logo-text">'. get_bloginfo( 'name' ). '</span>';
			}
			echo '</a>';
		?>
	</div><!-- .site-branding -->
</div>