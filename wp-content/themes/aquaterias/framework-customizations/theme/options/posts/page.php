<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$aquaterias_choices =  array();
$aquaterias_choices['default'] = esc_html__( 'Default', 'aquaterias' );

$options = array(
	'general' => array(
		'title'   => esc_html__( 'Layout', 'aquaterias' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'type'    => 'box',
				'options' => array(		
					'navbar-layout'    => array(
						'label' => esc_html__( 'Navbar', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
//							'default'  		=> esc_html__( 'Default White Background', 'aquaterias' ),
							'transparent'	=> esc_html__( 'Transparent (dark background)', 'aquaterias' ),
							'transparent-homepage'	=> esc_html__( 'Transparent Homepage (blue background)', 'aquaterias' ),
//							'transparent-homepage-dark'	=> esc_html__( 'Transparent Homepage (black background)', 'aquaterias' ),
							'transparent-light'	=> esc_html__( 'Transparent (light background)', 'aquaterias' ),
							'disabled'  	=> esc_html__( 'Hidden', 'aquaterias' ),
						),
						'value' => 'transparent',
					),			
					'header-layout'    => array(
						'label' => esc_html__( 'Page Header', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
							'default'  => esc_html__( 'Default', 'aquaterias' ),
							'disabled' => esc_html__( 'Hidden', 'aquaterias' ),
						),
						'value' => 'default',
					),
					'hide_h1'    => array(
						'label' => esc_html__( 'H1 in Page Header', 'aquaterias' ),
						'type'    => 'select',						
						'choices' => array(
							'default'  => esc_html__( 'Displayed', 'aquaterias' ),
							'disabled'  => esc_html__( 'Hidden', 'aquaterias' ),
						),
						'value' => 'default',
					),							
					'body-color'    => array(
						'label' => esc_html__( 'Body Color', 'aquaterias' ),
						'type'    => 'select',
						'description'   => esc_html__( 'Page Background Color', 'aquaterias' ),
						'choices' => array(
							'default'  => esc_html__( 'Default White', 'aquaterias' ),
							'black'  => esc_html__( 'Black', 'aquaterias' ),
							'black-dark'  => esc_html__( 'Black Dark', 'aquaterias' ),
						),
						'value' => 'default',
					),	
					'water-ripples'    => array(
						'label' => esc_html__( 'Water ripples in page header', 'aquaterias' ),
						'desc'  => esc_html__( 'Enables water ripples effect', 'aquaterias' ),
						'type'    => 'select',						
						'choices' => array(
							'disabled'  => esc_html__( 'Disabled', 'aquaterias' ),
							'enabled' => esc_html__( 'Enabled', 'aquaterias' ),
						),
						'value' => 'disabled',
					),										
					'margin-layout'    => array(
						'label' => esc_html__( 'Content Margin', 'aquaterias' ),
						'type'    => 'select',
						'description'   => esc_html__( 'Margin control for content', 'aquaterias' ),
						'choices' => array(
							'default'  => esc_html__( 'Top And Bottom', 'aquaterias' ),
							'top'  => esc_html__( 'Top Only', 'aquaterias' ),
							'bottom'  => esc_html__( 'Bottom Only', 'aquaterias' ),
							'disabled' => esc_html__( 'Margin Removed', 'aquaterias' ),
						),
						'value' => 'default',
					),					
					'sidebar-layout'    => array(
						'label' => esc_html__( 'Sidebar', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
							'disabled' => esc_html__( 'Hidden', 'aquaterias' ),
//							'left'  => esc_html__( 'Sidebar Left', 'aquaterias' ),
							'right'  => esc_html__( 'Sidebar Visible', 'aquaterias' ),
						),
						'value' => 'disabled',
					),
					'subscribe-layout'    => array(
						'label' => esc_html__( 'Subscribe Block', 'aquaterias' ),
						'type'    => 'select',
						'description'   => esc_html__( 'Subscribe block before footer. Can be edited from Sections Menu.', 'aquaterias' ),
						'choices' => array(
							'default'  => esc_html__( 'Visible', 'aquaterias' ),
							'disabled' => esc_html__( 'Hidden', 'aquaterias' ),
						),
						'value' => 'Visible',
					),
					'footer-layout'    => array(
						'label' => esc_html__( 'Footer Block', 'aquaterias' ),
						'type'    => 'select',
						'description'   => esc_html__( 'Footer block before footer. Can be edited from Sections Menu.', 'aquaterias' ),
						'choices' => array(
							'default'  => esc_html__( 'Visible', 'aquaterias' ),
							'disabled' => esc_html__( 'Hidden', 'aquaterias' ),
						),
						'value' => 'Visible',
					),						
					'blog-layout'    => array(
						'label' => esc_html__( 'Blog Layout', 'aquaterias' ),
						'description'   => esc_html__( 'Used only for blog pages. You may ignore them on static pages.', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
							'default'  => esc_html__( 'Default', 'aquaterias' ),
							'classic'  => esc_html__( 'One Column', 'aquaterias' ),
							'two-cols' => esc_html__( 'Two Columns', 'aquaterias' ),
							'three-cols' => esc_html__( 'Three Columns', 'aquaterias' ),
						),
						'value' => 'default',
					),
					'gallery-layout'    => array(
						'label' => esc_html__( 'Gallery Layout', 'aquaterias' ),
						'description'   => esc_html__( 'Used only for gallery pages. You may ignore them on static pages.', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
							'default' => esc_html__( 'Default', 'aquaterias' ),
							'col-2' => esc_html__( 'Two Columns', 'aquaterias' ),
							'col-3' => esc_html__( 'Three Columns', 'aquaterias' ),
							'col-4' => esc_html__( 'Four Columns', 'aquaterias' ),
						),
						'value' => 'default',
					),					
				)
			),
		)
	)
);


