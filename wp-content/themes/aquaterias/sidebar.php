<?php
/**
 * The sidebar containing the main widget area
 *
 */

if ( aquaterias_is_wc('woocommerce') || aquaterias_is_wc('shop') || aquaterias_is_wc('product') ) : ?>
	<?php if ( is_active_sidebar( 'sidebar-wc' ) ): ?>
	<div class="col-xl-3 col-lg-4 col-md-4 col-xl-pull-9 col-lg-pull-8 col-md-pull-8">
		<div id="content-sidebar" class="content-sidebar woocommerce-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-wc' ); ?>
		</div>
	</div>
	<?php endif; ?>
	</div></div>
<?php elseif ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="col-xl-3 col-lg-4 col-md-4">
		<div id="content-sidebar" class="content-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
<?php endif; ?>
