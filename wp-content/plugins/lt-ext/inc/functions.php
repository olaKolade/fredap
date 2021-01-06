<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * ltxThemes Plugins Functions
 */

include LTX_PLUGIN_DIR . 'inc/ltx-dashboard.php';

// Get Local Path of include file
function ltxGetLocalPath($file) {

	global $ltx_cfg;

	return $ltx_cfg['path'].$ltx_cfg['base'].$file;
}

// Get Plugin Url
function ltxGetPluginUrl($file) {

	global $ltx_cfg;

	return $ltx_cfg['url'].$file;
}

// Get Visual Composer plugin status
if ( !function_exists( 'ltx_vc_inited' ) ) {

	function ltx_vc_inited() {
		
		return class_exists('Vc_Manager');
	}
}

// Generate img url
if (!function_exists('ltx_get_attachment_img_url')) {
	function ltx_get_attachment_img_url( $img, $size = 'full' ) {
		if ($img > 0) {

			return wp_get_attachment_image_src($img, 'full');
		}
	}
}

if (!function_exists('ltxGetProductsCats')) {
	function ltxGetProductsCats() {

		$taxonomy     = 'product_cat';
		$orderby      = 'name';  
		$show_count   = 0;
		$pad_counts   = 0;
		$hierarchical = 1;
		$title        = '';  
		$empty        = 0;

		$args = array(
		     'taxonomy'     => $taxonomy,
		     'orderby'      => $orderby,
		     'show_count'   => $show_count,
		     'pad_counts'   => $pad_counts,
		     'hierarchical' => $hierarchical,
		     'title_li'     => $title,
		     'hide_empty'   => $empty
		);

		$cats = array();
		$all_categories = get_categories( $args );
		foreach ($all_categories as $cat) {
			if ($cat->category_parent == 0) {

			    $cats[$cat->term_id]['href'] = get_term_link($cat->slug, 'product_cat');
			    $cats[$cat->term_id]['name'] = $cat->name;
			}
				else {

			    $cats[$cat->category_parent]['child'][$cat->term_id] = array(

			    	'href' => get_term_link($cat->slug, 'product_cat'),
			    	'name' => $cat->name,
			    );		    
			}
		}	

		return $cats;
	}
}


if (!function_exists('ltxGetCPTCats')) {
	function ltxGetCPTCats($taxonomy) {

		if ( empty($taxonomy) ) return false;

		$orderby      = 'name';  
		$show_count   = 0;
		$pad_counts   = 0;
		$hierarchical = 1;
		$title        = '';  
		$empty        = 0;

		$args = array(
		     'taxonomy'     => $taxonomy,
		     'orderby'      => $orderby,
		     'show_count'   => $show_count,
		     'pad_counts'   => $pad_counts,
		     'hierarchical' => $hierarchical,
		     'title_li'     => $title,
		     'hide_empty'   => $empty
		);

		$cats = array();
		$all_categories = get_terms( $args );
		if (!empty($all_categories)) {

			foreach ($all_categories as $cat) {
				if (!empty($cat->category_parent) AND $cat->category_parent == 0) {
				    $category_id = $cat->term_id;       
				    $cats[$cat->term_id] = array(

				    	'href' => get_term_link($cat->slug, $taxonomy),
				    	'name' => $cat->name,
				    );
				}       
			}
		}

		return $cats;
	}
}

if (!function_exists('ltxGetSlidersCats')) {
	function ltxGetSlidersCats() {

		$taxonomy     = 'sliders-category';
		$orderby      = 'name';  
		$show_count   = 0;
		$pad_counts   = 0;
		$hierarchical = 1;
		$title        = '';  
		$empty        = 0;

		$args = array(
		     'taxonomy'     => $taxonomy,
		     'orderby'      => $orderby,
		     'show_count'   => $show_count,
		     'pad_counts'   => $pad_counts,
		     'hierarchical' => $hierarchical,
		     'title_li'     => $title,
		     'hide_empty'   => $empty
		);

		$cats = array();
		$all_categories = get_terms( $args );
		foreach ($all_categories as $cat) {
			if ($cat->category_parent == 0) {
			    $category_id = $cat->term_id;       
			    $cats[$cat->term_id] = array(

			    	'href' => get_term_link($cat->slug, 'sliders-category'),
			    	'name' => $cat->name,
			    );
			}       
		}	

		return $cats;
	}
}

