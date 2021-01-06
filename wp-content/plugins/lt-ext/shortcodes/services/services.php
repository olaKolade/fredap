<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Services
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_services_params' ) ) {

	function ltx_vc_services_params() {

		$cats = ltxGetServicesCats();
		$cat = array();
		foreach ($cats as $catId => $item) {

			$cat[$item['name']] = $catId;
		}

		$fields = array(
			array(
				"param_name" => "cat",
				"heading" => esc_html__("Category", 'lt-ext'),
				"value" => array_merge(array(esc_html__('--', 'lt-ext') => 0), $cat),
				"type" => "dropdown"
			),
/*			
			array(
				"param_name" => "style",
				"heading" => esc_html__("Style", 'lt-ext'),
				"value" => array(
					esc_html__('Gray Background', 'lt-ext') => 'bg-gray',
					esc_html__('White background', 'lt-ext') => 'bg-white',
				),
				"type" => "dropdown"
			),			
*/			
			array(
				"param_name" => "limit",
				"heading" => esc_html__("Total Services", 'lt-ext'),
				"description" => esc_html__("Number of services to show", 'lt-ext'),
				"std"	=>	"6",				
				"admin_label" => true,
				"type" => "textfield"
			),
			array(
				"param_name" => "per_slide",
				"heading" => esc_html__("Services per Slide", 'lt-ext'),
				"description" => esc_html__("If empty or null - no slider will be active", 'lt-ext'),
				"std"	=>	"3",
				"admin_label" => true,
				"type" => "textfield"
			),
			array(
				"param_name" => "autoplay",
				"heading" => esc_html__("Slider Autoplay, ms", 'lt-ext'),
				"description" => esc_html__("If empty or null - disabled", 'lt-ext'),
				"std"	=>	"0",
				"admin_label" => true,
				"type" => "textfield"
			),
			array(
				"param_name" => "highlight",
				"heading" => esc_html__("Highlight Header", 'lt-ext'),
				"description" => esc_html__("First word of header will be highlighted", 'lt-ext'),
				"std"	=>	'disabled',
				"value" => array(
					esc_html__('None', 'lt-ext') => 'disabled',
					esc_html__('Highlighted', 'lt-ext') => 'enabled',
				),
				"type" => "dropdown"
			),									
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_services' ) ) {

	function like_sc_services($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_services', $atts, array_merge( array(

			'ids' 			=> '',
			'limit' 		=> '',
			'highlight' 		=> '',
			'style' 		=> 'bg-gray',
			'per_slide' 	=> '',
			'cat' 			=> '',
			'autoplay' 		=> '0',


			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		return like_sc_output('services', $atts, $content);
	}

	if (ltx_vc_inited()) add_shortcode("like_sc_services", "like_sc_services");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_services_add')) {

	function ltx_vc_services_add() {
		
		vc_map( array(
			"base" => "like_sc_services",
			"name" 	=> esc_html__("Services", 'lt-ext'),
			"description" => esc_html__("Services Posts slider", 'lt-ext'),
			"class" => "like_sc_services",
			"icon"	=>	ltxGetPluginUrl('/shortcodes/header/icon.png'),
			"show_settings_on_create" => true,
			"category" => esc_html__('ltx-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_services_params(),
				ltx_vc_default_params()
			)
		) );
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_services_add', 30);
}


