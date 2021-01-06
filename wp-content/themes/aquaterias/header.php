<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head>
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php

	aquaterias_the_pageloader_overlay();
	get_template_part( 'navbar' ); 

	$pageheader_layout = aquaterias_get_pageheader_layout();

	$aquaterias_h1 = aquaterias_get_the_h1();
	if ( !empty($aquaterias_h1) ) $aquaterias_header_class = ' header-h1 '; else $aquaterias_header_class = '';
	if ( function_exists( 'FW' ) ) {

		$aquaterias_ripples = fw_get_db_settings_option( 'water_ripples' );
		if ( $aquaterias_ripples == 'enabled') $aquaterias_header_class .= ' ripples';
			else
		if ( $aquaterias_ripples == 'default' ) {

			$aquaterias_ripples = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'water-ripples' );
			
			if ( $aquaterias_ripples == 'enabled') $aquaterias_header_class .= ' ripples';
		}

		$pageheader_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'header-layout' );
	}

	if ( $pageheader_layout != 'disabled' ) : ?>
	<header class="page-header <?php echo esc_attr($aquaterias_header_class); ?>">
		<?php
		if ( function_exists('FW') ) {

			$aquaterias_bubbles = fw_get_db_settings_option( 'bubbles' );
			if ( $aquaterias_bubbles == 'enabled' ) echo '<canvas id="ltx-bubbles"></canvas>';
		}	
		?>
	    <div class="container">   
	    	<?php aquaterias_the_h1(); ?>
			<?php
				if ( function_exists( 'bcn_display' ) && !is_front_page() ) {

					echo '<ul class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
					bcn_display_list();
					echo '</ul>';
				}


			?>
	    </div>
	</header>
	<?php endif; ?>
	<div class="container">