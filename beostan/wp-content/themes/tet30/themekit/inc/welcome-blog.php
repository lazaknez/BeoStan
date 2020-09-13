<?php 
  $adminUrl = get_admin_url();
?>
<div class="c4d-block">
  <div class="c4d-block-header">
    <h3 class="c4d-block-title">
      <span class="dashicons dashicons-admin-customizer"></span>
      <span><?php _e('Blog', 'tet30'); ?></span>
    </h3>
  </div>
  <div class="c4d-block-body">
    <div class="c4d-flex-wrap c4d-flex-3">
      <div class="c4d-flex-item">

        <div class="c4d-element">
          <div class="c4d-element-title">
            <a target="blank" href="<?php echo esc_url($adminUrl . 'customize.php?autofocus[section]=logo'); ?>">
              <span class="dashicons dashicons-admin-tools"></span>
              <?php _e('Single Page', 'tet30'); ?>
            </a>
          </div>
        </div>

        

      </div>

      <div class="c4d-flex-item">

        <div class="c4d-element">
          <div class="c4d-element-title">
            <a target="blank" href="<?php echo esc_url($adminUrl . 'customize.php?autofocus[section]=section-archive-page'); ?>">
              <span class="dashicons dashicons-admin-tools"></span>
              <?php _e('Archive Page', 'tet30'); ?>
            </a>
          </div>
        </div>

       
        
      </div>

      <div class="c4d-flex-item">

        <div class="c4d-element">
          <div class="c4d-element-title">
            <a target="blank" href="<?php echo esc_url($adminUrl . 'options-media.php'); ?>">
              <span class="dashicons dashicons-format-image"></span>
              <?php _e('Image Sizes', 'tet30'); ?>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>