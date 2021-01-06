<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			"price" => array(
				"label" => esc_html__("Price", 'aquaterias'),
				"help"	=>	esc_html__("Use brackets to set units as postfix (for ex: {{ /unit }} )", 'aquaterias'),
				"type" => "text"
			),			
			"btn_href" => array(
				"label" => esc_html__("Button Link", 'aquaterias'),
				"value"	=>	'#',
				"type" => "text"
			),				
			"btn_header" => array(
				"label" => esc_html__("Button Header", 'aquaterias'),
				"type" => "text"
			),
		),
	),		
);

