<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

// Color
$theme_style .= "
nav.navbar.navbar-transparent-light #navbar ul.navbar-nav > li:not(.current-menu-parent):not(.current-menu-ancestor) > a:hover,
nav.navbar.navbar-transparent-light #navbar ul.navbar-nav > li.current-menu-parent > a,
nav.navbar.navbar-transparent-light #navbar ul.navbar-nav > li.current-menu-ancestor > a,
.woocommerce form .form-row .required,
.woocommerce ul.products li.product .price ins,
.btn.btn-add-bordered,
.tariff-slider-sc .ul-yes,
.color-second,
.tariff-item.vip .price,
.top-bar .cart:hover, .top-bar .cart .fa:hover,
.products-sc.products-sc-fastfood article:hover .header h5,
.heading.color-second h1, .heading.color-second h2, .heading.color-second h3, 
.heading.color-second h4, .heading.color-second h5, .heading.color-second h6,
.blog-sc.layout-date-top article .header > *:hover,
.products-sc.products-sc-fastfood .price.color-second,
.heading.subcolor-second .subheader,
.blog-sc article .blog-info .cat-div,
.blog-sc article .blog-info .date.date-bold
{ color: {$css['second_color']}; }
";

// Background
$theme_style .= "
.image-video span.play:hover,
.social-big li a:hover,
nav.navbar .cart .count,
nav.navbar .nav-right .cart .count,
.bg-color-second.vc_row-fluid,
.bg-color-second.vc_section,
.bg-color-second.vc_column_container .vc_column-inner,
.top-bar .cart .count, .navbar .cart .count,
.woocommerce span.wc-label-new,
.bg-color-second.vc_section,
.bg-color-second.vc_column_container .vc_column-inner,
.btn.color-hover-second:hover,
.cart .count,
.btn.btn-second,
.btn.btn-add,
.bg-color-second.vc_section,
.bg-color-second.vc_column_container .vc_column-inner,
.like-contact-form-7.form-style-secondary form input[type=\"submit\"]
{ background-color: {$css['second_color']}; }
";

// Border-color
$theme_style .= "
.btn.btn-add-bordered
{ border-color: {$css['second_color']}; }
";

