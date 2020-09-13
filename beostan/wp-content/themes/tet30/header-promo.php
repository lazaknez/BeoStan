<?php
/**
 * @package C4D WordPress theme
 */
global  $tet30;
?>
<?php if (isset($tet30['header-global-transparent']) && $tet30['header-global-transparent'] === 'yes') : ?>
	<?php return ''; ?>
<?php endif; ?>

<?php if (isset($tet30['header-promo']) && $tet30['header-promo'] != '') : ?>
<div class="tet30-header-promo-code">
	<?php echo do_shortcode(wp_kses_post($tet30['header-promo'])); ?>
</div>
<?php endif; ?>

<?php if (isset($tet30['header-free-ship']) && $tet30['header-free-ship'] != '') : ?>
<div class="tet30-header-free-ship">
	<?php echo do_shortcode(wp_kses_post($tet30['header-free-ship'])); ?>
</div>
<?php endif; ?>