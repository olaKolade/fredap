<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Header
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_zoom_slider_params' ) ) {

	function ltx_vc_zoom_slider_params() {

		$fields = array(

			array(
				"param_name" => "zoom",
				"heading" => esc_html__("Zoom Effect", 'lt-ext'),
				"std" => "default",
				"admin_label" => true,
				"value" => array(
					esc_html__('Zoom In', 'lt-ext') 	=> 'default',
					esc_html__('Zoom Out', 'lt-ext') 	=> 'out',
					esc_html__('Fade Only', 'lt-ext') 	=> 'fade',
				),
				"type" => "dropdown"
			),			
			array(
				"param_name" => "style",
				"heading" => esc_html__("Content Style", 'lt-ext'),
				"std" => "default",
				"value" => array(
					esc_html__('Default', 'lt-ext') 			=> 'default',
					esc_html__('Rounded', 'lt-ext') 	=> 'rounded',
				),
				"type" => "dropdown"
			),	

			array(
				"param_name" => "arrows",
				"heading" => esc_html__("Navigations arrows", 'lt-ext'),
				"std" => "false",
				"group"	=>	esc_html__('Arrows', 'lt-ext'),
				"value" => array(
					esc_html__('Hidden', 'lt-ext') 	=> 'false',
					esc_html__('Visible', 'lt-ext') 	=> 'true',
				),
				"type" => "dropdown"
			),				
			array(
				"param_name" => "arrow_left",
				"heading" => esc_html__("Arrow left", 'lt-ext'),
				"std" => "prev",
				"group"	=>	esc_html__('Arrows', 'lt-ext'),
				"type" => "textfield"
			),	
			array(
				"param_name" => "arrow_right",
				"heading" => esc_html__("Arrow right", 'lt-ext'),
				"std" => "next",
				"group"	=>	esc_html__('Arrows', 'lt-ext'),
				"type" => "textfield"
			),				

			array(
				"param_name" => "bullets",
				"heading" => esc_html__("Navigations Bullets", 'lt-ext'),
				"std" => "false",
				"value" => array(
					esc_html__('Hidden', 'lt-ext') 	=> 'false',
					esc_html__('Bottom', 'lt-ext') 	=> 'true',
					esc_html__('Right', 'lt-ext') 	=> 'right',
				),
				"type" => "dropdown"
			),
			array(
				"param_name" => "color",
				"heading" => esc_html__("Content Color", 'lt-ext'),
				"std" => "white",
				"value" => array(
					esc_html__('White', 'lt-ext') 	=> 'white',
					esc_html__('Black', 'lt-ext') 	=> 'black',
				),
				"type" => "dropdown"
			),					
			array(
				"param_name" => "align",
				"heading" => esc_html__("Content Align", 'lt-ext'),
				"std" => "center",
				"value" => array(
					esc_html__('Center', 'lt-ext') 	=> 'center',
					esc_html__('Left', 'lt-ext') 		=> 'left',
					esc_html__('Right', 'lt-ext') 	=> 'right',
				),
				"type" => "dropdown"
			),	
			array(
				"param_name" => "overlay",
				"heading" => esc_html__("Overlay", 'lt-ext'),
				"std" => "plain",
				"value" => array(
					esc_html__('Black Overlay', 'lt-ext') 	=> 'plain',
					esc_html__('Gray Overlay', 'lt-ext') 	=> 'gray',
					esc_html__('Disabled', 'lt-ext') 		=> 'false',
				),
				"type" => "dropdown"
			),	
			array(
				"param_name" => "shadow",
				"heading" => esc_html__("Overlay", 'lt-ext'),
				"std" => "disabled",
				"value" => array(
					esc_html__('Disable', 'lt-ext') 	=> 'disabled',
					esc_html__('Bottom Shadow', 'lt-ext') 	=> 'enabled',
				),
				"type" => "dropdown"
			),				
			array(
				"param_name" => "images",
				"heading" => esc_html__("Background Images", 'lt-ext'),
				"admin_label" => true,
				"type" => "attach_images"
			),							
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_zoom_slider' ) ) {

	function like_sc_zoom_slider($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_zoom_slider', $atts, array_merge( array(

			'zoom'		=> '',
			'style'		=> 'default',
			'color'		=> 'white',
			'align'		=> 'align',
			'arrows' 	=> 'false',
			'arrow_left' 	=> '',
			'arrow_right' 	=> '',
			'bullets' 	=> 'false',
			'overlay' 	=> 'plain',			
			'images' 	=> '',
			'shadow' 	=> 'disabled',
			'images2' 	=> '',

			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		return like_sc_output('zoom_slider', $atts, $content);
	}

	if (ltx_vc_inited()) add_shortcode("like_sc_zoom_slider", "like_sc_zoom_slider");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_zoom_slider_add')) {

	function ltx_vc_zoom_slider_add() {
		
		vc_map( array(
			"base" => "like_sc_zoom_slider",
			"name" 	=> esc_html__("Zoom Slider", 'lt-ext'),
			"description" => esc_html__("Background changing with Ken Burns effect", 'lt-ext'),
			"class" => "like_sc_zoom_slider",
			"icon"	=>	ltxGetPluginUrl('/shortcodes/zoom_slider/zoom_slider.png'),
			"is_container" => true,
			"js_view" => 'VcColumnView',
			"category" => esc_html__('ltx-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_zoom_slider_params(),
				ltx_vc_default_params()
			),
		) );

		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		    class WPBakeryShortCode_like_sc_zoom_slider extends WPBakeryShortCodesContainer {
		    }
		}
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_zoom_slider_add', 30);
}


