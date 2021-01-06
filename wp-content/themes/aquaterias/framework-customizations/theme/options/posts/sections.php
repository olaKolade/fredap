<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'theme_block' => array(
		'title'   => esc_html__( 'Theme Block', 'aquaterias' ),
		'label'   => esc_html__( 'Theme Block', 'aquaterias' ),
		'type'    => 'select',
		'choices' => array(
			'none'  => esc_html__( 'Not Assigned', 'aquaterias' ),
			'subscribe'  => esc_html__( 'Subscribe', 'aquaterias' ),			
			'top_bar'  => esc_html__( 'Top Bar', 'aquaterias' ),
		),
		'value' => 'none',
	)
);


