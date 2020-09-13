<?php
	global $tet30;
?>
<div class="flex-align-center">
	<div class="tet30-tool-box">
		<?php
			if (isset($tet30['header-button-compare']) && $tet30['header-button-compare'] == 1) {
				echo do_shortcode('[c4d-woo-compare-cart icon="fi flaticon-shuffle"]');
			}
		?>
		<?php
			if (isset($tet30['header-button-wishlist']) && $tet30['header-button-wishlist'] == 1) {
				echo do_shortcode('[c4d-woo-wishlist-cart icon="fi flaticon-heart"]');
			}

		?>
		<?php
			if (isset($tet30['header-button-cart']) && $tet30['header-button-cart'] == 1) {
				echo do_shortcode('[c4d-woo-cart icon="fi flaticon-shopping-bag"]');
			}
		?>

		<?php if (!isset($tet30['header-global-layout']) || isset($tet30['header-global-layout']) && $tet30['header-global-layout'] != 'header-big-search'): ?>
			<div class="tet30-tool-box-search">
				<div class="action-button">
					<div class="xclose">
						<i class="fi flaticon-cancel"></i>
					</div>
					<div class="search">
						<i class="fi flaticon-magnifying-glass"></i>
					</div>
				</div>
				<?php
					if (function_exists('get_product_search_form')) {
						get_product_search_form();
					} else {
						echo get_search_form();
					}
				?>
			</div>
		<?php endif; ?>
	</div>
</div>