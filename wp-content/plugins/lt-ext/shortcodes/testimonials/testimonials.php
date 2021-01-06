<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Header
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_testimonials_params' ) ) {

	function ltx_vc_testimonials_params() {

		$cats = ltxGetTestimonailsCats();
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
			array(
				"param_name" => "name",
				"heading" => esc_html__("Name", 'lt-ext'),
				"std" => "visible",
				"value" => array(
					esc_html__('Visible', 'lt-ext') 		=> 'visible',
					esc_html__('Hidden', 'lt-ext') 		=> 'hidden',
				),
				"type" => "dropdown"
			),
			array(
				"param_name" => "photo",
				"heading" => esc_html__("Photo", 'lt-ext'),
				"std" => "visible",
				"value" => array(
					esc_html__('Visible', 'lt-ext') 		=> 'visible',
					esc_html__('Hidden', 'lt-ext') 		=> 'hidden',
				),
				"type" => "dropdown"
			),		
			array(
				"param_name" => "limit",
				"heading" => esc_html__("Limit", 'lt-ext'),
				"std" => "5",
				"type" => "textfield"
			),
			array(
				"param_name" => "autoplay",
				"heading" => esc_html__("Autoplay", 'lt-ext'),
				"description" => esc_html__("Enter timeout in ms (0 - disabled)", 'lt-ext'),
				"std" => "4000",
				"type" => "textfield"
			),					
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_testimonials' ) ) {

	function like_sc_testimonials($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_testimonials', $atts, array_merge( array(

			'layout'		=> '',
			'limit'			=> '',
			'cat'			=> '',
			'name'			=> '',
			'font_weight'	=> 'bold',
			'background'	=> '',
			'arrows'	=> '',
			'photo'			=> '',
			'autoplay'		=> '',

			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);


		return like_sc_output('testimonials', $atts, $content);
	}

	if (ltx_vc_inited()) add_shortcode("like_sc_testimonials", "like_sc_testimonials");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_testimonials_add')) {

	function ltx_vc_testimonials_add() {
		
		vc_map( array(
			"base" => "like_sc_testimonials",
			"name" 	=> esc_html__("Testimonials", 'lt-ext'),
			"description" => esc_html__("Testimonials Slider", 'lt-ext'),
			"class" => "like_sc_testimonials",
			"icon"	=>	ltxGetPluginUrl('/shortcodes/testimonials/testimonials.png'),
			"show_settings_on_create" => true,
			"category" => esc_html__('ltx-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_testimonials_params(),
				ltx_vc_default_params()
			)
		) );
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_testimonials_add', 30);
}


