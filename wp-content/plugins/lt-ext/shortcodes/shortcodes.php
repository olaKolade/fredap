<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcodes Init
 * https://codex.wordpress.org/Shortcode_API 
 */

if ( !function_exists('ltxthemes_sc_init') ) {

	function ltxthemes_sc_init() {

		if (function_exists('FW')) {

			$shortcodes_array = array(

				'alert'			=>	true,
				'block-icon'	=>	true,			
				'blog'			=>	true,
				'bubbles'			=>	true,
				'button'		=>	true,
				'contact_form_7'=>	true,				
				'countup'		=>	true,
				'content_width'	=>	true,
				'events_calendar'	=>	true,
				'empty_space'	=>	true,
				'google_maps'	=>	true,
				'header'		=>	true,
				'image-header'	=>	true,
				'menu'			=>	true,
				'products'		=>	true,
				'services'		=>	true,			
				'social-icons'	=>	true,
				'sliders'		=>	true,
				'tariff'		=>	true,
	//			'team'		=>	true,
				'team_slider'		=>	true,
				'testimonials'	=>	true,
				'zoom_slider'	=>	true,			
			);

			foreach ($shortcodes_array as $item => $enabled) {

				$sc_include = ltxGetLocalPath( '/shortcodes/' . $item . '/' . $item . '.php' );
				if ( $enabled AND file_exists( $sc_include ) ) {

					include_once $sc_include;
				}
			}
		}
	}
}
add_action( 'after_setup_theme', 'ltxthemes_sc_init', 100 );

/**
 * Default fields for all shortcodes
 */
if ( !function_exists( 'ltx_vc_default_params' ) ) {

	function ltx_vc_default_params() {

		$group = esc_html__('Attributes', 'lt-ext');

		$fields = array(

			'id' => array(
				'type'			=> 'textfield',
				'heading' 		=> esc_html__("Element ID", 'lt-ext'),
				'param_name' 	=> "id",
				'admin_label' 	=> true,
				'group'			=> $group,
			),
			'class' => array(
				'type'			=> 'textfield',
				'heading' 		=> esc_html__("Extra class name", 'lt-ext'),
				'param_name' 	=> "class",
				'admin_label'	=> true,
				'group'			=> $group,
			),
			'css' => array(
				'param_name' 	=> 'css',
				'heading' 		=> esc_html__( 'CSS box', 'lt-ext' ),
				'group' 		=> esc_html__( 'Design Options', 'lt-ext' ),
				'type' 			=> 'css_editor'
			)
		);

		apply_filters( 'ltx_vc_default_params', $fields );

		return $fields;
	}
}

/**
 * Adding VC params
 */
