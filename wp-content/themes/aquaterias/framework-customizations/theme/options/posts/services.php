<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'cut'    => array(
				'label' => esc_html__( 'Short Description', 'aquaterias' ),
				'type'  => 'text',
			),
			'link'    => array(
				'label' => esc_html__( 'External Link', 'aquaterias' ),
				'type'  => 'text',
				'value'  => '#',
			),			
		),
	),
);

