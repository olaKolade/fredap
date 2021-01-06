<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Header
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_products_params' ) ) {

	function ltx_vc_products_params() {

		$cats = ltxGetProductsCats();
		$cat = array();
		foreach ($cats as $catId => $item) {

			$cat[$item['name']] = $catId;
		}

		$fields = array(
			array(
				"param_name" => "layout",
				"heading" => esc_html__("Layout", 'lt-ext'),
				"std" => "default",
				"value" => array(
					esc_html__('Slider with Filter at Top', 'lt-ext') 	=> 'default',
					esc_html__('Simple Products', 'lt-ext') 	=> 'simple',
				),
				"type" => "dropdown"
			),		
			array(
				"param_name" => "limit",
				"heading" => esc_html__("Total Products in Category", 'lt-ext'),
				"std"	=>	"8",				
				"admin_label" => true,
				"type" => "textfield"
			),
			array(
				"param_name" => "per_slide",
				"heading" => esc_html__("Products per Slide", 'lt-ext'),
				"description" => esc_html__("If empty or null - no slider will be active", 'lt-ext'),
				"std"	=>	"4",
				"admin_label" => true,
				"type" => "textfield"
			),
			array(
				"param_name" => "category_filter",
				"heading" => esc_html__("Categories Filter", 'lt-ext'),
				"value" => array_merge(array(esc_html__('All Parent', 'lt-ext') => 0), $cat),
				"type" => "dropdown"
			),			
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_products' ) ) {

	function like_sc_products($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_services', $atts, array_merge( array(

			'ids' 			=> '',
			'limit' 		=> '',
			'layout' 		=> 'default',	
			'category_filter' 		=> '0',	
			'per_slide' 	=> '',
			'autoplay' 		=> '0',


			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		if ( ltx_is_wc('wc_active') ) return like_sc_output('products', $atts, $content);
	}

	if (ltx_vc_inited()) add_shortcode("like_sc_products", "like_sc_products");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_products_add')) {

	function ltx_vc_products_add() {
		
		vc_map( array(
			"base" => "like_sc_products",
			"name" 	=> esc_html__("Products", 'lt-ext'),
			"description" => esc_html__("Products Customized List", 'lt-ext'),
			"class" => "like_sc_products",
			"icon"	=>	ltxGetPluginUrl('/shortcodes/products/products.png'),
			"show_settings_on_create" => true,
			"category" => esc_html__('ltx-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_products_params(),
				ltx_vc_default_params()
			)
		) );
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_products_add', 30);
}


