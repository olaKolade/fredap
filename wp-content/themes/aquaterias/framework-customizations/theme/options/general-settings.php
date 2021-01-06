<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$descr = '';

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'aquaterias' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'aquaterias' ),
				'type'    => 'box',
				'options' => array(			
					'logo'    => array(
						'label' => esc_html__( 'Logo', 'aquaterias' ),
						'desc'  => esc_html__( 'Upload logo', 'aquaterias' ),
						'type'  => 'upload',
					),
					'logo_dark'    => array(
						'label' => esc_html__( 'Logo Dark', 'aquaterias' ),
						'desc'  => esc_html__( 'Upload logo', 'aquaterias' ),
						'type'  => 'upload',
					),			
					'basket-icon'    => array(
						'label' => esc_html__( 'Basket icon', 'aquaterias' ),
						'description'   => esc_html__( 'Basket icon in menu navbar. ', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
							'disabled' => esc_html__( 'Hidden', 'aquaterias' ),
							'mobile'  => esc_html__( 'Mobile Only', 'aquaterias' ),
							'desktop'  => esc_html__( 'Desktop Only', 'aquaterias' ),
							'visible'  => esc_html__( 'Visible Always', 'aquaterias' ),
						),
						'value' => 'visible',
					),
					'bubbles'    => array(
						'label' => esc_html__( 'Floating bubbles', 'aquaterias' ),
						'description'   => esc_html__( 'You can enable them in certain pages in Visual Composer Shortcode Bubbles', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
							'disabled' => esc_html__( 'Hidden', 'aquaterias' ),
							'enabled' => esc_html__( 'Enabled on all inner pages', 'aquaterias' ),
						),
						'value' => 'disabled',
					),						
					'page-loader'    => array(
						'type'    => 'multi-picker',
						'picker'       => array(
							'loader' => array(
								'label'   => esc_html__( 'Page Loader', 'aquaterias' ),
								'type'    => 'select',
								'choices' => array(
									'disabled' => esc_html__( 'Disabled', 'aquaterias' ),
									'default' => esc_html__( 'Theme Default', 'aquaterias' ),
//									'progress' => esc_html__( 'Progress Bar', 'aquaterias' ),
									'image' => esc_html__( 'Upload Image', 'aquaterias' ),
								),
								'value' => 'default'
							)
						),						
						'choices' => array(
							'image' => array(
								'loader_img'    => array(
									'label' => esc_html__( 'Page Loader Image', 'aquaterias' ),
									'desc'   => esc_html__( 'You can upload static or gif image for animation', 'aquaterias' ),
									'type'  => 'upload',
								),
							),
						),
					),											
					'featured_bg'    => array(
						'label' => esc_html__( 'Featured Images as Background', 'aquaterias' ),
						'desc'  => esc_html__( 'Use Featured Image for Page as Header Background', 'aquaterias' ),
						'type'    => 'select',						
						'choices' => array(
							'disabled'  => esc_html__( 'Disabled', 'aquaterias' ),
							'enabled' => esc_html__( 'Enabled', 'aquaterias' ),
						),
						'value' => 'disabled',
					),						
					'water_ripples'    => array(
						'label' => esc_html__( 'Water ripples in page header', 'aquaterias' ),
						'desc'  => esc_html__( 'Enables mouse hover water ripples effect in inner page header', 'aquaterias' ),
						'type'    => 'select',						
						'choices' => array(
							'default'  => esc_html__( 'Default page settings', 'aquaterias' ),
							'disabled'  => esc_html__( 'Disabled always', 'aquaterias' ),
							'enabled' => esc_html__( 'Enabled always', 'aquaterias' ),
						),
						'value' => 'default',
					),
					'hide_wc_h1'    => array(
						'label' => esc_html__( 'H1 in Page Header for WooCommerce Single Product', 'aquaterias' ),
						'desc'  => esc_html__( 'SEO optimization', 'aquaterias' ),
						'type'    => 'select',						
						'choices' => array(
							'default'  => esc_html__( 'H1 Displayed', 'aquaterias' ),
							'disabled'  => esc_html__( 'H1 Hidden', 'aquaterias' ),
						),
						'value' => 'default',
					),						
					'wc_zoom'    => array(
						'label' => esc_html__( 'WooCommerce Product Hover Zoom', 'aquaterias' ),
						'type'    => 'select',
						'description'   => esc_html__( 'Enables mouse hover zoom in single product page', 'aquaterias' ),
						'choices' => array(
							'disabled'  => esc_html__( 'Disabled', 'aquaterias' ),
							'enabled' => esc_html__( 'Enabled', 'aquaterias' ),
						),
						'value' => 'disabled',
					),
					'google_api'    => array(
						'label' => esc_html__( 'Google Maps API Key', 'aquaterias' ),
						'desc'  => esc_html__( 'Required for contacts page, also used in widget', 'aquaterias' ),
						'type'  => 'text',
					),					
				),
			),
		),
	),
	'media' => array(
		'title'   => esc_html__( 'Media', 'aquaterias' ),
		'type'    => 'tab',
		'options' => array(

			'media-box' => array(
				'title'   => esc_html__( 'Backgrounds and patterns', 'aquaterias' ),
				'type'    => 'box',
				'options' => array(

					'heading_bg'    => array(
						'label' => esc_html__( 'Default Headings Icon', 'aquaterias' ),
						'desc'  => esc_html__( 'Will be visible under all default headers on site', 'aquaterias' ),
						'type'  => 'upload',
					),	
					'header_bg'    => array(
						'label' => esc_html__( 'Inner Header Background', 'aquaterias' ),
						'desc'  => esc_html__( 'By default header is gray, you can replace it with background image', 'aquaterias' ),
						'type'  => 'upload',
					),
					'footer_bg'    => array(
						'label' => esc_html__( 'Footer Background', 'aquaterias' ),
						'type'  => 'upload',
					),					
					'404_bg'    => array(
						'label' => esc_html__( '404 Page Background', 'aquaterias' ),
						'type'  => 'upload',
					),	
				)
			)
		)
	),	
	'layout' => array(
		'title'   => esc_html__( 'Layout', 'aquaterias' ),
		'type'    => 'tab',
		'options' => array(

			'layout-box' => array(
				'title'   => esc_html__( 'Post Settings', 'aquaterias' ),
				'type'    => 'box',
				'options' => array(

					'blog_layout'    => array(
						'label' => esc_html__( 'Blog Layout', 'aquaterias' ),
						'description'   => esc_html__( 'Default blog page layout.', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
							'classic'  => esc_html__( 'One Column', 'aquaterias' ),
							'two-cols' => esc_html__( 'Two Columns', 'aquaterias' ),
							'three-cols' => esc_html__( 'Three Columns', 'aquaterias' ),
						),
						'value' => 'classic',
					),		
					'blog_post_sidebar'    => array(
						'label' => esc_html__( 'Blog Post Sidebar', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
							'hidden'  => esc_html__( 'Hidden', 'aquaterias' ),
							'right' => esc_html__( 'Visible', 'aquaterias' ),
						),
						'value' => 'right',
					),										
					'gallery_layout'    => array(
						'label' => esc_html__( 'Default Gallery Layout', 'aquaterias' ),
						'description'   => esc_html__( 'Default galley page layout.', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
							'col-2' => esc_html__( 'Two Columns', 'aquaterias' ),
							'col-3' => esc_html__( 'Three Columns', 'aquaterias' ),
							'col-4' => esc_html__( 'Four Columns', 'aquaterias' ),
						),
						'value' => 'col-2',
					),	
					'excerpt_auto'    => array(
						'label' => esc_html__( 'Excerpt Blog Size', 'aquaterias' ),
						'desc'  => esc_html__( 'Automaticly cuts content for blogs', 'aquaterias' ),
						'value'	=> 350,
						'type'  => 'short-text',
					),
					'excerpt_wc_auto'    => array(
						'label' => esc_html__( 'Excerpt WooCommerce Size', 'aquaterias' ),
						'desc'  => esc_html__( 'Automaticly cuts description for products', 'aquaterias' ),
						'value'	=> 50,
						'type'  => 'short-text',
					),
					'wc_new_days'    => array(
						'label' => esc_html__( 'Number of days to display New label. Set 0 to hide.', 'aquaterias' ),
						'type'  => 'text',
						'value' => '30',
					),						
				)
			)
		)
	),
	'fonts' => array(
		'title'   => esc_html__( 'Fonts', 'aquaterias' ),
		'type'    => 'tab',
		'options' => array(

			'fonts-box' => array(
				'title'   => esc_html__( 'Fonts Settings', 'aquaterias' ),
				'type'    => 'box',
				'options' => array(
					'font-text'                => array(
						'label' => __( 'Paragraph (text) Font', 'aquaterias' ),
						'type'  => 'typography-v2',
						'desc'	=>	esc_html__( 'Use https://fonts.google.com/ to find font you need', 'aquaterias' ),
						'value'      => array(
							'family'    => 'Open Sans',
							'subset'    => 'latin-ext',
							'variation' => '400',
							'size'      => 0,
							'line-height' => 0,
							'letter-spacing' => 0,
							'color'     => '#000'
						),
						'components' => array(
							'family'         => true,
							'size'           => false,
							'line-height'    => false,
							'letter-spacing' => false,
							'color'          => false
						),
					),
					'font-headers'                => array(
						'label' => __( 'Headers Font', 'aquaterias' ),
						'type'  => 'typography-v2',
						'value'      => array(
							'family'    => 'Merriweather',
							'subset'    => 'latin-ext',
							'variation' => '900',
							'size'      => 0,
							'line-height' => 0,
							'letter-spacing' => 0,
							'color'     => '#000'
						),
						'components' => array(
							'family'         => true,
							'size'           => false,
							'line-height'    => false,
							'letter-spacing' => false,
							'color'          => false
						),
					),

				),
			),
		),
	),	
	'footer' => array(
		'title'   => esc_html__( 'Footer Block', 'aquaterias' ),
		'type'    => 'tab',
		'options' => array(

			'footer-box' => array(
				'title'   => esc_html__( 'Footer Settings', 'aquaterias' ),
				'type'    => 'box',
				'options' => array(
					'subscribe'    => array(
						'label' => esc_html__( 'Subscribe Block', 'aquaterias' ),
						'desc'   => esc_html__( 'You must install MailChimp plugin to use it', 'aquaterias' ),
						'type'    => 'select',
						'choices' => array(
							'default' => esc_html__( 'Default page settings', 'aquaterias' ),
							'visible'  => esc_html__( 'Always visible', 'aquaterias' ),
							'hidden'  => esc_html__( 'Always hidden', 'aquaterias' ),
						),
						'value' => 'default',
					),						
					'go_top_img'    => array(
						'label' => esc_html__( 'Go Top Image', 'aquaterias' ),
						'type'  => 'upload',
					),					
					'go_top_hide'    => array(
						'label' => esc_html__( 'Hide Go Top button in footer', 'aquaterias' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),			
					'copyrights'    => array(
						'label' => esc_html__( 'Copyrights', 'aquaterias' ),
						'type'  => 'wp-editor',
					),
					'footer_1_hide'    => array(
						'label' => esc_html__( 'Hide Footer 1 Widget', 'aquaterias' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_2_hide'    => array(
						'label' => esc_html__( 'Hide Footer 2 Widgets', 'aquaterias' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_3_hide'    => array(
						'label' => esc_html__( 'Hide Footer 3 Widgets', 'aquaterias' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_4_hide'    => array(
						'label' => esc_html__( 'Hide Footer 4 Widgets', 'aquaterias' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),						
					'footer_1_hide_mobile'    => array(
						'label' => esc_html__( 'Hide Footer 1 Widgets on mobile', 'aquaterias' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_2_hide_mobile'    => array(
						'label' => esc_html__( 'Hide Footer 2 Widgets on mobile', 'aquaterias' ),
						'type'  => 'switch',
						'value'	=> 'yes',
					),
					'footer_3_hide_mobile'    => array(
						'label' => esc_html__( 'Hide Footer 3 Widgets on mobile', 'aquaterias' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_4_hide_mobile'    => array(
						'label' => esc_html__( 'Hide Footer 4 Widgets on mobile', 'aquaterias' ),
						'type'  => 'switch',
						'value'	=> 'yes',
					),					
				),
			),
		),
	),
);

