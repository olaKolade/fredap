<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Header
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_header_params' ) ) {

	function ltx_vc_header_params() {

		$fields = array(

			array(
				"param_name" => "type",
				"heading" => esc_html__("Header Type", 'lt-ext'),
				"std" => "h3",
				"value" => array(
					esc_html__('Heading 1', 'lt-ext') => 'h1',
					esc_html__('Heading 2', 'lt-ext') => 'h2',
					esc_html__('Heading 3', 'lt-ext') => 'h3',
					esc_html__('Heading 4', 'lt-ext') => 'h4',
					esc_html__('Heading 5', 'lt-ext') => 'h5',
					esc_html__('Heading 6', 'lt-ext') => 'h6'
				),
				"type" => "dropdown"
			),
			array(
				"param_name" => "subtype",
				"heading" => esc_html__("SubHeader Type", 'lt-ext'),
				"std" => "h6",
				"value" => array(
					esc_html__('Heading 2', 'lt-ext') => 'h2',
					esc_html__('Heading 3', 'lt-ext') => 'h3',
					esc_html__('Heading 4', 'lt-ext') => 'h4',
					esc_html__('Heading 5', 'lt-ext') => 'h5',
					esc_html__('Heading 6', 'lt-ext') => 'h6',
					esc_html__('As Header', 'lt-ext') => 'span',
				),
				"type" => "dropdown"
			),			
			array(
				"param_name" => "subheader",
				"heading" => esc_html__("Subheader", 'lt-ext'),
				"admin_label" => true,				
				"description" => esc_html__("Subheader will be shown in different color or on second line", 'lt-ext'),
				"type" => "textfield"
			),			
			array(
				"param_name" => "header",
				"heading" => esc_html__("Header", 'lt-ext'),
				"admin_label" => true,
				"type" => "textfield"
			),
			array(
				"param_name" => "color",
				"heading" => esc_html__("Header Color", 'lt-ext'),
				"description" => esc_html__("Heading color can depend on styling.", 'lt-ext'),
				"std" => "default",
				"value" => array(
					esc_html__('Default', 'lt-ext') 	=> 'default',
					esc_html__('Main Color', 'lt-ext') 	=> 'main',
					esc_html__('Second Color', 'lt-ext') 	=> 'second',
					esc_html__('White', 'lt-ext') 		=> 'white',					
					esc_html__('Black', 'lt-ext') 		=> 'black',
					esc_html__('Gray', 'lt-ext') 			=> 'gray',
				),
				"type" => "dropdown"
			),	
			array(
				"param_name" => "subcolor",
				"heading" => esc_html__("SubHeader Color", 'lt-ext'),
				"description" => esc_html__("Heading color can depend on styling.", 'lt-ext'),
				"std" => "main",
				"value" => array(
					esc_html__('Default', 'lt-ext') 	=> 'default',
					esc_html__('Main Color', 'lt-ext') 	=> 'main',
					esc_html__('Second Color', 'lt-ext') 	=> 'second',
					esc_html__('White', 'lt-ext') 		=> 'white',					
					esc_html__('Black', 'lt-ext') 		=> 'black',
					esc_html__('Gray', 'lt-ext') 		=> 'gray',
				),
				"type" => "dropdown"
			),
			array(
				"param_name" => "size",
				"heading" => esc_html__("Header Size", 'lt-ext'),
				"description" => esc_html__("Larger Heading can be used for transforming H2 into H1 sized tag etc.", 'lt-ext'),
				"std" => "default",
				"value" => array(
					esc_html__('Default', 'lt-ext') 	=> 'default',
					esc_html__('Larger', 'lt-ext') 	=> 'large',
					esc_html__('Extra Large', 'lt-ext') 	=> 'xl',
				),
				"type" => "dropdown"
			),
			array(
				"param_name" => "style",
				"heading" => esc_html__("Header Special", 'lt-ext'),
				"description" => esc_html__("Special styling", 'lt-ext'),
				"std" => "head-subheader",
				"admin_label" => true,				
				"value" => array(
					esc_html__('Default', 'lt-ext') 					=> 'head-subheader',
					esc_html__('Simple Header', 'lt-ext') 					=> 'default',
					esc_html__('Inline', 'lt-ext') 					=> 'inline',
/*					esc_html__('Line on right side', 'lt-ext')		=> 'line-right',*/
//					esc_html__('Shadow', 'lt-ext') 					=> 'shadow',
//					esc_html__('Shadow Dark', 'lt-ext') 			=> 'shadow-dark',
					/*
					esc_html__('Multi-line', 'lt-ext') 				=> 'multiline',
					esc_html__('Inline, subheader Larger', 'lt-ext') 	=> 'spanned',
					esc_html__('Subheader as top background at th top', 'lt-ext') 	=> 'subheader-bg',
					esc_html__('Rounded background', 'lt-ext') 		=> 'header-rounded',
					*/
//					esc_html__('Subheader as inset background', 'lt-ext') => 'subheader-bg-inner',
				),
				"type" => "dropdown"
			),
			array(
				"param_name" => "transform",
				"heading" => esc_html__("Transform", 'lt-ext'),
				"std" => "default",
				"admin_label" => true,				
				"value" => array(
					esc_html__('Default', 'lt-ext') 							=> 'default',
					esc_html__('Header Uppercase', 'lt-ext') 					=> 'header-up',
					esc_html__('Header and Subheader Uppercase', 'lt-ext') 	=> 'all-up',
				),
				"type" => "dropdown"
			),				
			array(
				"param_name" => "align",
				"heading" => esc_html__("Alignment", 'lt-ext'),
				"description" => esc_html__("Horizontal Aligment of Header", 'lt-ext'),
				"std" => "default",
				"value" => array(
					esc_html__('Default', 'lt-ext') => 'default',
					esc_html__('Left', 'lt-ext') => 'left',
					esc_html__('Center', 'lt-ext') => 'center',
					esc_html__('Right', 'lt-ext') => 'right'
				),
				"type" => "dropdown"
			),
			array(
				"param_name" => "text",
				"heading" => esc_html__("Text", 'lt-ext'),
				"description" => esc_html__("Text Under Header", 'lt-ext'),
				"admin_label" => true,					
				"type" => "textarea"
			),		
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Background Image', 'lt-ext' ),
				'param_name' => 'bg_image',
				'std'	=>	'yes',
				'description' => esc_html__( 'Use background image from Theme Settings', 'lt-ext' ),
			),			
/*			
			array(
				"param_name" => "text_bg",
				"heading" => esc_html__("Text as background", 'lt-ext'),
				"description" => esc_html__("Text will be used as watermark background", 'lt-ext'),
				"type" => "checkbox"
			),		

			array(
				'param_name' => 'icon_fontawesome',
				'heading' => esc_html__( 'Icon Fontawesome', 'lt-ext' ),
				'description' => esc_html__("Icon will be showed before header or as background", 'lt-ext'),				
				'type' => 'iconpicker',
				'admin_label' => true,
				'group' => esc_html__( 'Icon', 'lt-ext' ),
				'value' => '',
				'settings' => array(
					'emptyIcon' => true,
					
					'type' => 'fontawesome'

				),
			),
			array(
				"param_name" => "image",
				"heading" => esc_html__("Icon Image", 'lt-ext'),
				'group' => esc_html__( 'Icon', 'lt-ext' ),
				"type" => "attach_image"
			),			
			array(
				"param_name" => "icon_type",
				"heading" => esc_html__("Icon Type", 'lt-ext'),
				"std" => "hidden",
				'group' => esc_html__( 'Icon', 'lt-ext' ),
				"value" => array(
					esc_html__('Hidden', 'lt-ext') => 'hidden',					
					esc_html__('Before Header', 'lt-ext') => 'default',
					esc_html__('After Header', 'lt-ext') => 'after',
					esc_html__('As Background', 'lt-ext') => 'bg',
				),
				"type" => "dropdown"
			),		
*/			
			array(
				"param_name" => "size_px",
				"heading" => esc_html__("Custom Size Desktop", 'lt-ext'),
				'group' => esc_html__( 'Custom', 'lt-ext' ),
				"type" => "textfield"
			),
			array(
				"param_name" => "size_px_mobile",
				"heading" => esc_html__("Custom Size Mobile", 'lt-ext'),
				'group' => esc_html__( 'Custom', 'lt-ext' ),
				"type" => "textfield"
			),			
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Yes theme default font family?', 'lt-ext' ),
				'param_name' => 'use_theme_fonts',
				'std'	=>	'yes',
				'value' => array( esc_html__( 'Yes', 'lt-ext' ) => 'yes' ),
				'description' => esc_html__( 'Yes font family from the theme.', 'lt-ext' ),
				'group' => esc_html__( 'Custom', 'lt-ext' ),
				'dependency' => array(
					'element' => 'use_custom_fonts',
					'value' => array( 'yes' ),
				),
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts',
				'value' => '',
				// Not recommended, this will override 'settings'. 'font_family:'.rawurlencode('Exo:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic').'|font_style:'.rawurlencode('900 bold italic:900:italic'),
				'settings' => array(
					'fields' => array(
						// Default font style. Name:weight:style, example: "800 bold regular:800:normal"
						'font_family_description' => esc_html__( 'Select font family.', 'lt-ext' ),
						'font_style_description' => esc_html__( 'Select font styling.', 'lt-ext' ),
					),
				),
				'group' => esc_html__( 'Custom', 'lt-ext' ),
				'dependency' => array(
					'element' => 'use_theme_fonts',
					'value_not_equal_to' => 'yes',
				),
			),

		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_header' ) ) {

	function like_sc_header($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_header', $atts, array_merge( array(

			'size'			=> 'default',
			'bg'			=> 'light',
			'type'			=> 'h2',
			'subtype'			=> 'h4',
			'header' 		=> '',
			'subheader' 	=> '',
			'size_px' 	=> '',
			'bg_image'	=> '',
			'size_px_mobile' 	=> '',
			'transform' 	=> 'header-up',
			'use_theme_fonts' 	=> '',
			'google_fonts' 		=> '',
			'style' 	=> 'head-subheader',
			'color' 	=> '',
			'subcolor' 	=> '',					
			'text' 		=> '',
			'text_bg' 		=> '',
			'image'		=>	'',
			'icon_fontawesome' 	=> '',
			'icon_type' 		=> 'default',
			'align' 	=> 'left',

			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		if (!empty($atts['header']) || !empty($atts['subheader'])) {

			return like_sc_output('header', $atts, $content);
		}
			else {

			return false;
		}
	}

	if (ltx_vc_inited()) add_shortcode("like_sc_header", "like_sc_header");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_header_add')) {

	function ltx_vc_header_add() {
		
		vc_map( array(
			"base" => "like_sc_header",
			"name" 	=> esc_html__("Header", 'lt-ext'),
			"description" => esc_html__("Custom Header", 'lt-ext'),
			"class" => "like_sc_header",
			"icon"	=>	ltxGetPluginUrl('/shortcodes/header/header.png'),
			"show_settings_on_create" => true,
			"category" => esc_html__('ltx-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_header_params(),
				ltx_vc_default_params()
			)
		) );
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_header_add', 30);
}