if (!function_exists('ltxGetMenuCats')) {
	function ltxGetMenuCats() {

		$taxonomy     = 'menu-category';
		$orderby      = 'name';  
		$show_count   = 0;
		$pad_counts   = 0;
		$hierarchical = 1;
		$title        = '';  
		$empty        = 0;

		$args = array(
		     'taxonomy'     => $taxonomy,
		     'orderby'      => $orderby,
		     'show_count'   => $show_count,
		     'pad_counts'   => $pad_counts,
		     'hierarchical' => $hierarchical,
		     'title_li'     => $title,
		     'hide_empty'   => $empty
		);

		$cats = array();
		$all_categories = get_terms( $args );
		foreach ($all_categories as $cat) {

			if (!empty($cat->parent) AND $cat->parent == 0) {

			    $cats[$cat->term_id]['href'] = get_term_link($cat->slug, 'menu-category');
			    $cats[$cat->term_id]['name'] = $cat->name;
			}
				else {

				if ( !empty($cat->term_id) ) {

				    $cats[$cat->parent]['child'][$cat->term_id] = array(

				    	'href' => get_term_link($cat->slug, 'menu-category'),
				    	'name' => $cat->name,
				    );		    
				}
			}   
		}	

		return $cats;
	}
}
if (!function_exists('ltxGetTestimonailsCats')) {
	function ltxGetTestimonailsCats() {

		$taxonomy     = 'testimonials-category';
		$orderby      = 'name';  
		$show_count   = 0;
		$pad_counts   = 0;
		$hierarchical = 1;
		$title        = '';  
		$empty        = 0;

		$args = array(
		     'taxonomy'     => $taxonomy,
		     'orderby'      => $orderby,
		     'show_count'   => $show_count,
		     'pad_counts'   => $pad_counts,
		     'hierarchical' => $hierarchical,
		     'title_li'     => $title,
		     'hide_empty'   => $empty
		);

		$cats = array();
		$all_categories = get_terms( $args );
		foreach ($all_categories as $cat) {
			if ($cat->category_parent == 0) {
			    $category_id = $cat->term_id;       
			    $cats[$cat->term_id] = array(

			    	'href' => get_term_link($cat->slug, 'testimonials-category'),
			    	'name' => $cat->name,
			    );
			}       
		}	

		return $cats;
	}
}

if (!function_exists('ltxGetServicesCats')) {
	function ltxGetServicesCats() {

		$taxonomy     = 'services-category';
		$orderby      = 'name';  
		$show_count   = 0;
		$pad_counts   = 0;
		$hierarchical = 1;
		$title        = '';  
		$empty        = 0;

		$args = array(
		     'taxonomy'     => $taxonomy,
		     'orderby'      => $orderby,
		     'show_count'   => $show_count,
		     'pad_counts'   => $pad_counts,
		     'hierarchical' => $hierarchical,
		     'title_li'     => $title,
		     'hide_empty'   => $empty
		);

		$cats = array();
		$all_categories = get_terms( $args );
		foreach ($all_categories as $cat) {
			if ($cat->category_parent == 0) {
			    $category_id = $cat->term_id;       
			    $cats[$cat->term_id] = array(

			    	'href' => get_term_link($cat->slug, 'services-category'),
			    	'name' => $cat->name,
			    );
			}       
		}	

		return $cats;
	}
}

if ( !function_exists( 'ltx_is_wc' ) ) {
	/**
	 * Return true|false is woocommerce conditions.
	 *
	 * @param string $tag
	 * @param string|array $attr
	 *
	 * @return bool
	 */
	function ltx_is_wc($tag, $attr='') {
		if( !class_exists( 'woocommerce' ) ) return false;
		switch ($tag) {
			case 'wc_active':
		        return true;
			
		    case 'woocommerce':
		        if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) return true;
				break;
		    case 'shop':
		        if( function_exists( 'is_shop' ) && is_shop() ) return true;
				break;
			case 'product_category':
		        if( function_exists( 'is_product_category' ) && is_product_category($attr) ) return true;
				break;
		    case 'product_tag':
		        if( function_exists( 'is_product_tag' ) && is_product_tag($attr) ) return true;
				break;
		    case 'product':
		    	if( function_exists( 'is_product' ) && is_product() ) return true;
				break;
		    case 'cart':
		        if( function_exists( 'is_cart' ) && is_cart() ) return true;
				break;
		    case 'checkout':
		        if( function_exists( 'is_checkout' ) && is_checkout() ) return true;
				break;
		    case 'account_page':
		        if( function_exists( 'is_account_page' ) && is_account_page() ) return true;
				break;
		    case 'wc_endpoint_url':
		        if( function_exists( 'is_wc_endpoint_url' ) && is_wc_endpoint_url($attr) ) return true;
				break;
		    case 'ajax':
		        if( function_exists( 'is_ajax' ) && is_ajax() ) return true;
				break;
		}

		return false;
	}
}

function ltx_vc_get_metric($item) {

	$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
	// allowed metrics: http://www.w3schools.com/cssref/css_units.asp
	$regexr = preg_match( $pattern, $item, $matches );
	$value = isset( $matches[1] ) ? (float) $matches[1] : (float) $item;
	$unit = isset( $matches[2] ) ? $matches[2] : 'px';

	return $value . $unit;
}


/**
 * Fix for widgets without header
 */
add_filter( 'dynamic_sidebar_params', 'ltx_check_sidebar_params' );
function ltx_check_sidebar_params( $params ) {
	global $wp_registered_widgets;

	// Exclude for widget with default title
	if ( in_array( $params[0]['widget_name'], array( 'Categories', 'Archives', 'Meta', 'Pages', 'Recent Comments', 'Recent Posts' ) ) ) {

		return $params;
	}

	$settings_getter = $wp_registered_widgets[ $params[0]['widget_id'] ]['callback'][0];
	$settings = $settings_getter->get_settings();
	$settings = $settings[ $params[1]['number'] ];

	if ( $params[0]['after_widget'] === '</div></aside>' && isset( $settings['title'] ) && empty( $settings['title'] ) ) {
		$params[0]['before_widget'] .= '<div class="content">';
	}

	return $params;
}


