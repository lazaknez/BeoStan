<?php
/**
 * @package C4D WordPress theme
 */
global  $tet30;
?>
<?php if (isset($tet30['header-free-ship']) && $tet30['header-free-ship'] != '') : ?>
<div class="tet30-header-free-ship">
	<?php echo do_shortcode(wp_kses_post($tet30['header-free-ship'])); ?>
</div>
<?php endif; ?>
<div class="tet30-header-big-search-top">
	<div class="tet30-main-width">
		<div class="container-fluid">
			<div class="row">
				<div class="col-3">
					<div class="tet30-header-big-search-phone">
						(+84) 098 - 999 - 888
					</div>
				</div>
				<div class="col-9">
					<div class="tet30-header-big-search-menu">
						<a>Store Locator</a>
						<a>Track Your Order</a>
						<a>Shop</a>
						<a>My Account</a>
						<a>Switch to RTL</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