if ( !function_exists( 'ltx_vc_add_params' ) ) {

	function ltx_vc_add_params() {

		global $ltx_cfg;

		if ( !isset($ltx_cfg['sections']) ) $ltx_cfg['sections'] = array();
		if ( empty($ltx_cfg['background']) ) $ltx_cfg['background'] = array();
		if ( empty($ltx_cfg['overlay']) ) $ltx_cfg['overlay'] = array();

		$colors = array (

			array(
				"type" => "dropdown",
				"heading" => esc_html__("Background Color", 'lt-ext'),
				"description" => esc_html__("Set Background Color from Theme Default Colors", 'lt-ext'),
				"param_name" => "bg_color_select",
				"std"	=>	"transparent",
				"group" => esc_html__('Background', 'lt-ext'),
				"value" => array_merge(
					array(
						esc_html__( "Transparent" , 'lt-ext') => "transparent",
					),
					$ltx_cfg['background']
				),				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Background Overlay", 'lt-ext'),
				"description" => esc_html__("Background overlay effect", 'lt-ext'),
				"param_name" => "bg_overlay",
				"std"	=>	"none",
				"group" => esc_html__('Background', 'lt-ext'),
				"value" => array_merge(
					array(
						esc_html__( "None", 'lt-ext' ) => "none"
					),
					$ltx_cfg['overlay']
				),				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Background Repeat", 'lt-ext'),
				"description" => esc_html__("Background repeat will be disabled", 'lt-ext'),
				"param_name" => "bg_repeat",
				"std"	=>	"none",
				"group" => esc_html__('Background', 'lt-ext'),
				"value" => 
					array(
						esc_html__( "No repeat", 'lt-ext' ) => "none",
						esc_html__( "Repeat-X", 'lt-ext' ) => "repeat-x",
						esc_html__( "Repeat-Y", 'lt-ext' ) => "repeat-y",
					),
			),				
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Background Position", 'lt-ext'),
				"description" => esc_html__("Background repeat will be disabled", 'lt-ext'),
				"param_name" => "bg_pos",
				"std"	=>	"default",
				"group" => esc_html__('Background', 'lt-ext'),
				"value" => 
					array(
						esc_html__( "Default", 'lt-ext' ) => "default",

						esc_html__( "Top-left", 'lt-ext' ) => "left-top",
						esc_html__( "Top-center", 'lt-ext' ) => "center-top",
						esc_html__( "Top-right", 'lt-ext' ) => "right-top",						

						esc_html__( "Center-left", 'lt-ext' ) => "left-center",
						esc_html__( "Center-center", 'lt-ext' ) => "center-center",
						esc_html__( "Center-right", 'lt-ext' ) => "right-center",						

						esc_html__( "Bottom-left", 'lt-ext' ) => "left-bottom",
						esc_html__( "Bottom-center", 'lt-ext' ) => "center-bottom",
						esc_html__( "Bottom-right", 'lt-ext' ) => "right-bottom",
					),
			),			
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Box Shadow", 'lt-ext'),
				"description" => esc_html__("Section with Shadow border", 'lt-ext'),
				"param_name" => "border_shadow",
				"std"	=>	"none",
				"group" => esc_html__('Background', 'lt-ext'),
				"value" => array(
					esc_html__( "None", 'lt-ext' ) => "none",
					esc_html__( "Shadowed", 'lt-ext' ) => "shadow",
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading' 		=> esc_html__("Background Hover Parallax", 'lt-ext'),
				"description" => esc_html__("Set strength", 'lt-ext'),
				'std' 			=> "disabled",
				'param_name' 	=> "bg_parallax",
				"group" => esc_html__('Background', 'lt-ext'),
				"value" => array(
					esc_html__( "Disabled", 'lt-ext' ) => "disabled",
					esc_html__( "Static Background", 'lt-ext' ) => "static",
				),				
			),			
		);

		foreach ($colors as $param) {

			vc_add_param("vc_section", $param);
			vc_add_param("vc_row", $param);
			vc_add_param("vc_row_inner", $param);
			vc_add_param("vc_column", $param);
			vc_add_param("vc_column_inner", $param);
		}

		$section_class = array( 
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Text Align", 'lt-ext'),
				"description" => esc_html__("Row Text Align", 'lt-ext'),
				"param_name" => "text_align",
				"std"	=>	"default",
				"group" => esc_html__('Settings', 'lt-ext'),
				"value" => array(
					esc_html__( "Default", 'lt-ext' ) => "default",
					esc_html__( "Center", 'lt-ext' ) => "center",
					esc_html__( "Center Only Mobile", 'lt-ext' ) => "center-ms",
					esc_html__( "Right", 'lt-ext' ) => "right",
					esc_html__( "Right Only Desktop", 'lt-ext' ) => "right-lg",
				),
			),			
			array(
				"type" => "dropdown",
				"heading" => esc_html__("ltx Theme Section Class", 'lt-ext'),
				"description" => esc_html__("Used to style unique theme blocks", 'lt-ext'),
				"param_name" => "theme_section",
				"group" => esc_html__('Settings', 'lt-ext'),				
				"std"	=>	"none",
				"value" => array_merge(
					array(
						esc_html__( "None", 'lt-ext' ) => "none"
					),
					$ltx_cfg['sections']
				),
			),
		);

		foreach ($section_class as $param) {

			vc_add_param("vc_section", $param);
			vc_add_param("vc_row", $param);
			vc_add_param("vc_row_inner", $param);
			vc_add_param("vc_column", $param);
			vc_add_param("vc_column_inner", $param);		
		}	
	
		$img_class = array( 
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Shadow", 'lt-ext'),
				"description" => esc_html__("Used to style unique theme blocks", 'lt-ext'),
				"param_name" => "img_shadow",				
				"std"	=>	"none",
				"value" => 
					array(
						esc_html__( "None", 'lt-ext' ) => "none",
						esc_html__( "Plain", 'lt-ext' ) => "plain",
					),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Inline", 'lt-ext'),
				"description" => esc_html__("Use to set inline images", 'lt-ext'),
				"param_name" => "inline",
				"std"	=>	"none",
				"value" => 
					array(
						esc_html__( "Default (One in row)", 'lt-ext' ) => "none",
						esc_html__( "Inline", 'lt-ext' ) => "inline",
					),
			),			
		);

		foreach ($img_class as $param) {	

			vc_add_param("vc_single_image", $param);
		}

	}

}

