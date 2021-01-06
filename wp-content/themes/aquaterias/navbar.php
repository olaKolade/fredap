<?php
/**
 * Navigation Bar
 */

$navbar_layout = 'transparent';
if ( function_exists( 'FW' ) ) {

	$navbar_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'navbar-layout' );
	if ( empty($basket_icon) ) $basket_icon = fw_get_db_settings_option( 'basket-icon' );
}

$navbar_class = 'navbar-transparent';
if ( is_null($navbar_layout) OR empty($navbar_layout) OR $navbar_layout == 'default' ) $navbar_class = 'navbar-transparent';

if ( !empty($navbar_layout) AND $navbar_layout == 'transparent-light' ) $navbar_class .= ' navbar-transparent navbar-transparent-light';
	else
if ( !empty($navbar_layout) AND $navbar_layout == 'transparent-homepage' ) $navbar_class .= ' navbar-transparent navbar-transparent-home';

if ( empty($basket_icon) ) $basket_icon = 'disabled';

if ( $navbar_layout != 'disabled' ):

aquaterias_the_topbar_block();

?>
<div id="nav-wrapper">
	<nav class="navbar <?php echo esc_attr($navbar_class);?>">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed">
					<span class="sr-only"><?php echo esc_html__( 'Toggle navigation', 'aquaterias' ); ?></span>
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>			
				<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
					if ( function_exists( 'FW' ) ) {

						$aquaterias_logo = fw_get_db_settings_option( 'logo' );	

						if ( $navbar_layout == 'transparent-light') {

							$aquaterias_logo = fw_get_db_settings_option( 'logo_dark' );
						}

						if ( !empty( $aquaterias_logo ) ) {

							echo wp_get_attachment_image( $aquaterias_logo['attachment_id'], 'full' );
						}									
					}

					if ( empty( $aquaterias_logo ) ) {

						echo '<img src="' . esc_attr( get_template_directory_uri() . '/assets/images/logo.png' ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">';
					}
					?>
				</a>
			</div>
			<?php if( aquaterias_is_wc('wc_active') AND $basket_icon != 'disabled' ) : ?>
				<?php 
					if ( $basket_icon == 'mobile' ) $basket_icon_class = ' hidden-lg'; else $basket_icon_class = ''; 
				?>
				<div class="pull-right nav-right<?php echo esc_attr($basket_icon_class); ?>">
					<div id="top-search" class="top-search">
						<a href="#" id="top-search-ico" class="fa fa-search" aria-hidden="true"></a>
						<input placeholder="<?php echo esc_html__( 'Search', 'aquaterias' ); ?>" value="" type="text">
					</div>						
					<a href="<?php echo wc_get_cart_url(); ?>" class="shop_table cart" title="<?php echo esc_html__( 'View your shopping cart', 'aquaterias' ); ?>">
						<span class="name"><?php echo esc_html__( 'Cart', 'aquaterias' ); ?></span>
						<i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="cart-contents header-cart-count count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
					</a>
				</div>
			<?php endif; ?>	
			<div id="navbar" class="navbar-collapse collapse">
				<div class="toggle-wrap">
					<button type="button" class="navbar-toggle collapsed">
						<span class="sr-only"><?php echo esc_html__( 'Toggle navigation', 'aquaterias' ); ?></span>
						<span class="icon-bar top-bar"></span>
						<span class="icon-bar middle-bar"></span>
						<span class="icon-bar bottom-bar"></span>
					</button>							
					<div class="clearfix"></div>
				</div>
				<?php
					wp_nav_menu(array(
						'theme_location'	=> 'primary',
						'menu_class' => 'nav navbar-nav',
						'container'	=> 'ul',
						'link_before' => '<span>',     
						'link_after'  => '</span>'							
					));
				?>
				<div class="nav-mob">
					<ul class="nav navbar-nav">
					<?php if( aquaterias_is_wc('wc_active') AND $basket_icon != 'disabled' ) : ?>
						<li>
							<a href="<?php echo wc_get_cart_url(); ?>" class="shop_table cart-mob" title="<?php echo esc_html__( 'View your shopping cart', 'aquaterias' ); ?>">
								<span class="cart-contents header-cart-count count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								<span class="name"><?php echo esc_html__( 'Cart', 'aquaterias' ); ?></span>
							</a>
						</li>
					<?php endif; ?>
					</ul>
				</div>									
			</div>
		</div>
	</nav>
</div>
<?php

endif;

