<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'subheader'    => array(
				'label' => esc_html__( 'Subheader', 'aquaterias' ),
				'type'  => 'text',
			),			
			'items' => array(
				'label' => esc_html__( 'Social Icons For List', 'aquaterias' ),
				'type' => 'addable-box',
				'value' => array(),
				'box-options' => array(
					'icon' => array(
						'label' => esc_html__( 'Icon', 'aquaterias' ),
						'type'  => 'icon',
					),
					'href' => array(
						'label' => esc_html__( 'Link', 'aquaterias' ),
						'desc' => esc_html__( 'If needed', 'aquaterias' ),
						'type' => 'text',
						'value' => '#',
					),
				),
				'template' => '{{- icon }}',
			),			
		),
	),		
);