if ( !function_exists( 'ltx_vc_scrollreveal_params' ) ) {
	function ltx_vc_scrollreveal_params() {

		$fields = array(
			array(
				"param_name" => "scrollreveal_type",
				"heading" => esc_html__("Animation", 'lt-ext'),
				"group" => esc_html__('ScrollReveal', 'lt-ext'),					
				"std" => "disabled",
				"value" => array(
					esc_html__('Disabled', 'lt-ext') 			=> 'disabled',
					esc_html__('Zoom In', 'lt-ext') 			=> 'zoom_in',
					esc_html__('Fade In', 'lt-ext') 			=> 'fade_in',
					esc_html__('Slide From Left', 'lt-ext') 	=> 'slide_from_left',
					esc_html__('Slide From Right', 'lt-ext') 	=> 'slide_from_right',
					esc_html__('Slide From Top', 'lt-ext') 		=> 'slide_from_top',
					esc_html__('Slide From Bottom', 'lt-ext') 	=> 'slide_from_bottom',
					esc_html__('Rotate 360 deg', 'lt-ext') 		=> 'slide_rotate',
				),
				"type" => "dropdown"
			),
			array(
				"param_name" => "scrollreveal_elements",
				"heading" => esc_html__("Elements", 'lt-ext'),
				"description" => esc_html__("Select elemets to animate", 'lt-ext'),
				"group" => esc_html__('ScrollReveal', 'lt-ext'),					
				"std" => "block",
				"value" => array(
					esc_html__('Single Block', 'lt-ext') 			=> 'block',
					esc_html__('Every Article/Item', 'lt-ext') 		=> 'items',
					esc_html__('Every Paragraph/Image/Button', 'lt-ext') 	=> 'text_el',
					esc_html__('Every List Element', 'lt-ext') 		=> 'list_el',
				),
				"type" => "dropdown"
			),		
			array(
				"param_name" => "scrollreveal_delay",
				"heading" => esc_html__("Delay", 'lt-ext'),
				"description" => esc_html__("Start Delay", 'lt-ext'),
				"group" => esc_html__('ScrollReveal', 'lt-ext'),					
				"std" => "200",
				"value" => array(
					esc_html__('No Delay', 'lt-ext') 		=> '0',
					esc_html__('Quick Delay (200ms)', 'lt-ext') 			=> '200',
					esc_html__('Long Delay (500ms)', 'lt-ext') 		=> '500',
					esc_html__('Extra Long Delay (1000ms)', 'lt-ext') 		=> '1000',
				),
				"type" => "dropdown"
			),		
			array(
				"param_name" => "scrollreveal_duration",
				"heading" => esc_html__("Duration", 'lt-ext'),
				"description" => esc_html__("How long one element animation goes", 'lt-ext'),
				"group" => esc_html__('ScrollReveal', 'lt-ext'),					
				"std" => "300",
				"value" => array(
					esc_html__('Very Fast (150ms)', 'lt-ext') 		=> '150',
					esc_html__('Fast (300ms)', 'lt-ext') 			=> '300',
					esc_html__('Moderate (500ms)', 'lt-ext') 		=> '500',
					esc_html__('Long (800ms)', 'lt-ext') 			=> '800',
					esc_html__('Extra Long (1200ms)', 'lt-ext') 	=> '1200',
				),
				"type" => "dropdown"
			),		
			array(
				"param_name" => "scrollreveal_sequences_delay",
				"heading" => esc_html__("Sequences Delay", 'lt-ext'),
				"description" => esc_html__("Delay between elements in one section", 'lt-ext'),
				"group" => esc_html__('ScrollReveal', 'lt-ext'),					
				"std" => "100",
				"value" => array(
					esc_html__('No Delay (all at once)', 'lt-ext') 		=> '0',
					esc_html__('Quick  (100ms)', 'lt-ext') 			=> '100',
					esc_html__('Moderate (200ms)', 'lt-ext') 			=> '200',
					esc_html__('Long  (300ms)', 'lt-ext') 		=> '300',
					esc_html__('Extra Long (500ms)', 'lt-ext') 		=> '500',
				),
				"type" => "dropdown"
			),		
			/*
			array(
				"param_name" => "scrollreveal_easing",
				"heading" => esc_html__("Easing", 'lt-ext'),
				"description" => esc_html__("CSS Easing", 'lt-ext'),
				"group" => esc_html__('ScrollReveal', 'lt-ext'),					
				"std" => "ease-in-out",
				"value" => array(
					esc_html__('Ease-in-Out', 'lt-ext') 	=> 'ease-in-out',
					esc_html__('Ease-Out-Bounce', 'lt-ext') 	=> 'ease-out-bounce',
					esc_html__('Linear', 'lt-ext') 			=> 'linear',
				),
				"type" => "dropdown"
			),				
			*/
		);

		return $fields;
	}
}

