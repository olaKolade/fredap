<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

// Navbar Settings
$theme_style .= "
@media (max-width: 1199px) {

	nav.navbar ul.navbar-nav li.menu-item-has-children:after
	{ color: {$css['black_color']} ; }

	nav.navbar #navbar
	{ background-color: {$css['main_color']} ; }

	nav.navbar ul.navbar-nav li > a:hover
	{ background-color: {$css['second_color']}; color: {$css['main_color']};   }

	nav.navbar #navbar ul.navbar-nav > li.current-menu-ancestor > a::after,
	nav.navbar #navbar ul.navbar-nav > li.current-menu-parent > a::after,
	nav.navbar #navbar ul.navbar-nav > .current_page_item > a,
	nav.navbar #navbar ul.navbar-nav > .current_page_item > a:after,
	nav.navbar ul.navbar-nav > li.current_page_parent > a,
	nav.navbar ul.navbar-nav > li.current_page_parent > a:after,
	nav.navbar ul.navbar-nav > li.current_page_item > a,
	nav.navbar ul.navbar-nav > li.current_page_item > a:after
	{ color: {$css['white_color']} !important; }

	ul.sub-menu li:hover > a,
	ul.sub-menu li:hover > a:after,
	ul.sub-menu li > a:hover,
	ul.sub-menu li > a:hover:after,
	nav.navbar ul.navbar-nav > li > a:hover:after,
	nav.navbar ul.navbar-nav > li > a:hover .fa,
	nav.navbar ul.navbar-nav > li > a:hover
	{ color: {$css['white_color']} !important; }	
}

body.admin-bar #adminbarsearch { background-color: transparent !important;}
";


