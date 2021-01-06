<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Header
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_blog_params' ) ) {

	function ltx_vc_blog_params() {

		$categories = json_decode(json_encode(get_categories()), TRUE);
		$cat = array();
		foreach ($categories as $item) {

			$cat[$item['name']] = $item['term_id'];
		}

		$fields = array(	
			array(
				"param_name" => "ids",
				"heading" => esc_html__("Filter IDs", 'lt-ext'),
				"description" => __("Enter IDs to show, separated by comma", 'lt-ext'),
				"admin_label" => true,
				"type" => "textfield"
			),			
			array(
				"param_name" => "cat",
				"heading" => esc_html__("Category", 'lt-ext'),
				"value" => array_merge(array(esc_html__('--', 'lt-ext') => 0), $cat),
				"type" => "dropdown"
			),				
			array(
				"param_name" => "excerpt",
				"heading" => esc_html__("Custom Except Size", 'lt-ext'),
				"value" => "",
				"description" => esc_html__("By default used global setting", 'lt-ext'),
				"type" => "textfield"
			),			
			array(
				"param_name" => "readmore",
				"heading" => esc_html__("Header for read more link, will be hidden if empty", 'like-themes-plugins'),
				"value" => "",
				"type" => "textfield"
			),
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_blog' ) ) {

	function like_sc_blog($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_blog', $atts, array_merge( array(

			'layout'		=> 'default',
			'date_style'		=> 'bold',
			'cat'			=> '',
			'readmore'		=> '',
			'readmore_style'		=> '',
			'thumb'			=> 'visible',
			'ids'			=> '',
			'cat'			=> '',
			'excerpt'		=> '',

			'all_posts'		=> '',

			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		return like_sc_output('blog', $atts, $content);
	}

	if (ltx_vc_inited()) add_shortcode("like_sc_blog", "like_sc_blog");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_blog_add')) {

	function ltx_vc_blog_add() {
		
		vc_map( array(
			"base" => "like_sc_blog",
			"name" 	=> esc_html__("Blog", 'lt-ext'),
			"description" => esc_html__("Blog posts slider", 'lt-ext'),
			"class" => "like_sc_blog",
			"icon"	=>	ltxGetPluginUrl('/shortcodes/blog/blog.png'),
			"show_settings_on_create" => true,
			"category" => esc_html__('ltx-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_blog_params(),
				ltx_vc_default_params()
			)
		) );
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_blog_add', 30);
}


