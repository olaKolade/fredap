<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Menu
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_menu_params' ) ) {

	function ltx_vc_menu_params() {

		$categories = json_decode(json_encode(ltxGetMenuCats()), TRUE);

		$cat = array();
		foreach ($categories as $term_id => $item) {

			$cat[$item['name']] = $term_id;
		}

		$fields = array(	

			array(
				"param_name" => "cat",
				"heading" => esc_html__("Category", 'lt-ext'),
				"value" => array_merge(array(esc_html__('--', 'lt-ext') => 0), $cat),
				"type" => "dropdown"
			),				
	
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_menu' ) ) {

	function like_sc_menu($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_menu', $atts, array_merge( array(

			'cat'			=> '',

			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		return like_sc_output('menu', $atts, $content);
	}

	if (ltx_vc_inited()) add_shortcode("like_sc_menu", "like_sc_menu");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_menu_add')) {

	function ltx_vc_menu_add() {
		
		vc_map( array(
			"base" => "like_sc_menu",
			"name" 	=> esc_html__("Menu", 'lt-ext'),
			"description" => esc_html__("Menu items", 'lt-ext'),
			"class" => "like_sc_menu",
			"icon"	=>	ltxGetPluginUrl('/shortcodes/menu/menu.png'),
			"show_settings_on_create" => true,
			"category" => esc_html__('ltx-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_menu_params(),
				ltx_vc_default_params()
			)
		) );
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_menu_add', 30);
}


