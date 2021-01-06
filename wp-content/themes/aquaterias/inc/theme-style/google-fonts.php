<?php

/**
 * Including google fonts
 */
$aquaterias_font_main = fw_get_db_settings_option( 'font-text' );
$aquaterias_font_headers = fw_get_db_settings_option( 'font-headers' );

$aquaterias_google_fonts = array();
$aquaterias_google_fonts[$aquaterias_font_main['family']][$aquaterias_font_main['variation']] = true;
$aquaterias_google_fonts[$aquaterias_font_headers['family']][$aquaterias_font_headers['variation']] = true;
$aquaterias_google_subsets[$aquaterias_font_main['subset']] = true;
$aquaterias_google_subsets[$aquaterias_font_headers['subset']] = true;

$aquaterias_font_headers['variation'] = str_replace('regular', '400', $aquaterias_font_headers['variation']);
$aquaterias_font_main['variation'] = str_replace('regular', '400', $aquaterias_font_main['variation']);

$theme_style .= "html,body,div,table { 
	font-family: '".esc_attr($aquaterias_font_main['family'])."';
	font-weight: ".esc_attr($aquaterias_font_main['variation']).";
}";

$theme_style .= "h1, h2, h3, h4, .header, .font-headers, .breadcrumbs { 
	font-family: '".esc_attr($aquaterias_font_headers['family'])."';
	font-weight: ".esc_attr($aquaterias_font_headers['variation']).";
}";

$theme_style .= "#navbar > ul > li > a:not(.fa) { 
	font-family: '".esc_attr($aquaterias_font_headers['family'])."';
	font-weight: ".esc_attr($aquaterias_font_headers['variation']).";
}";

$theme_style .= ".font-main { 
	font-family: '".esc_attr($aquaterias_font_main['family'])."';
}";

$family = $subset = '';
foreach ( $aquaterias_google_fonts as $font => $styles ) {

	if ( !empty($family) ) $family .= "%7C";
    $family .= str_replace( ' ', '+', $font ) . ':' . implode( ',', array_keys($styles) ).',400i,600i,600,700,800';
}

foreach ( $aquaterias_google_subsets as $subset_ => $val ) {

	if ( !empty($subset) ) $subset .= ",";
    $subset .= $subset_;
}

$query_args = array( 'family' => $family, 'subset' => $subset );
wp_enqueue_style( 'aquaterias_google_fonts', esc_url( add_query_arg( $query_args, '//fonts.googleapis.com/css' ) ), array(), null );


