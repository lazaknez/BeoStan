<?php
  $theme = wp_get_theme();
?>
<div class="c4d-welcome-header">
  <div class="c4d-welcome-header-inner">
    <div class="left">
      <a class="c4d-welcome-logo" href="http://coffee4dev.com/landings/28-tet-landing/index.html">
        <img src="<?php echo get_template_directory_uri().'/menu-admin-icon-48x48.png'; ?>">
        <span class="version"><?php _e( 'Free', 'tet30' ); ?></span>
        <span class="version">v<?php echo $theme->get('Version'); ?></span>
      </a>
    </div>
    <div class="right">
      <p>
        <a href="http://30tet.coffee4dev.com" target="_blank" rel="noopener"><?php _e('Demo', 'tet30'); ?></a>&nbsp;&nbsp;
        <a href="http://coffee4dev.com/docs/28-doc/index.html" target="_blank" rel="noopener"><?php _e('Document', 'tet30'); ?></a>&nbsp;&nbsp;
        <a href="http://coffee4dev.com/landings/28-tet-landing/index.html" target="_blank" rel="noopener"><?php _e('Upgrade Pro', 'tet30'); ?></a>&nbsp;&nbsp;
        <a href="http://coffee4dev.com/contact/" target="_blank" rel="noopener"><?php _e('Contact', 'tet30'); ?></a>
      </p>
    </div>
  </div>
</div>
