<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Header
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_countup_params' ) ) {

	function ltx_vc_countup_params() {

		$fields = array(

			array(
				"param_name" => "type",
				"heading" => esc_html__("Section Style", 'lt-ext'),
				"std" => "default",
				"value" => array(
					esc_html__('Default', 'lt-ext') 		=> 'default',
				),
				"type" => "dropdown"
			),	

			array(
				'type' => 'param_group',
				'param_name' => 'list',
				'heading' => esc_html__( 'CountUp Items', 'lt-ext' ),
				"description" => wp_kses_data( __("Each item can will be counted up to specified number", 'lt-ext') ),
				'value' => 'header',
				'params' => array(
					array(
						'param_name' => 'number',
						'heading' => esc_html__( 'Number up to', 'lt-ext' ),
						'type' => 'textfield',
						'admin_label' => true,
					),
					array(
						'param_name' => 'header',
						'heading' => esc_html__( 'Header', 'lt-ext' ),
						'type' => 'textfield',
						'admin_label' => true,
					),
					array(
						'param_name' => 'descr',
						'heading' => esc_html__( 'Description', 'lt-ext' ),
						'type' => 'textfield',
					),					
				),
			),
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_countup' ) ) {

	function like_sc_countup($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_header', $atts, array_merge( array(

			'type'		=> '',
			'align'		=> '',			
			'icons' 	=> '',
			'list' 	=> '',

			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		$atts['list'] = json_decode ( urldecode( $atts['list'] ), true );

		if (!empty($atts['list'])) {

			return like_sc_output('countup', $atts, $content);
		}
			else {

			return false;
		}
	}

	if (ltx_vc_inited()) add_shortcode("like_sc_countup", "like_sc_countup");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_countup_add')) {

	function ltx_vc_countup_add() {
		
		vc_map( array(
			"base" => "like_sc_countup",
			"name" 	=> esc_html__("CountUp", 'lt-ext'),
			"description" => esc_html__("Section with CountUp Numbers", 'lt-ext'),
			"class" => "like_sc_icons",
			"icon"	=>	ltxGetPluginUrl('/shortcodes/countup/countup.png'),
			"show_settings_on_create" => true,
			"category" => esc_html__('ltx-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_countup_params(),
				ltx_vc_default_params()
			)
		) );
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_countup_add', 30);
}


