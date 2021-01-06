<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Header
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_block_icon_params' ) ) {

	function ltx_vc_block_icon_params() {

		$fields = array(

			array(
				"param_name" => "type",
				"heading" => esc_html__("List type", 'lt-ext'),
				"std" => "default",
				"value" => array(
					esc_html__('Icon to Left, Header and Text to Right', 'lt-ext') 	=> 'icon-ht-right',
					esc_html__('Icon to Right, Header and Text to Left', 'lt-ext') 	=> 'icon-ht-left',
					esc_html__('Icon to Left, Header Right', 'lt-ext') 			=> 'icon-h-right',
					esc_html__('Icon to Top', 'lt-ext') 							=> 'icon-top',
				),
				"type" => "dropdown"
			),		

			array(
				"param_name" => "header_type",
				"heading" => esc_html__("Header Type", 'lt-ext'),
				"std" => "4",
				"value" => array(
					esc_html__('Heading 1', 'lt-ext') => '1',
					esc_html__('Heading 2', 'lt-ext') => '2',
					esc_html__('Heading 3', 'lt-ext') => '3',
					esc_html__('Heading 4', 'lt-ext') => '4',
					esc_html__('Heading 5', 'lt-ext') => '5',
					esc_html__('Heading 6', 'lt-ext') => '6'
				),
				"type" => "dropdown"
			),						
			array(
				"param_name" => "rounded",
				"heading" => esc_html__("Background Type", 'lt-ext'),
				"std" => "i-square",
				"value" => array(
					esc_html__('Transparent', 'lt-ext') 		=> 'i-transparent',
					esc_html__('Square', 'lt-ext') 		=> 'i-square',
					esc_html__('Circle', 'lt-ext') 		=> 'i-circle',
				),
				"type" => "dropdown"
			),
			array(
				"param_name" => "bg",
				"heading" => esc_html__("Background", 'lt-ext'),
				"std" => "bg-main",
				"value" => array(
					esc_html__('Main Color', 'lt-ext') 		=> 'bg-main',
					esc_html__('Second Color', 'lt-ext') 		=> 'bg-second',
					esc_html__('Gray', 'lt-ext') 				=> 'bg-gray',
					esc_html__('Transparent', 'lt-ext')		=> 'bg-transparent',
				),
				"type" => "dropdown"
			),	

			array(
				"param_name" => "layout",
				"heading" => esc_html__("Layout", 'lt-ext'),
				"std" => "layout-cols3",
				"value" => array(
					esc_html__('Six Columns', 'lt-ext') 		=> 'layout-cols6',
					esc_html__('Four Columns', 'lt-ext') 		=> 'layout-cols4',
					esc_html__('Three Columns', 'lt-ext') 	=> 'layout-cols3',
					esc_html__('One Column', 'lt-ext') 		=> 'layout-col1',
					esc_html__('Inline', 'lt-ext') 			=> 'layout-inline',
				),
				"type" => "dropdown"
			),	
			array(
				"param_name" => "align",
				"heading" => esc_html__("Alignment", 'lt-ext'),
				"description" => esc_html__("Horizontal Aligment", 'lt-ext'),
				"std" => "center",
				"value" => array(
					esc_html__('Left', 'lt-ext') => 'left',
					esc_html__('Center', 'lt-ext') => 'center',
					esc_html__('Right', 'lt-ext') => 'right'
				),
				"type" => "dropdown"
			),			

			array(
				'type' => 'param_group',
				'param_name' => 'icons',
				'heading' => esc_html__( 'Icons', 'lt-ext' ),
				"description" => wp_kses_data( __("Select icons, specify title and/or description for each item", 'lt-ext') ),
				'value' => urlencode( json_encode( array(
					array(
						'header' => '',
						'size' => 'default',
						'href' => '',
						'icon_fontawesome' => 'empty',
					),
				) ) ),
				'params' => array(
					array(
						'param_name' => 'header',
						'heading' => esc_html__( 'Header', 'lt-ext' ),
						'type' => 'textfield',
						'admin_label' => true,
					),
					array(
						'param_name' => 'descr',
						'heading' => esc_html__( 'Description', 'lt-ext' ),
						'type' => 'textarea',
						'admin_label' => false,
					),					
/*					
					array(
						"param_name" => "fill",
						"heading" => esc_html__("Background", 'lt-ext'),
						"std" => "default",
						"value" => array(
							esc_html__('Filled', 'lt-ext') 		=> 'default',
							esc_html__('Transparent', 'lt-ext') 		=> 'large',
						),
						"type" => "dropdown"
					),			
					
*/													
					array(
						'param_name' => 'href',
						'heading' => esc_html__( 'Href', 'lt-ext' ),
						'type' => 'textfield',
						'description' => esc_html__( 'URL to list item', 'lt-ext' ),
					),
					array(
						'param_name' => 'icon_fontawesome',
						'heading' => esc_html__( 'Icon', 'lt-ext' ),
						'type' => 'iconpicker',
						'admin_label' => true,						
						'value' => '',
						'settings' => array(
							'emptyIcon' => true,
							
							'type' => 'fontawesome'

						),
					),
					array(
						'param_name' => 'bold',
						'heading' => esc_html__( 'Bold', 'lt-ext' ),
						"std" => "normal",
						"value" => array(
							esc_html__('Normal', 'lt-ext') => 'normal',
							esc_html__('Bold', 'lt-ext') => 'bold',
						),
						"type" => "dropdown"
					),					
					array(
						"param_name" => "icon_image",
						"heading" => esc_html__("Or Icon Image", 'lt-ext'),
						"type" => "attach_image"
					),						
					array(
						'param_name' => 'icon_text',
						'heading' => esc_html__( 'Or Icon Text', 'lt-ext' ),
						'type' => 'textfield',
						'description' => esc_html__( 'Text Header as Icon', 'lt-ext' ),
					),										
				),
			),
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_block_icon' ) ) {

	function like_sc_block_icon($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_header', $atts, array_merge( array(

			'type'			=>  '',
			'header_type'	=>  '4',
			'rounded'		=>  'i-square',
			'bg'			=>	'',
			'align'			=>	'center',
			'layout'		=>	'layout-cols3',
			'icons' 		=>  '',

			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		$atts['icons'] = json_decode ( urldecode( $atts['icons'] ), true );

		if (!empty($atts['icons'])) {

			return like_sc_output('block-icon', $atts, $content);
		}
			else {

			return false;
		}
	}

	if (ltx_vc_inited()) add_shortcode("like_sc_block_icon", "like_sc_block_icon");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_block_icon_add')) {

	function ltx_vc_block_icon_add() {
		
		vc_map( array(
			"base" => "like_sc_block_icon",
			"name" 	=> esc_html__("Block with Icons", 'lt-ext'),
			"description" => esc_html__("Text Blocks with Icons", 'lt-ext'),
			"class" => "like_sc_block_icon",
			"icon"	=>	ltxGetPluginUrl('/shortcodes/block-icon/block-icon.png'),
			"show_settings_on_create" => true,
			"category" => esc_html__('ltx-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_block_icon_params(),
				ltx_vc_default_params()
			)
		) );
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_block_icon_add', 30);
}