if ( !function_exists( 'ltx_vc_add_scrollreveal' ) ) {
	function ltx_vc_add_scrollreveal() {

		$params = ltx_vc_scrollreveal_params();

		foreach ($params as $param) {

			vc_add_param("vc_single_image", $param);
			vc_add_param("vc_section", $param);
			vc_add_param("vc_row", $param);
			vc_add_param("vc_row_inner", $param);
			vc_add_param("vc_column", $param);
			vc_add_param("vc_column_inner", $param);		
		}	
	}
}

/**
 * Adding new class names to existing VC Shortcodes
 */
if ( !function_exists( 'ltx_vc_add_element_class' ) ) {

	function ltx_vc_add_element_class($class = '', $tag, $atts) {

		if ( in_array( $tag, array('vc_section', 'vc_row', 'vc_row_inner', 'vc_column', 'vc_column_inner', 'vc_single_image') ) ) {

			if ( !empty($atts['bg_tone']) AND $atts['bg_tone'] != 'default' ) $class .= esc_attr( ' bg-tone-'.$atts['bg_tone'] );
			if ( !empty($atts['bg_color_select']) AND $atts['bg_color_select'] != 'transparent' ) {

				$class .= esc_attr( ' bg-color-'.$atts['bg_color_select'] );

				if ( $atts['bg_color_select'] == 'gradient') $class .= esc_attr( ' bg-color-black' );
			}

			if ( !empty($atts['bg_repeat']) AND $atts['bg_repeat'] != 'none' ) $class .= esc_attr( ' bg-'.$atts['bg_repeat'] );
			
			if ( !empty($atts['bg_pos']) AND $atts['bg_pos'] != 'default' ) $class .= esc_attr( ' bg-pos-'.$atts['bg_pos'] );			
			if ( !empty($atts['bg_overlay']) AND $atts['bg_overlay'] != 'none' ) $class .= esc_attr( ' bg-overlay-'.$atts['bg_overlay'] );
			if ( !empty($atts['border_shadow']) AND $atts['border_shadow'] != 'none' ) $class .= esc_attr( ' border_shadow ' );

			if ( !empty($atts['theme_section']) AND $atts['theme_section'] != 'none' ) $class .= esc_attr( ' '.$atts['theme_section'] );
			if ( !empty($atts['text_align']) AND $atts['text_align'] != 'default' ) $class .= esc_attr( ' text-align-'.$atts['text_align'] );

			if ( !empty($atts['bg_parallax']) AND $atts['bg_parallax'] != 'disabled' AND $atts['bg_parallax'] != 'disbled' ) $class .= esc_attr( ' bg-parallax bg-parallax-'.$atts['bg_parallax'] );

			/* Scroll Reveal */
			if ( !empty($atts['scrollreveal_type']) AND $atts['scrollreveal_type'] != 'disabled' ) {

				$class .= esc_attr( ' ltx-sr ltx-sr-effect-'.$atts['scrollreveal_type'] ).' '.
						  esc_attr( ' ltx-sr-id-'.mt_rand().' ').
						  esc_attr( ' ltx-sr-el-'.$atts['scrollreveal_elements'] ).' '.
						  esc_attr( ' ltx-sr-delay-'.$atts['scrollreveal_delay'] ).' '.
						  esc_attr( ' ltx-sr-duration-'.$atts['scrollreveal_duration'] ).' '.
						  esc_attr( ' ltx-sr-sequences-'.$atts['scrollreveal_sequences_delay'] );
			}
		}

		if ( in_array( $tag, array('vc_single_image') ) ) {

			if ( !empty($atts['img_shadow']) AND $atts['img_shadow'] != 'none' ) $class .= esc_attr( ' img-shadow-'.$atts['img_shadow'] );
			if ( !empty($atts['inline']) AND $atts['inline'] != 'none' ) $class .= esc_attr( 'inline' );
		}

		if ( in_array( $tag, array('contact-form-7') ) ) {

			if ( !empty($atts['form_style']) ) $class .= esc_attr( ' form-style-'.$atts['form_style'] );			
			if ( !empty($atts['form_padding']) ) $class .= esc_attr( ' form-padding-'.$atts['form_padding'] );

		}

		return $class;
	}
}

