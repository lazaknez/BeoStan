<?php
  $adminUrl = get_admin_url();
?>
<div class="c4d-block">
  <div class="c4d-block-header">
    <h3 class="c4d-block-title">
      <span class="dashicons dashicons-admin-customizer"></span>
      <span><?php _e('Getting started', 'tet30'); ?></span>
    </h3>
  </div>
  <div class="c4d-block-body">
    <div class="c4d-flex-wrap c4d-flex-3">
      <div class="c4d-flex-item">

        <div class="c4d-element">
          <div class="c4d-element-title">
            <a target="blank" href="<?php echo esc_url($adminUrl . 'customize.php?autofocus[section]=title_tagline'); ?>">
              <span class="dashicons dashicons-format-image"></span>
              <?php _e('Upload Your Logo', 'tet30'); ?>
            </a>
          </div>
        </div>

        <div class="c4d-element">
          <div class="c4d-element-title">
            <a target="blank" href="<?php echo esc_url($adminUrl . 'customize.php?autofocus[section]=title_tagline'); ?>">
              <span class="dashicons dashicons-format-image"></span>
              <?php _e('Upload Your Favico', 'tet30'); ?>
            </a>
          </div>
        </div>

      </div>

      <div class="c4d-flex-item">

        <div class="c4d-element">
          <div class="c4d-element-title">
            <a target="blank" href="<?php echo esc_url($adminUrl . 'customize.php?autofocus[section]=color'); ?>">
              <span class="dashicons dashicons-admin-appearance"></span>
              <?php _e('Choose Main Color', 'tet30'); ?>
            </a>
          </div>
        </div>

        <div class="c4d-element">
          <div class="c4d-element-title">
            <a target="blank" href="<?php echo esc_url($adminUrl . 'admin.php?page=tet30child&tab=14'); ?>">
              <span class="dashicons dashicons-editor-spellcheck"></span>
              <?php _e('Choose Typography', 'tet30'); ?>
            </a>
          </div>
        </div>

      </div>

      <div class="c4d-flex-item">

        <div class="c4d-element">
          <div class="c4d-element-title">
            <a target="blank" href="<?php echo esc_url($adminUrl . 'customize.php?autofocus[section]=static_front_page'); ?>">
              <span class="dashicons dashicons-format-image"></span>
              <?php _e('Choose Home Page', 'tet30'); ?>
            </a>
          </div>
        </div>

        <div class="c4d-element">
          <div class="c4d-element-title">
            <a target="blank" href="<?php echo esc_url($adminUrl . 'customize.php?autofocus[panel]=header'); ?>">
              <span class="dashicons dashicons-admin-customizer"></span>
              <?php _e('Header Options', 'tet30'); ?>
            </a>
          </div>
        </div>

        <div class="c4d-element">
          <div class="c4d-element-title">
            <a target="blank" href="<?php echo esc_url($adminUrl . 'customize.php?autofocus[panel]=footer'); ?>">
              <span class="dashicons dashicons-admin-customizer"></span>
              <?php _e('Footer Options', 'tet30'); ?>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
