<?php get_template_part('header-promo'); ?>
<div class="tet30-header-big-search">
	<div class="site-header-main">
		<div class="site-header-main-fixed">
			<div class="tet30-main-width">
				<div class="site-header-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-2">
								<?php get_template_part('logo'); ?>
							</div>
							<div class="col-8">
								<div class="search-form clearfix">
									<div class="search-form-inner clearfix">
										<?php 
											if (function_exists('get_product_search_form')) {
												get_product_search_form(); 
											} else {
												echo get_search_form();
											}
										?>
										<span class="icon"><i class="fi flaticon-magnifying-glass"></i></span>
									</div>
								</div>
							</div>
							<div class="col-2">
								<?php get_template_part('header-buttons'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="site-header-bottom">
				<div class="tet30-main-width">
					<div class="is-menu-align-compare">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<?php get_template_part('menu'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div><!-- .site-header-main -->
</div>