if ( ltx_vc_inited() ) {

	vc_set_default_editor_post_types(

		array('page', 'sections', 'sliders', 'team')
	);

	add_action( 'after_setup_theme', 'ltx_vc_add_params', 5 );
	add_action( 'after_setup_theme', 'ltx_vc_add_scrollreveal', 5 );
	add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,	'ltx_vc_add_element_class', 10, 3 );	
}

/**
 * Parsing shortcodes attributing
 */
if (!function_exists('like_sc_atts_parse')) {

	function like_sc_atts_parse($sc, $atts, $default = array()) {

		if (!empty($atts)) {
			
			foreach ($atts as &$item) {

				$item = str_replace(array('{{', '}}'), array('<span>', '</span>'), $item);
				$item = str_replace(array('{+}'), array('<span class="ul-yes fa fa-check"></span>'), $item);
				$item = str_replace(array('{-}'), array('<span class="ul-no fa fa-close"></span>'), $item);
			}
		}
		unset($item);

		if ( !empty($atts['css']) ) {

			$atts['class'] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $atts['class'] . ' ' . vc_shortcode_custom_css_class( $atts['css'], ' ' ), $sc, $atts);
			$atts['css'] = '';
		}

		if ( empty($atts['css']) ) {

			$atts['id'] = $sc . '_' . mt_rand();
		}
	
		$atts = ltx_html_decode(shortcode_atts(apply_filters('like_sc_atts', $default, $sc), $atts));

 		return apply_filters('like_sc_atts', $atts, $sc);
	}
}

/**
 * Adding shortcode output
 */
if ( !function_exists( 'like_sc_output' ) ) {

	function like_sc_output($sc, $atts, $content = null) {	

		if ( !empty($content) ) $atts['content'] = do_shortcode($content);

		set_query_var('like_sc_' . $sc, $atts);

		$path = ltxGetLocalPath('/shortcodes/'.$sc.'/view.php');
		ob_start();
		if (file_exists($path)) include $path;
		$out = ob_get_contents();
		ob_end_clean();

		return $out;
	}
}

if (!function_exists('ltx_html_decode')) {
	function ltx_html_decode($string) {
		if ( is_array($string) && count($string) > 0 ) {
			foreach ($string as $key => &$value) {
				if (is_string($value)) {

					$value = htmlspecialchars_decode($value, ENT_QUOTES);
				}
			}
		}
		return $string;
	}
}


/**
 * WP Contact Form 7 Image Select Tag
 */
add_action( 'wpcf7_init', 'ltx_add_shortcode_car_select' );
function ltx_add_shortcode_car_select() {
    wpcf7_add_form_tag( 'car_select', 'ltx_car_select_shortcode_handler' );
}
 
function ltx_car_select_shortcode_handler( $tag ) {

	$out = '';

	if ( function_exists( 'fw_get_db_settings_option' ) ) {

		$cars = fw_get_db_settings_option( 'cars' );

		if ( !empty($cars) ) {

			$out = '<div class="menu-types">';
			foreach ($cars as $key => $item) {

				$class = '';
				if ( !empty($item['vip']) ) $class .= 'red';
				if ( $key == 0 ) $class .= ' active';

				$out .= '<a href="#" data-value="'. esc_html($item['text']) .'" class="car-select-'. esc_attr( $key ).' '. esc_attr( $class ).'">'. esc_html($item['text']) .'</a>';
			}
			$out .= '<input type="hidden" class="type-value" value="'. esc_html($item['text']) .'"></div>';
		}
	} 

    return $out;
}

